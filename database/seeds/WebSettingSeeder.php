<?php

use App\Webs;
use Illuminate\Database\Seeder;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webs::insert([
            'nama' => 'Desa',
            'deskripsi' => 'Desa termakmur dan termaju',
            'logo' => 'example.png',
            'favicon' => 'example.png',
            'email' => 'desa@gmail.com',
            'alamat' => 'Jl. Pikitdro No 15',
            'sejarah' => 'Sejarah majunya desa kami',
            'tlp' => '081257800412',
            'fb' => 'desafb',
            'ig' => 'desaig',
            'twitter' => 'desaTwitter',
            'cp' => 'codeNIAGA'
        ]);
    }
}
