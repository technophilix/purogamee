<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site
 *
 * @author AGNISWAR
 */
class Site extends CI_MODEL {
    //put your code here
    
    function  getSitedata(){
        
        $sql = "select * from site where idsite=1" ;
     $query = $this->db->query($sql);   
     return $query->row(); 
        
        
    }
    
  function insertSiteInfo($data) {
      
       extract($data);
   $this->db->where('idsite', 1); 
   $this->db->update('site', $data); 
  }  
    

    
    
}
