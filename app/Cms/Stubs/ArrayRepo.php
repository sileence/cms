<?php namespace Cms\Stubs;

use Cms\Stubs\PaginableCollection as Collection;

abstract class ArrayRepo {

    const PAGINATE = true;

    public $filters = [];

    protected static $collection = [];

    public static function cleanRepos()
    {
        static::$collection = [];
    }

    protected static function collection()
    {
        $class = get_called_class();
        if ( ! isset (static::$collection[$class]))
        {
            static::$collection[$class] = new Collection();
        }
        return static::$collection[$class];
    }

    public function findOrFail($id)
    {
        if ( ! static::collection()->has($id))
        {
            \App::abort(404);
        }

        return static::collection()->get($id);
    }

    public function search(array $data = array(), $paginate = false)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');

        $collection = clone static::collection();

        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);

            if (method_exists(get_called_class(), $filterMethod))
            {
                $collection = $this->$filterMethod($collection, $value);
            }
            else
            {
                $collection = $collection->filter(function ($item) use ($field, $value) {
                   return $item->$field == $value;
                });
            }
        }

        return $paginate ?
            $collection->paginate(15, $data)
            : $collection;
    }

    abstract public function getStubModel();

    public function create(array $data)
    {
        $data['id'] = static::collection()->count() + 1;

        $entity = $this->getStubModel();
        $entity->setData($data);

        static::collection()->put($data['id'], $entity);
        return $entity;
    }

    public function update($entity, array $data)
    {
        $entity->setData($data);
        return $entity;
    }

    public function delete($entity)
    {
        if ($entity instanceof StubModel) {
            $entity = $entity->id;
        }

        static::collection()->forget($entity);
    }
} 