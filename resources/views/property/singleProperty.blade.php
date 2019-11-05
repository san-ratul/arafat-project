@extends('user.layouts.app')
@section('content')
<!-- Start Proerty header  -->
<section id="aa-property-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-property-header-inner">
                    <h2>Properties Details</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('welcome')}}">HOME</a></li>
                    </ol>
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
                <div class="aa-properties-content">
                    <!-- Start properties content body -->
                    <div class="aa-properties-details">
                        <div class="aa-properties-details-img">
                            <img src="{{$property->image}}" alt="img">
                        </div>
                        <div class="aa-properties-info">
                            <h2>{{$property->name}}</h2>
                            <span class="aa-price">{{$property->rent}} &#2547</span>
                            <p>{{$property->description}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if(isset($property->amenities))
                    @if(isset($property->amenities->main_features))
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-ttile">Main Features</h3>
                                <ul class="list-group">
                                    <?php $main_features= explode(',',$property->amenities->main_features);?>
                                    @foreach($main_features as $main_feature)
                                    <li class="list-group-item">
                                        {{$main_feature}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($property->amenities->business_communication))
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Business Communication</h3>
                                <ul class="list-group">
                                    <?php $business_communications= explode(',',$property->amenities->business_communication);?>
                                    @foreach($business_communications as $business_communication)
                                    <li class="list-group-item">
                                        {{$business_communication}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($property->amenities->security))
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Security</h3>
                                <ul class="list-group">
                                    <?php $securities= explode(',',$property->amenities->security);?>
                                    @foreach($securities as $security)
                                    <li class="list-group-item">
                                        {{$security}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($property->amenities->other_facilities))
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Other Facilities</h3>
                                <ul class="list-group">
                                    <?php $facilities= explode(',',$property->amenities->other_facilities);?>
                                    @foreach($facilities as $facility)
                                    <li class="list-group-item">
                                        {{$facility}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="col-md-12">
                        <div class="alert alert-danger">For more information <b>Please Contact with ADMIN</b></div>
                    </div>

                    @endif
                </div>

            </div>

            <!-- Start properties sidebar -->
            <div class="col-md-4">
                <div class="sidbar-header">
                    <h3>Contact With Us</h3>
                </div>

                <aside class="aa-properties-sidebar">
                    <!-- Start Single properties sidebar -->
                    <div class="aa-properties-single-sidebar" class="text-center">
                        <div class="card mt-2">
                            <div class="card-body">
                                <b>Call Us on: {{App\User::where('admin',true)->first()->contact_no}}</b>
                                <p style="margin: 10px auto;text-align:center">--------------- OR --------------</p>
                                <form action="{{route('message.store',$property->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Your Name</label>
                                        <input type="text" class="form-control" name="name">
                                        @error('st_application')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Your Contact</label>
                                        <input type="Number" class="form-control" name="contact">
                                        @error('st_application')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Your Query</label>
                                        <textarea type="text" class="form-control" name="description" rows="10"
                                            cols="50"></textarea>
                                        @error('st_application')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Send Us a
                                        Message</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </aside>
            </div>
        </div>
    </div>

</section>

@endsection
