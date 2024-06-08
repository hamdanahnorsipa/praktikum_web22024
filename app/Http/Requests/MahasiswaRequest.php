<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'jurusan'        => 'required',
            'npm'            => ['required'],
            'nama'           => 'required',
            'tanggal_lahir'  => 'required',
            'foto'           => ['nullable','mimes:png,jpg','max:10000'],
        ];
    }
}
