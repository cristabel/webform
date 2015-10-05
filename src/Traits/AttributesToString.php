<?php namespace Cristabel\WebForm\Traits;

use HTML;

trait AttributesToString {
    
    public function attributesToString()
    {
        $attribs = [];
        if( property_exists($this, 'attribs') ) {
            $attribs = HTML::attributes($this->attribs);
        }
        
        return $attribs;
    }
    
}
