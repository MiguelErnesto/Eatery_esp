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
                <h5> Redes sociales / Nueva </h5>
            </div>

            <div class="card-body">
                <form id="social_networks_form" action="{{ route('social_network.store') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre: </label>
                        <input type="text" id="name" name="name" class="form-control" value="">
                        @error('name')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Enlace: </label>
                        <input type="text" id="url" name="url" class="form-control" value="">
                        @error('url')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen: </label>
                    </div>

                    <div class='text-center'>
                        <input type="file" id="image" name="image" class="form-control w-100" value="">
                        @error('image')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <input type="text" id="err_image" class="form-control border-0 text-danger text-center">
                    </div>

                    <div class="text-right">
                        <button type=" submit" class="btn btn-primary">Crear</button>
                    </div>

                </form>
            </div> <!-- card body  -->
        </div> <!-- card border  -->
    </div> <!-- container  -->
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("social_networks_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('name').value.length == 0) {
                document.getElementById('name').className = 'form-control border border-danger';
                document.getElementById('name').placeholder = '--- Valor requerido ---';
                document.getElementById('name').focus();
                return;
            }

            if (document.getElementById('url').value.length == 0) {
                document.getElementById('url').className = 'form-control border border-danger';
                document.getElementById('url').placeholder = '--- Valor requerido ---';
                document.getElementById('url').focus();
                return;
            }

            /* validar la imagen */
            if (document.getElementById('image').value.length == 0) {
                document.getElementById('image').className = 'form-control w-100 border border-danger';
                document.getElementById('err_image').value = '--- Valor requerido ---';
                document.getElementById('image').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
