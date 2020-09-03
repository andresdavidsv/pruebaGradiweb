@extends('layouts.layout')

@section('title',' Editando Vehiculo')

@section('content')

<div class="d-flex justify-content-center">
    <h1 class="display-4">@lang('Editar Vehiculo')</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">

        <form method="POST" action="{{route('cars.update',$car->id)}}"
        class="shadow rounded text-center"
        enctype="multipart/form-data">
        @method('PATCH')

          {{-- Fotografia Vehiculo --}}

          @include('partial.car.form.formHVCar',['btnText'=>'Editar'])

        </form>
            
      </div>
    </div>   
  </div>

@endsection