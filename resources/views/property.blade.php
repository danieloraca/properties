@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12"><h3>Property</h3></div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">County</div>
        <div class="col-md-10">{{ $property->county }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Country</div>
        <div class="col-md-10">{{ $property->country }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Town</div>
        <div class="col-md-10">{{ $property->town }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Description</div>
        <div class="col-md-10">{{ $property->description }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Address</div>
        <div class="col-md-10">{{ $property->address }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Image</div>
        <div class="col-md-10"><img src="{{ url('/thumbnails/') . '/' . $property->image_url }}" /></div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Coordinates</div>
        <div class="col-md-10">{{ $property->latitude }} {{ $property->longitude }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Bedrooms</div>
        <div class="col-md-10">{{ $property->number_bedrooms }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Bathrooms</div>
        <div class="col-md-10">{{ $property->number_bathrooms }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Price</div>
        <div class="col-md-10">{{ $property->price }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Type</div>
        <div class="col-md-10">{{ $property->type }}</div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ route('edit_property', $property->id) }}">Edit</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12"><h3>Property Type</h3></div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Title</div>
        <div class="col-md-10">{{ $property_type->title }}</div>
    </div>
    <div class="row">
        <div class="col-md-2 text-right">Description</div>
        <div class="col-md-10">{{ $property_type->description }}</div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ route('edit_property_type', $property_type->id) }}">Edit</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{route('main')}}">Back</a>
        </div>
    </div>
@stop
