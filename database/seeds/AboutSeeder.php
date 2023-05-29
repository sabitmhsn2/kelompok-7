<?php

use App\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::insert([
        	[
            'visimisi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, facilis modi nihil harum similique assumenda veniam explicabo facere blanditiis debitis nostrum dolorum, numquam deserunt, enim illum dolore dolor nam quo porro ea doloribus reprehenderit sed! Quia voluptas nihil architecto, eveniet ullam tenetur vero obcaecati ex, quasi, sed ipsam. Mollitia, quisquam!',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, facilis modi nihil harum similique assumenda veniam explicabo facere blanditiis debitis nostrum dolorum, numquam deserunt, enim illum dolore dolor nam quo porro ea doloribus reprehenderit sed! Quia voluptas nihil architecto, eveniet ullam tenetur vero obcaecati ex, quasi, sed ipsam. Mollitia, quisquam!',
            'created_at' => now()
        	]
        ]);
    }
}