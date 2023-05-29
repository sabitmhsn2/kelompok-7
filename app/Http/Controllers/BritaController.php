<?php

namespace App\Http\Controllers;

use File;
use Session;
use App\Brita;
use DataTables;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BritaController extends Controller
{
        public function index(Request $request)

        {
            $berita = Brita::orderBy('id','DESC')->get();
    
            if ($request->ajax()) {
                $data = Brita::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
    
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn edit  editData"><i class="icon-pencil"></i></a>';
    
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn deleteData"><i class="icon-trash"></i></a>';
                            $btn = $btn.' <a href="dkomentar/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn komentar"><i class="icon-menu"></i></a>';
        
                                return $btn;
                        })
                          ->addColumn('foto', function($row){
    
                            $foto = '<img src="foto/'.$row->foto.'" alt="" width="50" height="50"> ';
        
                                return $foto;
                        })
                        ->rawColumns(['action','foto'])
                        ->make(true);
            }
        

            return view('admin/berita/index',  compact('berita'));

        }

        public function store(Request $request)
            {
             
                if($request->hasFile('foto')){
                    $foto = $request->file('foto');
                    $nama  = time()."_".$foto->getClientOriginalName();
                    $lokasi = public_path('/foto');
                    $foto->move($lokasi,$nama);
                    Brita::updateOrCreate(

                        ['id' => $request->data_id],
                        [
                            
                        'judul' => $request->judul,
                        'slug'  => Str::slug($request->judul),
                        'keterangan' => $request->keterangan,
                        'penulis' => $request->penulis,
                        'foto' => $nama
                        ]);        

                }else{
                    $nama = 'nomedia.png'; Brita::updateOrCreate(

                        ['id' => $request->data_id],
                        [                           
                        'judul' => $request->judul,
                        'slug'  => Str::slug($request->judul),
                        'keterangan' => $request->keterangan,
                        'penulis' => $request->penulis
                        ]);        

                }
        

                Session::flash('sukses','Data Berhasi Di Tambahkan');
                return view('admin/berita/index')->with('status','data berhasil di Simpan');

           
            }

        // edit

        public function edit($id)
        {
            $data = Brita::find($id);
   
            //return response()->json($user);
            return view('admin.berita.edit', compact('data'));
        }

        public function update(Request $request, Brita $berita)
        {   //dd($request->all());
            
    
            $this->validate($request, [
                'judul'     => 'required',
                'keterangan'   => 'required'
            ]);
        
            //get data Blog by ID
            $berita = Brita::findOrFail($berita->id);
        
            if($request->file('foto') == "") {
        
                $berita->update([
                    'judul'     => $request->judul,
                    'keterangan'   => $request->keterangan
                ]);
        
            } else {
        
                //hapus old image
                Storage::disk('local')->delete('foto/'.$berita->foto);
        
                //upload new image
                $foto = $request->file('foto');
                $foto->storeAs('foto', $foto->hashName());
        
                $berita->update([
                    'foto'     => $foto->hashName(),
                    'judul'     => $request->judul,
                    'keterangan'   => $request->keterangan
                ]);
        
            }
        
    
            if($berita){
                //redirect dengan pesan sukses
                return view('admin.berita.index')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('admin.berita.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        
        }


        // delete

        public function destroy($id)
        {
        // hapus file
		$gambar = Brita::where('id',$id)->first();
		File::delete('foto/'.$gambar->foto);
 

        Brita::find($id)->delete();
        $comen = DB::table('komentar_brita')
        ->where('brita_id   ',$id)
        ->delete();
    
        return response()->json([
                'status' => 'sukses',
                'pesan'=>'Data berhasil di Hapus'
            ]);
        }

        // public function detail($id){

        //       $brita = Brita::find($id);
        //       $jumlah = $brita->views + 1;
        //       Brita::where('id',$id)->update(
        //       [
        //           'views' => $jumlah
        //       ]
        //       );
        //     return view('ui/berita/detail',compact('brita'));

        // }
        
        public function detail($slug)
        {
            $brita = Brita::where('slug', $slug)->firstOrFail();
            return view ('frontend.news.details',  compact('brita'));
        }

        public function komentar(Request $request){

            DB::table('komentar_brita')->insert([
                'komentar' => $request->comment,
                'email'     => $request->email,
                'name'      => $request->name,
                'brita_id' => $request->id,
                'waktu' => date('g:ia \o\n l jS F Y')
            ]);
            $brita = Brita::find($request->id);

            return view('ui/berita/detail',compact('brita'));
        }
        public function cari(Request $request)
        {
          
            $cari = $request->cari;
        
         
            $pegawai = DB::table('table_brita')
            ->where('judul','like',"%".$cari."%")
            ->paginate();
        
            return view('ui/berita/index',['brita' => $pegawai]);
        
        }

        public function comen($id)
        {
          
        
         
            $comen = DB::table('komentar_brita')
            ->where('brita_id',$id)
            ->get();
        
            return view('admin/berita/comen',compact('comen'));
        
        
        }

        public function hcomen($id)
        {
          
        
         
            $comen = DB::table('komentar_brita')
            ->where('id',$id)
            ->delete();
        
            return view('admin/berita/index');
        
        
        }
}
