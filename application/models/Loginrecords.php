<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logingrecords
 *
 * @author Agniswar
 */
class Loginrecords extends CI_MODEL {
    
    
    function logintime($data){
        
   
     $this->db->insert('loginrecords', $data);   
        
    }
    
   function logouttime($sessionkey)
    
   {
      $sql = "update loginrecords set logouttime = NOW() where sessionkey = ?";
      
      $query = $this->db->query($sql, array($sessionkey));
       
       
   }
    
    //put your code here
}
