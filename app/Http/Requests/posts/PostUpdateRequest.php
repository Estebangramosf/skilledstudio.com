<?php

namespace App\Http\Requests\posts;

use App\Http\Requests\Request;

class PostUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title'=>'required',
          'body'=>'required',
          'image' => 'required|image|image-size:>900,>300|image-size:<1280,<720',
        ];
    }
}
