<?php
namespace App\Http\Requests\Dompets;
 
use Illuminate\Foundation\Http\FormRequest;
 
class CreateDompetFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'nama'          => 'required|unique:dompet,nama',
            'referensi'     => 'required',
            'deskripsi'     => 'required|max:100',
            'status'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'     => ':attribute harus di isi',
            'max'          => ':attribute tidak lebih dari 100 digit',
            'unique'       => ':attribute sudah terpakai'
        ];
    }

    public function attributes()
    {
        return [
            'nama'          => 'Nama',
            'referensi'     => 'Referensi',
            'deskripsi'     => 'Deskripsi',
            'status'        => 'Status Dompet'
        ];
    }
}