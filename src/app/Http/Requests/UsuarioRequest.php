<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    $id = $this->route('usuario'); // para update

    return [
        'nombre'   => 'required|string|max:255',
        'correo'   => "required|email|unique:usuarios,correo,{$id}",
        'password' => $this->isMethod('post') 
                          ? 'required|string|min:6|confirmed' 
                          : 'nullable|string|min:6|confirmed',
        'estado'   => 'required|in:Activo,Inactivo,Bloqueado',
        'rol_id'   => 'required|exists:roles,id',
        // otros campos opcionales...
    ];
}

}
