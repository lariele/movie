<?php

namespace Lariele\Movie\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Lariele\Creator\Models\Creator;
use Lariele\Movie\Models\Category;
use Lariele\Movie\Models\Country;
use Lariele\Movie\Models\Movie;
use Lariele\Movie\Models\Provider;
use Lariele\Tag\Models\Tag;

class MovieConvertHelperService
{
    public function __construct(private Movie $movie)
    {
        //
    }

    public function setCategories($itemCategories)
    {
        Log::debug('CATEGORIEs', [$itemCategories]);
        if (empty($itemCategories)) {
            return null;
        }

        $categories = collect([]);
        foreach ($itemCategories as $itemCategory) {
            $category = Category::query()->updateOrCreate([
                'name' => $itemCategory
            ]);

            $categories->add($category);
        }

        $this->movie->categories()->sync($categories->pluck('id'));
    }

    public function setTags($itemTags)
    {
        if (empty($itemTags)) {
            return null;
        }

        $tags = collect([]);
        foreach ($itemTags as $itemTag) {
            $tag = Tag::query()->updateOrCreate([
                'name' => $itemTag
            ]);

            $tags->add($tag);
        }

        $this->movie->tags()->sync($tags->pluck('id'));
    }

    public function setCountries($itemCountries)
    {
        if (empty($itemCountries)) {
            return null;
        }

        $countries = collect([]);
        foreach ($itemCountries as $country) {
            $category = Country::query()->updateOrCreate([
                'name' => $country
            ]);

            $countries->add($category);
        }

        $this->movie->countries()->sync($countries->pluck('id'));
    }

//    public function setActress($itemActresses)
//    {
//        $creators = $this->updateCreateCreators($itemActresses);
//
//        $this->movie->actress()->sync($creators->pluck('id'));
//    }

    public function setCreators($creatorsType, $itemCreators)
    {
        $creators = $this->updateCreateCreators($itemCreators);

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

    public function setPoster($url)
    {
        $this->movie->addMediaFromUrl($url)->toMediaCollection('posters');
    }

    public function setProviders($providers)
    {
        if (empty($providers)) {
            return null;
        }

        $countries = collect([]);
        foreach ($providers as $provider) {
            $category = Provider::query()->updateOrCreate([
                'name' => $provider
            ]);

            $countries->add($category);
        }

        $this->movie->providers()->sync($countries->pluck('id'));
    }
}
