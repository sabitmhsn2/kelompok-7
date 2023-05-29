<?php

use App\Aspirasi;
use Illuminate\Database\Seeder;

class AspirasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspirasi::insert([
        	[
            'name' => 'Saya Jamal',
            'email' => 'hello@gmail.com',
            'phone' => '081278750412',
            'subject' => 'Pengaduan',
            'description'  => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem sequi dicta quia unde sed veniam pariatur voluptatem eligendi quisquam! Iusto odio non dolores tempora? Adipisci, non error quo necessitatibus deleniti cumque dolorum sequi delectus blanditiis iusto eum nemo ipsum eligendi ea numquam harum, debitis vel mollitia perferendis porro. Voluptatibus, beatae!',
            'created_at' => now()
        	]
        ]);
    }
}