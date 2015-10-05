<?php namespace Cristabel\WebForm\Elements;

use Cristabel\WebForm\AbstractElement;
use Cristabel\WebForm\Contracts\Element;
use Cristabel\WebForm\Traits\AttributesToString;
use Cristabel\WebForm\Traits\PicturePreview;

use Form;

class PictureFile extends AbstractElement implements Element {

    use AttributesToString;
    use PicturePreview;
    
    protected $src = null;

    protected $leyend = null;

    public function make(array $params)
    {
        $this->extract($params);

        $attribs = $this->attributesToString();
        $this->src = sprintf($this->src, $this->value);
        
        $input = '<div class="thumbnail">';
        $input .= Form::file($this->name);
        $input .= "<img alt=\"{$this->name}\" src=\"{$this->src}\" {$attribs}>";
        if( !is_null($this->leyend) ) {
            $input .= "<em>{$this->leyend}</em>";
        }

        $input .= $this->getSupportedSizesToString();

        $input .= '</div>';

        return $input;
    }

}