@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar la Unidad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('unidad.update', $unidad) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <x-adminlte-input name="marca" label="Marca" placeholder="Ex: Ford" fgroup-class="col-md-6"
                        disable-feedback value="{{ $unidad->marca }}" />
                </div>
                <div class="row">
                    <x-adminlte-input name="modelo" label="Modelo" placeholder="Ex: Raptor" fgroup-class="col-md-6"
                        disable-feedback value="{{ $unidad->modelo }}" />
                </div>
                <div class="row">
                    <x-adminlte-input name="tipo_auto" label="Tipo De Auto" placeholder="Ex: Camioneta"
                        fgroup-class="col-md-6" disable-feedback value="{{ $unidad->tipo_auto }}" />
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
