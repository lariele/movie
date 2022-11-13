<?php

namespace Lariele\Movie\Services;

use Illuminate\Database\Eloquent\Builder;
use LaravelIdea\Helper\Lapierre\Order\Models\_IH_Order_QB;
use Lariele\Movie\Models\Movie;

class MovieListService
{

    public function getMovieListQuery($filter): _IH_Order_QB|Builder
    {
        $moviesQuery = Movie::query();

        if ($filter) {
            if (isset($filter['search']) && strlen($filter['search']) > 1) {
                $moviesQuery->where(function (Builder $qb) use ($filter) {
                    $qb->where('name', 'LIKE', '%' . $filter['search'] . '%')
                        ->orWhere('name', 'LIKE', '%' . $filter['search'] . '%');
                });
            }

            if (isset($filter['year_from'])) {
                $yearFrom = (int)$filter['year_from'];
                $moviesQuery->whereYear('year', '>=', $yearFrom);
            }
            if (isset($filter['year_to'])) {
                $yearTo = (int)$filter['year_to'];
                $moviesQuery->whereYear('year', '<', $yearTo);
            }
            if (isset($filter['with_media'])) {
                $moviesQuery->whereHas('media');
            }
        }

        $moviesQuery->orderBy('created_at', 'DESC');

        return $moviesQuery;
    }
}
