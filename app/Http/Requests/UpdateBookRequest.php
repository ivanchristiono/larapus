<?php

namespace App\Http\Requests;

class UpdateBookRequest extends StoreBookRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = 'required|unique:books,title,' . $this->route('book');
       // $rules['amount'] = 'required|numeric|min:' . $this->route('');
        return $rules;
    }
}
