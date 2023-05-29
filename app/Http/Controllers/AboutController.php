<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index(Request $request)
    {   
        //$about = About::find();
        $about = About::orderBy('id','DESC')->get();
        return view('admin.about.about-us', compact('about'));
    }

    public function store(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $about->update(

            ['id' => $request->id],
            [
            
            'about' => $request->about,
            'visimisi' => $request->visimisi
            ]);        

        Session::flash('sukses','Data Berhasi Di Tambahkan');
        return redirect('/about-us')->with('status','data berhasil di Simpan');
    }

    public function edit($id)
        {
            $data = About::find($id);

            //return response()->json($data);
            return view('admin.about.about-us', compact('data'));
        }
    
    public function update()
    {
        
    }

    public function visimisi()
    {
        $visi = About::orderBy('id','DESC')->get();
        return view('admin.about.about-us', compact('visi'));
    }
}
