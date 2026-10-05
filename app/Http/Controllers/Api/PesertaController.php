<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PesertaRequest;
use App\Models\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $data = Peserta::with('skema')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('no_peserta', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
            return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaRequest $request)
    {
        $peserta = Peserta::create($request->validated());

        return response()->json([
            'message' => 'Peserta berhasil ditambahkan',
            'data' => $peserta->load('skema'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        return response()->json($peserta->load('skema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesertaRequest $request, Peserta $peserta)
    {
        $peserta->update($request->validated());

        return response()->json([
            'message' => 'Data peserta berhasil diubah',
            'data' => $peserta->load('skema')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return response()->json([
            'message' => 'Data peserta berhasil dihapus',
        ]);
    }
}
