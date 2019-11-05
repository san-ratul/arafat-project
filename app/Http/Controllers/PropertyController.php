<?php

namespace App\Http\Controllers;

use App\Property;
use App\Amenities;
use App\User;
use App\Message;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->get();
        return view('property.allProperties', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'location' => 'required',
            'rent' => 'required',
            'area' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'purpose' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $path = '/property/'.$request->type.'/'.$filename;
            $file->move(public_path().'/property/'.$request->type.'/',$filename);
        }
        $property = Property::create([
            'name' => $request->name,
            'location' => $request->location,
            'rent' => $request->rent,
            'area' => $request->area,
            'bed' => $request->bed,
            'bath' => $request->bath,
            'purpose' => $request->purpose,
            'type' => $request->type,
            'description' => $request->description,
            'image' =>  $path,
        ]);
        return redirect()->route('property.addAmenitiesForm',$property->id)->with('success','Property Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('property.singleProperty',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('property.edit',compact('property','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $this->validate($request,[
            'name' => 'required',
            'location' => 'required',
            'rent' => 'required',
            'area' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'purpose' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $path = '/property/'.$request->type.'/'.$filename;
            $file->move(public_path().'/property/'.$request->type.'/',$filename);
        }else{
            $path = $property->image;
        }
        $property->update([
            'name' => $request->name,
            'location' => $request->location,
            'rent' => $request->rent,
            'area' => $request->area,
            'bed' => $request->bed,
            'bath' => $request->bath,
            'purpose' => $request->purpose,
            'type' => $request->type,
            'description' => $request->description,
            'image' =>  $path,
        ]);

        return redirect()->route('property.list')->with('success','Property Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.list')->with('sweetDelete','The Property Deleted Successfully');
    }

    protected function messageStore(Request $request,Property $property)
    {
        $propertyId=$property->id;
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],

        ]);

       $message = Message::create([
            'name' => $request['name'],
            'contact' => $request['contact'],
            'description' => $request['description'],
            'p_id' => $propertyId,

        ]);
        return redirect()->route('property.single',$property->id)->with('status',' Message Send successfully!!');
    }
    public function adminSeeMessage()
    {
        $messages = Message::all();
        return view('admin.message.allMessageList',compact('messages'));
    }

}
