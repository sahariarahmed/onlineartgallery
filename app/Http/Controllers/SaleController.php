<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function sale()
    {
        $data=Image::where('status','sold')->get();
        if(Auth::user()->role=='admin'){
        return view('pages.sale.sale', compact('data'));
        }
        else{
            return view('website.sale.sale', compact('data'));
        }
    }

    public function addforsale($image_id)
    {
        $data=Image::find($image_id);
        $data->update(['status'=>'sold']);
        return redirect()->back();

    }
}
