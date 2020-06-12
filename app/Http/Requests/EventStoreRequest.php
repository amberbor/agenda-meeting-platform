<?php

namespace App\Http\Requests;

class EventStoreRequest extends AjaxFormRequest
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
            'title' => 'required|string|max:190',
            'note' => 'required|string|max:500',
            'start' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today',
            'end' => 'required|date_format:Y-m-d H:i:s|after_or_equal:start_date'
        ];
    }
}
