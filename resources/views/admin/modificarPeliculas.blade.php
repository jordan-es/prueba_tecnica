
@extends('layouts.theme')


<div class="container-fluid" align="center">

  <h1>Insertar Pelicula</h1> <br>

  <form method="POST" action="{{route('cms.update', $peliculas->cod_pelicula)}}">
    @csrf
    	@method('PATCH')
    <div class="form-row col-8  ">
      <div class="col-6">
        Nombre Pelicula: <input type="text" class="form-control" placeholder="Nombre" name="nombrePelicula" id="nombrePelicula"
        value="{{$peliculas->nombre_pelicula}}">
      </div>

      <div class="col-6">
        Categoria: <select name='categoria' id="categoria" class="custom-select">
						    <option disabled="true">Seleccione la categoria</option>
						    @foreach($categorias as $catItem)
						    <option
                @if ($peliculas->cod_categoria == $catItem->cod_categoria )
										selected
									@endif
                value='{{$catItem->cod_categoria}}'
                  >{{$catItem->nombre_categoria}}</option>
						    @endforeach
						</select>
      </div> <br><br>

      <div class="col-6">
        Precio Venta: <input type="text" class="form-control" placeholder="Aventura" name="precioPelicula" id="precioPelicula"
        value="">
      </div>

      <div class="col-6">
        Precio Alquiler: <input type="text" class="form-control" placeholder="Aventura" name="rentaPelicula" id="rentaPelicula"
          value="">
      </div>

      <div class="col-12">
       Descripcion: <textarea type="text" class="form-control" placeholder="Descripcion" name="descPelicula1"
       value="{{$peliculas->descripcion}}" id="descPelicula1">{{$peliculas->descripcion}}</textarea>
      </div>
  </div>


<div class="col-12"> <br>
     <button type="submit" class="btn btn-primary">Modificar Pelicula</button>
</div>
</form> <br><br><br>



</div>
