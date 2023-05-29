<?php

namespace App\Http\Controllers;

use App\Aspirasi;
use Illuminate\Http\Request;
use App\Http\Requests\AspirasiRequest;
use Illuminate\Support\Facades\Session;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aspirasi::orderBy('id','DESC')->get();
        return view('admin.aspirasi.index', compact('data'));
    }

    public function details()
    {
        $title = 'Aspirasi';
        $data = Aspirasi::orderBy('id','DESC')->get();
        return view('frontend.aspirasi.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AspirasiRequest $request)
    {
        Aspirasi::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'subject' => request('subject'),
            'description' => request('description')
        ]);

        Session::flash('sukses','Terimakasih, Aspirasi Berhasil dikirim.');
        return redirect('/aspirasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        //return Aspirasi::find($id);

        // $data = array(
        //     'id' => "aspirasi",
        //     'aspirasi' => Aspirasi::find($id)
        // );
        $aspirasi = Aspirasi::find($id);
        
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
