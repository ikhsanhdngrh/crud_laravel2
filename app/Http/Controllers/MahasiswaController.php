<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use PDF;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{   
    public function viewPDF()
    {
        $mahasiswa = Mahasiswa::latest()->get();

        $data = [
            'title' => 'Data Mahasiswa',
            'date' => date('m/d/Y'),
            'mahasiswa' => $mahasiswa,
        ];

        $pdf = PDF::loadView('mahasiswa.export-pdf', $data)
            ->setPaper('a4', 'portrait');
        return $pdf->stream('data-mahasiswa.pdf');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
            
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->telepon = $request->telepon;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index');
    }

    public function show($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $npm)
    {
        $this->validate($request, [
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
            
        ]);

        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->telepon = $request->telepon;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}