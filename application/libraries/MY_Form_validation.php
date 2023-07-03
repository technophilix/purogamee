<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Form_validation
 *
 * @author Agniswar
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Form_validation extends CI_Form_validation {
 
  protected $ci;
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->ci = &get_instance();
    }
        
      function current_password($oldpassword,$newpassword)
        
      {
          
          
         if(password_verify($oldpassword,$newpassword ))
         {
            return true; 
         }
         
         else{
             $this->ci->form_validation->set_message( 'The current password does not match');
             return false;
         }
          
      }
      public function is_unique_update($str, $field)
    {
        $explode = explode('@', $field);
        $field_name = $explode['0'];
        $field_id_key = $explode['1'];
        $field_id_value = $explode['2'];
        sscanf($field_name, '%[^.].%[^.]', $table, $field_name);

        if (isset($this->ci->db)) {

            $query = $this->ci->db->query("select * from {$table} where {$field_name} =? and $field_id_key !=?", array($str, $field_id_value));
            if ($query->num_rows() > 0) {
                $this->ci->form_validation->set_message('is_unique_update', 'The {field} field must contain a unique value.');
                return false;
            }
            return true;
        }
    }     
        
        
}