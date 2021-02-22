@php
$user = auth()->user();
 if($user->name != 'jordan'){
   return redirect()->action('clienteController@index');
 }

@endphp




@extends('layouts.theme')


@section('navbar')
 @include('layouts.nav')
@endsection


@section('body')
{{$user->name}}
 @include('admin.bodyAdmin')
@endsection
