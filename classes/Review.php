<?php

class Review {

    private $_db, $_data;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
    }

    public function create($fields){
        if(!$this->_db->insert('users', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($user = null){
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
    return false;
    }

    public function data(){
        return $this->_data;
    }


}
