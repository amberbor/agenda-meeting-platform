<?php

namespace App\Repository\Classes;

use App\Models\Event;
use App\Models\User;
use App\Repository\Contracts\IEventRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection as SupportCollection;

class EventRepository extends Repository implements IEventRepository
{
    protected function modelClass()
    {
        return Event::class;
    }

    /**
     * @param User $user
     * @param string|null $start
     * @param string|null $end
     * @return Builder[]|Collection|Model[]|QueryBuilder[]|SupportCollection
     */
    public function getMyEvents(User $user, ?string $start, ?string $end)
    {
        $query = $this->model()->where(function (Builder $query) use ($user) {
            $query
                ->where('owner_id', $user->id)
                ->orWhere('created_by_id', $user->id);
        });

        if($start != null){
            $query = $query->whereDate('start', '>=', $start);
        }

        if($end != null){
            $query = $query->whereDate('start', '<=', $end);
        }

        return $query->with(['created_by', 'owner'])->get();
    }

    /**
     * @param int $id
     * @return Builder|Model
     */
    public function getEventWithRelations(int $id)
    {
        return $this->model()->where('id', $id)->with(['created_by', 'owner'])->firstOrFail();
    }
}
