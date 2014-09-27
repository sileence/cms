<?php

class Base extends Eloquent {

    const PAGINATE = true;

    public static $filters = [];

    public static function search(array $data = array(), $paginate = false)
    {
        $data = array_only($data, static::$filters);
        $data = array_filter($data, 'strlen');

        $q = Section::select();

        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);

            if (method_exists(get_called_class(), $filterMethod))
            {
                static::$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }

        return $paginate ?
            $q->paginate()
            : $q->get();
    }

}