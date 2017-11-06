<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The Task entity class, off of which tasks are based.
 */
class Task extends CI_Model {
    private $description = NULL;//the task's description
    private $priority = NULL;//the task's priority
    private $size = NULL;//the size of the task
    private $group = NULL;//the group the task belongs to
    private $status = NULL;//the completion status of the task

    // If this class has a setProp method, use it, else modify the property directly
    public function __set($key, $value) {
        // if a set* method exists for this key, 
        // use that method to insert this value. 
        // For instance, setName(...) will be invoked by $object->name = ...
        // and setLastName(...) for $object->last_name = 
        $method = 'set' . str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        if (method_exists($this, $method))
        {
                $this->$method($value);
                return $this;
        }

        // Otherwise, just set the property value directly.
        $this->$key = $value;
        return $this;
    }
    
    /**
     * Property getter. Returns the property, or null if it doesn't exist.
     * @param mixed $property
     * @return mixed, or NULL
     */
    public function __get($property){
        if(isset($this->$property)){
            return $this->$property;
        }
        else{
            return NULL;
        }
    }
    
    /**
     * Set the task priority property.
     * @param integer $value
     */
    public function setPriority($value){
        //validate input against Rule
        if(is_int($value) && $value < 4){
            $this->priority = $value;
        }
    }
    
    /**
     * Set the task size property.
     * @param integer $value
     */
    public function setSize($value){
        //validate input against Rule
        if(is_int($value) && $value < 4){
            $this->size = $value;
        }
    }
    
    /**
     * Set the task group (category) property.
     * @param integer $value
     */
    public function setGroup($value){
        //validate input against Rule
        if(is_int($value) && $value < 5){
            $this->group = $value;
        }
    }    
}