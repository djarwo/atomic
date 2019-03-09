<?php
namespace App\Http\Requests\Transactions;
 
use Illuminate\Foundation\Http\FormRequest;
 
class CreateTransaksiInFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'kategori_id'       => 'required',            
            'dompet_id'         => 'required',
            'nilai'             => 'required|min:1|integer|not_in:0',
            'deskripsi'         => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'required'     => ':attribute harus di isi',
            'min'          => ':attribute harus lebih dari 1 / tidak boleh minus',
            'max'          => ':attribute tidak lebih dari 100 digit',
            'integer'      => ':attribute harus angka'
        ];
    }

    public function attributes()
    {
        return [
            'kategori_id'       => 'Nama Kategori',            
            'dompet_id'         => 'Nama Dompet',
            'nilai'             => 'Nilai Dompet Masuk',
            'deskripsi'         => 'Deskripsi'
        ];
    }
}