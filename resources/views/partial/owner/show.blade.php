@extends('layouts.layout')

@section('title','Propietario: '.$owner->id)

@section('content')

<h2>Propietario #{{$owner->id}}</h2>

<p>Nombre del Propietario:{{$owner->name}}</p>

<img src="{{$owner->avatarOwner}}" alt="">

<a href="{{route('owners.index')}}"> Regreso </a>

@endsection