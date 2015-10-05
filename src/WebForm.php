<?php namespace Cristabel\WebForm;

use ReflectionClass;

class WebForm {

    protected $class;
    protected $element;
    protected $key;

    public function element($key, array $element)
    {
        $this->key = $key;
        $this->element = $element;

        $type = $element['type'];
        $name = '\\Cristabel\\WebForm\\Elements\\' . $type;
        $this->class = new $name();

        return $this;
    }

    public function make($row)
    {
        $this->element['value'] = $row->{$this->key};
        $this->element['name'] = $this->key;

        return $this->class->make($this->element);
    }
}
