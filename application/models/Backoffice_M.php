<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Backoffice
 *
 * @author Agniswar
 */
class Backoffice_M extends CI_MODEL
{
  //put your code here

  function authenticate($email, $password)

  {
    $sql = 'SELECT * from backoffice WHERE username =? or email = ?';
    $query = $this->db->query($sql, array($email, $email));


    if ($query->num_rows() == 1) {
      if (password_verify($password, $query->row()->password)) {

        $userdata = array(
          'idbackoffice'  => $query->row()->idbackoffice,
          'name'  => $query->row()->name,
          'join'  => $query->row()->join,
          'email'     => $query->row()->email,
          'password'  => $query->row()->password,
          'sessionkey' => session_key(62),
          'role'  => $query->row()->role,
          'username'  => $query->row()->username,
          'loged_in' => TRUE
        );
        $this->session->set_userdata($userdata);

        return "AUTH";
      } else {

        return "NOAUTH";
      }
    } else {

      return "NOUSER";
    }
  }


  function  updatepass($data)

  {
    extract($data);
    $this->db->where('idbackoffice', $idbackoffice);
    $this->db->update($table, array('password' => $password));
  }

  function getAllUser()
  {

    $sql = "select * from backoffice where role=?";
    $query = $this->db->query($sql, array('user'));
    return $query->result();
  }



  function getAllUser2()
  {

    $sql = "select * from backoffice";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function getIndividual($idbackoffice)
  {

    $sql = "select * from backoffice where idbackoffice=?";
    $query = $this->db->query($sql, array($idbackoffice));
    return $query->row();
  }

  function insertUserInfo($data)
  {

    extract($data);
    $this->db->insert('backoffice', $data);
    $insert_id = $this->db->insert_id();

    return  $insert_id;
  }

  function updateUserInfo($data, $idbackoffice)
  {

    extract($data);
    $this->db->where('idbackoffice', $idbackoffice);
    $this->db->update('backoffice', $data);
  }

  function deleteuser($idbackoffice)
  {
    $this->db->delete('backoffice', array('idbackoffice' => $idbackoffice));
  }


  function allauthor($start = 0, $offset = 24)
  {

    $sql = "select * from backoffice where role=? order by name asc limit $start, $offset ";
    $query = $this->db->query($sql, array('user'));
    return $query->result();
  }
}
