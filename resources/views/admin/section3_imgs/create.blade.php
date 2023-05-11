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

                <form id="section3_imgs_form" action="{{ route('section3_imgs.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="mb-4 ml-3 mr-4">
                            <label for="title" class="form-label">Nombre: </label>
                            <input type="text" id="name" name="name" size="25" class="form-control"
                                value="">
                            @error('name')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-3">
                            <label for="title" class="form-label">Función: </label>
                            <input type="text" id="role" name="role" size="25" class="form-control"
                                value="">
                            @error('role')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                    </div>

                    <div class='mr-3 ml-3'>
                        <label for="title" class="form-label">Imagen: </label>
                        <input type="file" id="image" name="image" class="form-control w-100" value="">
                        @error('image')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <input type="text" id="err_image" class="form-control border-0 text-danger text-center">
                    </div>

                    <div class="mb-3 mr-3 ml-3">
                        <label for="title" class="form-label">Texto de las redes sociales: </label>
                        <input type="text" id="text_social_networks" name="text_social_networks" size="25"
                            class="form-control" value="">
                        @error('text_social_networks')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="ml-4 text-right">
                        <button type=" submit" class="btn btn-primary">Crear</button>
                    </div>

                </form>
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
            if (document.getElementById('image').value.length == 0) {
                document.getElementById('image').className = 'form-control w-100 border border-danger';
                document.getElementById('err_image').value = '--- Valor requerido ---';
                document.getElementById('image').focus();
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
