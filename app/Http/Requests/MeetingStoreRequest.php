<?php

namespace App\Http\Requests;

use App\Repository\Contracts\IUserRepository;

class MeetingStoreRequest extends AjaxFormRequest
{
    /**
     * @var IUserRepository
     */
    private $userRepository;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $event = $this->userRepository
            ->findClientById(request()->route()->parameter('id'));

        return (
            auth()->check() &&
            $user !== null &&
            $user->is_public == true &&
            request()->user()->id !== $user->id
        );
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
