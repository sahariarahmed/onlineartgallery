<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Auth;

class ArtistsController extends Controller

{
    public function index(){
        Auth::user()->notifications->markAsRead();
        $data=Artist::where('status','Approve')->get();
        $applications = Artist::where('status','pending')->get();
        return view('pages.artists.artists',compact('data','applications'));
    }

    public function createArtists(){

        return view('pages.artists.createArtists');
    }

    public function storeArtists(Request $data)
    {
        // $data->validate([
        //     'fname'=>'required',
        //     'lname'=>'required',
        //     'email'=>'required',
        //     'contact'=>'required',
        //     'country'=>'required',
        // ]);
        $image_name=null;

                if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();
                    $data->file('image')->storeAs('/artists',$image_name);
                }

        $user=User::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'role'=>'artist',
            'password'=>bcrypt($data->password),
        ]);

        Artist::create([
            'user_id'=>$user->id,
            'pdf'=>'null',
            'contact'=>$data->contact,
            'country'=>$data->country,
            'city'=>$data->city,
            'image'=>$image_name,

        ]);

        return redirect()->route('artists')->with('success','Artist created successfully.');
    }


    public function wArtists(){
        $data=Artist::all();
        return view ('website.artist.artists',['data'=>$data]);
    }

    public function deleteArtist($delartist){
        Artist::find($delartist)->delete();
        return redirect()->back()->with('delete','Artist deleted successfully.');
    }

    public function detailsArtist($detailsid){
        $details=Artist::find($detailsid);
        return view('pages.artists.artistdetails',compact('details'));
    }

    public function updateArtist($update){
        $artist=Artist::find($update);

        return view('pages.artists.updateArtist', compact('artist'));
    }

    public function updatedArtist($updated){
        $artist=Artist::find($updated);
        $artist->update(request()->all());
        return redirect()->route('artists')->with('update', 'Updated Successfully. ');
    }

    public function viewArtist($viewid)
    {
        $view=Artist::find($viewid);
        return view('website.artist.viewartist', compact('view'));
    }

    public function applyArtist()
    {
        return view('website.artist.applyArtist');
    }

    public function storeApply(Request $data)
    {
             $image_name=null;
                if($data->hasFile('image')){
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();
                    $data->file('image')->storeAs('/artists',$image_name);
                }

                $pdf_name=null;
                if($data->hasFile('pdf')){
                    $pdf_name=date('Ymdhis') .'.'. $data->file('pdf')->getClientOriginalExtension();
                    $data->file('pdf')->storeAs('/artists',$pdf_name);
                }

        Artist::create([
            'user_id'=>Auth::user()->id,
            'contact'=>$data->contact,
            'country'=>$data->country,
            'city'=>$data->city,
            'image'=>$image_name,
            'pdf'=>$pdf_name
        ]);
        User::where('role', 'admin')->first()->notify(new MessageNotification);
        return redirect()->back()->with('update', 'Submitted Successfully. ');
    }

    public function artistApprove($artist_id)
    {
        if (request()->action != 0) {
            $artist = Artist::find($artist_id);
            $artist->update(['status' => 'Approve']);
            User::find($artist->user_id)->update(['role' => 'artist']);
        } else {
            Artist::find($artist_id)->delete();
        }
        return redirect()->back();
    }

    public function createBlogs()
    {
        return view('website.artist.createblogArtist');
    }

}
