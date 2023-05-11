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
                <h5> {{ config('app.nav_section7') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar </h5>
            </div>

            <div class="card-body">
                <form id="section7_form" action="{{ route('section7.update', ['section7' => $section7->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    {{-- FIND US --}}
                    <div class="container bg-light border border-dark">
                        <div class="text-center">
                            <label for="title" class="form-label mt-3">
                                <h3> Encuéntrenos</h3>
                            </label>
                        </div>

                        <div class="pb-3">
                            <div class="form-outline">
                                <textarea class="form-control" id="fu_description" name="fu_description" id="textAreaExample1" rows="2">{{ $section7->fu_description }}</textarea>
                            </div>
                            @error('fu_description')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                    </div>
                    <br />
                    <br />

                    {{-- RESERVATION --}}
                    <div class="container bg-light border border-dark">
                        <div class="text-center">
                            <label for="title" class="form-label mt-3">
                                <h3>Reservación</h3>
                            </label>
                        </div>

                        <div class="input-group">
                            <div class="mb-3 ml-5 mr-4">
                                <label for="title" class="form-label">Número telefónico 1: </label>
                                <input type="text" id="rv_number1" name="rv_number1" class="form-control"
                                    value="{{ $section7->rv_number1 }}">
                                @error('rv_number1')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>

                            <div class="mb-3 ml-5">
                                <label for="title" class="form-label">Número telefónico 2: </label>
                                <input type="text" id="rv_number2" name="rv_number2" class="form-control"
                                    value="{{ $section7->rv_number2 }}">
                                @error('rv_number2')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="mb-3 ml-5 mr-4">
                                <label for="title" class="form-label">Correo electrónico: </label>
                                <input type="email" id="rv_email" name="rv_email" class="form-control"
                                    value="{{ $section7->rv_email }}">
                                @error('rv_email')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>

                            <div class="mb-3 ml-5 mb-4">
                                <label for="title" class="form-label">Texto: </label>
                                <input type="text" id="rv_text" name="rv_text" class="form-control"
                                    value="{{ $section7->rv_text }}">
                                @error('rv_text')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br />
                    <br />

                    {{-- OPEN HOURS --}}
                    <div class="container bg-light border border-dark">
                        <div class="text-center">
                            <label for="title" class="form-label mt-3">
                                <h3>Horarios de Apertura</h3>
                            </label>
                        </div>

                        <div class="input-group">
                            <div class="mb-3 ml-5 mr-4">
                                <label for="title" class="form-label">Días: </label>
                                <input type="text" id="oh_days1" name="oh_days1" class="form-control"
                                    value="{{ $section7->oh_days1 }}">
                                @error('oh_days1')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>

                            <div class="mb-3 ml-5">
                                <label for="title" class="form-label">Horarios: </label>
                                <input type="text" id="oh_hours1" name="oh_hours1" class="form-control"
                                    value="{{ $section7->oh_hours1 }}">
                                @error('oh_hours1')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="mb-3 ml-5 mr-4">
                                <label for="title" class="form-label">Otros días: </label>
                                <input type="text" id="oh_days2" name="oh_days2" class="form-control"
                                    value="{{ $section7->oh_days2 }}">
                                @error('oh_days2')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>

                            <div class="mb-3 ml-5">
                                <label for="title" class="form-label">Otros horarios: </label>
                                <input type="text" id="oh_hours2" name="oh_hours2" class="form-control"
                                    value="{{ $section7->oh_hours2 }}">
                                @error('oh_hours2')
                                    <div class="text-danger text-center">Valor requerido</div>
                                @enderror
                            </div>
                        </div>


                        <div class="p-3 mr-4 ml-4">
                            <label for="title" class="form-label">Cerrado: </label>
                            <input type="text" id="oh_closed" name="oh_closed" class="form-control"
                                value="{{ $section7->oh_closed }}">
                            @error('oh_closed')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="p-3 mr-4 ml-4">
                            <label for="title" class="form-label">Imagen de fondo actual: </label>
                        </div>

                        <div class='mb-3 mr-4 ml-5 pb-3 text-center'>
                            <div class="ratio ratio-1x1">
                                <div>
                                    <a href="{{ URL::asset('/images/' . $section7->oh_bg_image) }}" target="_blank">
                                        <img class='img-thumbnail img-md mb-3 mr-2'
                                            src="{{ URL::asset('/images/' . $section7->oh_bg_image) }}" />
                                    </a>
                                </div>
                            </div>

                            <br />
                            <p>{{ $section7->oh_bg_image }}</p>
                            <input type="file" id="image" name="image" class="form-control w-100"
                                value="{{ $section7->oh_bg_image }}">

                        </div>

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
            document.getElementById("section7_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();

            /* RESERVE A TABLE - FIND US */
            if (document.getElementById('fu_description').value.length == 0) {
                document.getElementById('fu_description').className = 'form-control border border-danger';
                document.getElementById('fu_description').placeholder = '--- Valor requerido ---';
                document.getElementById('fu_description').focus();
                return;
            }

            /* RESERVE A TABLE - RESERVATION */

            /*valida formato de numero de telefono*/
            var exp_phone_number = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            if ((document.getElementById('rv_number1').value.length == 0) || !((
                    exp_phone_number.test(document.getElementById(
                            'rv_number1')
                        .value)))) {
                document.getElementById('rv_number1').className = 'form-control border border-danger';
                document.getElementById('rv_number1').placeholder = '--- Número telefónico válido requerido ---';
                document.getElementById('rv_number1').focus();
                return;
            }

            /*valida formato de numero de telefono*/
            if ((document.getElementById('rv_number2').value.length == 0) || !((
                    exp_phone_number.test(document.getElementById(
                            'rv_number2')
                        .value)))) {
                document.getElementById('rv_number2').className = 'form-control border border-danger';
                document.getElementById('rv_number2').placeholder = '--- Número telefónico válido requerido ---';
                document.getElementById('rv_number2').focus();
                return;
            }

            /*valida formato de email*/
            var exp_email = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if ((document.getElementById('rv_number2').value.length == 0) || !((
                    exp_email.test(document.getElementById(
                            'rv_email')
                        .value)))) {
                document.getElementById('rv_email').className = 'form-control border border-danger';
                document.getElementById('rv_email').placeholder = '--- Correo electŕonico válido requerido ---';
                document.getElementById('rv_email').focus();
                return;
            }

            if (document.getElementById('rv_text').value.length == 0) {
                document.getElementById('rv_text').className = 'form-control border border-danger';
                document.getElementById('rv_text').placeholder = '--- Valor requerido ---';
                document.getElementById('rv_text').focus();
                return;
            }

            /* RESERVE A TABLE - OPEN HOURS */
            if (document.getElementById('oh_closed').value.length == 0) {
                document.getElementById('oh_closed').className = 'form-control border border-danger';
                document.getElementById('oh_closed').placeholder = '--- Valor requerido ---';
                document.getElementById('oh_closed').focus();
                return;
            }

            if (document.getElementById('oh_days1').value.length == 0) {
                document.getElementById('oh_days1').className = 'form-control border border-danger';
                document.getElementById('oh_days1').placeholder = '--- Valor requerido ---';
                document.getElementById('oh_days1').focus();
                return;
            }

            if (document.getElementById('oh_hours1').value.length == 0) {
                document.getElementById('oh_hours1').className = 'form-control border border-danger';
                document.getElementById('oh_hours1').placeholder = '--- Valor requerido ---';
                document.getElementById('oh_hours1').focus();
                return;
            }

            if (document.getElementById('oh_days2').value.length == 0) {
                document.getElementById('oh_days2').className = 'form-control border border-danger';
                document.getElementById('oh_days2').placeholder = '--- Valor requerido ---';
                document.getElementById('oh_days2').focus();
                return;
            }

            if (document.getElementById('oh_hours2').value.length == 0) {
                document.getElementById('oh_hours2').className = 'form-control border border-danger';
                document.getElementById('oh_hours2').placeholder = '--- Valor requerido ---';
                document.getElementById('oh_hours2').focus();
                return;
            }

            this.submit();
        }
    </script>
@endpush
