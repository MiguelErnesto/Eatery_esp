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
                <h5>{{ config('app.nav_section4') }} / Testimonios / {{ $section4_testimonials->name }}</h5>
            </div>

            <div class="card-body">
                <form id="section4_testimonials_form"
                    action="{{ route('section4_testimonials.update', ['section4_testimonial' => $section4_testimonials->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre: </label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $section4_testimonials->name }}">
                        @error('name')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Descripción: </label>
                        <input type="text" id="name_description" name="name_description" class="form-control"
                            value="{{ $section4_testimonials->name_description }}">
                        @error('name_description')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Testimonio: </label><br />
                        <div class="form-outline">
                            <textarea class="form-control" id="testimonial_text" name="testimonial_text" id="textAreaExample1" rows="5">{{ $section4_testimonials->testimonial_text }}</textarea>
                        </div>
                        @error('testimonial_text')
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
            document.getElementById("section4_testimonials_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('name').value.length == 0) {
                document.getElementById('name').className = 'form-control border border-danger';
                document.getElementById('name').placeholder = '--- Valor requerido ---';
                document.getElementById('name').focus();
                return;
            }
            if (document.getElementById('name_description').value.length == 0) {
                document.getElementById('name_description').className = 'form-control border border-danger';
                document.getElementById('name_description').placeholder = '--- Valor requerido ---';
                document.getElementById('name_description').focus();
                return;
            }
            if (document.getElementById('testimonial_text').value.length == 0) {
                document.getElementById('testimonial_text').className = 'form-control border border-danger';
                document.getElementById('testimonial_text').placeholder = '--- Valor requerido ---';
                document.getElementById('testimonial_text').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
