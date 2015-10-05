<?php namespace Cristabel\WebForm\Traits;

use Illuminate\Database\Eloquent\Model;

use Cristabel\WebForm\Exceptions\WebFormException;

trait PicturePreview {

    protected $sizes = [];
    
    public function getSupportedSizesToString()
    {
    	$html = '';
        if( is_array($this->sizes) ) {
        	$html .= '<div>';
            $html .= "<strong><mark>Supported sizes:</mark></strong>";
            $sizes = [];
            foreach( $this->sizes as $key => $size ) {
                $sizes[] = $key;
            }
                $html .= "<mark>". implode(',', $sizes) ."</mark>";
            $html .= '</div>';
        }

        return $html;
    }
    
}
