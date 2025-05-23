@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $usuario->nombre }}</li>
        <li class="list-group-item"><strong>Correo:</strong> {{ $usuario->correo }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ $usuario->estado }}</li>
        <li class="list-group-item"><strong>Rol:</strong> {{ $usuario->rol->nombre ?? 'Sin rol' }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $usuario->direccion }}</li>
    </ul>

    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
