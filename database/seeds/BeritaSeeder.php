<?php

use App\Brita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brita::insert([
        	[
                'judul' => 'ini adalah blog',
                'slug' => 'ini-adalah-blog',
                'foto' => 'example.png',
                'views' => 1,
                'keterangan' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti mollitia praesentium facere minima cum quo maxime. Nobis, ut facere. Maiores culpa vitae iste eveniet provident inventore mollitia. Voluptatibus alias, deserunt a quos pariatur voluptatum nisi modi ex esse reiciendis totam sed hic doloribus quas laboriosam odio culpa laudantium, suscipit quis.',
                'penulis'  => 'Rama Can',
                'created_at' => now()
            ],
            [
                'judul' => 'bukan blog ini',
                'slug' => 'bukan-blog-ini',
                'foto' => 'example.png',
                'views' => 1,
                'keterangan' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti mollitia praesentium facere minima cum quo maxime. Nobis, ut facere. Maiores culpa vitae iste eveniet provident inventore mollitia. Voluptatibus alias, deserunt a quos pariatur voluptatum nisi modi ex esse reiciendis totam sed hic doloribus quas laboriosam odio culpa laudantium, suscipit quis.',
                'penulis'  => 'Rama Can',
                'created_at' => now()
            ],
            [
                'judul' => 'gini loh caranya',
                'slug' => 'gini-loh-caranya',
                'foto' => 'example.png',
                'views' => 1,
                'keterangan' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti mollitia praesentium facere minima cum quo maxime. Nobis, ut facere. Maiores culpa vitae iste eveniet provident inventore mollitia. Voluptatibus alias, deserunt a quos pariatur voluptatum nisi modi ex esse reiciendis totam sed hic doloribus quas laboriosam odio culpa laudantium, suscipit quis.',
                'penulis'  => 'Rama Can',
                'created_at' => now()  
            ]
        ]);
    }
}
