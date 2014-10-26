<?php namespace Cms\Stubs;

class StubModel {

    protected $data = array ();
    protected $fillable = array ();

    public function __construct(array $data = array())
    {
        $this->setData($data);
    }

    public function __isset($property)
    {
        return isset ($this->data[$property]);
    }

    public function __get($property)
    {
        if (isset ($this->$property))
        {
            return $this->data[$property];
        }

        return null;
    }

    public function setData(array $data)
    {
        if ( ! empty ($data))
        {
            $fillable = $this->fillable;
            $fillable[] = 'id';
            $data = array_only($data, $fillable);
            $this->data = array_merge($this->data, $data);
        }
    }

} 