<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;
class ArtistsController extends Controller

{
    public function index(){
        $data=Artist::all();
        return view('pages.artists.artists',compact('data'));    
    }

    public function createArtists(){
        
        return view('pages.artists.createArtists');
    }

    public function storeArtists(Request $data)
    {
        $data->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'country'=>'required',
        ]);    
        $image_name=null;
                 
                if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/artists',$image_name);
                }

        Artist::create([            
            'fname'=>$data->fname,
            'lname'=>$data->lname,
            'email'=>$data->email,
            'contact'=>$data->contact,
            'country'=>$data->country,
            'city'=>$data->city,
            'image'=>$image_name,
            
        ]);

        return redirect()->route('artists')->with('success','Artist created successfully.');
    }


    public function wArtists(){
        $data=Artist::all();
        return view ('website.artists',['data'=>$data]);
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
}
