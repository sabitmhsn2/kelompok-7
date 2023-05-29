<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DasboardContrroller extends Controller
{
   public function index(){
       $users = User::count('id');
       $berita = \App\Brita::count('id');
       $potensi = \App\Potensi::count('id');
       $galery = \App\Galery::count('id');
       $aspirasi = \App\Aspirasi::count('id');



       return view('admin/dashboard/index',compact('users','berita','potensi','galery', 'aspirasi'));
   }
}
