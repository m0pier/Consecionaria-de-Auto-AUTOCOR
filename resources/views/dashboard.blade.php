@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard <i class="fas fa-chart-line"></i></h1>
@stop

@section('content')
    <div class="row">
        {{-- Unidades --}}
        <div class="col-md-3">
            <x-adminlte-info-box title="{{ $totalUnidades }}" text="Total de Unidades" icon="fas fa-car text-dark" theme="teal"
                url="#" url-text="Ver detalles" />
        </div>

        {{-- Autos Vendidos --}}
        <div class="col-md-3">
            <x-adminlte-info-box title="{{ $autosVendidos }}" text="Autos Vendidos" icon="fas fa-car-side text-success"
                theme="red" />
        </div>

        {{-- Autos en Stock --}}
        <div class="col-md-3">
            <x-adminlte-info-box title="{{ $autosEnStock }}" text="Autos en Stock" icon="fas fa-box text-primary"
                theme="black" />
        </div>

        {{-- Total de Ingresos --}}
        <div class="col-md-3">
            <x-adminlte-info-box title="${{ $totalIngresos }}" text="Total de Ingresos" icon="fas fa-dollar-sign text-warning"
                theme="green" url="#" url-text="Ver detalles" />
        </div>
    </div>
@stop

@push('js')
    <script>
        $(document).ready(function() {

            let iBox = new _AdminLTE_InfoBox('ibUpdatable');

            let updateIBox = () => {
                // Update data.
                let rep = Math.floor(1000 * Math.random());
                let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
                let progress = Math.round(rep * 100 / 1000);
                let text = rep + '/1000';
                let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
                let description = progress + '% reputation completed to reach next level';

                let data = {
                    text,
                    icon,
                    description,
                    progress
                };
                iBox.update(data);
            };

            setInterval(updateIBox, 5000);
        })
    </script>
@endpush

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
