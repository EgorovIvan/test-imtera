<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionsQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Question::query();
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}
