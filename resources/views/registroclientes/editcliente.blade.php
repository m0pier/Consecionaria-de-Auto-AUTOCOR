@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar registro del cliente</h1>
@stop

@section('content')
    <p>Ingrese la nueva informacion del cliente</p>
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
        <div class="card-body">
            <form method="post" action="{{ route('cliente.update',  $cliente)}}">
                @csrf
                @method('PUT')
                {{-- Nombre --}}
                <x-adminlte-input type="text" name="nombre" label="NOMBRE" placeholder="Example: FERNANDA"
                    label-class="text-lightblue" value="{{ $cliente->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-user-circle text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- cedula --}}
                <x-adminlte-input type="text" name="cedula" label="CEDULA" placeholder="Example: 1718094056"
                    label-class="text-lightblue" value="{{ $cliente->cedula }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-address-card text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- email --}}
                <x-adminlte-input type="text" name="email" label="Email" placeholder="Example: info@test.com"
                    label-class="text-lightblue" value="{{ $cliente->email}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- telefono --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="Example: 0988349826"
                    label-class="text-lightblue" value="{{ $cliente->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
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
    
@stop
