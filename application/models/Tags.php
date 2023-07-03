<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tgas
 *
 * @author Agniswar
 */
class Tags extends CI_MODEL {
    //put your code here

    
 function insertTags($tags,$post_key)
    
 {
     
    $tag =  explode(',', $tags);
    
    //log_message('debug',print_r($tag,TRUE));
   if(!empty($tag) | $tags !="") {
   for($i = 0; $i < count($tag); $i++)
{
       if (!$this->is_tags_exists($tag[$i],$post_key))
       {$item = array(
         
         'tags_name' => $tag[$i],
          'post_key' =>$post_key   
         );
 
       $this->db->insert('tags', $item);
       }
} 
     
   }
 }    

 
 function is_tags_exists($tag, $post_key)
 {
     
     
      $sql = "select * from tags where tags_name=? and post_key=?" ;
     $query = $this->db->query($sql, array($tag,$post_key));
        
      if($query->num_rows()==0){
      return FALSE;}
      else {
       return TRUE;
      }
 }
    
  function tagcloud()
  {
       $sql = "select * from tags where tags_name<>? order by RAND() limit 0, 50" ;
     $query = $this->db->query($sql, array("")); 
     return $query->result(); 
  }
  
   function tagpost($post_key)
  {
       $sql = "select * from tags where tags_name<>? and post_key =?  limit 0, 50" ;
     $query = $this->db->query($sql, array("", $post_key)); 
     return $query->result(); 
  }
    
  function get_post_by_tag_id($tags){
    
    
            
   $sql = "SELECT * FROM post WHERE list_status = ? and publish_status=? and FIND_IN_SET(?, tags)";
    $query = $this->db->query( $sql, array('Y','Y',$tags) );
    return $query->result();          
}
  
  
  
}
