<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;

use Form;

class Money extends AbstractElement implements Element {

    protected $currency;
    
    public function make(array $params)
    {
        $this->extract($params);

        $input = '<div class="input-group">';
        $input .= '<span class="input-group-addon">'. $this->currency. '</span>';
        $input .= Form::text($this->name, $this->value, $this->attribs);
        $input .= '<span class="input-group-addon">.00</span>';
        $input .= '</div>';

        return $input;
    }

}
