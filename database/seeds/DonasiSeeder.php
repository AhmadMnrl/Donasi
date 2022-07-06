<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

         $jenisDonasi = ['barang', 'uang'];
         $pengiriman = ['diambil', 'diantar'];

    	for($i = 1; $i <= 5; $i++){

    	      // insert data ke table donasi menggunakan Faker
    		DB::table('donasis')->insert([
    			'id_donatur' => rand(2,4),
    			'jenis_donasi' => $jenisDonasi[rand(0,1)],
    			'jumlah' => 100000,
    			'pengiriman' => $pengiriman[rand(0,1)],
                'provinsi' => "Jawa Barat",
                'kota' => $faker->city,
                'kecamatan' => "rand",
                'kelurahan' => "rand",
                'longitude' => $faker->longitude(-90, 90),
                'latitude' => $faker->latitude(-90, 90),
                'status' => "Belum Selesai"
    		]);

    	}
    }
}
