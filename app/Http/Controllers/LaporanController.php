<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporans = Laporan::all();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal' => 'required',
            'laporan' => 'required',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan created successfully.');
    }

    public function show($id)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal' => 'required',
            'laporan' => 'required',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan updated successfully');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan deleted successfully');
    }

    public function approve(Request $request, $id)
{
    // Temukan laporan berdasarkan ID
    $laporan = Laporan::findOrFail($id);

    // Ubah status laporan menjadi "Disetujui"
    $laporan->status = 'Disetujui';
    $laporan->save();

    // Kembalikan respons JSON
    return response()->json(['status' => 'Disetujui']);
}

public function reject(Request $request, $id)
{
    // Temukan laporan berdasarkan ID
    $laporan = Laporan::findOrFail($id);

    // Ubah status laporan menjadi "Ditolak"
    $laporan->status = 'Ditolak';
    $laporan->save();

    // Kembalikan respons JSON
    return response()->json(['status' => 'Ditolak']);
}
}
