<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Agniswar
 */
class Category extends CI_MODEL
{
    //put your code here


    public function get_categories()
    {

        $sql = "select * from category where parentid=0";
        $query = $this->db->query($sql);
        $return = array();

        foreach ($query->result() as $category) {
            $return[$category->idcategory] = $category;
            $return[$category->idcategory]->subs = $this->get_sub_categories($category->idcategory); // Get the categories sub categories
        }

        return $return;
    }

    public function get_categoriesmodifies()
    {

        $sql = "select * from category where parentid=0 and categoryname <>? and categoryname <> ?";
        $query = $this->db->query($sql, array('Uncategorised', 'Featured'));
        $return = array();

        foreach ($query->result() as $category) {

            $return[$category->idcategory] = $category;
            $return[$category->idcategory]->subs = $this->get_sub_categories($category->idcategory); // Get the categories sub categories



        }

        return $return;
    }


    public function get_sub_categories($parentid)
    {

        $sql = "select * from category where parentid=?";
        $query = $this->db->query($sql, array($parentid));
        if (!empty($query->result()))
            return $query->result();
    }

    function fetchParentCategory()
    {

        $sql = "select * from category where parentid=?";
        $query = $this->db->query($sql, array(0));

        return $query->result();
    }



    function insertCategory($data)

    {
        $this->db->insert('category', $data);
    }

    function UpdateCategory($data, $idcategory)
    {

        $this->db->where('idcategory', $idcategory);
        $this->db->update('category', $data);
    }


    function fetchAllCategory()
    {

        $sql = "select * from category";
        $query = $this->db->query($sql);

        return $query->result();
    }


    function deletecategory($idcategory)
    {

        if ($idcategory != 1) {
            $this->db->where('idcategory', $idcategory);
            $this->db->delete('category');
        }
    }


    function get_category_by_ID($idcategory)
    {
        $sql = "select * from category where idcategory=?";
        $query = $this->db->query($sql, array($idcategory));
        return $query->row();
    }



    function get_category_by_ID_count($category)
    {
        $idcategory = $this->get_category_by_name($category)->idcategory;

        $sql = "SELECT
        p.*, COUNT(c.idcomments) AS 'count'
    FROM
        post p 
    LEFT JOIN
        comments c ON p.post_key = c.post_key where p.category like ? and p.publish_status ='Y' and p.list_status ='Y'
    GROUP BY
        p.idpost";
        $query = $this->db->query($sql, array('%' . $idcategory . '%'));


        return $query->num_rows();
    }



    function get_category_by_name($caturl)
    {
        $sql = "select * from category where caturl=?";
        $query = $this->db->query($sql, array($caturl));
        return $query->row();
    }

    function get_menu()
    {

        $sql = "select * from category where categoryname<>? and categoryname<>?";
        $query = $this->db->query($sql, array("Uncategorised", "Events",));
        return $query->result();
    }

    function get_post_by_cat_id($category)
    {

        $idcategory = $this->get_category_by_name($category)->idcategory;

        $sql = "SELECT
        p.*, COUNT(c.idcomments) AS 'count'
    FROM
        post p 
    LEFT JOIN
        comments c ON p.post_key = c.post_key where p.category like ? and p.publish_status ='Y' and p.list_status ='Y'
    GROUP BY
        p.idpost";
        $query = $this->db->query($sql, array('%' . $idcategory . '%'));
        return $query->result();
    }


    function get_author($category)
    {

        $idcategory = $this->get_category_by_name($category)->idcategory;

        $sql = "SELECT
         distinct post_author
    FROM
        post where category like ? and publish_status ='Y' and list_status ='Y' order by publish_date desc
    ";
        $query = $this->db->query($sql, array('%' . $idcategory . '%'));
        return $query->result();
    }

    function get_poppost_by_cat_id($category)
    {

        $idcategory = $this->get_category_by_name($category)->idcategory;

        $sql = "SELECT
        p.*, COUNT(c.idcomments) AS 'count'
    FROM
        post p 
    LEFT JOIN
        comments c ON p.post_key = c.post_key where p.category like ? and p.publish_status ='Y' and p.list_status ='Y'
    GROUP BY
        p.idpost
        ORDER by p.viewes limit 0, 6

";
        $query = $this->db->query($sql, array('%' . $idcategory . '%'));
        return $query->result();
    }
}