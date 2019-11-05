@extends('layouts.app')
@section('style')
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href=".{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-header">Property List</div>
          <div class="card-body">
          @if(isset($properties) && $properties->isEmpty())
            <div class="alert alert-danger">No Properties yet!</div>
          @else
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="text-align:center;">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Purpose</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>


              <tbody>
                  @foreach($properties as $property)
                  <tr>
                  <td>{{$property->name}}</td>
                  <td>{{$property->location}}</td>
                  <td>{{$property->purpose}}</td>
                  <td>{{$property->rent}}</td>
                  <td><img src="{{$property->image}}" style="height:60px;width:100px;"/></td>
                  <td>
                    <a href="{{route('property.edit',$property->id)}}"><button class="btn btn-sm btn-info">Edit</button></a>
                    <form action="{{route('property.delete',$property->id)}}" method="POST" class="property-delete-form">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-sm btn-danger btn-delete" type="submit" value="Delete">
                    </form>
                  </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          @endif
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    @include('layouts.partial.sweetDelete')
@endsection
