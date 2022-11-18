<?php

namespace Lariele\Movie\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use LaravelIdea\Helper\Lapierre\Order\Models\_IH_Order_QB;
use Lariele\Movie\Models\Movie;

class MovieListService
{

    public function getMovieListQuery($filter): _IH_Order_QB|Builder
    {
        $moviesQuery = Movie::query();

        if ($filter) {
            if (isset($filter['search']) && strlen($filter['search']) > 1) {
                $this->filterSearch($moviesQuery, $filter['search']);
            }

            if (isset($filter['year'])) {
                $year = (int)$filter['year'];
                $moviesQuery->whereYear('year', '=', $year);
            }
            if (isset($filter['year_from'])) {
                $yearFrom = (int)$filter['year_from'];
                $moviesQuery->whereYear('year', '>=', $yearFrom);
            }
            if (isset($filter['year_to'])) {
                $yearTo = (int)$filter['year_to'];
                $moviesQuery->whereYear('year', '<', $yearTo);
            }
            if (isset($filter['has_media'])) {
                $moviesQuery->whereHas('media');
            }
            if (isset($filter['has_providers'])) {
                $moviesQuery->whereHas('providers');
            }

            if (isset($filter['has_provider'])) {
                $filterNames = [];

                if (isset($filter['has_provider']['netflix']) && $filter['has_provider']['netflix']) {
                    $filterNames[] = ["Netflix"];
                }
                if (isset($filter['has_provider']['hbo']) && $filter['has_provider']['hbo']) {
                    $filterNames[] = ["HBO Max"];
                }
                if (isset($filter['has_provider']['disney']) && $filter['has_provider']['disney']) {
                    $filterNames[] = ["Disney Plus"];
                }
                if (isset($filter['has_provider']['amazon']) && $filter['has_provider']['amazon']) {
                    $filterNames[] = ["Amazon Prime Video"];
                }
                if (isset($filter['has_provider']['mubi']) && $filter['has_provider']['mubi']) {
                    $filterNames[] = ["Mubi"];
                }

                if (!empty($filterNames)) {
                    $moviesQuery->whereHas('providers', function (Builder $qb) use ($filterNames) {
                        $qb->whereIn('name', $filterNames);
                    });
                }
            }

            if (isset($filter['has_categories'])) {
                $categories = $filter['has_categories'];

                if (!empty($categories)) {
                    Log::debug('HAS CATS', [$categories]);
                    $moviesQuery->whereHas('categories', function (Builder $qb) use ($categories) {
                        $qb->whereIn('id', $categories);
                    });
                }
            }
        }

//        $moviesQuery->whereHas('providers', function (Builder $qb) {
//            $qb->where('name', '=', "Netflix");
//        });

        $moviesQuery->orderBy('created_at', 'DESC');

        return $moviesQuery;
    }

    public function filterSearch(Builder $moviesQuery, $search)
    {
        return $moviesQuery->where(function (Builder $qb) use ($search) {
            $qb->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%');
        });
    }
}
