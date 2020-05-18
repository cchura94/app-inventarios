@extends("layouts.admin")

@section("contenedor")

<h1>Nueva categoria</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categoria.store') }}" method="post">

    @csrf
    <label for="">Ingrese nombre de categoria:</label>
    
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">

    <label for="">Ingrese Descripción:</label>
    
    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>

    <input type="submit" value="Guardar" class="btn btn-primary">
</form>

@endsection


