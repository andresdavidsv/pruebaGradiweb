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
          <i class="fas fa-bug" aria-hidden="true">
            ¿De que trata?
          </i>
        </a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
          <i class="fa fa-rocket" aria-hidden="true">
            ¿Que tecnologias se usaron?
          </i>
        </a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fa fa-search" aria-hidden="true">
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
          <h3><i class="fas fa-bug" aria-hidden="true"></i>
            Situacion Problema
          </h3>
          <p>
            <span>El presente proyecto trata de resolver la situacion problema:</span> "Un Parqueaderos 4 ruedas necesita construir un sistema que le permita generar insights para empezar a conocer más un poco acerca de sus usuarios recurrentes."
          </p>
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
          <h3><i class="fa fa-rocket" aria-hidden="true"></i>
            Herramientas
          </h3>
          <p>
            El desarrollador y postulante hizo uso del Framework Laravel para el desarrollo de la solucion de parte del Backend y de Boostrap para la parte del FrontEnd.
          </p>
        </div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          <h3><i class="fa fa-search" aria-hidden="true"></i>
            Repositorio
          </h3>
          <p>
            El presente proyecto se puede encontrar en el repositorio publico de GitHub en el siguiente link:
            <a href="https://github.com/andresdavidsv/pruebaGradiweb">https://github.com/andresdavidsv/pruebaGradiweb</a>
          </p>
        </div>
        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
          <h3><i class="fas fa-briefcase" aria-hidden="true"></i>
            El postulante
          </h3>
          <p>
            Soy Andrés David Solarte Vidal, soy Ingeniero Electronico con enfasis en mecatronica, telecomunicaciones y robotica. Me he desarrollado de manera autodidacta como desarrollador, dominando las tecnologias de HTML, CSS, JavaScript, PHPL, Laravel, Vue, Angular, Python y otras mas.
            Gracias a mi capacidad de educacion autodidacta, puedo dar lo mejor profesionalmente a los proyectos en los que colabora, ayudando a crecer a la empresa que represente.
          </p>
          <a href="https://about.me/andresdavidsv/getstarted" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true" target="_blank">
            ¡Contactalo aqui!
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container">
    <h1><i class="fas fa-check-double">TRABAJO CONFIABLE</i></h1>
    <h2><p>INGENIERO DE PROFESION, DESARROLLADOR POR PASION</p></h2>
</section>

<div class="card text-center">
  <div class="card-header">
    Soy andresdavidsv
  </div>
  <div class="card-body">
    <h5 class="card-title">¿Por que andresdavidsv?</h5>
    <p class="card-text">Estoy dispuesto a aportar mis conocimientos en el desarrollo de actividades. El crecimiento personal y profesional debe ser mutuo y estoy presto a ello.</p>
    <a href="https://about.me/andresdavidsv/getstarted" class="btn btn-primary">Contactalo</a>
  </div>
  <div class="card-footer text-muted">
    "Resiliencia", palabra con la que me identifico
  </div>
</div>

@endsection