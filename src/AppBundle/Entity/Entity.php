<?php
/**
 * A base class for all Entity classes
 */
namespace AppBundle\Entity;

class Entity {

    /**
     * Simple 'Get' function
     * 
     * @param string $field
     * @return mixed
     */
    public function get($field) {
        return $this->$field;
    }


    /**
     * Simple 'Set' function
     * 
     * @param $field
     * @param $value
     */
    public function set($field, $value) {
        // Before inserting, check that the key is field name
        $fieldNames = array_keys(get_object_vars($this));
        if (in_array( $field, $fieldNames) ) {
            $this->$field = $value;
        }
    }


    /**
     * Convert the members to array
     * 
     * @return array
     */
    public function toArray(){
        $array = [];
        foreach (get_object_vars($this) as $key =>$value) {
            $array[$key] = $value;
        }
        return $array;
    }


    /**
     * Get the filed names of the table
     * 
     * @return array
     */
    static public function fields() {
        return array_keys(get_class_vars(get_called_class()));
    }
}