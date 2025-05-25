<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Plans extends Seeder
{
    public function run(): void
    {
        DB::table('plans')->insert([
            [
                'name' => 'Free Plan',
                'description' => 'Plan básico para usuarios individuales',
                'price' => 0.00,
                'features' => json_encode([
                    'Envíos limitados por mes',
                    'Soporte por email',
                    'Seguimiento básico de envíos',
                    'Acceso a la plataforma web'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pymes Plan',
                'description' => 'Plan ideal para pequeñas y medianas empresas',
                'price' => 49.99,
                'features' => json_encode([
                    'Envíos ilimitados',
                    'Soporte prioritario 24/7',
                    'Seguimiento avanzado de envíos',
                    'API de integración',
                    'Reportes personalizados',
                    'Múltiples usuarios'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ultimate Plan',
                'description' => 'Plan completo para grandes empresas',
                'price' => 149.99,
                'features' => json_encode([
                    'Envíos ilimitados',
                    'Soporte dedicado 24/7',
                    'Seguimiento avanzado de envíos',
                    'API de integración',
                    'Reportes personalizados',
                    'Múltiples usuarios',
                    'Gestión de flota propia',
                    'Optimización de rutas',
                    'Integración con ERP',
                    'Soporte técnico dedicado'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 