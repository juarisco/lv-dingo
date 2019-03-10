<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\WeatherStats;



class WeatherStatTransformer extends TransformerAbstract
{

    public function transform(WeatherStats $weatherStats)
    {
        return [
            'id' => $weatherStats->id,
            'city_id' => $weatherStats->city_id,
            'city_name' => $weatherStats->city_name,
            'temp_celsius' => $weatherStats->temp_celsius,
            'status' => $weatherStats->status,
        ];
    }
}
