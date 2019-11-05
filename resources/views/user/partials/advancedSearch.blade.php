<section id="aa-advance-search">
    <div class="container">
      <div class="aa-advance-search-area">
        <div class="form">
            <form action="{{route('search.initial')}}" method="GET">
                @csrf
             <div class="aa-advance-search-top">
                <div class="row">
                  <div class="col-md-5">
                    <div class="aa-single-advance-search">
                      <input type="text" placeholder="Type Your Location" name="location">
                        @error('location')
                            <p class="invalid-feedback" style="margin-top:10px;color:#8b2629;" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="aa-single-advance-search">
                      <select class="purpose" name="purpose">
                        <option value="">Choose Purpose</option>
                        <option value="For Rent">For Rent</option>
                        <option value="For Sale">For Buy</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="aa-single-advance-search">
                      <input class="aa-search-btn" type="submit" value="Search">
                    </div>
                  </div>
                </div>
             </div>
             <div class="aa-advance-search-bottom">
               <div class="row">
                <div class="col-md-6">
                  <div class="aa-single-filter-search">
                    <span>AREA (SQ)</span>
                    <span>FROM</span>
                    <span id="skip-value-lower" class="example-val">0.00</span>
                      <input type="hidden" id="area-value-lower" value="" name="area_low">
                    <span>TO</span>
                      <input type="hidden" id="area-value-upper" value="" name="area_upper">
                    <span id="skip-value-upper" class="example-val">1200.00</span>
                    <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="aa-single-filter-search">
                    <span class="price">Rent (BDT)</span>
                    <span>FROM</span>
                    <span id="skip-value-lower2" class="example-val">30.00</span>
                      <input type="hidden" id="price-value-lower" value="" name="price_low">
                    <span>TO</span>
                      <input type="hidden" id="price-value-upper" value="" name="price_upper">
                    <span id="skip-value-upper2" class="example-val">100.00</span>
                    <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                    </div>
                  </div>
                </div>
              </div>
             </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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
            var purpose = $('.purpose');
            purpose.change(function(){
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
        });

    </script>
@endsection
