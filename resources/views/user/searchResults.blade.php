@extends('user.layouts.app')

@section('content')
    <!-- Start Proerty header  -->

    <section id="aa-property-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-property-header-inner">
                        <h2>We found this properties for you</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Proerty header  -->

    <!-- Start Properties  -->
    <section id="aa-properties">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(!$properties->isEmpty())
                    <div class="aa-properties-content">
                        <!-- start properties content head -->
                        <div class="aa-properties-content-head">
                            <div class="aa-properties-content-head-right">
                                <a id="aa-grid-properties" href="#"><span class="fa fa-th"></span></a>
                                <a id="aa-list-properties" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                        <!-- Start properties content body -->


                        <div class="aa-properties-content-body">
                            <ul class="aa-properties-nav">
                                @foreach($properties as $property)
                                <li>
                                    <article class="aa-properties-item">
                                        <a class="aa-properties-item-img" href="{{route('property.single',$property->id)}}">
                                            <img alt="img" src="{{$property->image}}">
                                        </a>
                                        <div class="aa-tag {{implode('-',explode(' ',strtolower($property->purpose)))}}">
                                            {{$property->purpose}}
                                        </div>
                                        <div class="aa-properties-item-content">
                                            <div class="aa-properties-info">
                                                <span>{{$property->bed}} Beds</span>
                                                <span>{{$property->bath}} Baths</span>
                                                <span>{{$property->area}} SQ FT</span>
                                            </div>
                                            <div class="aa-properties-about">
                                                <h3><a href="{{route('property.single',$property->id)}}">{{$property->name}}</a></h3>
                                                <p>{{$property->location}}</p>
                                            </div>
                                            <div class="aa-properties-detial">
                                            <span class="aa-price">
                                            BDT {{$property->rent}}
                                            </span>
                                                <a href="{{route('property.single',$property->id)}}" class="aa-secondary-btn">View Details</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Start properties content bottom -->
                        <div class="aa-properties-content-bottom">
                            {{ $properties->links() }}
                        </div>
                    </div>
                    @else
                        <div class="alert alert-danger">No Properties found</div>
                    @endif
                </div>

                <!-- Start properties sidebar -->
                <div class="col-md-4">
                    <aside class="aa-properties-sidebar">
                        <!-- Start Single properties sidebar -->
                        <div class="aa-properties-single-sidebar">
                            <h3>Properties Search</h3>
                            <form action="{{route('search.initial')}}" method="GET">
                                @csrf
                                <div class="aa-single-advance-search">
                                    <input type="text" placeholder="Type Your Location" name="location"
                                           value="{{Request::get('location')}}">
                                    @error('location')
                                    <p class="invalid-feedback" style="margin-top:10px;color:#8b2629;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                </div>
                                <div class="aa-single-advance-search">
                                    <select id="type" name="type">
                                        <option value="">Choose Type</option>
                                        <option value="Apartment" {{(Request::get('type')=="Apartment")
                                        ?'selected':''}}>Apartment</option>
                                        <option value="Building" {{(Request::get('type')=="Building")
                                        ?'selected':''}}>Building</option>
                                        <option value="Room" {{(Request::get('type')=="Room")
                                        ?'selected':''}}>Room</option>
                                        <option value="Penthouse" {{(Request::get('type')=="Penthouse")
                                        ?'selected':''}}>Penthouse</option>
                                        <option value="Duplex" {{(Request::get('type')=="Duplex")
                                        ?'selected':''}}>Duplex</option>
                                        <option value="Plaza" {{(Request::get('type')=="Plaza")
                                        ?'selected':''}}>Plaza</option>
                                        <option value="Plot" {{(Request::get('type')=="Plot")
                                        ?'selected':''}}>Plot</option>
                                    </select>
                                </div>
                                <div class="aa-single-advance-search">
                                    <select class="purpose" name="purpose" >
                                        <option value="">Choose Purpose</option>
                                        <option value="For Rent" {{(Request::get('purpose')=="For Rent")
                                        ?'selected':''}}>For Rent</option>
                                        <option value="For Sale" {{(Request::get('purpose')=="For Sale")
                                        ?'selected':''}}>For Buy</option>
                                    </select>
                                </div>
                                <div class="aa-single-filter-search" style="font-size: 14px">
                                    <span>AREA (SQ)</span>
                                    <span>FROM</span>
                                    <span id="skip-value-lower" class="example-val">30.00</span>
                                    <span>TO</span>
                                    <span id="skip-value-upper" class="example-val">100.00</span>
                                    <input type="hidden" id="area-value-lower" value="" name="area_low">
                                    <input type="hidden" id="area-value-upper" value="" name="area_upper">
                                    <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    </div>
                                </div>
                                <div class="aa-single-filter-search" style="font-size: 14px">
                                    <span>RENT ($)</span>
                                    <span>FROM</span>
                                    <span id="skip-value-lower2" class="example-val">30.00</span>
                                    <span>TO</span>
                                    <span id="skip-value-upper2" class="example-val">100.00</span>
                                    <input type="hidden" id="price-value-lower" value="" name="price_low">
                                    <input type="hidden" id="price-value-upper" value="" name="price_upper">
                                    <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    </div>
                                </div>
                                <div class="aa-single-advance-search">
                                    <input type="submit" value="Search" class="aa-search-btn">
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- / Properties  -->
@endsection
@section('script')
    <script>
        $(function(){
            if($('body').is('.aa-price-range')){
                // FOR AREA SECTION
                var skipSlider = document.getElementById('aa-sqrfeet-range');
                noUiSlider.create(skipSlider, {
                    range: {
                        'min': parseInt("{{$areaRange['minArea']}}"),
                        @for($i=5; $i<= 100; $i+=1)
                        '{{$i.'%'}}': parseInt("{{$areaRange['minArea'] + (($areaRange['maxArea']-$areaRange['minArea'])*($i/100))}}"),
                        @endfor
                        'max': parseInt("{{$areaRange['maxArea']}}")
                    },
                    snap: true,
                    connect: true,
                    start: [parseInt("{{$areaRange['minArea']}}"), parseInt("{{$areaRange['maxArea']}}")]
                });
                // for value print
                var skipValues = [
                    document.getElementById('skip-value-lower'),
                    document.getElementById('skip-value-upper')
                ];
                var areaValues = [
                    document.getElementById('area-value-lower'),
                    document.getElementById('area-value-upper')
                ];

                skipSlider.noUiSlider.on('update', function( values, handle ) {
                    skipValues[handle].innerHTML = values[handle];
                    areaValues[handle].value = values[handle];
                });

                // FOR PRICE SECTION

                var skipSlider2 = document.getElementById('aa-price-range');
                noUiSlider.create(skipSlider2, {
                    range: {
                        'min': parseInt("{{$priceRange['rentMinPrice']}}"),
                        @for($i=5; $i<= 100; $i+=1)
                        '{{$i.'%'}}': parseInt("{{$priceRange['rentMinPrice'] + (($priceRange['rentMaxPrice']-$priceRange['rentMinPrice'])*($i/100))}}"),
                        @endfor
                        'max': parseInt("{{$priceRange['rentMaxPrice']}}")
                    },
                    snap: true,
                    connect: true,
                    start: [parseInt("{{$priceRange['rentMinPrice']}}"), parseInt("{{$priceRange['rentMaxPrice']}}")]
                });
                // for value print
                var skipValues2 = [
                    document.getElementById('skip-value-lower2'),
                    document.getElementById('skip-value-upper2')
                ];
                var priceValues = [
                    document.getElementById('price-value-lower'),
                    document.getElementById('price-value-upper')
                ];

                skipSlider2.noUiSlider.on('update', function( values, handle ) {
                    skipValues2[handle].innerHTML = values[handle];
                    priceValues[handle].value = values[handle];
                });
            }
            $('.purpose').change(function(){
                if($(this).val() === 'For Sale'){
                    skipSlider2.noUiSlider.updateOptions({
                        range: {
                            'min': parseInt("{{$priceRange['sellMinPrice']}}"),
                            @for($i=5; $i<= 100; $i+=1)
                            '{{$i.'%'}}': parseInt("{{$priceRange['sellMinPrice'] + (($priceRange['sellMaxPrice']-$priceRange['sellMinPrice'])*($i/100))}}"),
                            @endfor
                            'max': parseInt("{{$priceRange['sellMaxPrice']}}")
                        },
                    });
                    skipSlider2.noUiSlider.set([parseInt("{{$priceRange['sellMinPrice']}}"),parseInt
                    ("{{$priceRange['sellMaxPrice']}}")]);
                    $('.price').html('Price (BDT)');
                }else if($(this).val() === 'For Rent') {
                    skipSlider2.noUiSlider.updateOptions({
                        range: {
                            'min': parseInt("{{$priceRange['rentMinPrice']}}"),
                            @for($i=5; $i<= 100; $i+=1)
                            '{{$i.'%'}}': parseInt("{{$priceRange['rentMinPrice'] + (($priceRange['rentMaxPrice']-$priceRange['rentMinPrice'])*($i/100))}}"),
                            @endfor
                            'max': parseInt("{{$priceRange['rentMaxPrice']}}")
                        },
                    });
                    skipSlider2.noUiSlider.set([parseInt("{{$priceRange['rentMinPrice']}}"),parseInt
                    ("{{$priceRange['rentMaxPrice']}}")]);
                    $('.price').html('Rent (BDT)');
                }
            });
            $(document).ready(function(){
                var purpose = $('.purpose');
                if(purpose.val() === 'For Sale' ||purpose.val() === '' ){
                    skipSlider2.noUiSlider.updateOptions({
                        range: {
                            'min': parseInt("{{$priceRange['sellMinPrice']}}"),
                            @for($i=5; $i<= 100; $i+=1)
                            '{{$i.'%'}}': parseInt("{{$priceRange['sellMinPrice'] + (($priceRange['sellMaxPrice']-$priceRange['sellMinPrice'])*($i/100))}}"),
                            @endfor
                            'max': parseInt("{{$priceRange['sellMaxPrice']}}")
                        },
                    });
                    skipSlider2.noUiSlider.set([parseInt("{{$priceRange['sellMinPrice']}}"),parseInt
                    ("{{$priceRange['sellMaxPrice']}}")]);
                    $('.price').html('Price (BDT)');
                } else if(purpose.val() === 'For Rent'){
                    skipSlider2.noUiSlider.updateOptions({
                        range: {
                            'min': parseInt("{{$priceRange['rentMinPrice']}}"),
                            @for($i=5; $i<= 100; $i+=1)
                            '{{$i.'%'}}': parseInt("{{$priceRange['rentMinPrice'] + (($priceRange['rentMaxPrice']-$priceRange['rentMinPrice'])*($i/100))}}"),
                            @endfor
                            'max': parseInt("{{$priceRange['rentMaxPrice']}}")
                        },
                    });
                    skipSlider2.noUiSlider.set([parseInt("{{$priceRange['rentMinPrice']}}"),parseInt
                    ("{{$priceRange['rentMaxPrice']}}")]);
                    $('.price').html('Rent (BDT)');
                }
            })
        });

    </script>
@endsection

