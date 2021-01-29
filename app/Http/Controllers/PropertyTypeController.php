<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PropertyTypeController extends Controller
{
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $propertyType = PropertyType::where('id', $id)->first();
        return View::make('edit_property_type', compact('propertyType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'property_id' => 'required',
        ]);

        PropertyType::where('id', $id)->update($validatedData);
        Property::where('id', $validatedData['property_id'])->update(['imported' => 0]);

        return redirect('/')->with('success', 'Property Updated');
    }
}
