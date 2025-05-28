<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DistanceService
{
    /**
     * Obtiene la distancia en kilómetros entre dos ubicaciones usando la API de Google Maps.
     * @param string $origin Dirección o coordenadas de origen
     * @param string $destination Dirección o coordenadas de destino
     * @return float|null Distancia en kilómetros o null si falla
     */
    public function getDistanceKm($origin, $destination)
    {
        $apiKey = config('services.google_maps.key') ?? env('APP_GOOGLE_KEY');
        if (!$apiKey) {
            return null;
        }

        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json';
        $response = Http::get($url, [
            'origins' => $origin,
            'destinations' => $destination,
            'key' => $apiKey,
            'units' => 'metric',
            'language' => 'es'
        ]);

        if ($response->ok()) {
            $data = $response->json();
            if (
                isset($data['rows'][0]['elements'][0]['status']) &&
                $data['rows'][0]['elements'][0]['status'] === 'OK'
            ) {
                $meters = $data['rows'][0]['elements'][0]['distance']['value'] ?? 0;
                return $meters / 1000.0;
            }
        }
        return null;
    }
}
