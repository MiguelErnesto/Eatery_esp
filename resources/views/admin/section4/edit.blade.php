@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-100 p-2">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>{{ config('app.nav_section4') }}</h5>
            </div>
            <div class="card-body">
                <form id="section4_form" action="{{ route('section4.update', ['section4' => $section4->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="input-group">
                        <div class="mr-2">
                            <label for="title" class="form-label"><strong>Título: </strong></label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ $section4->title }}">
                            @error('title')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                        <div class="mr-2">
                            <label for="title" class="form-label"><strong>Descripción:
                                </strong></label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="{{ $section4->description }}">
                            @error('description')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div>
                            <label for="title" class="form-label"><strong>Testimonios (Imagen de fondo):
                                </strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $section4->bg_testimonials_image }}

                            <input type="file" id="image" name="image" class="form-control"
                                value="{{ $section4->bg_testimonials_image }}">
                        </div>

                        <div class="ratio ratio-1x1 mt-3 ml-2">
                            <div>
                                <a href="{{ URL::asset('/images/' . $section4->bg_testimonials_image) }}" target="_blank">
                                    <img class='img-thumbnail img-md'
                                        src="{{ URL::asset('/images/' . $section4->bg_testimonials_image) }}" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="text-left">
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </div>
                </form>
                <br />

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col"></th>
                                <th scope="col" class="text-center"> Testimonios</th>
                                <th scope="col"> </th>
                                <th scope="col" class="bg-dark text-center">
                                    <a href="{{ route('section4_testimonials.create') }}">
                                        <i class="fa fa-file fa-lg"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($section4_testimonials as $section4_testimonial)
                                <tr>

                                    <td class='w-25'>
                                        <a class="d-flex align-items-center gap-2" href="">
                                            {{ $section4_testimonial->name }}
                                        </a>
                                        {{ $section4_testimonial->name_description }}
                                    </td>

                                    <td>
                                        {{ $section4_testimonial->testimonial_text }}
                                    </td>

                                    <td class="align-middle">
                                        <a
                                            href="{{ route('section4_testimonials.edit', ['section4_testimonial' => $section4_testimonial->id]) }}">
                                            <button class="btn btn-link">
                                                <i class="fa fa-edit fa-lg" style="color:#31ab59"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <form
                                            action="{{ route('section4_testimonials.destroy', [$section4_testimonial->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar este testimonio ({{ $section4_testimonial->name }})?')">
                                                <i class="fa fa-trash fa-lg" style="color:#f16d6d"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-light table-sm">
                                <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;Galería</th>
                                <th scope="col">&nbsp;&nbsp;Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col" class="text-center">Texto emergente</th>
                                <th scope="col"> </th>
                                <th scope="col" class="bg-dark text-center">
                                    <a href="{{ route('section4_images.create') }}">
                                        <i class="fa fa-file fa-lg"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($section4_images as $section4_image)
                                <tr>

                                    <td class="img-responsive">
                                        <div class="ratio ratio-1x1">
                                            <div>
                                                <a href="{{ URL::asset('/images/' . $section4_image->image) }}"
                                                    target="_blank">
                                                    <img class='img-thumbnail img-md img-responsive'
                                                        src="{{ URL::asset('/images/' . $section4_image->image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class='align-middle'>
                                        <a class="d-flex align-items-center gap-2 text-primary">
                                            {{ $section4_image->title }}
                                        </a>
                                        {{ $section4_image->description }}
                                    </td>

                                    <td class="align-middle">
                                        $ {{ $section4_image->price }}
                                    </td>

                                    <td class="align-middle text-center">
                                        {{ $section4_image->text_popup }}

                                    </td>

                                    <td class="align-middle">
                                        <a
                                            href="{{ route('section4_images.edit', ['section4_image' => $section4_image->id]) }}">
                                            <button class="btn btn-link">
                                                <i class="fa fa-edit fa-lg" style="color:#31ab59"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('section4_images.destroy', [$section4_image->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link"
                                                onclick="return confirm('¿Seguro desea borrar {{ $section4_image->title }}?')">
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
            document.getElementById("section4_form").addEventListener('submit', validarFormulario);
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
