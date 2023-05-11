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
                <h5>{{ config('app.nav_section2') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar </h5>
            </div>
            <div class="card-body">
                <form id="section2_form" action="{{ route('section2.update', ['section2' => $section2->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Encabezado de la sección: </label>
                        <input type="text" id="small_text" name="small_text" class="form-control"
                            value="{{ $section2->small_text }}">
                        @error('small_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Título: </label>
                        <input type="text" id="large_text" name="large_text" class="form-control"
                            value="{{ $section2->large_text }}">
                        @error('large_text')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descripción: </label><br />
                        <div class="form-outline">
                            <textarea class="form-control" id="description" name="description" id="textAreaExample1" rows="5">{{ $section2->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen actual: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <div class="ratio ratio-1x1">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section2->image) }}" target="_blank">
                                    <img class='img-thumbnail img-md mb-3 mr-2'
                                        src="{{ URL::asset('/images/' . $section2->image) }}" />
                                </a>
                            </div>
                        </div>

                        <br />
                        <p>{{ $section2->image }}</p>

                        <input type="file" name="image" class="form-control w-100" value="{{ $section2->image }}">
                    </div>



                    <div class="text-right mt-3">
                        <button type=" submit" class="btn btn-primary">Actualizar</button>
                    </div>

                </form>
            </div> <!-- card body  -->
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("section2_form").addEventListener('submit', validarFormulario);
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
