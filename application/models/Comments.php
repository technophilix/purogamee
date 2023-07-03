<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author Agniswar
 */
class Comments extends CI_MODEL{
    //put your code here

    function insertcomment($data)
   {
$this->db->insert('comments', $data);
        
    }
    
    
    
    function fetchComments($post_key)
    {
        
        $sql = "select * from comments where post_key=? and status=?";
    $query = $this->db->query( $sql, array($post_key, 'Y') );
    return $query->result();
        
        
        
        
    }
    
   function fetchallComments()
    {
        
        $sql = "select * from comments where status=?";
    $query = $this->db->query( $sql, array('N') );
    return $query->result();
        
        
        
        
    } 
    
    function appoveComment($idcomments)
    {
       $sql = "update comments set status=? where idcomments=?";
    $query = $this->db->query( $sql, array('Y',$idcomments) );  
        
    }
    
    
     function deleteComment($idcomments)
    {
       $sql = "update comments set status=? where idcomments=?";
    $query = $this->db->query( $sql, array('D',$idcomments) );  
        
    }
    
}
