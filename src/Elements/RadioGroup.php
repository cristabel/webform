<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;

use Form;

class RadioGroup extends AbstractElement implements Element {
    
    
    public function make(array $params)
    {
        $this->extract($params);
        
        $html = '';
        foreach ( $this->value as $key => $item ) {
            if( is_array($item) ) {
                $checked = (isset($item['checked']) ? $item['checked'] : false);
                $html.= Form::radio($this->name, $key, $checked, $this->attribs);
                $html.= Form::label(null, $item['label']);
            } else {
                $html.= Form::radio($this->name, $key, $this->attribs);
                $html.= Form::label(null, $item);
            }
        }

        return $html;
    }

}
