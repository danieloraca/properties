<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Image;

class PropertyController extends Controller
{
    public function view(int $id): \Illuminate\Contracts\View\View
    {
        $property = Property::where('id', $id)->first();
        $property_type = PropertyType::where('property_id', $id)->first();
        return View::make('property', compact('property','property_type'));
    }

    public function edit(int $id)
    {
        $property = Property::where('id', $id)->first();
        return View::make('edit_property', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'county' => 'required|max:255',
            'country' => 'required|max:255',
            'town' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'number_bedrooms' => 'required',
            'number_bathrooms' => 'required',
            'price' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validatedData['image']) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();

            $filePath = public_path('/thumbnails');
            $img = Image::make($image->path());

            $img->resize(110, 110, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$imageName);

            $filePath = public_path('/images');
            $image->move($filePath, $imageName);

            $validatedData['image_url'] = $imageName;
            $validatedData['thumbnail_url'] = $imageName;
        }

        unset($validatedData['image']);

        $validatedData['imported'] = 0;

        Property::where('id', $id)->update($validatedData);

        return redirect('/')->with('success', 'Property Updated');
    }

    public function delete(int $id)
    {
        $propertyType = PropertyType::where('property_id', $id)->first();
        $propertyType->delete();

        $property = Property::where('id', $id)->first();
        $property->delete();

        return redirect('/')->with('success', 'Successfully deleted');
    }
}
