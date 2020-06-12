<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Classes\Flash;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Repository\Contracts\IEventRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class AgendaController extends Controller
{
    /**
     * @var IEventRepository
     */
    private $eventRepository;

    /**
     * @param IEventRepository $eventRepository
     */
    public function __construct(IEventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('front.agenda.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $data = $this->eventRepository->getMyEvents($request->user(), $start, $end);

        return response()->json($data);
    }

    /**
     * @param EventStoreRequest $request
     * @param int $user_id
     * @return JsonResponse
     */
    public function requestMeeting(EventStoreRequest $request, int $user_id)
    {
        $event = $this->eventRepository->create([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end,
            'created_by_id' => $request->user()->id,
            'owner_id' => $user_id
        ]);

        Flash::success(__('Meeting is successfully requested!'));

        return response()->json($event);
    }

    /**
     * @param EventStoreRequest $request
     * @return JsonResponse
     */
    public function store(EventStoreRequest $request)
    {
        $event = $this->eventRepository->create([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end,
            'created_by_id' => $request->user()->id,
            'owner_id' => $request->user()->id
        ]);

        Flash::success(__('Event is successfully created!'));

        return response()->json($event);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function getEvent(Request $request, int $id)
    {
        $event = $this->eventRepository->getEventWithRelations($id);

        if (
            $event->owner_id == $request->user()->id ||
            ($event->created_by_id == $request->user()->id && $event->status !== 'Confirmed')
        ){
            return response()->json($event);
        } else {
            return response()->json(null);
        }
    }

    /**
     * @param EventUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(EventUpdateRequest $request, int $id)
    {
        $event = $this->eventRepository->findOrFail($id);

        $event->update([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end
        ]);

        Flash::success(__('Event is successfully updated!'));

        return response()->json($event);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function cancel(Request $request, int $id)
    {
        $event = $this->eventRepository->findOrFail($id);

        if ($event->owner_id == $request->user()->id){
            $event->update([
                'status' => 'Canceled'
            ]);

            Flash::success(__('Event is successfully canceled!'));
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function confirm(Request $request, int $id)
    {
        $event = $this->eventRepository->findOrFail($id);

        if ($event->owner_id == $request->user()->id){
            $event->update([
                'status' => 'Confirmed'
            ]);

            Flash::success(__('Event is successfully confirmed!'));
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Request $request, int $id)
    {
        $event = $this->eventRepository->findOrFail($id);

        if ($event->owner_id == $request->user()->id){
            $event->delete();

            Flash::success(__('Event is successfully deleted!'));
        }

        return redirect()->back();
    }

}
