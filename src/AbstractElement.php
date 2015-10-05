<?php namespace Cristabel\WebForm;

class AbstractElement {

    protected $id = null;

    protected $name = null;
    
    protected $value = null;

    protected $attribs = [];

    public function extract($params)
    {
        foreach ($params as $key => $value) {
            if( property_exists($this, $key) ){
                $this->$key = $value;
            }
        }
    }

}
