<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;
use App\pelicula;

class cmsController extends Controller
{
  public function __construct()
      {
          $this->middleware('auth');
      }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categorias = categoria::all();
         $peliculas = pelicula::all();
        return view('admin.cms', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $peli = new pelicula();

      $idPelicula =  substr($request->nombrePelicula, 0, 2);
      $id = $request->categoria.'-'.strtoupper($idPelicula);

    $peli->cod_pelicula =$id;
      $peli->cantidad = 0;
        $peli->cod_categoria_fk = $request->categoria;
          $peli->nombre_pelicula = $request->nombrePelicula;
              $peli->descripcion = $request->descPelicula1;
                $peli->save();

                return redirect('/cms')->with('datos','Registro de Pelicula Exitoso');

        //dd($peli->cod_categoria_fk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias = categoria::all();
      $peliculas = pelicula::findOrFail($id);

      return view('admin.modificarPeliculas', compact('peliculas','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $buscarPelicula = pelicula :: findOrFail($id);

        //dd($buscarPelicula);

      //$idPelicula =  substr($request->nombrePelicula, 0, 2);
      //$id = $request->categoria.'-'.strtoupper($idPelicula);
      //$peli->cod_pelicula =$id;
        $buscarPelicula->cantidad =0 ;
          $buscarPelicula->cod_categoria_fk = $request->categoria;
            $buscarPelicula->nombre_pelicula = $request->nombrePelicula;
                $buscarPelicula->descripcion = $request->descPelicula1;
                  $buscarPelicula->update();

         return redirect('cms')->with('datos', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
