<?php

namespace MacsiDigital\API\Support;

use Illuminate\Support\Facades\Validator;
use MacsiDigital\API\Traits\HasAttributes;

class UpdateResource
{
    use HasAttributes;

    protected $updateAttributes = [];

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
        	if(array_key_exists($key, $this->getUpdateAttributeKeys())){
            	$this->setAttribute($key, $value);
        	}
        }

        return $this;
    }

    public function getValidationAttributes()
    {
    	return $this->updateAttributes;
    }

    public function getUpdateAttributeKeys()
    {
    	return array_keys($this->updateAttributes);
    }

    public function validate()
    {
    	return Validator::make($this->getArrayableAttributes(), $this->getValidationAttributes());
    }

}