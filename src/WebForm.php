<?php namespace Cristabel\WebForm;

use Cristabel\WebForm\Exceptions\WebFormException;

class WebForm {

    protected $class;
    protected $element;
    protected $key;

    public function element($key, array $element)
    {
        $this->key = $key;
        $this->element = $element;

        if( !isset($element['type']) ) {
            throw new WebFormException('Type element is not defined');
        }
        
        $type = $element['type'];
        $name = '\\Cristabel\\WebForm\\Elements\\' . $type;
        $this->class = new $name();

        return $this;
    }

    public function inlineError($input, $errors, $class = 'help-block')
    {
        if ( !is_null($errors) && $errors->has($input) ) {
            $message = $errors->first($input);
            return "<span class=\" $class \">  $message </span>";
        }

        return;
    }
    
    public function make($row = null)
    {
        $this->element['name'] = $this->key;
        if( !is_null($row) ) {
            $this->element['value'] = $row->{$this->key};
        }


        return $this->class->make($this->element);
    }
}
