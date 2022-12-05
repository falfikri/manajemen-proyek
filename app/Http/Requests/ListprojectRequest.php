<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListprojectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(in_array($this->method(), ['PUT', 'PATCH'])){
            $todo = [
                'name'             => 'required|string|unique:listprojects,name', 
                'description'      => 'required', 
                'status'           => 'required|string', 
                'start'            => 'required|date', 
                'finish'           => 'required|date', 
                'progres'          => 'required|numeric|max:100',
            ];
        }else{
            $todo = [
                'name'             => 'required|string', 
                'description'      => 'required', 
                'status'           => 'required|string', 
                'start'            => 'required|date', 
                'finish'           => 'required|date', 
                'progres'          => 'required|numeric|max:100',
            ];
        }

        return $todo;
    }

    public function messages(){
        return [
            'name.required'        => 'nama pekerjaan tidak boleh kosong', 
            'name.unique'          => 'nama pekerjaan sudah tersedia',
            'name.string'          => 'nama pekerjaan hanya boleh huruf', 
            'description.required' => 'deskripsi tidak boleh kosong', 
            'status.required'      => 'status pengerjaan tidak boleh kosong', 
            'status.string'        => 'status pengerjaan hanya boleh huruf', 
            'start.required'       => 'tanggal mulai pengerjaan tidak boleh kosong',
            'finish.required'      => 'tanggal target selesai tidak boleh kosong', 
            'progres.required'     => 'progres pengerjaan tidak boleh kosong',
            'progres.numeric'      => 'progres pengerjaan hanya boleh angka',
            'progres.max:100'      => 'progres pengerjaan hanya boleh maksimal 100',
        ];
    }
}
