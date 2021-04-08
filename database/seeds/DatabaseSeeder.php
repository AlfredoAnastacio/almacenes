<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,15) as $index) {
            DB::table('cat_productos')->insert([
	            'sku' => $faker->numberBetween('100000000', '200000000'),
	            'descripcion' => $faker->word,
	            'marca' => $faker->randomElement(['BIMBO', 'PEPSI', 'LALA', 'GAMESA']),
	            'color' => $faker->randomElement(['rojo', 'morado', 'verde', 'azul', 'blanco']),
	            'precio' => $faker->randomElement(['100', '200', '300', '400'])
	        ]);
	    }
        foreach (range(1,4) as $index) {
	        DB::table('cat_almacenes')->insert([
	            'nombre_almacen' => $faker->cityPrefix,
	            'localizacion' => $faker->state,
	            'responsable' => $faker->name,
	            'tipo' => $faker->randomElement(['VIRTUAL', 'FISICO']),
	        ]);
	    }
        foreach (range(1,20) as $index) {
	        DB::table('existencias')->insert([
	            'id_producto' => $faker->numberBetween('1', '15'),
	            'id_almacen' => $faker->numberBetween('1', '4'),
	            'existencias' => $faker->numberBetween('10', '100'),
	        ]);
	    }
    }
}
