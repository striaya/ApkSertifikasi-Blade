<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SkemaRequest;
use App\Models\Skema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Skema::withCount('pesertas')->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkemaRequest $request)
    {
        $skema = Skema::create($request->validated());
        return response()->json([
            'message' => 'Skema berhasil ditambahkan', 'data' => $skema
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skema $skema)
    {
        return response()->json($skema->loadCount('pesertas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkemaRequest $request, Skema $skema)
    {
        $skema->update($request->validated());
        return response()->json([
            'message' => 'Skema berhasil diubah', 'data' => $skema
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skema $skema)
    {
        if ($skema->pesertas()->exists()) {
            return response()->json([
                'message' => 'Skema tidak dapat dihapus karena masih digunakan oleh peserta',
            ], 409);
        }
        $skema->delete();
        return response()->json(['message' => 'Skema berhasil dihapus']);
    }
}
