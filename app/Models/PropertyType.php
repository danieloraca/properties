<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $property_id;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
