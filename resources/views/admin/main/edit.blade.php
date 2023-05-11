@extends('adminlte::page')

@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <br />
    <div class="container w-50 p-4">
        <div class="card border border-dark">
            <div class="card-header bg-dark">
                <h5>Edite nombre del sitio web</h5>
            </div>
            <div class="card-body">
                <form id='main_form' action="{{ route('main.update', ['main' => $main->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Nombre principal: </strong></label>
                        <input type="text" id="name1" name="name1" class="form-control"
                            value="{{ $main->name1 }}">
                        @error('name1')
                            <div class="text-danger text-center">Valor requerido</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Nombre secundario: (opcional)</strong></label>
                        <input type="text" name="name2" class="form-control" value="{{ $main->name2 }}">

                    </div>

                    <div class="text-right"><button type=" submit" class="btn btn-primary">Actualizar</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("main_form").addEventListener('submit', validarFormulario);
        });

        function validarFormulario(evento) {
            evento.preventDefault();
            if (document.getElementById('name1').value.length == 0) {
                document.getElementById('name1').className = 'form-control border border-danger';
                document.getElementById('name1').placeholder = '--- Valor requerido ---';
                document.getElementById('name1').focus();
                return;
            }
            this.submit();
        }
    </script>
@endpush
