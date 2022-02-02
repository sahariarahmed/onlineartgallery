<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class GalleryController extends Controller
{
    public function index(){
        $data=Gallery::where('status','Approve')->get();
        $applications = Gallery::where('status','pending')->get();
        return view('pages.gallery.gallery', compact('data','applications'));
    }

    public function createCat()
    {
        if(Auth::user()->role=='admin'){
        return view('pages.gallery.createGallery');
        }
        else{
            return view('website.gallery.createArtistgallery');
        }
    }

    public function storeCat(Request $data)
    {
        $image_name=null;
                if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/galleries',$image_name);
                }

        Gallery::create([
                'user_id'=>Auth::user()->id,
                'name'=>$data->name,
                'details'=>$data->details,
                'image'=>$image_name,
        ]);
        if(Auth::user()->role=='admin'){
        return redirect()->route('gallery')->with('success','Category created successfully.');
        }
        elseif(Auth::user()->role=='artist'){
            return redirect()->route('view.artist.cat')->with('success','Category created successfully.');
        }
        else{
            return redirect()->route('view.user.cat')->with('success','Category created successfully.');
        }
    }


    public function addimage($gallery_id)
    {
        if(Auth::user()->role=='admin'){
        return view('pages.gallery.createImage', compact('gallery_id'));
        }
        else{
            return view('website.gallery.createArtistimages', compact('gallery_id'));
        }
    }

    public function storeImage(Request $request, $id){

        $count = 0;
        $image_name=null;
        if(request('image')){
        foreach ($request->image as $value) {
            $imaged = $value->store('/galleries','public');
            Image::create([
                'user_id'=>Auth::user()->id,
                'image'=>$imaged,
                'gallery_id'=>$id,
            ]);
            }
        }
        if(Auth::user()->role=='admin'){
        return redirect()->route('gallery')->with('success','Images updated successfully.');
        }
        elseif(Auth::user()->role=='artist'){
            return redirect()->route('view.artist.cat')->with('success','Images updated successfully.');
        }
        else{
            return redirect('/')->with('success','Images are requested successfully for admins approve.');
        }
    }

    public function showCats()
        {
            $data=Gallery::where('status', 'Approve')->get();
            return view('website.gallery.gallery', compact('data'));
        }

    public function showCat($gallery_id)
    {
        $images=Image::where('gallery_id', $gallery_id)->get();
        $view=Gallery::find($gallery_id);
        return view('website.gallery.showcat', compact('images', 'view'));
    }

    public function deleteCat($delcat){
        Gallery::find($delcat)->delete();
        return redirect()->back()->with('delete','Blog deleted successfully.');
    }

    public function detailsGallery($detailsid){
        $details=Gallery::find($detailsid);
        $images=Image::where('gallery_id', $detailsid)->get();
        if(Auth::user()->role=='admin'){
        return view('pages.gallery.detailsCat',compact('details', 'images'));
        }
        else{
            return view('website.gallery.detailsArtistcat',compact('details', 'images'));
        }
    }

    public function updateCat($update){
        $cat=Gallery::find($update);

        return view('pages.gallery.updateGallery', compact('cat'));
    }

    public function updatedCat($updated){
        $cat=Gallery::find($updated);
        $cat->update(request()->all());
        return redirect()->route('gallery')->with('update', 'Updated Successfully. ');
    }

    public function userUpload()
    {
        return view('website.gallery.uploadCat');
    }


    public function artistGalleryshow()
    {
        $data=Gallery::where('user_id', Auth::user()->id)->get();
        return view('website.gallery.artistgallery', compact('data'));
    }

    public function userGalleryshow()
    {
        $data=Gallery::where('user_id', Auth::user()->id)->latest()->first();
        return view('website.gallery.usergallery', compact('data'));

    }

    public function galleryApprove($gallery_id)
    {
        if (request()->action != 0) {
            $gallery = Gallery::find($gallery_id);
            $gallery->update(['status' => 'Approve']);

        } else {
            Gallery::find($gallery_id)->delete();
        }
        return redirect()->back();
    }

    public function deleteSingleimage($image_id)
    {
        Image::find($image_id)->delete();
        return redirect()->back()->with('warning', 'Deleted Successfully. ');
    }

    public function dashboard()
    {

        $latestcats=Gallery::latest()->paginate(3);
        return view('website.dashboard', compact('latestcats'));
    }



}
