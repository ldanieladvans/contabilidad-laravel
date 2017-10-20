<?php

use Illuminate\Database\Seeder;
use App\CatSatModel;
use App\CatSatBancosModel;
use App\CatSatMetodosPagosModel;
use App\CatSatMonedasModel;
use App\FormaPago;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CatSatBancosModelSeeder::class);
        $this->call(CatSatModelSeeder::class);
        $this->call(CatSatMonedasModelSeeder::class);
        $this->call(TipoSubCuentaSeeder::class);       
        $this->call(FormaPagoSeeder::class);
        $this->call(CuentaSeeder::class);
        $this->call(CpMexSeeder::class);
        $this->call(seed_user::class);
    }
}
