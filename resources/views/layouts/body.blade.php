
<nav class="navbar navbar-light " style="margin-left:35%">
<form class="form-inline">
  <select name="tipo" class="form-control mr-sm-2">
          <option selected>Buscar por tipo</option>
          <option value="nombre_pelicula">Nombre</option>
          <option value="año">Año</option>
  </select>
  <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Buscar">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

@if($user = auth()->user()->name == 'jordan')
<a type="buttom" href="/cms" class="btn btn-primary my-2 my-sm-0" type="submit">Administrar Contenido</a>
@endif

@if($user = auth()->user()->name != 'jordan')
<a type="buttom" href="/verMovimientos" class="btn btn-primary my-2 my-sm-0" type="submit">Mis Movimientos</a>
@endif

@if($user = auth()->user()->name == 'jordan')
<a type="buttom" href="/verUsuarios" class="btn btn-primary my-2 my-sm-0" type="submit">Ver Movimientos Usuarios</a>
@endif
</nav>

<form method="POST" action="{{route('cliente.store')}}">
  @csrf
  	@method('PATCH')

<div class="container">
<div  class="col">
  <div class="row">

  @foreach($peliculas as $itemP)
@php
  if($itemP->disponilble == 'No'){

  $valor = "none";
   }else {
  $valor = "";
    }
  @endphp

    <div class="card" style="width: 18rem; margin-left:16px; margin-top: 16px; display:{{$valor}};" >
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h5 class="card-title font-weight-bold" name="nombrePeliculaA">{{$itemP->nombre_pelicula}}</h5>
        <p class="card-text" name="descripcionA">{{$itemP->nombre_descripcion}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" name="añoA">Año: {{$itemP->año}}</li>
        <li class="list-group-item" name="precioAlquilerA">Precio Alquiler: ${{$itemP->precio_alquiler}}</li>
        <li class="list-group-item" name="precioVentaA">Precio Venta: ${{$itemP->precio_venta}}</li>
      </ul>
      <div class="card-body">
          <a href="{{route('cliente.edit', $itemP->cod_pelicula)}}">
          <button type="button" class="btn btn-success">Rentar</button></a>
          <a href="{{route('cliente.show', $itemP->cod_pelicula)}}">
          <button type="button" class="btn btn-success">Comprar</button></a>
      </div>
    </div>

      @endforeach
        </div>
    </div>

<div style="margin-left:35%; margin-top:16px;">
   {{$peliculas->links() }}
</div>


</div>

  </form>
























<!-- <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Acción</h2>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <img src="{{URL::asset('/imagenes/accion/accion1.jpg')}}" class="img-fluid rounded">
    </div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Aventura</h2>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Terror</h2>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Suspenso</h2>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div>


<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Infantiles</h2>
    </div>
    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Romance</h2>
    </div>
    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
  </div>
</div> -->
