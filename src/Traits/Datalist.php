<?php namespace Cristabel\WebForm\Traits;

use Cristabel\WebForm\Exceptions\WebFormException;

trait Datalist {

    protected $relationship;
    
    protected $model;
    
    protected $datalist;
    
    public function getDatalistFromRelationship()
    {
        $key = 'id';
        if( isset($this->relationship['key']) && !is_null($this->relationship['key']) ) {
            $key = $this->relationship['key'];
        }

        $field = 'name';
        if( isset($this->relationship['field']) && !is_null($this->relationship['field']) ) {
            $field = $this->relationship['field'];
        }
        
        if( !isset($this->relationship['model']) || is_null($this->relationship['model']) ) {
            throw new WebFormException('It has not defined the model name');
        }

        $this->model = new $this->relationship['model'];
        
        return $this->model->orderBy($field)->lists($field, $key);
    }
    
}
