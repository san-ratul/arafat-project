@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-header">All Users Message</div>
          <div class="card-body">
          @if(isset($messages) && $messages->isEmpty())
            <div class="alert alert-danger">No message send yet!</div>
          @else
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="text-align:center;">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Query</th>
                  <th>Action</th>
                </tr>
              </thead>


              <tbody>
                  @foreach($messages as $message)
                  <tr>
                  <td>{{$message->name}}</td>
                  <td>{{$message->contact}}</td>
                  <td>{{$message->description}}</td>
                    <td><a  class="btn btn-primary btn-sm" href="{{route('property.single',$message->p_id)}}">view</a></td>
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