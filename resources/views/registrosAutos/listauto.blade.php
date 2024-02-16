@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Listado de autos</h1>
@stop

@section('content')
    <p>Aquí puedes visualizar los registros de cada auto</p>
    <div class="card">
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Estado Despacho', 'Marca', 'Modelo', 'Tipo', 'Chasis', 'Serie Motor', 'Kilometraje', 'Color', 'Año', 'Precio', 'Transmision', 'Placa', 'Motor', 'Estado', 'Foto', ['label' => 'Actions', 'no-export' => true, 'width' => 10]];
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $config = [];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
                hoverable with-footer footer-theme="light" beautify>
                @foreach ($autos as $auto)
                    <tr>
                        <td>
                            @if ($auto->despacho && $auto->despacho->estadodes)
                                Despachado
                            @else
                                Pendiente
                            @endif
                        </td>
                        <td>{{ $auto->unidad->marca }}</td>
                        <td>{{ $auto->unidad->modelo }}</td>
                        <td>{{ $auto->unidad->tipo_auto }}</td>
                        <td>{{ $auto->chasis }}</td>
                        <td>{{ $auto->motor_serie }}</td>
                        <td>{{ $auto->km }}</td>
                        <td>{{ $auto->color }}</td>
                        <td>{{ $auto->anio }}</td>
                        <td>{{ $auto->precio }}</td>
                        <td>{{ $auto->transmision }}</td>
                        <td>{{ $auto->placa }}</td>
                        <td>{{ $auto->motor->nom_motor }}</td>
                        <td>{{ $auto->estado->nom_est }}</td>
                        <td>
                            <img src="{{ asset($auto->unidad->imagen) }}" alt="noun" class="img-fluid img-thumbnail"
                                width="200px">
                        </td>
                        @can('Editar Registros')
                            <td>
                                <a href="{{ route('auto.edit', $auto) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <form style="display: inline" action="{{ route('auto.destroy', $auto) }}" method="post"
                                    class="formEliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>

                            </td>
                        @endcan
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
