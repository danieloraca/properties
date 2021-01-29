@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Property</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('view_property', $property->id) }}" title="Go back"> Back </a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('edit_property', $property->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>County:</strong>
                    <input type="text" name="county" value="{{$property->county}}" class="form-control" placeholder="County">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    <input type="text" name="country" value="{{$property->country}}" class="form-control" placeholder="Country">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Town:</strong>
                    <input type="text" name="town" value="{{$property->town}}" class="form-control" placeholder="Town">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control" placeholder="Description">{{$property->description}}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{$property->address}}" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Latitude:</strong>
                    <input type="text" name="latitude" value="{{$property->latitude}}" class="form-control" placeholder="Latitude">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Longitude:</strong>
                    <input type="text" name="longitude" value="{{$property->longitude}}" class="form-control" placeholder="Longitude">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Number of Bedrooms:</strong>
                    <input type="text" name="number_bedrooms" value="{{$property->number_bedrooms}}" class="form-control" placeholder="Number of Bedrooms">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Number of Bathrooms:</strong>
                    <input type="text" name="number_bathrooms" value="{{$property->number_bathrooms}}" class="form-control" placeholder="Number of Bathrooms">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{$property->price}}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    <select name="type">
                        <option value="sale" @if ($property->type == 'sale') selected="selected" @endif>Sale</option>
                        <option value="rent" @if ($property->type == 'rent') selected="selected" @endif>Rent</option>
                    </select>
                    <input type="text" name="country" value="{{$property->type}}" class="form-control" placeholder="Type">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" />
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@stop
