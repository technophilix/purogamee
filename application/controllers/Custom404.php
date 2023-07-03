<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Custom404
 *
 * @author Agniswar
 */
class Custom404 extends CI_Controller {
    //put your code here

    
 function index()
 {
   $data['title']= "SAHOMON | 404";  
     
   $this->load->view('404',$data);  
     
 }
    
    
    
    
    
}
