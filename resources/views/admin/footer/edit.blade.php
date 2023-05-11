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
                <h5>Pie de Página</h5>
            </div>

            <div class="card-body">
                <form id='footer_form' action="{{ route('footer.update', ['footer' => $footer->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Símbolo: </label>
                        <input type="text" id="symbol" name="symbol" class="form-control"
                            value="{{ $footer->symbol }}">
                        @error('symbol')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <div class="mr-5 mb-3">
                            <label for="title" class="form-label">Año: </label>
                            <input type="text" id="year" name="year" class="form-control"
                                value="{{ $footer->year }}">
                            @error('year')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>

                        <div class="ml-4 mb-5">
                            <label for="title" class="form-label">Propietario: </label>
                            <input type="text" id="owner" name="owner" class="form-control"
                                value="{{ $footer->owner }}">
                            @error('owner')
                                <div class="text-danger text-center">Valor requerido</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Otros detalles:</label>
                        <input type="text" id="other_details" name="other_details" class="form-control"
                            value="{{ $footer->other_details }}">
                    </div>

                    <div class="input-group">
                        <div class="mr-5 mb-3">
                            <label for="title" class="form-label">Nombre del enlace: </label>
                            <input type="text" id="name_link" name="name_link" class="form-control"
                                value="{{ $footer->name_link }}">
                        </div>
                        <div class="ml-4 mb-3">
                            <label for="title" class="form-label">Enlace:</label>
                            <input type="text" id="link" name="link" class="form-control"
                                value="{{ $footer->link }}">
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
            document.getElementById("footer_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('symbol').value.length == 0) {
                document.getElementById('symbol').className = 'form-control border border-danger';
                document.getElementById('symbol').placeholder = '--- Valor requerido ---';
                document.getElementById('symbol').focus();
                return;
            }
            if (document.getElementById('year').value.length == 0) {
                document.getElementById('year').className = 'form-control border border-danger';
                document.getElementById('year').placeholder = '--- Valor requerido ---';
                document.getElementById('year').focus();
                return;
            }
            if (document.getElementById('owner').value.length == 0) {
                document.getElementById('owner').className = 'form-control border border-danger';
                document.getElementById('owner').placeholder = '--- Valor requerido ---';
                document.getElementById('owner').focus();
                return;
            }
            if (document.getElementById('other_details').value.length == 0) {
                document.getElementById('other_details').className = 'form-control border border-danger';
                document.getElementById('other_details').placeholder = '--- Valor requerido ---';
                document.getElementById('other_details').focus();
                return;
            }
            if (document.getElementById('name_link').value.length == 0) {
                document.getElementById('name_link').className = 'form-control border border-danger';
                document.getElementById('name_link').placeholder = '--- Valor requerido ---';
                document.getElementById('name_link').focus();
                return;
            }
            if (document.getElementById('link').value.length == 0) {
                document.getElementById('link').className = 'form-control border border-danger';
                document.getElementById('link').placeholder = '--- Valor requerido ---';
                document.getElementById('link').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
