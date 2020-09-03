@extends('layouts.layout')

@section('title','Vehiculo: '.$car->id)

@section('content')

<h2>Vehiculo #{{$car->id}}</h2>

<p>Placa del Vehiculo:{{$car->plate}}</p>

<a href="{{route('cars.index')}}"> Regreso </a>

@endsection