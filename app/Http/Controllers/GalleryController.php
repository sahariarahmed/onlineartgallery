<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image;
use PhpParser\Node\Stmt\Foreach_;

class GalleryController extends Controller
{
    public function index(){
        $data=Gallery::all();
        return view('pages.gallery.gallery', compact('data'));
    }

    public function createCat()
    {
        return view('pages.gallery.createGallery');

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
                'name'=>$data->name,
                'details'=>$data->details,
                'image'=>$image_name,
        ]);
        return redirect()->route('gallery')->with('success','Category created successfully.');
    }


    public function addimage($gallery_id)
    {
        return view('pages.gallery.createImage', compact('gallery_id'));
    }

    public function storeImage(Request $request, $id){

        $count = 0;
        $image_name=null;
        if(request('image')){
        foreach ($request->image as $value) {
            $imaged = $value->store('/galleries','public');
            Image::create([
                'image'=>$imaged,
                'gallery_id'=>$id,
            ]);
            }
        }
        return redirect()->route('gallery')->with('success','Images updated successfully.');
    }

    public function showCats()
        {
            $data=Gallery::all();
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

    public function updateCat($update){
        $cat=Gallery::find($update);

        return view('pages.gallery.updateGallery', compact('cat'));
    }

    public function updatedCat($updated){
        $cat=Gallery::find($updated);
        $cat->update(request()->all());
        return redirect()->route('gallery')->with('update', 'Updated Successfully. ');
    }

    public function upload()
    {
        return view('website.gallery.uploadCat');
    }





}
