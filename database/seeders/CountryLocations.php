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
            // Existing data for Iraq
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
            // Existing data for Nepal
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
            // Existing data for Brazil
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
                'name' => 'São Paulo-Guarulhos International Airport', // Duplicated entry, consider removing
                'latitude' => '-23.4356',
                'longitude' => '-46.4731',
                'type_id' => 1,
                'country_id' => 31
            ],
            [
                'name' => 'São Paulo Logistics Center',
                'latitude' => '-23.5505',
                'longitude' => '-46.6333',
                'type_id' => 1, // This should probably be type_id 3 (Logistics Center)
                'country_id' => 31
            ],
            // Existing data for Spain
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

            // --- Nuevos datos solicitados ---

            // India 
            [
                'name' => 'Indira Gandhi International Airport',
                'latitude' => '28.5667',
                'longitude' => '77.1000',
                'type_id' => 1,
                'country_id' => 101
            ],
            [
                'name' => 'Jawaharlal Nehru Port Trust (JNPT)',
                'latitude' => '18.9667',
                'longitude' => '72.8258',
                'type_id' => 2,
                'country_id' => 101
            ],
            [
                'name' => 'Mumbai Logistics Park',
                'latitude' => '19.0760',
                'longitude' => '72.8777',
                'type_id' => 3,
                'country_id' => 101
            ],

            // Nepal (country_id: 154 - Añadiendo a los existentes)
            [
                'name' => 'Gautam Buddha International Airport',
                'latitude' => '27.6780',
                'longitude' => '83.4350',
                'type_id' => 1,
                'country_id' => 154
            ],
            [
                'name' => 'Birgunj Dry Port', // Nepal es un país sin salida al mar, así que un "Puerto Seco" o "Puerto Interior" es más apropiado.
                'latitude' => '27.0093',
                'longitude' => '84.8569',
                'type_id' => 2,
                'country_id' => 154
            ],
            [
                'name' => 'Bhairahawa Logistics Hub',
                'latitude' => '27.5255',
                'longitude' => '83.4760',
                'type_id' => 3,
                'country_id' => 154
            ],

            // Malta 
            [
                'name' => 'Malta International Airport',
                'latitude' => '35.8575',
                'longitude' => '14.4776',
                'type_id' => 1,
                'country_id' => 136
            ],
            [
                'name' => 'Grand Harbour (Valletta)',
                'latitude' => '35.8950',
                'longitude' => '14.5100',
                'type_id' => 2,
                'country_id' => 136
            ],
            [
                'name' => 'Malta Freeport Centre',
                'latitude' => '35.8080',
                'longitude' => '14.5360',
                'type_id' => 3,
                'country_id' => 136
            ],

            // Italia 
            [
                'name' => 'Leonardo da Vinci–Fiumicino Airport (Rome)',
                'latitude' => '41.8003',
                'longitude' => '12.2389',
                'type_id' => 1,
                'country_id' => 108
            ],
            [
                'name' => 'Port of Genoa',
                'latitude' => '44.4093',
                'longitude' => '8.9103',
                'type_id' => 2,
                'country_id' => 108
            ],
            [
                'name' => 'Interporto Bologna',
                'latitude' => '44.5930',
                'longitude' => '11.3850',
                'type_id' => 3,
                'country_id' => 108
            ],

            // Alemania 
            [
                'name' => 'Frankfurt Airport',
                'latitude' => '50.0333',
                'longitude' => '8.5706',
                'type_id' => 1,
                'country_id' => 81
            ],
            [
                'name' => 'Port of Hamburg',
                'latitude' => '53.5333',
                'longitude' => '9.9500',
                'type_id' => 2,
                'country_id' => 81
            ],
            [
                'name' => 'Logistikpark Hamm',
                'latitude' => '51.6888',
                'longitude' => '7.7818',
                'type_id' => 3,
                'country_id' => 81
            ],

            // Inglaterra (Reino Unido) 
            [
                'name' => 'Heathrow Airport (London)',
                'latitude' => '51.4700',
                'longitude' => '-0.4543',
                'type_id' => 1,
                'country_id' => 229
            ],
            [
                'name' => 'Port of Felixstowe',
                'latitude' => '51.9619',
                'longitude' => '1.3283',
                'type_id' => 2,
                'country_id' => 229
            ],
            [
                'name' => 'Prologis Park Daventry',
                'latitude' => '52.2850',
                'longitude' => '-1.1890',
                'type_id' => 3,
                'country_id' => 229
            ],
        ]);
    }
}