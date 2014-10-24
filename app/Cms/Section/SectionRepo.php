<?php namespace Cms\Section;

use Cms\Base\BaseRepo;

class SectionRepo extends BaseRepo implements SectionRepoInterface
{

    public function getModel()
    {
        return new Section;
    }

    public $filters = ['search', 'published', 'menu'];

    public function filterBySearch($q, $value)
    {
        $q->where('name', 'LIKE', "%$value%"); // Input::get('search')
    }
}