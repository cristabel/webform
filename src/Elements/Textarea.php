<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;

use Form;

class Textarea extends AbstractElement implements Element {

    public function make(array $params)
    {
        $this->extract($params);

        return Form::textarea($this->name, $this->value, $this->attribs);
    }

}
