<?php

namespace App\Services\Integrations;

use App\Exceptions\DatausaException;
use Illuminate\Support\Facades\Http;

class Datausa
{
    protected string $serviceUrl = 'https://datausa.io/api/data';

    /**
     * Get data from the API
     */
    protected function getData(string $measure, string $drilldown, array $otherParams = []): mixed
    {
        $params = array_merge($otherParams, [
            'measures' => $measure,
            'drilldowns' => $drilldown,
        ]);

        $response = Http::get($this->serviceUrl, $params);

        if ($response->failed()) {
            throw new DatausaException($response->body());
        }

        return $response->json('data');
    }

    /**
     * Get population data by state and year
     */
    public function getPopulationByState(int $year): mixed
    {
        return $this->getData('Population', 'State', ['year' => $year]);
    }

    /**
     * Return a new Datausa instance
     */
    public static function instance(): Datausa
    {
        return new Datausa();
    }
}
