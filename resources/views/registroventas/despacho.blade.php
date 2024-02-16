@extends('adminlte::page')

@section('title', 'Despacho de Autos')

@section('content_header')
    <h1>Despacho de Autos</h1>
@stop

@section('content')
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
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('despacho.store') }}">
                @csrf
                {{-- Autos --}}
                <x-adminlte-select name="auto_id" label="Auto" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($autos as $auto)
                        <option value="{{ $auto->id }}">{{ $auto->unidad->marca }} - {{ $auto->unidad->modelo }} -
                            {{ $auto->unidad->tipo_auto }} -- {{ $auto->placa }}</option>
                    @endforeach
                </x-adminlte-select>

                {{-- Fecha de entrega --}}
                <x-adminlte-input type="date" name="fecha_entrega" id="fecha_entrega" label="Fecha de Entrega"
                    placeholder="Fecha de Entrega" label-class="text-lightblue" value="{{ old('fecha_entrega') }}" />

                {{-- Otros detalles que desees agregar para el despacho --}}

                {{-- Botón --}}
                <x-adminlte-button class="btn-flat" type="submit" label="Despachar Autos" theme="success"
                    icon="fas fa-truck" />
            </form>
        </div>
    </div>
@stop
