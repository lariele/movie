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
            if (isset($filter['has_some_providers'])) {
                $moviesQuery->whereHas('providers');
            }

            if (isset($filter['has_providers'])) {
                $moviesQuery = $this->filterProviders($moviesQuery, $filter['has_providers']);
            }

            if (isset($filter['has_categories'])) {
                $moviesQuery = $this->filterCategories($moviesQuery, $filter['has_categories']);
            }

            if (isset($filter['has_tags'])) {
                $moviesQuery = $this->filterTags($moviesQuery, $filter['has_tags']);
            }

            if (isset($filter['has_actors'])) {
                $moviesQuery = $this->filterActors($moviesQuery, $filter['has_actors']);
            }
        }

        if (isset($filter['sort_by'])) {
            $moviesQuery->orderBy($filter['sort_by']['column'], $filter['sort_by']['direction']);
        } else {
            $moviesQuery->orderBy('created_at', 'DESC');
        }

        return $moviesQuery;
    }

    public function filterSearch(Builder $moviesQuery, $search): Builder
    {
        return $moviesQuery->where(function (Builder $qb) use ($search) {
            $qb->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%');
        });
    }

    public function filterProviders(Builder $moviesQuery, $providerList): Builder
    {
        $filterNames = [];

        if (isset($providerList['netflix'])) {
            $filterNames[] = ["Netflix"];
        }
        if (isset($providerList['hbo'])) {
            $filterNames[] = ["HBO Max"];
        }
        if (isset($providerList['disney'])) {
            $filterNames[] = ["Disney Plus"];
        }
        if (isset($providerList['amazon'])) {
            $filterNames[] = ["Amazon Prime Video"];
        }
        if (isset($providerList['mubi'])) {
            $filterNames[] = ["Mubi"];
        }

        if (!empty($filterNames)) {
            $moviesQuery->whereHas('providers', function (Builder $qb) use ($filterNames) {
                $qb->whereIn('name', $filterNames);
            });
        }

        return $moviesQuery;
    }

    public function filterCategories(Builder $moviesQuery, $categories): Builder
    {
        if (!empty($categories)) {
            $moviesQuery->whereHas('categories', function (Builder $qb) use ($categories) {
                $qb->whereIn('id', $categories);
            });
        }

        return $moviesQuery;
    }

    public function filterTags(Builder $moviesQuery, $tags): Builder
    {
        if (!empty($tags)) {
            $moviesQuery->whereHas('tags', function (Builder $qb) use ($tags) {
                $qb->whereIn('id', $tags);
            });
        }

        return $moviesQuery;
    }

    public function filterActors(Builder $moviesQuery, $actors): Builder
    {
        if (!empty($actors)) {
            $moviesQuery->whereHas('actress', function (Builder $qb) use ($actors) {
                $qb->whereIn('id', $actors);
            });
        }

        return $moviesQuery;
    }
}
