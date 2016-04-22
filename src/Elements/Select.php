<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;
use Cristabel\WebForm\Contracts\DataSource;
use Cristabel\WebForm\Traits\Datalist;

use Form;

class Select extends AbstractElement 
    implements Element, DataSource {
    
    use Datalist;
    
    protected $options;
    protected $checked;
    
    public function make(array $params)
    {
        $this->extract($params);

        $this->datalist = $this->options;        
        $this->checked = $this->value;
        if( isset($this->relationship) ){
            $this->datalist = $this->getDatalistFromRelationship();
            if( is_object($this->value) ) {
                $this->checked = $this->value->id;
            }
        }

        return Form::select($this->name, $this->datalist, $this->checked, $this->attribs);
    }

}
