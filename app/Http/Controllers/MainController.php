<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('main')->withProperties($properties);
    }
}
