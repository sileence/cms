<?php namespace Cms\Stubs;

use Illuminate\Support\Collection;

class PaginableCollection extends Collection {

    public function paginate($perPage = 15, $data = array())
    {
        $pagination = \App::make('paginator');
        $count = $this->count();
        $page = $pagination->getCurrentPage();
        $items = $this->slice(($page - 1) * $perPage, $perPage)->all();
        $pagination = $pagination->make($items, $count, $perPage);
        $pagination->appends($data);
        return $pagination;
    }

} 