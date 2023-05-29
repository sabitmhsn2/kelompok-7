<?php

namespace App\Http\Controllers;

use App\Webs;
use Illuminate\Http\Request;
use Session;
use File;
class WebController extends Controller
{
        public function index(Request $request)

        {

            $dat = Webs::orderBy('id','DESC')->get();
            $webs = Webs::all();

            return view('admin/web/index',compact('dat','webs'));

        }

        public function store(Request $request)
            {
             
                if($request->hasFile('foto','favicon')){
                    $foto = $request->file('foto');
                    //$favicon = $request->file('favicon');
                    $nama  = time()."_".$foto->getClientOriginalName();
                    //$fav  = time()."_".$favicon->getClientOriginalName();
                    $lokasi = public_path('/foto');
                    $foto->move($lokasi,$nama);
                    //$favicon->move($lokasi,$fav);
                    Webs::updateOrCreate(

                        ['id' => $request->data_id],
                        [
                        'fb' => $request->fb,
                        'ig' => $request->ig,
                        'twitter' => $request->twitter,
                        'cp' => $request->cp,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'tlp' => $request->tlp,
                        'nama' => $request->nama,
                        'deskripsi' => $request->deskripsi,
                        'favicon' => $request->favicon,
                        'logo' => $nama
                        ]);        
    
                }else{
                    Webs::updateOrCreate(

                        ['id' => $request->data_id],
                        [
                        'fb' => $request->fb,
                        'ig' => $request->ig,
                        'twitter' => $request->twitter,
                        'cp' => $request->cp,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'tlp' => $request->tlp,
                        'nama' => $request->nama,
                        'deskripsi' => $request->deskripsi
                        ]);        
                }



        

                Session::flash('sukses','Data Berhasi Di Tambahkan');
                return redirect('/webseting')->with('status','data berhasil di Simpan');

           
            }

        // edit

        public function edit($id)
        {
            $user = Webs::find($id);

            return response()->json($user);
        }


        // delete

        public function destroy($id)
        {
        // hapus file
		$gambar = Webs::where('id',$id)->first();
		File::delete('foto/'.$gambar->foto);
 

        Webs::find($id)->delete();

        return response()->json([
                'status' => 'sukses',
                'pesan'=>'Data berhasil di Hapus'
            ]);
        }

}
