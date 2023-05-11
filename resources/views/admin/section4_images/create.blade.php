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
                <h5>{{ config('app.nav_section4') }} &nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;Galería &nbsp;&nbsp;&nbsp;/
                    &nbsp;&nbsp;&nbsp;Nueva imagen</h5>
            </div>

            <div class="card-body">
                <form id="section4_images_form" action="{{ route('section4_images.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título: </label>
                        <input type="text" id="title" name="title" class="form-control" value="">
                        @error('title')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descrición: </label>
                        <input type="text" id="description" name="description" class="form-control" value="">
                        @error('description')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="mb-3 mr-5">
                            <label for="title" class="form-label">Texto emergente: </label>
                            <input type="text" id="text_popup" name="text_popup" class="form-control" value="">
                            @error('text_popup')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-5">
                            <label for="title" class="form-label">Precio:</label>&nbsp;&nbsp;&nbsp;<span>$</span>
                            <input type="text" id="price" name="price" class="form-control w-50" value="">
                            @error('price')
                                <div class="text-danger text-center">Valor numérico requerido</div>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <input type="file" id="image" name="image" class="form-control w-100" value="">
                        @error('image')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <input type="text" id="err_image" class="form-control border-0 text-danger text-center">
                    </div>

                    <div class="text-right mt-3">
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
            document.getElementById("section4_images_form").addEventListener('submit', validarFormulario);
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
            if (document.getElementById('text_popup').value.length == 0) {
                document.getElementById('text_popup').className = 'form-control border border-danger';
                document.getElementById('text_popup').placeholder = '--- Valor requerido ---';
                document.getElementById('text_popup').focus();
                return;
            }
            if ((document.getElementById('price').value.length == 0) || (isNaN(document.getElementById('price').value))) {
                document.getElementById('price').className = 'form-control border border-danger';
                document.getElementById('price').value = '';
                document.getElementById('price').placeholder = '--- Numeric value required ---';
                document.getElementById('price').focus();
                return;
            }
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
