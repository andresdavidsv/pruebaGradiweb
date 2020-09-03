@extends('layouts.layout')

@section('title','Propietarios')

@section('content')

<div class="container">

        <div class="d-flex justify-content-between align-items-end">
            <h2 class="display-4">{{$title}}</h2>
            <p>
              @if ( $view === 'index')
                {{-- @auth --}}
                <a href="{{route('owners.trashed')}}" 
                        class="btn btn-outline-primary btn-sm">Papelera Propietarios</a>
                <a href="{{route('owners.create')}}" class="btn btn-primary btn-sm">Nuevo Propietarios</a>
                {{-- @endauth --}}
              @else
                <a href="{{route('owners.index')}}" 
                        class="btn btn-outline-primary btn-sm">Regresar al Listado</a>   
              @endif
            </p>
        </div>

        <div class="card" >
            <div class="card-body table-responsive">

                {{-- Buscador --}}
                @if ( $view === 'index')
                    <form method="GET" action="{{route('owners.index')}}" class="py-1">
                @else
                    <form method="GET" action="{{route('owners.trashed')}}" class="py-1">  
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

                @if ($owners->isNotEmpty())

                <p class="container d-flex justify-content-center">Consulta en la página 
                    {{$owners->currentpage()}} de {{$owners->lastpage()}}</p>

                    <div class="table-responsive-lg table table-hover table-striped">
                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#Id </th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('doc_id')}}" class="{{$sortable->classes('doc_id')}}">Numero Id
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('name')}}" class="{{$sortable->classes('name')}}">Nombres
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('last_name')}}" class="{{$sortable->classes('last_name')}}">Apellidos
                                        <i class="icon-sort"></i>
                                    </a></th>
                                <th scope="col">
                                    <a href="{{$sortable ->url('phone')}}" class="{{$sortable->classes('phone')}}">Telefono
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
                                @foreach ($owners as $owner)

                                    <tr>
                                        <td rowspan="row">{{$owner -> id}}</td>

                                        <td>{{$owner->doc_id}}</td>
                                        <th scope="row">
                                            {{ $owner->name }}
                                        </th>
                                        <th scope="row">
                                            {{ $owner->last_name }}
                                        </th>
                                        <th scope="row">
                                            {{ $owner->phone }}
                                        </th>

                                        <td>
                                            <span class="note">{{ $owner->created_at->format('d/m/Y') }}</span>
                                        </td>

                                        <td class="text-right">
                                            @if ($owner->trashed())
                                                <form action="{{ route('owners.destroy', $owner) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('owners.restore',$owner->id)}}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-recycle"></i></span></a>
                                                    {{-- <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <span><i class="fas fa-times-circle fa"></i></span>
                                                    </button> --}}
                                                </form>
                                            @else
                                                <form action="{{ route('owners.trash', $owner) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <a href="{{ route('owners.show', $owner) }}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-eye"></i></span></a>
                                                    <a href="{{ route('owners.edit', $owner) }}" class="btn btn-outline-secondary btn-sm"><span><i class="fas fa-edit"></i></span></a>
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
                    <p>No hay Propietarios registrados.</p>
                @endif

            </div>
        </div>

<div class="container d-flex justify-content-center">
    {{ $owners -> appends(request(['search']))-> links() }}
</div>

</div>

@endsection