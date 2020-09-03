@extends('layouts.layout')

@section('title','Nuevo Vehiculo')

@section('content')

  <div class="d-flex justify-content-center">
    <h1 class="display-4">@lang('Nuevo Vehiculo')</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">

        <form method="POST" action="{{route('cars.store')}}"
        class="shadow rounded text-center " 
        enctype="multipart/form-data"
        validate>
        
          {{-- Formulario Hoja de Vida --}}
          @include('partial.car.form.formHVCar',['btnText'=>'Crear'])

        </form>

      </div>
    </div>   
  </div>
@endsection