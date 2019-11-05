<section id="aa-latest-property">
  <div class="container">
    <div class="aa-latest-property-area">
      <div class="aa-title">
        <h2>Latest Properties</h2>
        <span></span>
      </div>
      <div class="aa-latest-properties-content">
        <div class="row">
          @foreach($latestProperties as $property)
          <div class="col-md-4">
            <article class="aa-properties-item">
              <a href="#" class="aa-properties-item-img">
                <img src="{{asset($property->image)}}" alt="img">
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
                  <h3><a href="#">{{$property->name}}</a></h3>
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
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
