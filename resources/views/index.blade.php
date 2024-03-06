@extends('layouts.base')

@section('content')
    <h1>Catálogo de Discos</h1>
    <!-- Aquí iría el contenido del catálogo, como la lista de discos -->

    @if (Session::get('sucess'))
        <div class="alert alert-sucess">
                    <strong>{{Session::get('sucess')}}</strong><br><br>
                </div>
    @endif

    <div class="row">
    @foreach($disco as $disco)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $disco->titulo }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Artista:</strong> {{ $disco->artista }}</p>
                <p class="card-text"><strong>Género:</strong> {{ $disco->genero }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ $disco->precio }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $disco->stock }}</p>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                    <a href="{{ route('disco.edit', $disco->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('disco.destroy', $disco->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    
@endsection

