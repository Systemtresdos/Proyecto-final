@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($usuario) ? 'Editar Usuario' : 'Crear Usuario' }}</h1>

    <form action="{{ isset($usuario) ? route('usuarios.update', $usuario) : route('usuarios.store') }}" method="POST">
        @csrf
        @if(isset($usuario))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $usuario->correo ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="Activo" {{ old('estado', $usuario->estado ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estado', $usuario->estado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="Bloqueado" {{ old('estado', $usuario->estado ?? '') == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="rol_id" class="form-control">
                @foreach($roles as $id => $nombre)
                    <option value="{{ $id }}" {{ old('rol_id', $usuario->rol_id ?? '') == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($usuario) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
