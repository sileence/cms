<?php namespace Cms\Base;

abstract class BaseRepo {

    const PAGINATE = true;

    public $filters = [];

    abstract public function getModel();

    public function findOrFail($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    public function search(array $data = array(), $paginate = false)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');

        $q = $this->getModel()->select();

        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);

            if (method_exists(get_called_class(), $filterMethod))
            {
                $this->$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }

        return $paginate ?
            $q->paginate()->appends($data)
            : $q->get();
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function update($entity, array $data)
    {
        $entity->fill($data);
        $entity->save();
        return $entity;
    }

    public function delete($entity)
    {
        if (is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }

        $entity->delete();
        return $entity;
    }
} 