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
class Backoffice extends CI_Controller
{

    //put your code here



    function index()
    {
        $data['title'] = "Log-In";

        $this->load->view('backoffice/login', $data);
    }

    function home()
    {

        $data['title'] = "Dashboard";
        $data['comments'] = $this->Comments->fetchAllComments();
        $data["totaluser"] = $this->Backoffice_M->getAllUser2();
        $data["totalpost"] = $this->Post->fetchAllposts();
        $data["server"] = server_stat();
        $this->load->view('backoffice/home', $data);
    }

    function checklogin()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->Backoffice_M->authenticate($email, $password) == "AUTH") {
                $insertdata = array(
                    'idbackoffice' => $this->session->userdata('idbackoffice'),
                    'username' => $this->session->userdata('username'),
                    'logintime' => date('Y-m-d H:i:s'),
                    'sessionkey' => $this->session->userdata('sessionkey'),
                );

                $this->Loginrecords->logintime($insertdata);
                redirect(base_url() . "backoffice/home");
            } elseif ($this->Backoffice_M->authenticate($email, $password) == "NOAUTH") {



                $data['error'] = "Invalid password";
                $data['title'] = "Log-In";
                $this->load->view('backoffice/login', $data);
            } else {

                $data['error'] = "User does not exists";
                $data['title'] = "Log-In";
                $this->load->view('backoffice/login', $data);
            }



            //  $this->load->view('formsuccess');
        }
    }

    function logout($passdata = NULL)
    {

        $this->Loginrecords->logouttime($this->session->userdata('sessionkey'));

        $this->session->unset_userdata('name');
        $this->session->unset_userdata('idbackoffice');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('sessionkey');
        $this->session->sess_destroy();
        if ($passdata != NULL) {
            $data['passmessage'] = "Password Successfully updated. Please login to continiue.";
        }

        $data['error'] = "You have successfully logout.";
        $data['title'] = "Log-In";
        $this->load->view('backoffice/login', $data);
    }

    function category()
    {
        $data['fetchcat'] = $this->Category->fetchParentCategory();

        $data['treeview'] = $this->Category->get_categories();

        $data['title'] = "Catergory";
        $this->load->view('backoffice/category', $data);
    }

    function deletecategory($idcategory)
    {

        $this->Category->deletecategory($idcategory);
        redirect(base_url() . "backoffice/category");
    }




    function addcategory()
    {


        $this->form_validation->set_rules('categoryname', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('caturl', 'Category Name', 'trim|required|is_unique[category.caturl]');
        $this->form_validation->set_rules('parentid', 'Parentid', 'trim');
        $this->form_validation->set_rules('categorydes', 'Category Description', 'trim');
        if ($this->form_validation->run() == FALSE) {
            $this->category();
        } else {

            $categoryname = $this->input->post('categoryname');
            $caturl = $this->input->post('caturl');
            $parentid = $this->input->post('parentid');
            $categorydes = $this->input->post('categorydes');
            $icon = $this->input->post('icon');
            $categoryimage = $this->input->post('categoryimage');
            $cartegorydata = array(
                'categoryname' => $categoryname,
                'parentid' => $parentid,
                'categorydes' => $categorydes,
                'categoryimage' => $categoryimage,
                'icon' => $icon,
                'caturl' => $caturl
            );

            $this->Category->insertCategory($cartegorydata);
            $this->session->set_flashdata('catcreate', 'The category ' . $categoryname . ' has been successfully created');
            redirect(base_url() . "backoffice/category");
        }
    }

    function updateCategory($idcategory = NULL)
    {

        if ($idcategory == Null | $this->Category->get_category_by_ID($idcategory) == NULL) {
            $this->alert('Error', "Do not modify the url unnessary");
        } else {
            $data['fetchcat'] = $this->Category->fetchParentCategory();
            $data['title'] = "Update Category";
            $data['category'] = $this->Category->get_category_by_ID($idcategory);
            $this->load->view('backoffice/updatecategory', $data);
        }
    }
    function updatecat($idcategory)
    {
        $this->form_validation->set_rules('categoryname', 'Categoryname', 'trim|required');
        $this->form_validation->set_rules('parentid', 'Parentid', 'trim');
        $this->form_validation->set_rules('categorydes', 'Category Description', 'trim');
        $this->form_validation->set_rules('caturl', 'Category Url', 'trim|is_unique_update[category.caturl@idcategory@' . $idcategory . ']');
        if ($this->form_validation->run() == FALSE) {
            $this->updateCategory($idcategory);
        } else {

            $categoryname = $this->input->post('categoryname');
            $parentid = $this->input->post('parentid');
            $categorydes = $this->input->post('categorydes');
            $icon = $this->input->post('icon');
            $caturl = $this->input->post('caturl');
            $categoryimage = $this->input->post('categoryimage');
            $cartegorydata = array(
                'categoryname' => $categoryname,
                'parentid' => $parentid,
                'categorydes' => $categorydes,
                'categoryimage' => $categoryimage,
                'icon' => $icon,
                'caturl' => create_slug($caturl)
            );

            $this->Category->UpdateCategory($cartegorydata, $idcategory);
            $this->session->set_flashdata('catupdate', 'The category ' . $categoryname . ' has been successfully updated');
            $this->updateCategory($idcategory);
        }
    }


    /* -------------End category----------------------- */
    /* -------------Change Password----------------------- */

    function changepassword()
    {
        $data['title'] = "Change Password";

        $this->load->view('backoffice/changepassword', $data);
    }

    function updatepassword()
    {

        $this->form_validation->set_rules('cpassword', 'Current password', 'trim|required|callback_checkOldPassword');
        $this->form_validation->set_rules('npassword', 'New password', 'trim|required');
        $this->form_validation->set_rules('cfpassword', 'Confirrm password', 'trim|required|matches[npassword]');
        if ($this->form_validation->run() == FALSE) {
            $this->changepassword();
        } else {

            $password = $this->input->post('npassword');

            $passdata = array(
                'table' => 'backoffice',
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'idbackoffice' => $this->session->userdata('idbackoffice')
            );

            $this->Backoffice_M->updatepass($passdata);
            //  $this->session->set_flashdata('passmessage',"Password Successfully updated. Please logout to continiue"); 


            $this->logout('passdata');
        }
    }

    public function checkOldPassword($oldPassword)
    {
        if (password_verify($this->input->post('cpassword'), $this->session->userdata('password'))) {
            return true;
        } else {
            $this->form_validation->set_message('checkOldPassword', 'Wrong old password.');
            return false;
        }
    }

    /* ----------------------------Media----------------------------- */

    /* ----------------------------Media----------------------------- */

    function media()
    {
        $data['title'] = "Media";

        $config = array();
        $config["base_url"] = base_url() . "backoffice/media";
        $total_row = $this->Media->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 16;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        //$config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = (int) ($this->uri->segment(3));
        } else {
            $page = 1;
        }
        $data['fetchmedia'] = $this->Media->fetchMedia();
        $data["links"] = explode('&nbsp;', $this->pagination->create_links());

        $this->load->view('backoffice/media', $data);
    }

    function file_upload()
    {
        $this->form_validation->set_rules('name', 'Caption', 'trim|required');

        if (empty($_FILES['images']['name'][0])) {
            $this->form_validation->set_rules('images', 'File', 'trim|required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->media();
        } else {
            $upload_error = array();
            $imagesCount = count($_FILES['images']['name']);
            for ($i = 0; $i < $imagesCount; $i++) {
                $_FILES['file']['name'] = $_FILES['images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['images']['size'][$i];

                // File upload configuration
                $uploadPath = 'uploads/';
                $config['upload_path'] = './' . $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc';
                $config['max_size'] = '300000';

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                $ret_file = $this->upload->do_upload('file');
                // Uploaded file data

                if ($ret_file) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['name'] = $this->input->post('name');
                    $uploadData[$i]['album'] = $this->input->post('album');
                    $uploadData[$i]['createdate'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['type'] = $fileData['file_type'];
                    $uploadData[$i]['path'] = $uploadPath . $fileData['file_name'];
                    $uploadData[$i]['mediakey'] = session_key(45);
                } else {

                    $upload_error = $this->upload->display_errors();
                }
            }

            if (!empty($uploadData)) {
                // Insert images data into the database
                $insert = $this->Media->insertMedia($uploadData);

                // Upload status message
                $upload_error = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                $this->session->set_flashdata('upload_error', $upload_error);
            }

            redirect(base_url() . "backoffice/media");
        }
    }

    function mediadetails($mediakey = NULL)
    {
        if ($mediakey == Null | $this->Media->fetchmediabyKEY($mediakey) == NULL) {
            $this->alert('Error', "Do not modify the url unnessary");
        } else {
            $data['details'] = $this->Media->fetchmediabyKEY($mediakey);
            $data['title'] = "Media Details";

            $this->load->view('backoffice/singlemedia', $data);
        }
    }
    /* -------------------------Post Activity------------------------------- */

    function postcreate($post_type = 'post')
    {

        $post_key = $this->Post->postkeygen($post_type);

        redirect(base_url() . "backoffice/newpost/" . $post_key);
    }

    function newpost($post_key)
    {

        // $data['category'] = $this->Category->fetchAllCategory();
        $data['treeview'] = $this->Category->get_categories();
        $data['post'] = $this->Post->fetch_post($post_key);
        $data['title'] = "New Post";
        $data['authors'] = $this->Backoffice_M->getAlluser2();
        $data["issue"] = $this->IssueModel->get_all_issues();
        $this->load->view('backoffice/new_post', $data);
    }

    function svaepostcontent($post_key)
    {
        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/newpost/" . $post_key); /* to restrict direct access through url */

        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[150]');
        //$this->form_validation->set_rules('posturl', 'Post URL', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('content', 'Content', 'trim|max_length[88500000]');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|max_length[450]');
        $this->form_validation->set_rules('abstract', 'Post abstract', 'trim|max_length[5000]');
        $this->form_validation->set_rules('post_author', 'Author', 'trim|max_length[80]');
        if ($this->form_validation->run() == FALSE) {


            $this->newpost($post_key);
        } else {

            if ($this->Post->is_title_exist($this->input->post('title'), $post_key)) {


                $this->session->set_flashdata('same_title', 'Another post has same title. Please change it..');
                $this->newpost($post_key);
            } else {
                $post_author = implode(',', $_REQUEST['post_author']);
                $title = $this->input->post('title');
                $tags = $this->input->post('tags');
                $abstract = $this->input->post('abstract');
                $content = $this->input->post('content');
                $issue = $this->input->post("issue");
                if ($this->input->post('category') != null) {
                    $category = implode(",", $this->input->post('category'));
                } else {
                    $category = "1";
                }

                if ($this->input->post('posturl')) {
                    $posturl = create_slug($this->input->post('posturl'));
                } else {

                    $posturl = create_slug($this->input->post('title'));
                }

                $postdata = array(
                    'post_key' => $post_key,
                    'post_author' => $post_author,
                    'title' => $title,
                    'tags' => $tags,
                    'abstract' => $abstract,
                    'category' => $category,
                    'content' => $content,
                    'posturl' => $posturl,
                    'issue' => $issue,
                    'update_date' => date("Y-m-d H:i:s"),
                    'update_status' => 'Y',
                    'list_status' => 'Y'
                );

                $this->Post->insertPost($postdata);
                $this->Tags->insertTags($tags, $post_key);
                redirect(base_url() . "backoffice/newpost/" . $post_key);
            }
        }
    }
    function publishstatus($post_key)
    {
        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/newpost/" . $post_key); /* to restrict direct access through url */

        $postdata = array(
            'post_key' => $post_key,
            'publish_date' => date("Y-m-d H:i:s"),
            'publish_status' => 'Y'
        );

        $this->Post->postpublish($postdata);
        redirect(base_url() . "backoffice/newpost/" . $post_key);
    }

    function uploadcover($post_key)
    {

        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/newpost/" . $post_key); /* to restrict direct access through url */


        if (empty($_FILES['coveriamge']['name'])) {
            $this->form_validation->set_rules('coveriamge', 'Cover Image', 'trim|required');
        } else {

            $this->form_validation->set_rules('coveriamge', 'Cover Image', 'trim');
        }
        if ($this->form_validation->run() == FALSE) {

            $this->newpost($post_key);
        } else {
            $upload_error = array();
            // $imagesCount = count($_FILES['coveriamge']['name']);

            $_FILES['file']['name'] = $_FILES['coveriamge']['name'];
            $_FILES['file']['type'] = $_FILES['coveriamge']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['coveriamge']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['coveriamge']['error'];
            $_FILES['file']['size'] = $_FILES['coveriamge']['size'];


            // File upload configuration
            $uploadPath = 'uploads/';
            $config['upload_path'] = './' . $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '6000';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // Upload file to server
            $ret_file = $this->upload->do_upload('file');
            $image_data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path'];
            ;
            $config['maintain_ratio'] = FALSE;
            $config['width'] = 840;
            $config['height'] = 560;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();


            // Uploaded file data

            if ($ret_file) {
                $fileData = $this->upload->data();
                $data = array(
                    'post_key' => $post_key,
                    'coveriamge' => $uploadPath . $fileData['file_name']
                );
            } else {

                $upload_error = $this->upload->display_errors();
            }

            $insert = $this->Post->updateCover($data);

            // Upload status message
            $upload_error = $insert ? 'Cover image uploaded successfully.' : 'Some problem occurred, please try again.';
            $this->session->set_flashdata('upload_error', $upload_error);
            redirect(base_url() . "backoffice/newpost/" . $post_key . '#cover');
        }
    }


    function postarchive($post_type = "post")
    {

        $data['post'] = $this->Post->fetchAllposts_type($post_type);
        $data['posttrash'] = $this->Post->fetchTrashposts($post_type);
        $data['title'] = "Page/Post Archive";
        $this->load->view('backoffice/post_archive', $data);
    }


    function deletepost($post_key)
    {

        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/postarchive/"); /* to restrict direct access through url */
        $data = array(

            'post_key' => $post_key,
            'list_status' => 'N'

        );

        $this->Post->deletePost($data);
        redirect(base_url() . "backoffice/postarchive");
    }

    function getpostagain($post_key)
    {

        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/postarchive/"); /* to restrict direct access through url */
        $data = array(

            'post_key' => $post_key,
            'list_status' => 'Y'

        );

        $this->Post->GetPostAgain($data);
        redirect(base_url() . "backoffice/postarchive#tab2info");
    }


    function deletepostpermanently($post_key)
    {

        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/postarchive/"); /* to restrict direct access through url */
        $data = array(

            'post_key' => $post_key,

        );

        $this->Post->deletepostpermanently($data);
        redirect(base_url() . "backoffice/postarchive#tab2info");
    }

    function setkey()
    {

        $this->Post->setKey();
    }

    /*Admin comments*/


    function approve($idcomments)
    {

        $this->Comments->appoveComment($idcomments);

        redirect(base_url() . "backoffice/home");
    }

    function deleteComment($idcomments)
    {

        $this->Comments->deleteComment($idcomments);

        redirect(base_url() . "backoffice/home");
    }

    /*--------------databasebackup----------------*/

    function backup()
    {

        $data['title'] = "Back-up Data";
        $this->load->view('backoffice/backuppage', $data);
    }



    function database_backup()
    {

        $this->load->dbutil();

        $prefs = array(
            'format' => 'sql',
            'filename' => 'my_db_backup.sql'
        );


        $backup = &$this->dbutil->backup($prefs);

        $db_name = 'backup-on-' . date("Y-m-d") . '.sql';
        //$save = 'backup/'.$db_name;

        $this->load->helper('file');
        //write_file($save, $backup); 
        $this->load->helper('download');
        force_download($db_name, $backup);
    }



    function upload_backup()
    {

        $this->load->library('zip');


        $path = FCPATH . 'uploads';

        $this->zip->read_dir($path, FALSE);

        // Download the file to your desktop. Name it "my_backup.zip"
        $downloadzip = 'uploads-' . date("Y-m-d");
        $this->zip->download($downloadzip);
    }

    /*-------------------------news letter---------------------------------*/

    function newsletter()
    {

        $data['title'] = "News-Letter";
        $data['newsletter'] = $this->Post->newsletter();
        $data['maillist'] = $this->Subscription->fetch_mail();
        $this->load->view('backoffice/newsletter', $data);
    }

    function sendnewsletter()
    {


        if (!$_SERVER['HTTP_REFERER']) {

            redirect(base_url() . "backoffice/sendnewsletter");
        }

        $this->form_validation->set_rules('mail', 'Mail', 'trim|required');
        $this->form_validation->set_rules('newsletter', 'News letter', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->newsletter();
        } else {
            $mails = $this->input->post('mail');
            $message = $this->input->post('newsletter');

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                '_smtp_auth' => TRUE,
                'smtp_port' => 465,
                'smtp_user' => 'agniwebdesign@gmail.com',
                'smtp_pass' => 'Rohitvemula@112358',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n",
                'priority' => 3
            );
            $this->email->initialize($config);



            $this->email->from('omegist@gmail.com', 'Omegist');
            $this->email->to($mails);
            $this->email->subject($this->Site->getSitedata()->name . 'News Letter');
            $this->email->message($message);
            //         $this->load->library('encrypt');
            $email_send = $this->email->send();

            if ($email_send) {


                redirect(base_url() . "backoffice/home/email_success");
            } else {
                echo $this->email->print_debugger();
            }
        }
    }

    function siteinfo()
    {
        $data['title'] = "Site Info";
        $data['siteinfo'] = $this->Site->getSitedata();
        $this->load->view('backoffice/siteinfo', $data);
    }

    function updatesiteinfo()
    {
        if (!$_SERVER['HTTP_REFERER'])
            redirect(base_url() . "backoffice/siteinfo"); /* to restrict direct access through url */

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[110]');
        $this->form_validation->set_rules('url', 'Site URL', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('slogan', 'Slogan', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[1500]');
        $this->form_validation->set_rules('add1', 'Banner Image', 'trim|max_length[1050]');
        $this->form_validation->set_rules('add2', 'Banner Link', 'trim|max_length[1050]');
        if ($this->form_validation->run() == FALSE) {


            $this->siteinfo();
        } else {

            $name = $this->input->post('name');
            $slogan = $this->input->post('slogan');
            $description = $this->input->post('description');
            $url = $this->input->post('url');
            $add1 = $this->input->post('add1');
            $add2 = $this->input->post('add2');
            $postdata = array(
                'name' => $name,
                'description' => $description,
                'slogan' => $slogan,
                'url' => $url,
                'add1' => $add1,
                'add2' => $add2

            );

            $this->Site->insertSiteInfo($postdata);

            redirect(base_url() . "backoffice/siteinfo");
        }
    }


    function updatesitelogo()
    {

        $upload_error = array();
        $_FILES['file']['name'] = $_FILES['logo']['name'];
        $_FILES['file']['type'] = $_FILES['logo']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['logo']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['logo']['error'];
        $_FILES['file']['size'] = $_FILES['logo']['size'];

        // File upload configuration
        $uploadPath = 'uploads/siteetc/';
        $config['upload_path'] = './' . $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '560';

        // Load and initialize upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Upload file to server
        $ret_file = $this->upload->do_upload('file');
        // Uploaded file data

        if ($ret_file) {
            $fileData = $this->upload->data();
            $uploadData = array('logo' => $uploadPath . $fileData['file_name']);
        } else {

            $upload_error = $this->upload->display_errors();
        }
        if (!empty($uploadData)) {
            // Insert images data into the database
            $insert = $this->Site->insertSiteInfo($uploadData);
            // Upload status message
            $upload_error = $insert ? 'Files uploaded successfully.' : 'Some problem occured, please try again.';
            $this->session->set_flashdata('upload_error', implode(" ", $upload_error));
        }

        redirect(base_url() . "backoffice/siteinfo");
    }

    function user()
    {
        $data['title'] = "User";
        $data['users'] = $this->Backoffice_M->getAllUser();
        $this->load->view('backoffice/user', $data);
    }


    function adduser($idbackoffice = NULL)
    {

        if ($idbackoffice != NULL) {
            $data['title'] = "Add User";
            $data['user'] = $this->Backoffice_M->getIndividual($idbackoffice);
            $this->load->view('backoffice/indiuser', $data);
        } else {

            $data['title'] = "Add User";
            //          $data['user'] = $this->Backoffice_M->getIndividual($idbackoffice);
            $this->load->view('backoffice/indiuser', $data);
        }
    }

    function updateuserinfo($idbackoffice = null)
    {

        if ($idbackoffice == NULL) {
            if (!$_SERVER['HTTP_REFERER'])
                redirect(base_url() . "backoffice/user"); /* to restrict direct access through url */

            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[110]');
            // $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[110]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[110]');
            if ($this->form_validation->run() == FALSE) {
                $this->adduser();
            } else {

                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                /*$designation = $this->input->post('designation');
                $social1 = $this->input->post('social1');
                $social2 = $this->input->post('social2');
                $social3 = $this->input->post('social3');
                $social4 = $this->input->post('social4');*/
                $descriptions = $this->input->post('descriptions');
                $postdata = array(
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    /* 'designation' => $designation,
                    'social1' => $social1,
                    'social2' => $social2,
                    'social3' => $social3,
                    'social4' => $social4,*/
                    'descriptions' => $descriptions,

                );

                $last_id = $this->Backoffice_M->insertUserInfo($postdata);

                redirect(base_url() . "backoffice/adduser/" . $last_id);
            }
        } else {

            if (!$_SERVER['HTTP_REFERER'])
                redirect(base_url() . "backoffice/user"); /* to restrict direct access through url */

            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[110]');
            // $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[110]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[110]');
            if ($this->form_validation->run() == FALSE) {
                $this->adduser();
            } else {

                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                /* $designation = $this->input->post('designation');
                $social1 = $this->input->post('social1');
                $social2 = $this->input->post('social2');
                $social3 = $this->input->post('social3');
                $social4 = $this->input->post('social4');*/
                $descriptions = $this->input->post('descriptions');
                $postdata = array(
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    /*'designation' => $designation,
                    'social1' => $social1,
                    'social2' => $social2,
                    'social3' => $social3,
                    'social4' => $social4,*/
                    'descriptions' => $descriptions,

                );

                $this->Backoffice_M->updateUserInfo($postdata, $idbackoffice);
                redirect(base_url() . "backoffice/adduser/" . $idbackoffice);
            }
        }
    }

    function updateuserlogo($idbackoffice)
    {
        $upload_error = array();
        $_FILES['file']['name'] = $_FILES['profilepic']['name'];
        $_FILES['file']['type'] = $_FILES['profilepic']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['profilepic']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['profilepic']['error'];
        $_FILES['file']['size'] = $_FILES['profilepic']['size'];

        // File upload configuration
        $uploadPath = 'uploads/siteetc/';
        $config['upload_path'] = './' . $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '800';

        // Load and initialize upload library
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Upload file to server
        $ret_file = $this->upload->do_upload('file');
        // Uploaded file data

        if ($ret_file) {
            $fileData = $this->upload->data();
            $uploadData = array('profilepic' => $uploadPath . $fileData['file_name']);
        } else {

            $upload_error = $this->upload->display_errors();
        }
        if (!empty($uploadData)) {
            // Insert images data into the database
            $insert = $this->Backoffice_M->updateUserInfo($uploadData, $idbackoffice);
            // Upload status message
            $upload_error = $insert ? 'Files uploaded successfully.' : 'Some problem occured, please try again.';
            $this->session->set_flashdata('upload_error', implode(" ", $upload_error));
        }

        redirect(base_url() . "backoffice/adduser/" . $idbackoffice);
    }

    // delete author

    function deleteuser($idbackoffice)
    {
        $this->Backoffice_M->deleteuser($idbackoffice);
        $this->Post->updatepublishstatus($idbackoffice);

        redirect(base_url() . "backoffice/user/");
    }


    function deletemedia($mediakey)
    {
        $media = $this->Media->fetchmediabyKEY($mediakey);

        $this->Media->deleteMedia($mediakey);


        unlink($media->path);
        redirect(base_url() . "backoffice/media/");
    }


    function alert($type, $message)
    {
        $data['title'] = "ALERT";
        $data['type'] = $type;
        $data['message'] = $message;
        $this->load->view('backoffice/alert', $data);
    }

    function filemanager()
    {
        $data['title'] = "File Manager";
        $this->load->view('backoffice/codeeditor', $data);
    }

    function ckeditor_upload()
    {
        $message = "";
        if (empty($_FILES['upload']['name'][0])) {
            $message = "Image field should not be empty";
            $function_number = $this->input->get('CKEditorFuncNum');
            $url = '';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        } else {
            $upload_error = array();
            // $imagesCount = count($_FILES['coveriamge']['name']);
            $uploadData = array();
            $_FILES['file']['name'] = $_FILES['upload']['name'];
            $_FILES['file']['type'] = $_FILES['upload']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'];

            // File upload configuration
            $uploadPath = 'uploads/';
            $config['upload_path'] = './' . $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2000';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // Upload file to server
            $ret_file = $this->upload->do_upload('file');
            if ($ret_file) {
                $fileData = $this->upload->data();
                $uploadData[0]['name'] = $fileData['file_name'];
                // $uploadData[0]['album'] = $this->input->post('album');
                $uploadData[0]['createdate'] = date("Y-m-d H:i:s");
                $uploadData[0]['type'] = $fileData['file_type'];
                $uploadData[0]['path'] = $uploadPath . $fileData['file_name'];
                $uploadData[0]['mediakey'] = session_key(45);
            } else {

                $upload_error = $this->upload->display_errors();
            }


            if (!empty($uploadData)) {
                // Insert images data into the database
                $insert = $this->Media->insertMedia($uploadData);
                // Upload status message
                $upload_error = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                $this->session->set_flashdata('upload_error', $upload_error);
            }
            $function_number = $this->input->get('CKEditorFuncNum');
            $url = base_url() . $uploadPath . $fileData['file_name'];

            foreach ($upload_error as $item) {
                $message .= $item . "<br/>";
            }

            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }



    function createissue($idissue=null)
    {
        if ($idissue == null) {

            $data['title'] = "Create Issue";
            $data['type'] = 'C';
            $data["issues"] = $this->IssueModel->get_all_issues();

            $this->load->view('backoffice/createissue', $data);
        } else {


            $data['title'] = "Update Issue";
            $data['type'] = 'U';
            $data['update'] = $this->IssueModel->get_issue_by_id($idissue);
            $data["issues"] = $this->IssueModel->get_all_issues();

            $this->load->view('backoffice/createissue', $data);




        }
    }


    function createissuecontroller()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->createissue();
        } else {

            
            $data = array(
                'name' => $this->input->post('name'),
                'image' => $this->input->post('image'),
                'date' => $this->input->post('date'),
                'description' => $this->input->post('description'),
                'create_date' => date('Y-m-d H:i:s')
);
            if($this->input->post("type")=="C"){
            // $this->load->model('IssueModel');
            $this->IssueModel->create_issue($data);
        }else{
           $idissue = $this->input->post("idissue");

            $this->IssueModel->update_issue($idissue, $data);
        }
            redirect(base_url() . "backoffice/createissue");
        }
    }

    public function deleteissue($idissue)
    {
        // $this->load->model('IssueModel');
        $this->IssueModel->delete_issue($idissue);
        redirect(base_url() . "backoffice/createissue");
    }




}