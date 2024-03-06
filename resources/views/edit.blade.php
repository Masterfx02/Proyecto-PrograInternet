@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Editar Álbum</h5>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Ups...Te faltan datos</strong><br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('disco.update', $disco) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{$disco->titulo}}">
                    </div>
                    <div class="form-group">
                        <label for="artista">Artista</label>
                        <input type="text" class="form-control" id="artista" name="artista" value="{{$disco->artista}}">
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" class="form-control" id="genero" name="genero" value="{{$disco->genero}}">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{$disco->precio}}">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{$disco->stock}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
