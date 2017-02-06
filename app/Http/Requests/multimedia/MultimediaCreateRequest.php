<?php

namespace App\Http\Requests\multimedia;

use App\Http\Requests\Request;

class MultimediaCreateRequest extends Request
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
          //'youtube_link'=>'required|url|regex:/watch\?v=([a-zA-Z0-9\-_]+)/',
          'youtube_link' =>  array("required", "regex:/watch\?v=([a-zA-Z0-9\-_]+)/"),
          'title'=>'required',
          'body'=>'required'
        ];
    }
}
