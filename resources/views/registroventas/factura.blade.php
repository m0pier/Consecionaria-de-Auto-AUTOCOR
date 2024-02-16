@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content_header')
    <h1>Sistema de facturacion</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Venta', 'Cliente', 'Fecha de Venta', 'Detalles', 'Total'];
                $config = [];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
                hoverable with-footer footer-theme="light" beautify>
                @php
                    $totalGeneral = 0;
                @endphp

                @foreach ($detalles as $clienteId => $clienteDetalles)
                    @php
                        $totalVentaCliente = 0;
                        $detallesModalId = 'detallesModal' . $clienteId;
                    @endphp

                    <tr>
                        <td>{{ $clienteDetalles[0]->venta->id }}</td>
                        <td>{{ $clienteDetalles[0]->venta->cliente->nombre }} - {{ $clienteDetalles[0]->venta->cliente->cedula }}</td>
                        <td>{{ $clienteDetalles[0]->venta->fecha_venta }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#{{ $detallesModalId }}">
                                Ver Detalles
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="{{ $detallesModalId }}" tabindex="-1" role="dialog"
                                aria-labelledby="detallesModalLabel" aria-hidden="true">
                                <div class="modal-dialog text-dark" role="document">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header text-dark">
                                            <h5 class="modal-title text-dark" id="detallesModalLabel">Factura de Venta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            {{-- Encabezado de la factura --}}
                                            <div class="mb-3">
                                                <h4>Factura de Venta</h4>
                                                <p>Fecha: {{ $clienteDetalles[0]->venta->fecha_venta }}</p>
                                                <p>Cliente: {{ $clienteDetalles[0]->venta->cliente->nombre }} - {{ $clienteDetalles[0]->venta->cliente->cedula }}</p>
                                            </div>

                                            {{-- Detalles de la factura --}}
                                            <table class="table table-bordered text-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Auto</th>
                                                        <th>Modelo</th>
                                                        <th>Placa</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Cantidad</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalVentaCliente = 0;
                                                    @endphp

                                                    @foreach ($clienteDetalles as $detalle)
                                                        <tr>
                                                            <td>{{ $detalle->auto->unidad->marca }}</td>
                                                            <td>{{ $detalle->auto->unidad->modelo }}</td>
                                                            <td>{{ $detalle->auto->placa }}</td>
                                                            <td>{{ $detalle->auto->precio }}</td>
                                                            <td>{{ $detalle->cantidad }}</td>
                                                            <td>{{ $detalle->precio_total }}</td>
                                                        </tr>

                                                        @php
                                                            $totalVentaCliente += $detalle->precio_total;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{-- Total de la factura --}}
                                            <div class="text-right mt-3 text-dark">
                                                <h5>Total: {{ $totalVentaCliente }}</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-dark">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $totalVentaCliente }}</td>
                    </tr>

                    @php
                        $totalGeneral += $totalVentaCliente;
                    @endphp
                @endforeach
            </x-adminlte-datatable>

            <div class="text-right mt-3">
                <strong>Total General:</strong> {{ $totalGeneral }}
            </div>
        </div>
    </div>

@stop
