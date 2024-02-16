@extends('adminlte::page')

@section('title', 'Listado de Ventas')

@section('content_header')
    <h1>Listado de Ventas</h1>
@stop

@section('content')
    <p>Aquí puedes visualizar la lista de clientes</p>
    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Nombre', 'Fecha de Venta', 'Auto', 'Modelo', 'placa', 'precio', 'Estado Despacho', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
              <i class="fa fa-lg fa-fw fa-trash"></i>
          </button>';
                $config = [];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
                hoverable with-footer footer-theme="light" beautify>
                @foreach ($detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->venta->cliente->nombre }}</td>
                        <td>{{ $detalle->venta->fecha_venta }}</td>
                        <td>{{ $detalle->auto->unidad->marca }}</td>
                        <td>{{ $detalle->auto->unidad->modelo }}</td>
                        <td>{{ $detalle->auto->placa }}</td>
                        <td>{{ $detalle->auto->precio }}</td>
                        <td>
                            @if ($detalle->auto->despacho && $detalle->auto->despacho->estadodes)
                                Despachado
                            @else
                                Pendiente
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('ventas.destroy', $detalle->venta->id) }}" method="POST"
                                class="formEliminar">>
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Se va a eliminar un registro.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar registro."
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@stop
