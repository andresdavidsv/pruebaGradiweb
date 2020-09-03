@extends('layouts.layout')

@section('title',' Editando Propietario')

@section('content')

<div class="d-flex justify-content-center">
    <h1 class="display-4">@lang('Editar Propietario')</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">

        <form method="POST" action="{{route('owners.update',$owner->id)}}"
        class="shadow rounded text-center"
        enctype="multipart/form-data">
        @method('PATCH')

          {{-- Formulario Hoja de Vida --}}

          {{-- Fotografia Conductor --}}

          @include('partial.owner.form.formHVOwner',['btnText'=>'Editar'])

        </form>

      </div>
    </div>   
  </div>

@endsection