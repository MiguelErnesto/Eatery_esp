@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-50 p-4">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>{{ config('app.nav_section3') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Redes sociales /
                    {{ $section3_imgs_social_networks->name }}
                </h5>
            </div>

            <div class="card-body">
                <form id="section3_imgs_social_networks"
                    action="{{ route('section3_imgs_social_networks.update', ['section3_imgs_social_network' => $section3_imgs_social_networks->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre: </label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $section3_imgs_social_networks->name }}">
                        @error('name')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Enlace: </label>
                        <input type="text" id="link" name="link" class="form-control"
                            value="{{ $section3_imgs_social_networks->link }}">
                        @error('link')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen actual: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <div class="ratio ratio-1x1">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section3_imgs_social_networks->image) }}"
                                    target="_blank">
                                    <img class='img-thumbnail img-md mb-3 mr-2 rounded-circle'
                                        src="{{ URL::asset('/images/' . $section3_imgs_social_networks->image) }}" />
                                </a>
                            </div>
                        </div>

                        <br />
                        <p>{{ $section3_imgs_social_networks->image }}</p>

                        <input type="file" name="image" class="form-control w-100"
                            value="{{ $section3_imgs_social_networks->image }}">
                    </div>

                    <input type="hidden" name="section3_imgs_id" class="form-control"
                        value="{{ session()->get('section3_id') }}">

                    <div class="text-right mt-3">
                        <button type=" submit" class="btn btn-primary">Actualizar</button>
                    </div>

                </form>
            </div> <!-- card body  -->
        </div> <!-- card border  -->
    </div> <!-- container  -->
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("section3_imgs_social_networks").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('name').value.length == 0) {
                document.getElementById('name').className = 'form-control border border-danger';
                document.getElementById('name').placeholder = '--- Valor requerido ---';
                document.getElementById('name').focus();
                return;
            }
            if (document.getElementById('link').value.length == 0) {
                document.getElementById('link').className = 'form-control border border-danger';
                document.getElementById('link').placeholder = '--- Valor requerido ---';
                document.getElementById('link').focus();
                return;
            }

            this.submit();
        }
    </script>
@endpush
