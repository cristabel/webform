<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;

use Form;

class Text extends AbstractElement implements Element {

    public function make(array $params)
    {
        $this->extract($params);

        return Form::text($this->name, $this->value, $this->attribs);
    }

}
