@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-75 p-4">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>{{ config('app.nav_section3') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar </h5>
            </div>
            <div class="card-body">

                <form id="section3_imgs_form"
                    action="{{ route('section3_imgs.update', ['section3_img' => $section3_imgs->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="input-group">
                        <div class="mb-4 ml-3 mr-4">
                            <label for="title" class="form-label">Nombre: </label>
                            <input type="text" id="name" name="name" size="25" class="form-control"
                                value="{{ $section3_imgs->name }}">
                            @error('name')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-3">
                            <label for="title" class="form-label">Función: </label>
                            <input type="text" id="role" name="role" size="25" class="form-control"
                                value="{{ $section3_imgs->role }}">
                            @error('role')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5 mr-3 ml-3">
                        <label for="title" class="form-label">Texto de las redes sociales: </label>
                        <input type="text" id="text_social_networks" name="text_social_networks" size="25"
                            class="form-control" value="{{ $section3_imgs->text_social_networks }}">
                        @error('text_social_networks')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen actual: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <div class="ratio ratio-1x1">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section3_imgs->image) }}" target="_blank">
                                    <img class='img-thumbnail img-md mb-3 mr-2'
                                        src="{{ URL::asset('/images/' . $section3_imgs->image) }}" />
                                </a>
                            </div>
                        </div>

                        <br />
                        <p>{{ $section3_imgs->image }}</p>

                        <input type="file" name="image" class="form-control w-100"
                            value="{{ $section3_imgs->image }}">
                    </div>

                    <div class="mb-3 ml-4 text-right">
                        <button type=" submit" class="btn btn-primary">Actualizar</button>
                    </div>

                </form>
                <br />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">{{ $section3_imgs->name }} - Redes sociales </th>
                                <th scope="col"></th>
                                <th scope="col" class="bg-dark text-center"><a
                                        href="{{ route('section3_imgs_social_networks.create') }}">
                                        <i class="fa fa-file fa-lg"></i>
                                    </a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($section3_imgs_social_networks as $social_network)
                                <tr>
                                    <td class="img-responsive">
                                        <div class="ratio ratio-1x1">
                                            <div>
                                                <a href="{{ URL::asset('/images/' . $social_network->image) }}"
                                                    target="_blank">
                                                    <img class='img-thumbnail img-sm img-responsive rounded-circle'
                                                        src="{{ URL::asset('/images/' . $social_network->image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class='align-middle'>
                                        {{ $social_network->name }}
                                    </td>

                                    <td class='align-middle'>
                                        <a class="d-flex align-items-center gap-2" href="{{ $social_network->url }}">
                                            {{ $social_network->link }}
                                        </a>
                                    </td>


                                    <td class="align-middle">
                                        <a
                                            href="{{ route('section3_imgs_social_networks.edit', ['section3_imgs_social_network' => $social_network->id]) }}">
                                            <button class="btn btn-link">
                                                <i class="fa fa-edit fa-lg" style="color:#31ab59"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <form
                                            action="{{ route('section3_imgs_social_networks.destroy', [$social_network->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar {{ $social_network->name }}?')">
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
            document.getElementById("section3_imgs_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('name').value.length == 0) {
                document.getElementById('name').className = 'form-control border border-danger';
                document.getElementById('name').placeholder = '--- Valor requerido ---';
                document.getElementById('name').focus();
                return;
            }
            if (document.getElementById('role').value.length == 0) {
                document.getElementById('role').className = 'form-control border border-danger';
                document.getElementById('role').placeholder = '--- Valor requerido ---';
                document.getElementById('role').focus();
                return;
            }
            if (document.getElementById('text_social_networks').value.length == 0) {
                document.getElementById('text_social_networks').className = 'form-control border border-danger';
                document.getElementById('text_social_networks').placeholder = '--- Valor requerido ---';
                document.getElementById('text_social_networks').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
