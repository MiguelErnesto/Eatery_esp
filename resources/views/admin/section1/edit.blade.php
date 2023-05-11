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
                <h5>{{ config('app.nav_section1') }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar </h5>
            </div>

            <div class="card-body">
                <form id="section1_form" action="{{ route('section1.update', ['section1' => $section1->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" id="small_text" name="small_text" class="form-control"
                            value="{{ $section1->small_text }}">
                        @error('small_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descripción: </label>
                        <input type="text" id="large_text" name="large_text" class="form-control"
                            value="{{ $section1->large_text }}">
                        @error('large_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="input-group">

                        <div class="mb-3 mr-5 p-3">
                            <label for="title" class="form-label">Etiqueta del botón: </label>
                            <input type="text" id="lb_button" name="lb_button" class="form-control"
                                value="{{ $section1->lb_button }}">
                            @error('lb_button')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-5 p-3">
                            <label for="title" class="form-label">Enlace a la sección:: </label>

                            <select id="link_button" name="link_button" class="form-control form-select mb-3 w-100 bg-white"
                                aria-label="Default select example">
                                <option value="{{ $section1->link_button }}" selected> {{ $section1->link_button }}</option>
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
                        <label for="title" class="form-label">Imagen de fondo actual: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <div class="ratio ratio-1x1">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section1->image) }}" target="_blank">
                                    <img class='img-thumbnail img-md mb-3 mr-2'
                                        src="{{ URL::asset('/images/' . $section1->image) }}" />
                                </a>
                            </div>

                            <br />
                            <p>{{ $section1->image }}</p>

                            <input type="file" name="image" class="form-control w-100" value="{{ $section1->image }}">
                        </div>

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

            this.submit();
        }
    </script>
@endpush
