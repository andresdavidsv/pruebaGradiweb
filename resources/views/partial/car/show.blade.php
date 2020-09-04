@extends('layouts.layout')

@section('title','Vehiculo: '.$car->id)

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h2>Vehiculo #{{$car->id}}</h2>

      <div class="text-center">
        <img src="{{ asset('storage/'.$car->avatarCar) }}" class="rounded" alt="...">
      </div>

      <div class="card">
        <div class="card-header">
          <h2>{{$car->plate}}</h2>
        </div>
        <div class="card-group">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Marca:</h2>
              <h2 class="card-text">{{$car->car_brand}} </h2>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Tipo:</h2>
              <h3 class="card-text">{{$car->car_config}}</h3>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Propietario:</h2>
              <h3 class="card-text">{{$car->owner->name}} {{$car->owner->last_name}}</h3>              
            </div>
          </div>
        </div>
      </div>
      <div class="row py-2">
      <div class="col-12 col-md-6">
        <a href="{{route('cars.index')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Regreso </button></a>
      </div>
      <div class="col-12 col-md-6">
        <a href="{{route('owners.show', $car->owner->id)}}"><button type="button" class="btn btn btn-secondary btn-lg btn-block btn-lg btn-block"> Ver Propietario </button></a>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection