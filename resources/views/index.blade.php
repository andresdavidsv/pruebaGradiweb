@extends('layouts.layout')

@section('title')
    @lang('Index')
@stop

@section('content')

<section class="container my-3">
  <h1>Un poco del Proyecto</h1>
  <div class="row">
    {{-- Menu --}}
    <div class="col-12 col-md-4">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
          <i class="fas fa-truck" aria-hidden="true">
            ¿De que trata?
          </i>
        </a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
          <i class="fas fa-mobile-alt" aria-hidden="true">
            ¿Que tecnologias se usaron?
          </i>
        </a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fas fa-balance-scale" aria-hidden="true">
          ¿Donde se encuentra?
        </i>
        </a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
          <i class="fas fa-briefcase" aria-hidden="true">
            ¿Quien lo hizo?
          </i>
        </a>
      </div>
    </div>
    {{-- Descriptions --}}
    <div class="col-12 col-md-8">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <h3><i class="far fa-check-circle" aria-hidden="true"></i>
            Situacion Problema
          </h3>
          <p>
            <span>El presente proyecto trata de resolver la situacion problema:</span> "Un Parqueaderos 4 ruedas necesita construir un sistema que le permita generar insights para empezar a conocer más un poco acerca de sus usuarios recurrentes."
          </p>
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
          <h3><i class="fas fa-headset" aria-hidden="true"></i>
            Herramientas
          </h3>
          <p>
            El desarrollador y postulante hizo uso del Framework Laravel para el desarrollo de la solucion de parte del Backend y de Boostrap para la parte del FrontEnd.
          </p>
        </div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          <h3><i class="fas fa-gavel" aria-hidden="true"></i>
            Repositorio
          </h3>
          <p>
            El presente proyecto se puede encontrar en el repositorio publico de GitHub en el siguiente link:
            
          </p>
        </div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
          <h3><i class="fas fa-users" aria-hidden="true"></i>
            Se parte de nuestro equipo
          </h3>
          <p>
            En Turbo Transportes AV sas, estamos buscando constantemente talento. Si quieres hacer parte de nuestro equipo, contactanos.
          </p>
          {{-- <a href="{{ route('contact') }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">
            ¡Contactanos aqui!
          </a> --}}
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container">
    <h1><i class="fas fa-check-double">TRANSPORTE CONFIABLE</i></h1>
    <h2><p>MAS DE 15 AÑOS TRANSPORTANDO EL PROGRESO DE COLOMBIA</p></h2>
</section>

<div class="container-fluid counter facts" align="center" id="facts">
  <div class="container">
    <ul class="list-group list-group-flush resumen-empresa">
      <div class="row">
        <li class="list-group-item col-12 col-sm-6 col-lg-3">
          <p class="odometer one">0</p>entregas
        </li>
        <li class="list-group-item col-12 col-sm-6 col-lg-3">
          <p class="odometer two">0</p>viajes
        </li>
        <li class="list-group-item col-12 col-sm-6 col-lg-3">
          <p class="odometer three">0</p>Municipios en cobertura
        </li>
        <li class="list-group-item col-12 col-sm-6 col-lg-3">
          <p class="odometer four">0</p>clientes
        </li>
      </div>
    </ul>
  </div>
</div>

@endsection