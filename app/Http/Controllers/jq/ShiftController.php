<?php

namespace App\Http\Controllers\jq;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shift = Shift::orderBy('urutan', 'desc');
        return DataTables::of($shift)
            // ->addIndexColumn()
            ->addColumn('urutan', function ($row) {
                return '<input type="text" class="form-control" value="' . $row->urutan .  '" disabled>';
            })
            ->addColumn('jam', function ($row) {
                $pisahJam = explode('-', $row->jam);
                $jamAwal = '<input type="time" class="form-control jam-awal" value="' . $pisahJam[0] .  '" disabled>';
                $jamAkhir = '<input type="time" class="form-control jam-akhir" value="' . $pisahJam[1] .  '" disabled>';
                return '<div class="d-flex justify-content-between">' . $jamAwal . '-' . $jamAkhir . '</div>';
            })
            ->addColumn('tombol', function ($row) {
                $editButton = '<button class="btn btn-primary edit-shift" data-id="' . $row->id . '" disabled>Ubah</button>';
                $deleteButton = '<button class="btn btn-danger del-shift" data-id="' . $row->id . '" disabled>Hapus</button>';
                // return '<div class="d-flex justify-content-between"><div>' . $editButton . '</div><div>' . $deleteButton . '</div></div>';
                return '<div class="d-flex justify-content-between">' . $editButton .  $deleteButton . '</div>';
            })
            ->rawColumns(['urutan', 'jam', 'tombol'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'urutan'=>'required',
            'jam'=>'required'
        ]);
        $shift = new Shift();
        $shift->urutan = $request->input('urutan');
        $shift->jam = $request->input('jam');
        $shift->save();
        return response()->json(['message'=>'Shift ditambah']);
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
        $shift = Shift::findOrFail($id);
        $shift->urutan = $request->input('urutan');
        $shift->jam = $request->input('jam');
        $shift->save();
        return response()->json(['message'=>'Shift diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return response()->json(['message'=>'Shift dihapus']);
    }
}
