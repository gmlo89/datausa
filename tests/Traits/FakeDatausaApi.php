<?php

namespace Tests\Traits;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;


trait FakeDatausaApi
{

    /**
     * Mock the Datausa Response
     *
     * @return void
     */
    protected function mockDatausa(): void
    {
        Http::fake(function (Request $request) {
            $year = $request->data()['year'];
            return Http::response([
                'data' => [
                    [
                        "ID State" => "04000US01",
                        "State" => "Alabama",
                        "ID Year" => $year,
                        "Year" => $year,
                        "Population" => 4830620,
                        "Slug State" => "alabama"
                    ],
                    [
                        "ID State" => "04000US02",
                        "State" => "Alaska",
                        "ID Year" => $year,
                        "Year" => $year,
                        "Population" => 733375,
                        "Slug State" => "alaska"
                    ],
                    [
                        "ID State" => "04000US04",
                        "State" => "Arizona",
                        "ID Year" => $year,
                        "Year" => $year,
                        "Population" => 6641928,
                        "Slug State" => "arizona"
                    ]
                ]
            ], 200);
        });
    }
}
