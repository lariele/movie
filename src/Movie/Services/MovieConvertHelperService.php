<?php

namespace Lariele\Movie\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Lariele\Creator\Models\Creator;
use Lariele\Movie\Models\Movie;

class MovieConvertHelperService
{
    public function __construct(private Movie $movie)
    {
        //
    }

//    public function setCategories($itemCategories)
//    {
//        if (empty($itemCategories)) {
//            return null;
//        }
//
//        $categories = collect([]);
//        foreach ($itemCategories as $itemCategory) {
//            $category = Category::query()->updateOrCreate([
//                'name' => $itemCategory
//            ]);
//
//            $categories->add($category);
//        }
//
//        $this->movie->categories()->sync($categories->pluck('id'));
//    }

//    public function setCountries($itemCountries)
//    {
//        if (empty($itemCountries)) {
//            return null;
//        }
//
//        $countries = collect([]);
//        foreach ($itemCountries as $country) {
//            $category = Country::query()->updateOrCreate([
//                'name' => $country
//            ]);
//
//            $countries->add($category);
//        }
//
//        $this->movie->countries()->sync($countries->pluck('id'));
//    }

//    public function setActress($itemActresses)
//    {
//        $creators = $this->updateCreateCreators($itemActresses);
//
//        $this->movie->actress()->sync($creators->pluck('id'));
//    }

    public function setCreators($creatorsType, $itemCreators)
    {
        Log::debug('SET CREATORS');
        exit();
        $creators = $this->updateCreateCreators($itemCreators);

        Log::debug('SET CREATORS');
        exit();
        $creatorsType->sync($creators->pluck('id'));
    }

    public function updateCreateCreators($itemCreators): Collection
    {
        if (empty($itemCreators)) {
            return collect([]);
        }

        $creators = collect([]);
        foreach ($itemCreators as $itemCreator) {
            $creator = Creator::query()->updateOrCreate([
                'name' => $itemCreator
            ]);

            $creators->add($creator);
        }

        return $creators;
    }
}
