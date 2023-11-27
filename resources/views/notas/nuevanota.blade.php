@extends('layouts.formato')
@section('titulo', 'Nueva Nota')

<style>
body {
  font-family: 'Open Sans', sans-serif;
  background-color: #f2f2f2;
}

h1 {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  text-align: center;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 20px;
}

.alert {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  border-radius: 5px;
  padding: 15px;
  margin-bottom: 15px;
}

form {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-floating {
  margin-bottom: 20px;
}

label {
  color: #333;
  font-weight: bold;
}

.form-control {
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
}

textarea {
  resize: none;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
  border: 1px solid transparent;
  border-radius: 5px;
  padding: 10px 20px;
  text-decoration: none;
  font-size: 16px;
  display: inline-block;
  margin-right: 10px;
  transition: background-color 0.3s ease;
}

.btn-danger {
  background-color: #e74c3c;
  color: #fff;
  border: 1px solid transparent;
  border-radius: 5px;
  padding: 10px 20px;
  text-decoration: none;
  font-size: 16px;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.btn-primary:hover, .btn-danger:hover {
  filter: brightness(90%);
}

#color {
  height: 60px;
}
</style>

@section('contenido')

<div class="container">
    <h1>{{ isset($nota)? 'Editar Nota': 'Crear una Nueva Nota'}}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ isset($nota)? route('notas.update', $nota->id) : route('notas.store')}}">
        @if(isset($nota))
        @method('put')
        @endif
        @csrf
        <div class="row">
            <div class="form-floating col-10">
                <input type="text" class="form-control" id="titulo" placeholder="Titulo de la nota" name="titulo"
                    value="{{ isset($nota)?$nota->titulo :  old('titulo')}}">
                <label for="titulo">Titulo</label>
            </div>
            <div class="form-floating col-2">
                <input type="text" class="form-control" id="fecha" placeholder="Fecha actual" name="fecha"
                    value="{{ isset($nota)?$nota->fecha_creacion :  now()->toDateString()}}" readonly>
                <label for="fecha">Fecha</label>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" placeholder="Contenido de la nota" id="contenido" name="contenido"
                    style="height: 150px;">{{ isset($nota)?$nota->contenido : old('contenido')}}</textarea>
                <label for="contenido">Contenido de la historia</label>
            </div>
            <div class="row">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" id="etiqueta" placeholder="Añadir etiqueta" name="etiqueta"
                        value="{{ isset($nota)?$nota->etiqueta :  old('etiqueta')}}">
                    <label for="etiqueta">Etiqueta</label>
                </div>
                <div class="col-2">
                    <input type="color" class="form-control" id="color" placeholder="Color" name="color"
                    value="{{ isset($nota)?$nota->color :  old('color')}}">
                </div>
                <div class="form-floating col-4">
                  <select name="categoria_id" id="categoria_id" class="form-control">
                      <option value="">Selecciona una categoría</option>
                      @foreach($categorias as $categoria)
                          <option value="{{ $categoria->id }}" {{ (isset($nota) && $nota->categoria_id == $categoria->id) ? 'selected' : '' }}>
                              {{ $categoria->nombre_categoria }}
                          </option>
                      @endforeach
                  </select>
              </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('notas.notaspersonal') }}">Cancelar</a>
    </form>
</div>

@endsection
