<?php

namespace App\Http\Controllers;
use File;
use App\Brita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $berita = Brita::latest()->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    public function detail($slug)
        {
            $brita = Brita::where('slug', $slug)->firstOrFail();
            return view ('frontend.news.details',  compact('brita'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'foto'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'judul'     => 'required',
            'keterangan'   => 'required'
        ]);
    
        //upload image
        if($request->hasFile('foto')){
        $foto = $request->file('foto');
        $nama  = time()."_".$foto->getClientOriginalName();
        $lokasi = public_path('/foto');
        $foto->move($lokasi,$nama);

        $berita = Brita::create([
            'judul'      => $request->judul,
            'slug'       => $request->slug,
            'keterangan' => $request->keterangan,
            'penulis'    => $request->penulis,
            'views'      => $request->views,
            'foto'       => $nama
        ]);
        }
        
        if($berita){
            //redirect dengan pesan sukses
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita= Brita::find($id);
   
            //return response()->json($user);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul'     => 'required',
            'keterangan'   => 'required'
        ]);
        //get data Blog by ID
        
        if($request->file('foto') == "") 
        {
            $berita = Brita::findOrFail($id);
            $berita->update([
                'judul'      => $request->judul,
                'slug'       => $request->slug,
                'keterangan' => $request->keterangan,
                'penulis'    => $request->penulis
            ]);

        } else 
        {
            $berita = Brita::findOrFail($id);
            //delete old image
            Storage::disk('local')->delete('public/foto/'.$berita->foto);

            //upload new image
            $image = $request->file('foto');
            $nama  = time()."_".$image->getClientOriginalName();
            $lokasi = public_path('/foto');
            $image->move($lokasi,$nama);

            // Storage::disk('local')->delete('public/foto/'.$berita->foto);
            
            // $foto = $request->file('foto');
            // $foto->storeAs('public/foto', $foto->hashName());
            
        
            $berita->update([
                'foto'       => $nama,
                'judul'      => $request->judul,
                'slug'       => $request->slug,
                'keterangan' => $request->keterangan,
                'penulis'    => $request->penulis
            ]);

        }
        if($berita){
            //redirect dengan pesan sukses
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Brita::find($id);
        $berita->delete();
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
