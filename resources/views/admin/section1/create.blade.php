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
                <h5>{{ config('app.nav_section1') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Nuevo </h5>
            </div>

            <div class="card-body">
                <form id="section1_form" action="{{ route('section1.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" id="small_text" name="small_text" class="form-control" value="">
                        @error('small_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descripción: </label>
                        <input type="text" id="large_text" name="large_text" class="form-control" value="">
                        @error('large_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="input-group">

                        <div class="mb-3 mr-5 p-3">
                            <label for="title" class="form-label">Etiqueta del botón: </label>
                            <input type="text" id="lb_button" name="lb_button" class="form-control" value="">
                            @error('lb_button')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-5 p-3">
                            <label for="title" class="form-label">Enlace a la sección: </label>

                            <select id="link_button" name="link_button" class="form-select form-control mb-3 w-100 bg-white"
                                aria-label="Default select example">
                                <option value="home">{{ $navbar[0]->item1 }}</option>
                                <option value="about">{{ $navbar[0]->item2 }}</option>
                                <option value="team">{{ $navbar[0]->item3 }}</option>
                                <option value="menu">{{ $navbar[0]->item4 }}</option>
                                <option value="contact">{{ $navbar[0]->item5 }}</option>
                                <option value="footer">{{ $navbar[0]->item7 }}</option>
                            </select>

                            @error('link_button')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen de Fondo: </label>
                    </div>

                    <div class='text-center'>
                        <div class="ratio ratio-1x1">
                            <input type="file" id="image" name="image" class="form-control w-100" value="">
                            @error('image')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div>
                            <input type="text" id="err_image" class="form-control border-0 text-danger text-center">
                        </div>

                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>

                </form>
            </div> <!-- card body  -->
        </div> <!-- card border  -->
    </div> <!-- container  -->
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("section1_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('small_text').value.length == 0) {
                document.getElementById('small_text').className = 'form-control border border-danger';
                document.getElementById('small_text').placeholder = '--- Valor requerido ---';
                document.getElementById('small_text').focus();
                return;
            }
            if (document.getElementById('large_text').value.length == 0) {
                document.getElementById('large_text').className = 'form-control border border-danger';
                document.getElementById('large_text').placeholder = '--- Valor requerido ---';
                document.getElementById('large_text').focus();
                return;
            }
            if (document.getElementById('lb_button').value.length == 0) {
                document.getElementById('lb_button').className = 'form-control border border-danger';
                document.getElementById('lb_button').placeholder = '--- Valor requerido ---';
                document.getElementById('lb_button').focus();
                return;
            }
            if (document.getElementById('link_button').value.length == 0) {
                document.getElementById('link_button').className = 'form-control border border-danger';
                document.getElementById('link_button').placeholder = '--- Valor requerido ---';
                document.getElementById('link_button').focus();
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
