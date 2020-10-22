<?php

namespace App\Http\Requests\Siswa;

use App\Http\Requests\BaseRequest;

class UpdateSiswa extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,'.$this->route('siswa'),
            'kelas' => 'required',
            'password' => 'required'
        ];
    }
}
