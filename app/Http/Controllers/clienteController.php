<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;
use App\pelicula;
use App\alquiler;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class clienteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    $buscar = $request->get('buscarpor');
    $tipo = $request->get('tipo');
    $url = $request->all();
    $peliculas = pelicula::buscarpor($tipo, $buscar)->paginate(6)->appends($url);

    $peli = pelicula::all();
      return view('index', compact('peliculas','peli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      dd($request);
          //$alquiler = new alquiler();
          //$idAlquiler =  substr($request->nombrePelicula, 0, 2);
          //$alquiler->cod_alquiler =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolID = Auth::user()->id;
        $rolName = Auth::user()->name;
        $random = Str::random(2);

        $idPelicula = pelicula::findOrFail($id);

        $alquiler = new alquiler();
        $idAlquiler =  strtoupper($rolID.$rolName.$random);

        $alquiler->cod_alquiler = $idAlquiler;
        $alquiler->cod_pelicula_fk = $idPelicula->cod_pelicula;
        $alquiler->cod_users_fk = $rolID;
        $alquiler->precio_alquiler = $idPelicula->precio_alquiler;
        $alquiler->fecha_entrega = "2021-02-21";
        $alquiler->save();

        return redirect()->action("clienteController@index");

        //dd($alquiler);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
