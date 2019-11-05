@extends('user.layouts.app')

@section('content')
    <!-- Pre Loader -->
    @include('user.partials.preloader')
    <!-- SCROLL TOP BUTTON -->
    <!-- Start slider  -->
    @include('user.partials.slider')
    <!-- End slider  -->
    <!-- Advance Search -->
    <div id="rent-search-wrapper">
        @include('user.partials.advancedSearch')
    </div>

    <!-- / Advance Search -->

    <!-- Latest property -->
    @include('user.partials.latestProperties')
    <!-- / Latest property -->
    <!-- Service section -->
    @include('user.partials.services')
  <!-- / Service section -->
@endsection
