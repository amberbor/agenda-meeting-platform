<?php

namespace App\Repository\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection as SupportCollection;

interface IEventRepository extends IRepository
{
    /**
     * @param User $user
     * @param string|null $start
     * @param string|null $end
     * @return Builder[]|Collection|Model[]|QueryBuilder[]|SupportCollection
     */
    public function getMyEvents(User $user, ?string $start, ?string $end);

    /**
     * @param int $id
     * @return Builder|Model
     */
    public function getEventWithRelations(int $id);
}
