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
                <h5>{{ config('app.nav_section3') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar </h5>
            </div>
            <div class="card-body">

                <form id="section3_form" action="{{ route('section3.update', ['section3' => $section3->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="input-group">
                        <div class="mb-3 mr-4">
                            <label for="title" class="form-label">Título: </label>
                            <input type="text" id="title" name="title" size="25" class="form-control"
                                value="{{ $section3->title }}">
                            @error('title')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Descripción: </label>
                            <input type="text" id="description" name="description" size="50" class="form-control"
                                value="{{ $section3->description }}">
                            @error('description')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-4">
                            <label for="title" class="form-label text-white">Acción: </label><br />
                            <button type=" submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                </form>
                <br />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col">&nbsp;&nbsp;&nbsp;Cocineros</th>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Redes sociales</th>
                                <th scope="col"></th>
                                <th scope="col" class="bg-dark text-center"><a
                                        href="{{ route('section3_imgs.create') }}">
                                        <i class="fa fa-file fa-lg"></i>
                                    </a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($section3_imgs as $section3_img)
                                <tr>
                                    <td class="img-responsive">
                                        <div class="ratio ratio-1x1">
                                            <div>
                                                <a href="{{ URL::asset('/images/' . $section3_img->image) }}"
                                                    target="_blank">
                                                    <img class='img-thumbnail img-md img-responsive'
                                                        src="{{ URL::asset('/images/' . $section3_img->image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class='w-25'>
                                        <a class="d-flex align-items-center gap-2">
                                            {{ $section3_img->name }}
                                        </a>
                                        {{ $section3_img->role }}
                                    </td>

                                    <td class="img-responsive w-50">
                                        {{ $section3_img->text_social_networks }}
                                        <br />
                                        @foreach ($section3_imgs_social_networks as $social_network)
                                            @if ($section3_img->id == $social_network->section3_imgs_id)
                                                <div class="ratio ratio-1x1">
                                                    <div>
                                                        <a href="{{ URL::asset('/images/' . $social_network->image) }}"
                                                            target="_blank">
                                                            <img class='img-thumbnail img-sm img-responsive rounded-circle mr-3'
                                                                src="{{ URL::asset('/images/' . $social_network->image) }}" />
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="align-middle">
                                        <a href="{{ route('section3_imgs.edit', ['section3_img' => $section3_img->id]) }}">
                                            <button class="btn btn-link">
                                                <i class="fa fa-edit fa-lg" style="color:#31ab59"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('section3_imgs.destroy', [$section3_img->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar: {{ $section3_img->name }}? Todos los elementos relacionados serán también borrados.')">
                                                <i class="fa fa-trash fa-lg" style="color:#f16d6d"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("section3_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('title').value.length == 0) {
                document.getElementById('title').className = 'form-control border border-danger';
                document.getElementById('title').placeholder = '--- Valor requerido ---';
                document.getElementById('title').focus();
                return;
            }
            if (document.getElementById('description').value.length == 0) {
                document.getElementById('description').className = 'form-control border border-danger';
                document.getElementById('description').placeholder = '--- Valor requerido ---';
                document.getElementById('description').focus();
                return;
            }

            this.submit();
        }
    </script>
@endpush
