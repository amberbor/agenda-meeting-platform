<?php

namespace App\Http\Requests;

use App\Repository\Contracts\IEventRepository;

class EventUpdateRequest extends AjaxFormRequest
{
    private $eventRepository;

    /**
     * EventUpdateRequest constructor.
     * @param IEventRepository $eventRepository
     */
    public function __construct(IEventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $event = $this->eventRepository->find(request()->route()->parameter('id'));

        return (auth()->check() && $event !== null && $event->owner_id == request()->user()->id);
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
