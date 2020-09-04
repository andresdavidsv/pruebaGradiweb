@extends('layouts.layout')

@section('title','Propietario: '.$owner->id)

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h2>Propietario #{{$owner->id}}</h2>

      <div class="text-center">
        <img src="{{ asset('storage/'.$owner->avatarOwner) }}" class="rounded" alt="...">
      </div>

      <div class="card">
        <div class="card-header">
          <h2>{{$owner->name}} {{$owner->last_name}}</h2>
        </div>
        <div class="card-group">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">CC: {{$owner->doc_id}} </h3>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Telefono: {{$owner->phone}} </h3>
            </div>
          </div>
        </div>
      </div>
      <a href="{{route('owners.index')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Regreso </button></a>
    </div>
  </div>
</div>


@endsection