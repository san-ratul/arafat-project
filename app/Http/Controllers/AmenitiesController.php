<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Property;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('property.remainingPropertiesWithoutAmenities',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        if($property->amenities != NULL){
            return redirect()->route('property.amenity')->with('warning','Amenity Already Added!');
        }else{
            return view('property.addAmenity',compact('property')); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Property $property,Request $request)
    {
        $this->validate($request,[
            'main_features' => 'string|nullable|max:191',
            'business_communication' => 'string|nullable|max:191',
            'security' => 'string|nullable|max:191',
            'other_facilities' => 'string|nullable|max:191',
        ]);

        Amenities::create([
            'property_id' => $property->id,
            'main_features' => $request->main_features,
            'business_communication' => $request->business_communication,
            'security' => $request->security,
            'other_facilities' => $request->other_facilities,
        ]);

        return redirect()->route('property.amenity')->with('success','Amenity Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function show(Amenities $amenities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $properties = Property::all();
        return view('property.propertiesWithAmenities',compact('properties'));
    }
    public function editForm(Property $property)
    {
        if($property->amenities == NULL){
            return redirect()->route('property.amenity')->with('warning','Add Amenity First!');
        }else{
            return view('property.editAmenity',compact('property')); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenities $amenities)
    {
        $this->validate($request,[
            'main_features' => 'string|nullable|max:191',
            'business_communication' => 'string|nullable|max:191',
            'security' => 'string|nullable|max:191',
            'other_facilities' => 'string|nullable|max:191',
        ]);

        $amenities->update([
            'main_features' => $request->main_features,
            'business_communication' => $request->business_communication,
            'security' => $request->security,
            'other_facilities' => $request->other_facilities,
        ]);

        return redirect()->route('property.amenity.edit')->with('success','Amenity Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenities $amenities)
    {
        //
    }
}
