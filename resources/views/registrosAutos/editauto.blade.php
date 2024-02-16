@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar un automovil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('auto.update', $auto) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- unidad --}}
                <x-adminlte-select name="unidad_id" label="Unidad" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot" value="{{ $auto->unidad }}">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id }}" @if (old('unidad_id') == $unidad->id || (isset($auto) && $auto->unidad_id == $unidad->id)) selected @endif>
                            {{ $unidad->marca }} - {{ $unidad->modelo }} -
                            {{ $unidad->tipo_auto }} ({{ $unidad->cstock }})</option>
                    @endforeach
                </x-adminlte-select>
                {{-- chasis --}}
                <x-adminlte-input type="text" name="chasis" label="CHASIS DEL AUTO" placeholder="Ex: 1234t67e8w1wecs423"
                    label-class="text-lightblue" value="{{ $auto->chasis }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- serie motor --}}
                <x-adminlte-input type="text" name="motor_serie" label="SERIE DEL MOTOR" placeholder="Ex: 12sds365w4e5"
                    label-class="text-lightblue" value="{{ $auto->motor_serie }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- Anio de fabricacion --}}
                <x-adminlte-input type="number" name="anio" label="AÑO DEL AUTO" placeholder="Ex: 2024"
                    label-class="text-lightblue" value="{{ $auto->anio }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- Color --}}
                <x-adminlte-input type="text" name="color" label="COLOR" placeholder="Rojo"
                    label-class="text-lightblue" value="{{ $auto->color }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- Precio --}}
                <x-adminlte-input type="number" name="precio" label="PRECIO DE VENTA" placeholder="Ex: 35000"
                    label-class="text-lightblue" value="{{ $auto->precio }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- kilometraje --}}
                <x-adminlte-input type="number" name="km" label="KILOMETRAJE" placeholder="Ex: 10000"
                    label-class="text-lightblue" value="{{ $auto->km }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- Estado --}}
                <x-adminlte-select name="estado_id" label="ESTADO DEL AUTO" label-class="text-lightblue" igroup-size="lg"
                    value="{{ $auto->estado->nom_est }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" @if (old('estado_id') == $estado->id || (isset($auto) && $auto->estado_id == $estado->id)) selected @endif>
                            {{ $estado->nom_est }}</option>
                    @endforeach
                </x-adminlte-select>
                {{-- PLACA --}}
                <x-adminlte-input type="text" name="placa" label="PLACA" placeholder="PUB-4568"
                    label-class="text-lightblue" value="{{ $auto->placa }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- MOTOR --}}
                <x-adminlte-select name="motor_id" label="MOTOR" label-class="text-lightblue" igroup-size="lg"
                    value="{{ $auto->motor->nom_motor }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($motors as $motor)
                        <option value="{{ $motor->id }}" @if (old('motor_id') == $motor->id || (isset($auto) && $auto->motor_id == $motor->id)) selected @endif>
                            {{ $motor->nom_motor }}</option>
                    @endforeach
                </x-adminlte-select>
                {{-- TRANSMISION --}}
                <x-adminlte-input type="text" name="transmision" label="TRANSMISION" placeholder="Ex: Automatica"
                    label-class="text-lightblue" value="{{ $auto->transmision }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            {{-- boton --}}
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': "Resultado",
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif
@stop
