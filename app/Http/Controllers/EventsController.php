<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index(){
        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = Event::where('name','LIKE','%'.$key.'%')->get();
            return view('pages.events.events', compact('data','key'));
        }
        $data=Event::all();
        return view('pages.events.events',compact('data', 'key'));
    }

    public function list(){
        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = Event::where('name','LIKE','%'.$key.'%')->get();
            return view('pages.events.events', compact('data','key'));

        $data=Event::all();
        return view('pages.events.events', compact('data'));
    }
}


    public function createEvent(){

        return view('pages.events.createEvent');
    }

    public function storeEvent(Request $data){
        $data->validate([
            'title'=>'required',
            'sdate'=>'required',
            'edate'=>'required',
            'name'=>'required',
            'email'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $image_name=null;
                if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/events',$image_name);
                }

                Event::create([
                    'title'=>$data->title,
                    'sdate'=>$data->sdate,
                    'edate'=>$data->edate,
                    'name'=>$data->name,
                    'email'=>$data->email,
                    'description'=>$data->description,
                    'image'=>$image_name,
                ]);
                return redirect()->route('events')->with('success','Event created successfully.');
    }

    public function detailsEvent($detailsid){
        $details=Event::find($detailsid);
        return view('pages.events.eventdetails',compact('details'));
    }

    public function deleteEvent($delevent){
        Event::find($delevent)->delete();
        return redirect()->back()->with('delete','Event deleted successfully.');
    }

    public function updateEvent($update){
        $event=Event::find($update);
        return view('pages.events.updateEvent', compact('event'));
    }

    public function updatedEvent(Request $request, $updated){
        $event=Event::find($updated);
        $image_name=$event->image;
        if($request->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $request->file('image')->getClientOriginalExtension();

                    $request->file('image')->storeAs('/events',$image_name);
                }
        $event->update([
                    'title'=>$request->title,
                    'sdate'=>$request->sdate,
                    'edate'=>$request->edate,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'description'=>$request->description,
                    'image'=>$image_name,
        ]);
        return redirect()->route('events')->with('update', 'Updated Successfully.');
    }

    public function wEvents(){
        $data=Event::all();
        return view('website.event', compact('data'));

    }
    public function viewevent($viewid)
    {
        $view=Event::find($viewid);
        return view('website.showevent', compact('view'));
    }







}
