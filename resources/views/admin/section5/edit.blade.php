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
                <h5>{{ config('app.nav_section5') }} &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Editar Mapa </h5>
            </div>
            <div class="card-body">
                <form id="section5_form" action="{{ route('section5.update', ['section5' => $section5->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <label for="title" class="form-label">Cómo cambiar tu propio punto del mapa</label>
                    <ol type="1">
                        <li>Ir a: <a href="https://maps.google.com/">Mapas de Google</a></li>
                        <li>Haga clic en su punto de ubicación</li>
                        <li>Haga clic en "Compartir" y elija la pestaña "Incrustar mapa"</li>
                        <li>Copie solo la dirección web dentro del campo src="" y péguela debajo</li>
                        <li>Haga clic en el botón Actualizar</li>
                    </ol>

                    <div class="mb-3">
                        <label for="title" class="form-label">Parámetros del mapa: </label>
                        {{--  <input type="text" id="map_parameters" name="map_parameters" class="form-control"
                            value="{{ $section5->map_parameters }}"> --}}
                        <textarea name="map_parameters" rows="5" class="form-control" id="map_parameters" placeholder="Map parameters">
                                {{ $section5->map_parameters }}
                        </textarea>
                        @error('map_parameters')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
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
            document.getElementById("section5_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if ((document.getElementById('map_parameters').value.length == 0)
                .value))) {
            document.getElementById('map_parameters').className = 'form-control border border-danger';
            document.getElementById('map_parameters').value = '';
            document.getElementById('map_parameters').placeholder = '--- Valor válido requerido ---';
            document.getElementById('map_parameters').focus();
            return;
        }

        this.submit();
        }
    </script>
@endpush
