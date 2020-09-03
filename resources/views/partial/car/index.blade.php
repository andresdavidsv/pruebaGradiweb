@extends('layouts.layout')

@section('title','Vehiculos')

@section('content')

<div class="container">

        <div class="d-flex justify-content-between align-items-end">
            <h2 class="display-4">{{$title}}</h2>
            <p>
              @if ( $view === 'index')
                {{-- @auth --}}
                <a href="{{route('cars.trashed')}}" 
                        class="btn btn-outline-primary btn-sm">Papelera Vehiculos</a>
                <a href="{{route('cars.create')}}" class="btn btn-primary btn-sm">Nuevo Vehiculo</a>
                {{-- @endauth --}}
              @else
                <a href="{{route('cars.index')}}" 
                        class="btn btn-outline-primary btn-sm">Regresar al Listado</a>   
              @endif
            </p>
        </div>

        <div class="card" >
            <div class="card-body table-responsive">

                {{-- Buscador --}}
                @if ( $view === 'index')
                    <form method="GET" action="{{route('cars.index')}}" class="py-1">
                @else
                    <form method="GET" action="{{route('cars.trashed')}}" class="py-1">  
                @endif
                    <div class="row row-filters">
                        {{-- Buscador de barra --}}
                        <div class="col-md-6">
                            <div class="form-inline form-search ">
                                <div class="input-group">
                                    <input type="search" name="search" value="{{request('search')}}" class="form-control form-control-sm" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary btn-sm"><span><i class="fas fa-search"></i></span></button>
                                    </div>
                                </div>
                                &nbsp;
                            </div>
                        </div>
                         {{-- Buscador por Fechas --}}
                        <div class="col-md-6 text-right">
                            <div class="form-inline form-dates">
                                <label for="from" class="form-label-sm">Fecha</label>&nbsp;
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="from" id="from" placeholder="Desde" value="{{ request('from') }}">
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="to" id="to" placeholder="Hasta" value="{{ request('to') }}">
                                </div>
                                &nbsp;
                                <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </div>
                    </form>

                @if ($cars->isNotEmpty())

                    <p class="container d-flex justify-content-center">Consulta en la página 
                    {{$cars->currentpage()}} de {{$cars->lastpage()}}</p>

                    <div class="table-responsive-lg table table-hover table-striped">
                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#Id </th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('plate')}}" class="{{$sortable->classes('plate')}}">Placa
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('car_brand')}}" class="{{$sortable->classes('car_brand')}}">
                                            Marca 
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('car_config')}}" class="{{$sortable->classes('car_config')}}">
                                            Tipo de Vehiculo
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('owner_id')}}" class="{{$sortable->classes('owner_id')}}">
                                             Propietario
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('created_at')}}" class="{{$sortable->classes('created_at')}}">Fecha Vinculacion 
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col" class="text-right th-actions">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)     
                                
                                    <tr>
                                        <td rowspan="row">{{$car -> id}}</td>
                                        <th>{{$car-> plate}}</th>
                                        <th scope="row"> 
                                            {{ $car->car_brand }} 
                                        </th>
                                        <td scope="row"> 
                                            {{ $car->car_config}} 
                                        </td>
                                        <th scope="row">
                                            <a href="{{ route('owners.show', $car->owner->id) }}" style="text-decoration:none">
                                            {{ $car->owner->name}}
                                            {{ $car->owner->last_name}}
                                            </a>
                                        </th>

                                        <td>
                                            <span class="note">{{ $car->created_at->format('d/m/Y') }}</span>
                                        </td>

                                        <td class="text-right">
                                            @if ($car->trashed())
                                                <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('cars.restore',$car->id)}}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-recycle"></i></span></a> 
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    >
                                                        <span><i class="fas fa-times-circle fa"></i></span>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('cars.trash', $car) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <a href="{{ route('cars.show', $car) }}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-eye"></i></span></a>
                                                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-edit"></i></span></a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><span><i class="fas fa-trash-alt"></i></span></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="container d-flex justify-content-center">
                        <h2>No hay Vehiculos registrados.</h2>
                    </div>
                @endif

            </div>
        </div>

<div class="container d-flex justify-content-center">
    {{ $cars -> appends(request(['search']))-> links() }}
</div>

</div>

@endsection