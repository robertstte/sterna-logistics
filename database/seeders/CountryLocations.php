<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountryLocations extends Seeder
{
    public function run(): void
    {
        DB::table('country_locations')->insert([
            [
                'name' => 'Port of Al Maqal',
                'latitude' => '30.5618',
                'longitude' => '47.7905',
                'type_id' => 2,
                'country_id' => 104
            ],
            [
                'name' => 'Port of Khor Al-Zubair',
                'latitude' => '30.1912',
                'longitude' => '47.8842',
                'type_id' => 2,
                'country_id' => 104
            ],
            [
                'name' => 'Baghdad International Airport',
                'latitude' => '33.2625',
                'longitude' => '44.2317',
                'type_id' => 1,
                'country_id' => 104
            ],
            [
                'name' => 'Erbil International Airport',
                'latitude' => '36.2372',
                'longitude' => '43.9990',
                'type_id' => 1,
                'country_id' => 104
            ],
            [
                'name' => 'Baghdad Freight Terminal',
                'latitude' => '33.3152',
                'longitude' => '44.3661',
                'type_id' => 3,
                'country_id' => 104
            ],
            [
                'name' => 'Basora Port Logistics Hub',
                'latitude' => '30.4992',
                'longitude' => '47.8190',
                'type_id' => 2,
                'country_id' => 104
            ],
            [
                'name' => 'Tribhuvan International Airport',
                'latitude' => '27.7017',
                'longitude' => '85.3592',
                'type_id' => 1,
                'country_id' => 154
            ],
            [
                'name' => 'Pokhara International Airport',
                'latitude' => '28.2215',
                'longitude' => '83.9850',
                'type_id' => 1,
                'country_id' => 154
            ],
            [
                'name' => 'Biratnagar Logistics Center',
                'latitude' => '26.4482',
                'longitude' => '87.2711',
                'type_id' => 3,
                'country_id' => 154
            ],
            [
                'name' => 'Lalitpur Logistics Center',
                'latitude' => '27.6295',
                'longitude' => '85.6293',
                'type_id' => 3,
                'country_id' => 154
            ],
            [
                'name' => 'Port of Santos',
                'latitude' => '-23.966355',
                'longitude' => '-46.301740',
                'type_id' => 2,
                'country_id' => 31
            ],
            [
                'name' => 'Port of Paranagua',
                'latitude' => '-25.502420',
                'longitude' => '-48.520156',
                'type_id' => 2,
                'country_id' => 31
            ],
            [
                'name' => 'São Paulo-Guarulhos International Airport',
                'latitude' => '-23.4356',
                'longitude' => '-46.4731',
                'type_id' => 1,
                'country_id' => 31
            ],
            [
                'name' => 'Viracopos International Airport',
                'latitude' => '-23.0081',
                'longitude' => '-47.1347',
                'type_id' => 1,
                'country_id' => 31
            ],
            [
                'name' => 'São Paulo-Guarulhos International Airport',
                'latitude' => '-23.4356',
                'longitude' => '-46.4731',
                'type_id' => 1,
                'country_id' => 31
            ],
            [
                'name' => 'São Paulo Logistics Center',
                'latitude' => '-23.5505',
                'longitude' => '-46.6333',
                'type_id' => 1,
                'country_id' => 31
            ],
            [
                'name' => 'Port of Algeciras',
                'latitude' => '36.1272',
                'longitude' => '-5.4284',
                'type_id' => 2,
                'country_id' => 204
            ],
            [
                'name' => 'Port of Valencia',
                'latitude' => '39.4406',
                'longitude' => '-0.3229',
                'type_id' => 2,
                'country_id' => 204
            ],
            [
                'name' => 'Adolfo Suárez Airport',
                'latitude' => '40.474054',
                'longitude' => '-3.550865',
                'type_id' => 1,
                'country_id' => 204
            ],
            [
                'name' => 'Josep Tarradellas Airport',
                'latitude' => '41.295675',
                'longitude' => '2.071068',
                'type_id' => 1,
                'country_id' => 204
            ],
            [
                'name' => 'Zaragoza Logistics Center',
                'latitude' => '41.6349',
                'longitude' => '-0.9883',
                'type_id' => 3,
                'country_id' => 204
            ],
            [
                'name' => 'Lineaje Madrid',
                'latitude' => '40.363010',
                'longitude' => '-3.654119',
                'type_id' => 3,
                'country_id' => 204
            ],
            [
                'name' => 'SPAR Logistics Center',
                'latitude' => '45.67128',
                'longitude' => '15.75335',
                'type_id' => 3,
                'country_id' => 55
            ],
            [
                'name' => 'Dostyk Logistic Center',
                'latitude' => '45.2533',
                'longitude' => '82.4844',
                'type_id' => 3,
                'country_id' => 113
            ],
            [
                'name' => 'Casablanca Port',
                'latitude' => '33.5785',
                'longitude' => '7.6245',
                'type_id' => 2,
                'country_id' => 149
            ],
            [
                'name' => 'Lisboa Port',
                'latitude' => '38.7145',
                'longitude' => '9.1614',
                'type_id' => 2,
                'country_id' => 177
            ],
            [
                'name' => 'Marsella Port',
                'latitude' => '43.2962',
                'longitude' => '5.3698',
                'type_id' => 2,
                'country_id' => 74
            ],
            [
                'name' => 'Santo Domingo Port',
                'latitude' => '18.4657',
                'longitude' => '69.8835',
                'type_id' => 2,
                'country_id' => 62
            ],
            [
                'name' => 'Dublin Airport',
                'latitude' => '53.4264',
                'longitude' => '-6.2499',
                'type_id' => 1,
                'country_id' => 105
            ],
            [
                'name' => 'Chicago OHare International Airport',
                'latitude' => '41.9786',
                'longitude' => '-87.9047',
                'type_id' => 1,
                'country_id' => 230
            ]
        ]);
    }
}