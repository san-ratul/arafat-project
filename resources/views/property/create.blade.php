@extends('layouts.app')


@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Add New Property</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" action="{{route('property.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Property Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 form-control @error('name') is-invalid @enderror" value="{{(old('name'))?old('name'):''}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Property Location <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="location" name="location" required="required" class="form-control col-md-7 col-xs-12 form-control @error('location') is-invalid @enderror" value="{{(old('location'))?old('location'):''}}">
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rent">Property Rate <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="rent" name="rent" required="required" class="form-control col-md-7 col-xs-12 form-control @error('rent') is-invalid @enderror" value="{{(old('rent'))?old('rent'):''}}">
                    @error('rent')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Property Area in Sq.Ft. <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="area" name="area" required="required" class="form-control col-md-7 col-xs-12 form-control @error('area') is-invalid @enderror" value="{{(old('area'))?old('area'):''}}">
                    @error('area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bed">Number of Bedrooms <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="bed" name="bed" required="required" class="form-control col-md-7 col-xs-12 form-control @error('bed') is-invalid @enderror" value="{{(old('bed'))?old('bed'):''}}">
                    @error('bed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bath">Number of Bathrooms <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="bath" name="bath" required="required" class="form-control col-md-7 col-xs-12 form-control @error('bath') is-invalid @enderror" value="{{(old('bath'))?old('bath'):''}}" >
                    @error('bath')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purpose">Purpose <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="purpose" name="purpose" required="required" class="form-control col-md-7 col-xs-12 form-control @error('purpose') is-invalid @enderror" value="{{(old('purpose'))?old('purpose'):''}}">
                    @error('purpose')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Property Type <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12 form-control @error('type') is-invalid @enderror" name="type" id="type">
                        <option value="">Choose Type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Building">Building</option>
                        <option value="Room">Room</option>
                        <option value="Penthouse">Penthouse</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Plaza">Plaza</option>
                        <option value="Plot">Plot</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="description" id="description" cols="20" rows="5" required="required" class="form-control col-md-7 col-xs-12 form-control @error('description') is-invalid @enderror">{{(old('description'))?old('description'):''}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="image" id="image" class="col-md-7 col-xs-12 form-control @error('image') is-invalid @enderror">
                    @error('image')
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
