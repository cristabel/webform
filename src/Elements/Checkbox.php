<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;
    
use Form;

class Checkbox extends AbstractElement implements Element {

    protected $checked;
    protected $label;
    
    public function make(array $params)
    {
        $this->extract($params);
        
        $html = Form::checkbox($this->name, $this->value, $this->checked, $this->attribs);
        $html.= Form::label($this->name, $this->label);
        
        return $html;
    }

}
