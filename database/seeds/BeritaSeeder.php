<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 10; $i++){

    	      // insert data ke table donasi menggunakan Faker
    		DB::table('berita')->insert([
    			'title' => "Aryo adalah anak yang aneh",
    			'content' => "Yaps benar kamu tidak salah dengar",
    		]);

    	}
    }
}
