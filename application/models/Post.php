<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Agniswar
 */
class Post extends CI_Model
{
  //put your code here


  function postkeygen($post_type)

  {

    $post_key = session_key(45);

    $data = array(

      'userid' => $this->session->userdata('idbackoffice'),
      'create_date' => date("Y-m-d H:i:s"),
      'post_key' => $post_key,
      'post_type' => $post_type
    );

    $keygen = $this->db->insert('post', $data);
    if ($keygen)
      return $post_key;
  }


  function is_postkey_exist($post_key)
  {

    $sql = "select * from post where post_key=?";
    $query = $this->db->query($sql, array($post_key));

    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return TRUE;
    }
  }





  function fetch_post($post_key)

  {

    $sql = "select * from post where post_key=?";
    $query = $this->db->query($sql, array($post_key));
    return $query->row();
  }


  function insertPost($data)

  {

    extract($data);
    $this->db->where('post_key', $post_key);
    $this->db->set('update_flag', '`update_flag`+ 1', FALSE);
    $this->db->update('post', $data);
  }



  function is_title_exist($title, $post_key)
  {

    $sql = "select * from post where title=? and post_key <> ?";
    $query = $this->db->query($sql, array($title, $post_key));

    if ($query->num_rows() == 0) {
      return false;
    } else {
      return true;
    }
  }


  function is_url_exist($posturl, $post_key)
  {

    $sql = "select * from post where posturl=? and post_key <> ?";
    $query = $this->db->query($sql, array($posturl, $post_key));

    if ($query->num_rows() == 0) {
      return false;
    } else {
      return true;
    }
  }

  function postpublish($data)
  {

    extract($data);
    $this->db->where('post_key', $post_key);
    $this->db->update('post', $data);
  }

  function updateCover($data)
  {
    extract($data);
    // $this->db->set($data);
    $this->db->where('post_key', $post_key);
    $this->db->update('post', $data);

    return true;
  }

  function fetchAllposts()
  {

    $query = $this->db->query("select * from post where list_status = ? order by create_date desc", array('Y'));

    return $query->result();
  }

  function fetchAllposts_type($post_type) {
     
    $query = $this->db->query("select p.*, i.* from post p, issue i where p.issue=i.idissue and p.list_status = ? and p.post_type=? order by p.create_date desc", array('Y', $post_type));

    return $query->result(); 
      
  }

  function fetchTrashposts()
  {

    $query = $this->db->query("select * from post where list_status = ? and title <> ? order by create_date desc", array('N', ''));

    return $query->result();
  }
  function latestissue()
  {

    $query = $this->db->query("select * from post where issue = (select max(idissue) from issue) order by publish_date desc", array('N', ''));

    return $query->result();
  }

  function deletePost($data)
  {

    extract($data);
    $this->db->where('post_key', $post_key);
    $this->db->update('post', $data);
  }

  function GetPostAgain($data)
  {

    extract($data);
    $this->db->where('post_key', $post_key);
    $this->db->update('post', $data);
  }




  function deletepostpermanently($data)
  {
    extract($data);
    $this->db->delete('post', array('post_key' => $post_key));
  }

  function setKey()

  {
    $query2 =  $this->db->query("select * from post");

    $result = $query2->result();
    foreach ($result as $rs) {
      $query = $this->db->query("Update post set posturl =? where idpost=?", array(create_posturl($rs->title), $rs->idpost));
    }
  }


  function singlePost($posturl)
  {


    $query = $this->db->query("select * from post where posturl=?", array($posturl));
    if ($query->num_rows() != 0) {
      return $query->row();
    } else {
      return "No Result";
    }
  }

  function url_form_key($post_key)
  {

    $query = $this->db->query("select posturl from post where post_key=?", array($post_key));

    return $query->row()->posturl;
  }



  function update_counter($posturl)
  {
    // return current article views 
    $this->db->where('posturl', urldecode($posturl));
    $this->db->select('viewes');
    $count = $this->db->get('post')->row();
    // then increase by one 
    $this->db->where('posturl', urldecode($posturl));
    $this->db->set('viewes', ($count->viewes + 1));
    $this->db->update('post');
  }

  function updatepublishstatus($idbackoffice)
  {
    return $this->db->query("update post set publish_status =?, list_status=? where FIND_IN_SET(?, post_author)", array('N', 'N', $idbackoffice));
  }

  /*home page*/

  function first_banner()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? order by publish_date desc limit 3", array('Y', 'Y'));

    return $query->result();
  }


  function authorPost($idbackoffice)
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and post_author =? order by publish_date desc limit 0,11", array('Y', 'Y', $idbackoffice));

    return $query->result();
  }


  function latest()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and category not like '%22%' order by publish_date desc limit 0, 60", array('Y', 'Y'));

    return $query->result();
  }

  function popular()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? order by publish_date and viewes desc limit 0,4", array('Y', 'Y'));

    return $query->result();
  }

  function must()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? order by RAND()", array('Y', 'Y'));

    return $query->result();
  }

  function catpost($catarray, $l, $u)
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and category in ? order by publish_date desc limit {$l}, {$u}", array('Y', 'Y', $catarray));

    return $query->result();
  }
  function featured()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and FIND_IN_SET(?, category) order by publish_date desc limit 0,3", array('Y', 'Y', '65'));

    return $query->result();
  }
  /*home page*/
  function search($squery)
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and (title like ? or FIND_IN_SET(?, category) or FIND_IN_SET(?, tags) or content like ?) order by publish_date", array('Y', 'Y', '%' . $squery . '%', $squery, $squery, '%' . $squery . '%'));

    return $query->result();
  }


  function newsletter()
  {
    $date_interval = 30;
    $query = $this->db->query("SELECT * FROM post where publish_date >= DATE(NOW()) - INTERVAL 30 DAY", array($date_interval));
    return $query->result();
  }


  function editorial()
  {
    $query = $this->db->query("select * from post where list_status = ? and publish_status=? and category like '%19%' order by publish_date desc limit 0, 1", array('Y', 'Y'));

    return $query->result();
  }

  function archive()
  {
    $query = $this->db->query("select year(publish_date) as `year`, monthname(publish_date) as `month`, count(*) as `count`
        from post where year(publish_date) <> '' 
        group by concat(year(publish_date),month(publish_date))
        order by publish_date desc");

    return $query->result();
  }


  function archivePost($year, $month)
  {

    $query = $this->db->query("select * from post where year(publish_date) = ? and monthname(publish_date)=? and list_status = ? and publish_status=?
        order by publish_date desc", array($year, $month, 'Y', 'Y'));

    return $query->result();
  }


}
