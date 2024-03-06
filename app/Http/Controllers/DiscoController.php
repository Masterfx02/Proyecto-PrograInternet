<?php

namespace App\Http\Controllers;

use App\Models\disco;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $disco = disco::paginate(4);
        return view('index', compact('disco'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request-> validate([
            'titulo' => 'required',
            'artista' => 'required',
            'genero' => 'nullable|string',
            'precio' => 'numeric|min:0',
            'stock' => 'numeric|min:0',
        ]);
        disco::create($request->all());
        return redirect()->route('disco.index')->with('sucess', 'El disco ha sido registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(disco $disco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(disco $disco): View
    {
        return view('edit', ['disco' => $disco]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, disco $disco): RedirectResponse
    {
        $disco->update($request->all());
        return redirect()->route('disco.index')->with('sucess', 'El álbum se ha actualizado exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(disco $disco)
    {
        $disco->delete();
        return redirect()->route('disco.index')->with('sucess', 'El álbum ha sido eliminado');
    }
}
