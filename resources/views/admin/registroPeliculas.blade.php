

@extends('layouts.theme')


<div class="container-fluid" align="center">

  <h1>Insertar Pelicula</h1> <br>

  <form method="POST" action="{{route('cms.store')}}">
    @csrf
    <div class="form-row col-8  ">
      <div class="col-6">
        Nombre Pelicula: <input type="text" class="form-control" placeholder="Nombre" name="nombrePelicula" id="nombrePelicula">
      </div>

      <div class="col-6">
        Categoria: <select name='categoria' id="categoria" class="custom-select">
						    <option disabled="true">Seleccione la categoria</option>
						    @foreach($categorias as $catItem)
						    <option value='{{$catItem->cod_categoria}}'>{{$catItem->nombre_categoria}}</option>
						    @endforeach
						</select>
      </div> <br><br>

      <div class="col-6">
        Precio Venta: <input type="text" class="form-control" placeholder="$" name="precioPelicula" id="precioPelicula">
      </div>

      <div class="col-6">
        Precio Alquiler: <input type="text" class="form-control" placeholder="$" name="rentaPelicula" id="rentaPelicula">
      </div>

      <div class="col-6">
        Año de emisión: <input type="text" class="form-control" placeholder="2020" name="añoPelicula" id="rentaPelicula">
      </div>

      <div class="col-12">
       Descripcion: <textarea type="text" class="form-control" placeholder="Descripcion" name="descPelicula1"
       value="" id="descPelicula1"></textarea>
      </div>
  </div>


<div class="col-12"> <br>
     <button type="submit" class="btn btn-primary">Registrar Pelicula</button>
</div>
</form> <br><br><br>



</div>
