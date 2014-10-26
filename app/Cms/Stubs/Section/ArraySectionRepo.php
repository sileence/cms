<?php namespace Cms\Stubs\Section;

use Cms\Section\SectionRepoInterface;
use Cms\Stubs\ArrayRepo;

class ArraySectionRepo extends ArrayRepo implements SectionRepoInterface {

    public $filters = ['search', 'published', 'menu'];

    public function getStubModel()
    {
        return new StubSection();
    }

    public function filterBySearch($collection, $value)
    {
        return $collection->filter(function ($item) use ($value) {
            return strpos($item->name, $value) !== false;
        });
    }

} 