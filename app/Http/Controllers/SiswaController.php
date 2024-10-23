<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelapor' => 'required|min:3',
            'terlapor' =>  'required|min:3',
            'kelas' =>  'required|min:3',
            'laporan' =>  'required|min:3',
            'bukti' =>  'required',
        ]
        );

        $image = $request->file('bukti');
        $image->storeAs('bukti', $image->hashName(), 'public');

         Siswa::create([
            'pelapor' => $request->pelapor,
            'terlapor' => $request->pelapor,
            'kelas' => $request->kelas,
            'laporan' => $request->laporan,
            'bukti' => $image->hashName(),
            'status' => 'sedang dalam tinjauan'
        ]);

        return redirect()->route('siswa.index');
    }

    public function selesai(Request $request, string $id){
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
