<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;
use Cristabel\WebForm\Contracts\DataSource;
use Cristabel\WebForm\Traits\Datalist;

use Form;

class CheckboxList extends AbstractElement 
    implements Element, DataSource {
    
    use Datalist;

    // TODO Falta implementar selección multiple de check
    public function make(array $params)
    {
        $this->extract($params);
        
        $html = '';
        if( isset($this, $this->relationship) ){
            $this->value = $this->getDatalistFromRelationship();
        }

        foreach ( $this->value as $key => $item ) {
            if( is_array($item) ) {
                $html.= Form::checkbox($this->name, $key, $item['checked'], $this->attribs);
                $html.= Form::label(null, $item['label']);
            } else {
                $html.= Form::checkbox($this->name, $key, $this->attribs);
                $html.= Form::label(null, $item);
            }
        }

        return $html;
    }

}
