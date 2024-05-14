<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:utilisateurs,email'],
            'mot_de_passe' => ['required', 'string', 'min:8'],
            'adresse' => ['required', 'string', 'max:255'],
            'numero_telephone' => ['required', 'string', 'max:20'],
            'date_naissance' => ['required', 'date'],
            'type_utilisateur' => ['required', Rule::in(['Annonceur', 'Utilisateur'])],
            'ville_id' => ['required', Rule::exists('villes', 'id')],
            'date_inscription' => ['required', 'date', 'before_or_equal:now'],
        ];
    }
}