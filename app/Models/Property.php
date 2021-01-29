<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'county',
        'country',
        'town',
        'description',
        'full_details_url',
        'address',
        'image_url',
        'thumbnail_url',
        'latitude',
        'longitude',
        'number_bedrooms',
        'number_bathrooms',
        'price',
        'property_type',
        'type',
        'imported'
    ];
    /**
     * @var mixed
     */
    private $county;
    /**
     * @var mixed
     */
    private $country;
    /**
     * @var mixed
     */
    private $town;
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $full_details_url;
    /**
     * @var mixed
     */
    private $address;
    /**
     * @var mixed
     */
    private $image_url;
    /**
     * @var mixed
     */
    private $thumbnail_url;
    /**
     * @var mixed
     */
    private $latitude;
    /**
     * @var mixed
     */
    private $longitude;
    /**
     * @var mixed
     */
    private $number_bedrooms;
    /**
     * @var mixed
     */
    private $number_bathrooms;
    /**
     * @var mixed
     */
    private $price;
    /**
     * @var mixed
     */
    private $property_type;
    /**
     * @var mixed
     */
    private $type;
    /**
     * @var mixed
     */
    private $uuid;
    /**
     * @var bool|mixed
     */
    private $imported;

    public function propertyType()
    {
        return $this->hasOne(PropertyType::class, 'property_id');
    }
}
