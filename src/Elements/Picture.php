<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;
use Cristabel\WebForm\Traits\AttributesToString;

use Form;

class Picture extends AbstractElement implements Element {

    use AttributesToString;
    
    protected $src;

    public function make(array $params)
    {
        $this->extract($params);
        
        $attribs = $this->attributesToString();
        $this->src = sprintf($this->src, $this->value);
        
        return "<img name=\"{$this->name}\" alt=\"{$this->name}\" src=\"{$this->src}\" {$attribs}>";
    }

}
