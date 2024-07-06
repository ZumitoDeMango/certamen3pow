<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\tiporol;
use App\Models\marca;
use App\Models\tipoauto;
use App\Models\auto;
use App\Models\arriendoautos;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // tipo de usuarios
        tiporol::create(['tipo' => 'ejecutivo']);
        tiporol::create(['tipo' => 'admin']);
        tiporol::create(['tipo' => 'cliente']);

        // usuarios
        User::create([
            'name' => 'ejecutivo1',
            'email' => 'Ejecutivo123@email.com',
            'tipo_rol' => 1,
            'password' => Hash::make('ejecutivo123'),
        ]);
        User::create([
            'name' => 'admin1',
            'email' => 'Admin123@email.com',
            'tipo_rol' => 2,
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'jose',
            'email' => 'JoseJose@email.com',
            'tipo_rol' => 3,
            'password' => Hash::make('jose123'),
        ]);

        // marca
        // 1 Toyota
        // 2 Mahindra
        // 3 Chevrolet
        marca::create([
            'nombre'=>'Toyota',
            'deleted_at'=>NULL,
        ]);
        marca::create([
            'nombre'=>'Mahindra',
            'deleted_at'=>NULL,
        ]);
        marca::create([
            'nombre'=>'Chevrolet',
            'deleted_at'=>NULL,
        ]);

        // tipoauto
        // 1 Motos
        // 2 SUV
        // 3 Sedan
        tipoauto::create([
            'tipo_auto'=>'Motos',
            'valor_dia'=>10000
        ]);
        tipoauto::create([
            'tipo_auto'=>'SUV',
            'valor_dia'=>50000
        ]);
        tipoauto::create([
            'tipo_auto'=>'Sedan',
            'valor_dia'=>25000
        ]);

        // auto
        // Sedan Toyota
        // Moto Toyota
        // SUV Chevrolet
        // SUV Mahindra
        // 0 = Disponible
        // 1 = No Disponible
        auto::create([
            'tipo_auto'=>3,
            'marca'=>1,
            'color'=>'Gris',
            'placa'=>'ABCD11',
            'anio'=>'2011',
            'foto'=>NULL,
        ]);
        auto::create([
            'tipo_auto'=>1,
            'marca'=>1,
            'color'=>'Amarillo',
            'placa'=>'CDXC03',
            'anio'=>'2016',
            'foto'=>NULL,
        ]);
        auto::create([
            'tipo_auto'=>2,
            'marca'=>3,
            'color'=>'Blanco',
            'placa'=>'UHJK99',
            'anio'=>'2023',
            'foto'=>NULL,
        ]);
        auto::create([
            'tipo_auto'=>2,
            'marca'=>2,
            'color'=>'Negro',
            'placa'=>'DGJK19',
            'anio'=>'2020',
            'foto'=>NULL,
        ]);

        // arriendoauto

    }
}
