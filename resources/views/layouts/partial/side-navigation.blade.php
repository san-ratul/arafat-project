
<div class="menu_section">
  <ul class="nav side-menu">
    <li><a href="{{(Auth::user()->admin)?route('admin'):route('home')}}"><i class="fas fa-home"></i></i> Home</span></a></li>

    @if(Auth::user()->admin)
    <li><a><i class="fas fa-map-marked-alt"></i> Property Management <span class="far fa-caret-square-down pull-right"></span></a>
      <ul class="nav child_menu">
        <li><a href="{{route('property.create')}}">Add New Property</a></li>
        <li><a href="{{route('property.list')}}">All Properties</a></li>
        <li><a href="{{route('property.amenity')}}">Add Amenities</a></li>
        <li><a href="{{route('property.amenity.edit')}}">Edit Amenities</a></li>
      </ul>
    </li>
    <li><a href="{{route('property.allmessage')}}"><i class="fas fa-comments"></i> Messages </a>
    @else

    @endif

  </ul>
</div>
