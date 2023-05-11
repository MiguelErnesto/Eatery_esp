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
                <h5>{{ config('app.nav_section4') }} / {{ $section4_images->title }}</h5>
            </div>

            <div class="card-body">
                <form id="section4_images_form"
                    action="{{ route('section4_images.update', ['section4_image' => $section4_images->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título: </label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ $section4_images->title }}">
                        @error('title')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descripción: </label>
                        <input type="text" id="description" name="description" class="form-control"
                            value="{{ $section4_images->description }}">
                        @error('description')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="mb-3 mr-5">
                            <label for="title" class="form-label">Texto emergente: </label>
                            <input type="text" id="text_popup" name="text_popup" class="form-control"
                                value="{{ $section4_images->text_popup }}">
                            @error('text_popup')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="mb-3 ml-5">
                            <label for="title" class="form-label">Precio:</label>&nbsp;&nbsp;&nbsp;<span>$</span>
                            <input type="text" id="price" name="price" class="form-control w-50"
                                value="{{ $section4_images->price }}">
                            @error('price')
                                <div class="text-danger text-center">Valor numérico requerido</div>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="title" class="form-label">Imagen actual: </label>
                    </div>

                    <div class='mb-3 text-center'>
                        <div class="ratio ratio-1x1">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section4_images->image) }}" target="_blank">
                                    <img class='img-thumbnail img-md mb-3 mr-2'
                                        src="{{ URL::asset('/images/' . $section4_images->image) }}" />
                                </a>
                            </div>
                        </div>

                        <br />
                        <p>{{ $section4_images->image }}</p>

                        <input type="file" name="image" class="form-control w-100"
                            value="{{ $section4_images->image }}">
                        @error('image')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
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
                document.getElementById('price').placeholder = '--- Valor numérico requerido ---';
                document.getElementById('price').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
