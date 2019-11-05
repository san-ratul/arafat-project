@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Edit Amenities of Property - {{$property->id}}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <div class="alert alert-info">
                <strong>Please add ',' for multiple amenities</strong>
            </div>
            <form class="form-horizontal form-label-left" action="{{route('property.amenity.update',$property->amenities->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_features">Main Features 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="main_features" name="main_features"  class="form-control col-md-7 col-xs-12 form-control @error('main_features') is-invalid @enderror" value="{{$property->amenities->main_features}}">
                        @error('main_features')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="business_communication">Business And Communications 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="business_communication" name="business_communication"  class="form-control col-md-7 col-xs-12 form-control @error('business_communication') is-invalid @enderror" value="{{$property->amenities->business_communication}}">
                        @error('business_communication')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="security">Security 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="security" name="security" class="form-control col-md-7 col-xs-12 form-control @error('security') is-invalid @enderror" value="{{$property->amenities->security}}">
                        @error('security')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_facilities">Other Facilities<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="other_facilities" name="other_facilities" class="form-control col-md-7 col-xs-12 form-control @error('other_facilities') is-invalid @enderror" value="{{$property->amenities->other_facilities}}">
                        @error('other_facilities')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection