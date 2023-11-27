<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $categorias = Categoria::where('user_id', $user->id)->get();

        return view('categorias.categoria')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.newcategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'newcategoria' => 'required',
        ]);

        $user = Auth::user();

        $nuevaCategoria = new Categoria();
        $nuevaCategoria->nombre_categoria = $request->input('newcategoria');
        $nuevaCategoria->user_id = $user->id;

        if($nuevaCategoria->save()){
            return redirect()->route('categorias.categoria')->with('mensaje', 'Categoria guardada con exito');
        }
        else{
            return redirect()->route('categorias.categoria')->with('mensaje', 'Error, la categoria no se guardo');
        }
        
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
