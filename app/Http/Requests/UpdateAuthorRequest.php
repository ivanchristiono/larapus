<?php

namespace App\Http\Requests;

class UpdateAuthorRequest extends StoreAuthorRequest
{
    public function rules()
    {
            //'name' => 'required|unique:authors,name,'. $id

            $rules = parent::rules();
            $rules['name'] = 'required|unique:authors,name,' . $this->route('author');
            return $rules;
        
    }
}
