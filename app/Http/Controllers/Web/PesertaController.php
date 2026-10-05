<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesertas = Peserta::with('skema')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('no_peserta', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.create', [
            'peserta' => new Peserta,
            'skemas' => Skema::orderBy('nama_skema')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'no_peserta' => 'required|string|max:255|unique:pesertas,no_peserta',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'no_telepon' => 'required|string|max:20',
                'tanggal_lahir' => 'required|date',
                'skema_id' => 'required|exists:skemas,id',
                'alamat' => 'required|string',
            ]);

            Peserta::create($validated);

            return redirect()
                ->route('peserta.index')
                ->with('success', 'Peserta berhasil ditambahkan');

        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        return view('peserta.show', ['peserta' => $peserta->load('skema')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', [
            'peserta' => $peserta,
            'skemas' => Skema::orderBy('nama_skema')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $peserta)
    {
        $data = $request->validate([
            'no_peserta' => 'required|string|max:255|unique:pesertas,no_peserta,'.$peserta->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'skema_id' => 'required|exists:skemas,id',
            'alamat' => 'required|string',
        ]);

        $peserta->update($data);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus');
    }
}
