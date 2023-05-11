@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-100 p-4">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>{{ config('app.nav_section1') }}</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col" class="text-center align-middle">Imágen</th>
                                <th scope="col" class="text-center">Detalles</th>
                                <th scope="col">Etiqueta del botón</th>
                                <th scope="col">Sección</th>
                                <th scope="col"></th>
                                <th scope="col" class="bg-dark text-center">
                                    <a href="{{ route('section1.create') }}">
                                        <i class="fa fa-file fa-lg"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($section1s as $section1)
                                <tr>

                                    <td class="img-responsive">
                                        <div class="ratio ratio-1x1">
                                            <div>

                                                <a href="{{ URL::asset('/images/' . $section1->image) }}" target="_blank">
                                                    <img class='img-thumbnail img-md img-responsive'
                                                        src="{{ URL::asset('/images/' . $section1->image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class='w-50'>
                                        <a class="d-flex align-items-center gap-2" href="">
                                            {{ $section1->small_text }}
                                        </a>
                                        {{ $section1->large_text }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $section1->lb_button }}
                                    </td>

                                    <td class="align-middle">
                                        {{ $section1->link_button }}
                                    </td>

                                    <td class="align-middle">
                                        <a href="{{ route('section1.edit', ['section1' => $section1->id]) }}">
                                            <button class="btn btn-link">
                                                <i class="fa fa-edit fa-lg" style="color:#31ab59"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('section1.destroy', [$section1->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar: {{ $section1->small_text }}?')">
                                                <i class="fa fa-trash fa-lg" style="color:#f16d6d"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- card body  -->
        </div> <!-- card border  -->
    </div> <!-- container  -->
@endsection
