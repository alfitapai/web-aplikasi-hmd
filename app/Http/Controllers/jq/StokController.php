<?php

namespace App\Http\Controllers\jq;

use App\Http\Controllers\Controller;
use App\Models\Stokbarang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function storeOrUpdate(Request $request)
    {
        $stok = Stokbarang::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_barang' => $request->nama_barang,
                'qty' => $request->qty,
                'satuan' => $request->satuan,
                'tipe_barang' => $request->tipe_barang
            ],
        );
        return response()->json([
            'success' => true,
            'message' => $request->id ? 'Data Diubah' : 'Data Ditambah',
            'stok' => $stok
        ]);
        // return dd($stok);
    }


    public function index()
    {
        if (request()->ajax()) {
            $barang = Stokbarang::all();
            return response()->json(['barang' => $barang]);
        }
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
        //
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
        $stok = Stokbarang::where('id', $id)->delete();
        return response()->json(['title' => 'Data dihapus']);
    }
}
