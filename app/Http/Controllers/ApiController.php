<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;

class ApiController extends Controller
{
    const API_URL = 'http://trialapi.craig.mtcdevserver.com/api/properties';
    const API_KEY = '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';

    public function readApi()
    {
        $requestContent = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            sprintf('%s?api_key=%s', self::API_URL, self::API_KEY),
            $requestContent
        );

        if ($response->getStatusCode() === 200) {
            $this->parseApiResponse($response->getBody()->getContents());
        }

        return redirect()->route('main');
    }

    private function parseApiResponse(string $contents): void
    {
        $decodedContents = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        $properties = $decodedContents['data'];

        foreach ($properties as $entry) {
            if (Property::where('uuid', $entry['uuid'])->exists()) {
                $this->updateProperty($entry);
            } else {
                $this->createProperty($entry);
            }
        }
    }

    private function createProperty(array $entry): void
    {
        $propertyType = new PropertyType();
        $this->storePropertyType($propertyType, $entry);

        $property = new Property();
        $this->storeProperty($property, $propertyType->id, $entry);

        $propertyType->property_id = $property->id;
        $propertyType->save();
    }

    private function updateProperty(array $entry): void
    {
        //todo update them only if they are not edited!!!
        $property = Property::where('uuid', $entry['uuid'])->first();

        $propertyType = $property->propertyType;
        $this->storePropertyType($propertyType, $entry);

        $this->storeProperty($property, $propertyType->id, $entry);
    }

    private function storeProperty(Property $property, int $propertyTypeId, array $entry)
    {
        $property->uuid = $entry['uuid'];
        $property->county = $entry['county'];
        $property->country = $entry['country'];
        $property->town = $entry['town'];
        $property->description = $entry['description'];
        $property->address = $entry['address'];
        $property->image_url = $entry['image_full'];
        $property->thumbnail_url = $entry['image_thumbnail'];
        $property->latitude = $entry['latitude'];
        $property->longitude = $entry['longitude'];
        $property->number_bedrooms = $entry['num_bedrooms'];
        $property->number_bathrooms = $entry['num_bathrooms'];
        $property->price = $entry['price'];
        $property->property_type = $propertyTypeId;
        $property->type = $entry['type'];
        $property->imported = true;
        $property->save();
    }

    //todo use the same logic to update it as for properties
    private function storePropertyType(PropertyType $propertyType, array $entry)
    {
        $propertyType->title = $entry['property_type']['title'];
        $propertyType->description = $entry['property_type']['description'];
        $propertyType->save();
    }
}
