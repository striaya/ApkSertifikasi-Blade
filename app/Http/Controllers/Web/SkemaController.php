<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skema;

class SkemaController extends Controller
{
    public function index(Request $request)
    {
        $skemas = Skema::query()
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode_skema', 'like', "%{$search}%")
                        ->orWhere('nama_skema', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create', [
            'skema' => new Skema(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_skema' => 'required|string|max:255|unique:skemas,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Skema::create($data);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil ditambahkan');
    }

    public function show(Skema $skema)
    {
        return view('skema.show', compact('skema'));
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $data = $request->validate([
            'kode_skema' => 'required|string|max:255|unique:skemas,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $skema->update($data);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil diubah');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema berhasil dihapus');
    }
}