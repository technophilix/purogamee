<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    // public function index(){
    //     $data['title'] = $this->Site->getSitedata()->name;
    //     $this->load->view('index', $data);

    // }

    public function index()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Home";
        $data['menu'] = $this->Category->get_categoriesmodifies();
        $data['banner'] = $this->Post->first_banner();
         $data['latest'] = $this->Post->latestissue();
        // $data['archive'] = $this->Post->archive();
        // $data['notice'] = $this->Category->get_post_by_cat_id('Announcement');
        $data["issue"] = $this->IssueModel->get_current_issues();
        $data["allissue"] = $this->IssueModel->get_current_issues();
        $this->load->view('welcome_message', $data);
    }

    public function aboutus()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | aboutus";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('aboutus', $data);
    }

    public function contact()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Contact Us";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('contact', $data);
    }
    public function writeforus()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Write for Us";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('write', $data);
    }

    function privecy()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Privecy Policy";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('privecy', $data);
    }


    public function article($posturl = NULL)
    {
        if ($posturl == NULL) {

            $data['title'] = $this->Site->getSitedata()->name . " | 404";
            $this->load->view('404', $data);
        } else {
            $posturl = urldecode($posturl);
            if ($this->Post->singlePost($posturl) != "No Result") {
                $data['postcontent'] = $this->Post->singlePost($posturl);
                $title = $this->Post->singlePost($posturl)->title;
                $category = get_category($this->Post->singlePost($posturl)->category, false);
                $idbackoffice = $this->Post->singlePost($posturl)->post_author;
                $data['author'] = $this->Backoffice_M->getIndividual($idbackoffice);
                $image = $this->Post->singlePost($posturl)->coveriamge;
                $data['latest'] = $this->Post->latest();
                $data['comments'] = $this->Comments->fetchComments($this->Post->singlePost($posturl)->post_key);
                $data['authorpost'] = $this->Post->authorPost($idbackoffice);
                $data['categorypost'] = $this->Category->get_post_by_cat_id($category);
                $data['tagpcloud'] = $this->Tags->tagpost($this->Post->singlePost($posturl)->post_key);
                $data['title'] = $title;
                $data['menu'] = $this->Category->get_categoriesmodifies();
                // $data['tagcloud'] = $this->Tags->tagcloud();
                $data['popular'] = $this->Post->popular();
                $data['ogimage'] = $image;
                $des = $this->Post->singlePost($posturl)->abstract;
                $data['ogdes'] = $des;

                $this->add_count($posturl);

		$this->load->view('singlepost', $data);
              
                
            } else {
                $data['title'] = $this->Site->getSitedata()->name . " | 404";
                $this->load->view('404', $data);
            }
        }
    }

    function add_count($posturl)
    {
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has posturl name
        $check_visitor = $this->input->cookie(urldecode($posturl), FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column  ..
        //you might be notice we used posturl for cookie name and ip 
        //address for value to distinguish between articles  views


        if ($check_visitor == false) {
            $cookie = array(
                "name" => urldecode($posturl),
                "value" => "$ip",
                "expire" => 86400,
                "secure" => false
            );
            $this->input->set_cookie($cookie);
            $this->Post->update_counter(urldecode($posturl));
        }
    }

    /* -------------comments----------------------- */

    function insertcomment($post_key)
    {

        $posturl = $this->Post->url_form_key($post_key);



        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "web/article/" . $posturl); /* to restrict direct access through url */



        $this->form_validation->set_rules('name', 'Your Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Your email', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|max_length[1000]');
        if ($this->form_validation->run() == FALSE) {
            $this->singlepost($posturl);
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $comment = $this->input->post('comment');
            $data = array(
                'name' => $name,
                'email' => $email,
                'comment' => $comment,
                'post_key' => $post_key,
                'date' => date("Y-m-d H:i:s")
            );

            $this->Comments->insertcomment($data);
            $this->session->set_flashdata('commet_submit', "Your comment is awiting for approval");
            redirect(base_url() . "web/article/" . $posturl . "#comment-form");
        }
    }

    /* ---------------category--------------- */

    function category($category = NULL)
    {

        if ($category == NULL | $this->Category->get_category_by_name(urldecode($category)) == NULL) {

            $data['title'] = $this->Site->getSitedata()->name . " | 404";
            $this->load->view('404', $data);
        } else {
            $data['category'] = $this->Category->get_category_by_name(urldecode($category));
            $parentid = $this->Category->get_category_by_name(urldecode($category))->idcategory;
            $data['subcategory'] = $this->Category->get_sub_categories($parentid);

            $data['categorypost'] = getPostParentCategory($parentid, TRUE, 0, 1852369745);
            $data['catpop'] = $this->Category->get_poppost_by_cat_id(urldecode($category));
            $data['catauthor'] = $this->Category->get_author(urldecode($category));
            $data['title'] = $this->Site->getSitedata()->name . " | Category : " . urldecode($category);
            $data['menu'] = $this->Category->get_categoriesmodifies();



            $this->load->view('category', $data);
        }
    }

    function search()
    {
        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url());

        $squery = $this->input->post('search');
        $data['categorypost'] = $this->Post->search($squery);
        $data['title'] = $this->Site->getSitedata()->name . " | Search";
        $data['squery'] = $squery;
        $data['menu'] = $this->Category->get_categoriesmodifies();



        $this->load->view('search', $data);
    }

    function tags($tags)
    {



        $data['categorypost'] = $this->Tags->get_post_by_tag_id(urldecode($tags));
        $data['title'] = $this->Site->getSitedata()->name . " | Tags : " . urldecode($tags);
        $data['menu'] = $this->Category->get_categoriesmodifies();



        $this->load->view('tags', $data);
    }

    function addsubscription()
    {

        $this->form_validation->set_rules('subscribe', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            echo '<i class="far fa-frown-open"></i> Please enter a valid email...';
        } else {
            $mail = $this->input->post('subscribe');
            $createdate = date("Y-m-d H:i:s");

            $data = array(
                'mail' => $mail,
                'createdate' => $createdate
            );

            if (!$this->Subscription->has_mail($mail)) {
                $this->Subscription->addSublist($data);
                echo '<i class="far fa-smile"></i> Your mail ID <i> ' . $mail . '</i> is successfully added.. ';
            } else {
                $this->Subscription->update_sub($mail, 'Y');
                echo '<i class="far fa-smile"></i> Your mail ID <i> ' . $mail . '</i> is successfully added.. ';
            }
        }
    }

    function unsubscribe()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | unsubscribe";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('unsubscribe', $data);
    }

    function unsubmail()
    {
        $this->form_validation->set_rules('subscribe', 'Email', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $mail = $this->input->post('subscribe');
            $this->Subscription->update_sub($mail, 'N');

            redirect(base_url() . "unsubscribe/success");
        }
    }

    function gallery()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Gallery";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('gallery', $data);
    }

    function events()
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Events";

        $data['menu'] = $this->Category->get_categoriesmodifies();

        $this->load->view('events', $data);
    }

    function author($idbackoffice = NULL)
    {
        if ($idbackoffice == NULL | $this->Backoffice_M->getIndividual($idbackoffice) == NULL) {

            $data['title'] = $this->Site->getSitedata()->name . " | 404";
            $this->load->view('404', $data);
        } else {
            $data['title'] = $this->Site->getSitedata()->name . " | Author";
            $data['author'] = $this->Backoffice_M->getIndividual($idbackoffice);
            $data['authorpost'] = $this->Post->authorPost($idbackoffice);
            $data['menu'] = $this->Category->get_categoriesmodifies();
            $this->load->view('author', $data);
        }
    }


    public function sitemap($pram = NULL)
    {

        $data['title'] = $this->Site->getSitedata()->name . " | Sitemap";
        $items = $this->Post->fetchAllposts();

        $xml = '<?xml version="1.0" encoding="UTF-8" ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>' . base_url() . '</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>';
        foreach ($items as $item) {
            $xml =  $xml . '<url>
        <loc>' . base_url() . "article/" . $item->posturl . '</loc>
        <priority>0.5</priority>
        <changefreq>daily</changefreq>
    </url>';
        }
        $xml = $xml . '</urlset>';
        $this->output->set_content_type('text/xml');
        $this->output->set_output($xml);
    }

    public function archivepage()
    {

    $data['title'] = $this->Site->getSitedata()->name . " | archive";

    $data['menu'] = $this->Category->get_categoriesmodifies();
    $year = $this->input->get('year');
    $month = $this->input->get('month');
    $data['archivepage'] = $this->Post->archivePost($year, $month);
    $this->load->view('archive', $data);
    }



}
