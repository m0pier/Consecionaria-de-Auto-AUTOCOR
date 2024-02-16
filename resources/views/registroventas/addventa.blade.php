@extends('adminlte::page')

@section('title', 'Agregar Venta')

@section('content_header')
    <h1>Agregar Venta</h1>
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
            <form method="post" action="{{ route('ventas.store') }}">
                @csrf
                {{-- Cliente --}}
                <x-adminlte-select name="cliente_id" label="Cliente" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} - {{ $cliente->cedula }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-date-range type="date" name="fecha_venta" Label="Fecha de la venta" label-class="text-lightblue" nable-default-ranges="Last 30 Days">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-date-range>

                {{-- Autos --}}
                <div class="form-group">
                    <label for="autos">Autos</label>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="auto_id[]" class="form-control" multiple id="autosSelect">
                                @foreach ($autos as $auto)
                                    <option value="{{ $auto->id }}" data-precio="{{ $auto->precio }}"
                                        data-imagen="{{ asset($auto->unidad->imagen) }}">
                                        {{ $auto->unidad->marca }}-{{ $auto->unidad->modelo }} - {{ $auto->placa }} -
                                        {{ $auto->color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div id="autoDetails">
                                <!-- Aquí se mostrarán los detalles del auto seleccionado, incluida la imagen -->
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cantidad (se incrementará automáticamente) --}}
                <x-adminlte-input type="number" name="cantidad" id="cantidad" label="Cantidad" placeholder="Cantidad"
                    label-class="text-lightblue" value="{{ old('cantidad') }}" readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-sort-numeric-up-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Precio Total (se calculará automáticamente) --}}
                <x-adminlte-input type="number" name="precio_total" id="precio_total" label="Precio Total"
                    placeholder="Precio Total" label-class="text-lightblue" value="{{ old('precio_total') }}" readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Botón --}}
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Venta" theme="success"
                    icon="fas fa-save" />
            </form>
        </div>
    </div>

    {{-- Script para calcular cantidad y precio total automáticamente y mostrar la segunda sección --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const autosSelect = document.getElementById('autosSelect');
            const cantidadInput = document.getElementById('cantidad');
            const precioTotalInput = document.getElementById('precio_total');
            const autoDetails = document.getElementById('autoDetails');

            autosSelect.addEventListener('change', function() {
                const selectedAutos = Array.from(autosSelect.selectedOptions);
                const cantidad = selectedAutos.length;

                cantidadInput.value = cantidad;

                const precioTotal = selectedAutos.reduce((total, option) => total + parseFloat(option
                    .dataset.precio), 0);

                precioTotalInput.value = precioTotal.toFixed(2);

                // Mostrar detalles del auto seleccionado, incluida la imagen
                const detailsHtml = selectedAutos.map(auto => `
                    <div>
                        <p>${auto.text}</p>
                        <img src="${auto.dataset.imagen}" alt="${auto.text}" class="img-fluid img-thumbnail" width="350">
                    </div>
                `).join('');
                autoDetails.innerHTML = detailsHtml;
            });
        });
    </script>
@stop
