<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Media
 *
 * @author Agniswar
 */
class Media extends CI_Model {
    //put your code here

    
   function insertMedia($data = array())
   {
    
       
      $insert = $this->db->insert_batch('media',$data);
      return $insert?true:false;  
       
       
       
   }
    
   public function record_count() {
        return $this->db->count_all("media");
    }
   
    function fetchMedia()
   
    {
  
     $query = $this->db->query("select * from media  order by createdate desc") ;
     
     
     return $query->result();
        
        
        
    }
    
    
    function fetchmediabyKEY($mediakey)
    
    {
        
       $sql = "select * from media where mediakey=?";
       $query = $this->db->query($sql, array($mediakey));
       
       return $query->row();
       
    }
    
    function deleteMedia($mediakey) {
        
      $this -> db -> where('mediakey', $mediakey);
    $this -> db -> delete('media');  
        
    }
    
    
    
}
