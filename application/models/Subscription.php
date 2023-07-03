<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subscription
 *
 * @author Agniswar
 */
class Subscription extends CI_MODEL {
    //put your code here
    
    function addSublist($data)
    {
       extract($data); 
      $this->db->insert('subscription',$data);
         return true;
    
           
    }
    
    
  function fetch_mail()
  {
      
       $query = $this->db->query("SELECT * FROM subscription where active = ?" ,array('Y')) ;
    
     return $query->result(); 
      
  }
    
  
  function has_mail($mail)
  {
        $query = $this->db->query("SELECT * FROM subscription where mail= ?" , array($mail)) ;
    
        
    if($query->num_rows()==1){    
     return  true;
    }
    
    else {
        return false;
    }
      
  }
 
  
     function  update_sub($mail, $value)
  
    {
//     extract($data);
    $this->db->where('mail', $mail);
    $this->db->update('subscription', array('active' => $value));
        
    }
    
    
}
