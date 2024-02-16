@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registar un automovil</h1>
@stop

@section('content')
    <div class="card-header">
        <h2>Ingresar nuevas marcas y caracteristicas</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <x-adminlte-button label="Nueva Unidad" theme="primary" icon="fas fa-key" class="w-100" data-toggle="modal"
                    data-target="#modalUnidad" />
            </div>
            <div class="col-md-4 mb-3">
                <x-adminlte-button label="Nuevo Estado" theme="primary" icon="fas fa-key" class="w-100" data-toggle="modal"
                    data-target="#modalEstado" />
            </div>
            <div class="col-md-4 mb-3">
                <x-adminlte-button label="Nuevo Motor" theme="primary" icon="fas fa-key" class="w-100" data-toggle="modal"
                    data-target="#modalMotor" />
            </div>
        </div>
    </div>
    <div class="card">
        @php
            if (session()) {
                if (session('message') == 'ok') {
                    echo '  <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                                Se ha guardado con exito!
                            </x-adminlte-alert>';
                }
            }
        @endphp
    </div>
    {{-- unidad --}}
    <x-adminlte-select name="unidad_id" label="Unidad" label-class="text-lightblue" igroup-size="lg">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-car"></i>
            </div>
        </x-slot>
        @foreach ($unidades as $unidad)
            <option value="{{ $unidad->id }}">{{ $unidad->marca }} - {{ $unidad->modelo }} -
                {{ $unidad->tipo_auto }} ({{ $unidad->cstock }})</option>
        @endforeach
    </x-adminlte-select>
    {{-- chasis --}}
    <x-adminlte-input type="text" name="chasis" label="CHASIS DEL AUTO" placeholder="Ex: 1234t67e8w1wecs423"
        label-class="text-lightblue" value="{{ old('chasis') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-id-card"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- serie motor --}}
    <x-adminlte-input type="text" name="motor_serie" label="SERIE DEL MOTOR" placeholder="Ex: 12sds365w4e5"
        label-class="text-lightblue" value="{{ old('motor_serie') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-cogs"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- Anio de fabricacion --}}
    <x-adminlte-input type="number" name="anio" label="AÑO DEL AUTO" placeholder="Ex: 2024" label-class="text-lightblue"
        value="{{ old('anio') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- Color --}}
    <x-adminlte-input type="text" name="color" label="COLOR" placeholder="Rojo" label-class="text-lightblue"
        value="{{ old('color') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-paint-brush"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- Precio --}}
    <x-adminlte-input type="number" name="precio" label="PRECIO DE VENTA" placeholder="Ex: 35000"
        label-class="text-lightblue" value="{{ old('precio') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- kilometraje --}}
    <x-adminlte-input type="number" name="km" label="KILOMETRAJE" placeholder="Ex: 10000" label-class="text-lightblue"
        value="{{ old('km') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-road"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- Estado --}}
    <x-adminlte-select name="estado_id" label="ESTADO DEL AUTO" label-class="text-lightblue" igroup-size="lg">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-car-side"></i>
            </div>
        </x-slot>
        @foreach ($estados as $estado)
            <option value="{{ $estado->id }}">{{ $estado->nom_est }}</option>
        @endforeach
    </x-adminlte-select>
    {{-- PLACA --}}
    <x-adminlte-input type="text" name="placa" label="PLACA" placeholder="PUB-4568" label-class="text-lightblue"
        value="{{ old('placa') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-car"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- MOTOR --}}
    <x-adminlte-select name="motor_id" label="MOTOR" label-class="text-lightblue" igroup-size="lg">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-car"></i>
            </div>
        </x-slot>
        @foreach ($motors as $motor)
            <option value="{{ $motor->id }}">{{ $motor->nom_motor }}</option>
        @endforeach
    </x-adminlte-select>
    {{-- TRANSMISION --}}
    <x-adminlte-input type="text" name="transmision" label="TRANSMISION" placeholder="Ex: Automatica"
        label-class="text-lightblue" value="{{ old('transmision') }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-cogs"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- boton --}}
    <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-save" />

    {{-- Themed --}}
    {{-- unidad modal --}}
    <x-adminlte-modal id="modalUnidad" title="Nueva Unidad" theme="primary" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('unidad.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input name="marca" label="Marca" placeholder="Ex: Ford" fgroup-class="col-md-6"
                    disable-feedback />
            </div>
            <div class="row">
                <x-adminlte-input name="modelo" label="Modelo" placeholder="Ex: Raptor" fgroup-class="col-md-6"
                    disable-feedback />
            </div>
            <div class="row">
                <x-adminlte-input name="tipo_auto" label="Tipo De Auto" placeholder="Ex: Camioneta"
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <div class="row">
                {{-- imagenes --}}
                <x-adminlte-input-file name="imagen" label="SUBIR IMAGEN" label-class="text-lightblue"
                    placeholder="Escoja la imagen " igroup-size="lg" legend="Escoja" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-primary">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
        <div class="card-body">
            @php

                $heads = ['Marca', 'Modelo', 'Tipo', 'cstock', 'imagen', ['label' => 'Actions', 'no-export' => true, 'width' => 10]];
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                striped hoverable with-footer footer-theme="light" beautify>
                @if (isset($unidades))
                    @foreach ($unidades as $unidad)
                        <tr>
                            <td>{{ $unidad->marca }}</td>
                            <td>{{ $unidad->modelo }}</td>
                            <td>{{ $unidad->tipo_auto }}</td>
                            <td>{{ $unidad->cstock }}</td>
                            <td>
                                <img src="{{ asset($unidad->imagen) }}" alt="noun" class="img-fluid img-thumbnail"
                                    width="200px">
                            </td>
                            <td>
                                <a href="{{ route('unidad.edit', $unidad) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form style="display: inline" action="{{ route('unidad.destroy', $unidad) }}"
                                    method="POST" class="formEliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endif
            </x-adminlte-datatable>
        </div>
    </x-adminlte-modal>
    {{-- estado modal --}}
    <x-adminlte-modal id="modalEstado" title="Nuevo Estado de auto" theme="primary" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('estado.store') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="nom_est" label="Nombre del Nuevo Estado" placeholder="Ex: Nuevo"
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
        <div class="card-body">
            @php
                $heads = ['ID', 'Estado', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table8" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                striped hoverable with-footer footer-theme="light" beautify>
                @if (isset($estados))
                    @foreach ($estados as $estado)
                        <tr>
                            <td>{{ $estado->id }}</td>
                            <td>{{ $estado->nom_est }}</td>
                            <td>
                                <form style="display: inline" action="{{ route('estado.destroy', $estado) }}"
                                    method="POST" class="formEliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endif
            </x-adminlte-datatable>
        </div>
    </x-adminlte-modal>
    {{-- motor modal --}}
    <x-adminlte-modal id="modalMotor" title="Nuevo Motor" theme="primary" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('motor.store') }}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="nom_motor" label="Nombre del Nuevo Motor" placeholder="Ex: v8"
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
        <div class="card-body">
            @php
                $heads = ['ID', 'Motor', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $config = [];
            @endphp
            <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                striped hoverable with-footer footer-theme="light" beautify>
                @if (isset($motors))
                    @foreach ($motors as $motor)
                        <tr>
                            <td>{{ $motor->id }}</td>
                            <td>{{ $motor->nom_motor }}</td>
                            <td>
                                <form style="display: inline" action="{{ route('estado.destroy', $estado) }}"
                                    method="POST" class="formEliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endif
            </x-adminlte-datatable>
        </div>
    </x-adminlte-modal>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
