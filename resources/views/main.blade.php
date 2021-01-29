@extends('layouts.master')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{route('read_api')}}">Fetch values</a>
        <div class="row">
            <div class="col-md-3"><h4>ID</h4></div>
            <div class="col-md-3"><h4>Town</h4></div>
            <div class="col-md-3"><h4>Price</h4></div>
            <div class="col-md-3"><h4>Actions</h4></div>
        </div>
        @foreach($properties as $property)
            <div class="row">
                <div class="col-md-3"><a href="{{ route('view_property', $property->id) }}">{{ $property->id }}</a></div>
                <div class="col-md-3">{{ $property->town }}</div>
                <div class="col-md-3">{{ $property->price }}</div>
                <div class="col-md-3">
                    <a class="btn btn-sm" href="{{ route('edit_property', $property->id) }}">Update</a>
                    <a class="btn btn-sm" href="{{ route('delete_property', $property->id) }}">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
