@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-100 p-2">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>Reservaciones</h5>
            </div>
            <div class="card-body">
                <div class="text-right">Total: {{ $count }} registros</div>
                {{ $reservations->links() }}

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col">&nbsp;Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Fecha</th>
                                <th scope="col" class="text-center">Hora</th>
                                <th scope="col" class="text-center">Clientes</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($count == 0)
                                <tr>
                                    <td>
                                        <caption class="text-center"><em>No hay registros para mostrar</em></caption>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="align-middle">
                                        RV{{ $reservation->id }}
                                    </td>
                                    <td class='w-25'>
                                        <a class="d-flex align-items-center gap-2" href="">
                                            {{ $reservation->name }}
                                        </a>
                                        {{ $reservation->email }}
                                    </td>

                                    <td class="align-middle text-center">
                                        {{ $reservation->date }}
                                    </td>

                                    <td class="align-middle text-center">
                                        {{ $reservation->time }}
                                    </td>

                                    <td class="align-middle text-center">
                                        {{ $reservation->quantity }}
                                    </td>

                                    <td>

                                    </td>

                                    <td class="align-middle">
                                        <form action="{{ route('reservation.destroy', [$reservation->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar la Reservación: RV{{ $reservation->id }}?')">
                                                <i class="fa fa-trash fa-lg" style="color:#f16d6d"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- {{ $reservations->appends(request()->input())->links() }} --}}

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
