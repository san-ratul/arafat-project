<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
    public function welcome()
    {
        $latestProperties = Property::latest()->take(6)->get();
        $areaRange['maxArea'] = Property::max('area');
        $areaRange['minArea'] = Property::min('area');
        $priceRange['rentMaxPrice'] = Property::where('purpose','For Rent')->max('rent');
        $priceRange['rentMinPrice'] = Property::where('purpose','For Rent')->min('rent');
        $priceRange['sellMaxPrice'] = Property::where('purpose','For Sale')->max('rent');
        $priceRange['sellMinPrice'] = Property::where('purpose','For Sale')->min('rent');
        return view('welcome',compact('latestProperties','areaRange','priceRange'));
    }
    public function searchProperty(Request $request, $page = '1')
    {
        $areaRange['maxArea'] = Property::max('area');
        $areaRange['minArea'] = Property::min('area');
        $priceRange['rentMaxPrice'] = Property::where('purpose','For Rent')->max('rent');
        $priceRange['rentMinPrice'] = Property::where('purpose','For Rent')->min('rent');
        $priceRange['sellMaxPrice'] = Property::where('purpose','For Sale')->max('rent');
        $priceRange['sellMinPrice'] = Property::where('purpose','For Sale')->min('rent');
        $this->validate($request,[
            'location' => 'required'
        ]);
        if($request->type != null){
            if($request->purpose == null)
            {
                $properties = Property::where('location', 'like', '%'.$request->location.'%')->where('type',
                    $request->type)->whereBetween('area', [intval($request->area_low), intval($request->area_upper)])
                    ->whereBetween('rent', [intval($request->price_low), intval($request->price_upper)])->paginate(12);
            }else{
                $properties = Property::where('location', 'like', '%'.$request->location.'%')->where('purpose',
                    $request->purpose)->where('type', $request->type)->whereBetween('area',[intval
                ($request->area_low), intval($request->area_upper)])->whereBetween('rent', [intval($request->price_low), intval($request->price_upper)])->paginate(12);
            }
        } else{
            if($request->purpose == null)
            {
                $properties = Property::where('location', 'like', '%'.$request->location.'%')->whereBetween('area',
                    [intval($request->area_low), intval($request->area_upper)])->whereBetween('rent',
                    [intval($request->price_low), intval($request->price_upper)])->paginate(12);
            }else{
                $properties = Property::where('location', 'like', '%'.$request->location.'%')->where('purpose',$request->purpose)
                    ->whereBetween
                    ('area',[intval($request->area_low), intval($request->area_upper)])->whereBetween('rent',
                        [intval($request->price_low), intval($request->price_upper)])->paginate(12);
            }
        }
        $properties->appends($request->all());
        return  view('user.searchResults',compact('properties','areaRange','priceRange'));
    }
}
