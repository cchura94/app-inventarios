@extends("layouts.admin")

@section("contenedor")

<h1>Editar categoria</h1>

<form action="{{ route('categoria.update', $categoria->id) }}" method="post">

    @csrf
    @Method('PUT')
    <label for="">Ingrese nombre de categoria:</label>
    
    <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}">

    <label for="">Ingrese Descripción:</label>
    
    <textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>

    <input type="submit" value="Guardar" class="btn btn-primary">
</form>+

@endsection