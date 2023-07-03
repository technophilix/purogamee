<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('crypto_rand_secure')) {
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
}
if (!function_exists('session_key')) {
    function session_key($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
        }

        return $token;
    }
}

if (!function_exists('imageType')) {
    function imageType($type)
    {

        switch ($type) {
            case "application/msword":
                return "word";
                break;
            case "image/png":
                return "image";
                break;
            case "image/gif":
                return "image";
                break;
            case "image/jpeg":
                return "image";
                break;
            case "application/vnd.openxmlformats-officedocument":
                return "word";
                break;
            case "application/pdf":
                return "pdf";
                break;
            default:
                return "kichuna";
        }
    }
}

if (!function_exists('create_slug')) {
    function create_slug($title)
    {
        $title = str_replace('?', '', $title);
        $title = str_replace(',', '', $title);
        $title = str_replace("'", "", $title);
        $title = str_replace('-', ' ', $title);
        $seo_st = str_replace(' ', '-', $title);
        $seo_alm = str_replace('--', '-', $seo_st);
        $title_seo = str_replace(' ', '', $seo_alm);
        $title_seo = str_replace('.', '', $title_seo);
        $title_seo = str_replace('â€¦', '', $title_seo);
        $title_seo = str_replace('*', '', $title_seo);
        //$title_seo = str_replace('?','' , $title_seo);
        //$title_seo = str_replace('?','' , $title_seo);
        return mb_strtolower($title_seo, 'UTF-8');
    }
}


if (!function_exists('chekinstring')) {
    function chekinstring($string, $checkvalue)
    {

        $HiddenProducts =   explode(',', $string);
        if (in_array($checkvalue, $HiddenProducts)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('get_category')) {
    function  get_category($category, $icon = TRUE)

    {

        $ci = &get_instance();
        $first =    explode(',', $category)[0];
        $cat_name = $ci->Category->get_category_by_ID($first);

        if ($cat_name->icon == "" | $cat_name->icon == NULL | $icon == FALSE) {

            return $cat_name->categoryname;
        } else {

            return "<i class= '{$cat_name->icon}'></i> " . $cat_name->categoryname;
        }
    }
}




if (!function_exists('get_title')) {
    function get_title($post_key)
    {
        $ci = &get_instance();
        $sql = "select * from post where post_key=?";
        $query = $ci->db->query($sql, array($post_key));
        return $query->row()->title;
    }
}

if (!function_exists('post_gist')) {

    function post_gist($title, $cutOffLength = 650)
    {

        $charAtPosition = "";
        $titleLength = strlen($title);

        do {
            $cutOffLength++;
            $charAtPosition = substr($title, $cutOffLength, 1);
        } while ($cutOffLength < $titleLength && $charAtPosition != " ");

        return substr($title, 0, $cutOffLength) . '...';
    }
}

function getLogo()
{
    $CI = &get_instance();
    $CI->load->model('Site');
    $logopath = $CI->Site->getSitedata()->logo;

    if ($logopath != NULL | $logopath != "") {

        return base_url() . $logopath;
    } else {

        return base_url() . "includes/images/logobackoffice.png";
    }
}



function getAuthorfromID($post_author)
{
    $CI = &get_instance();
    $CI->load->model('Backoffice_M');
    $authorname = $CI->Backoffice_M->getIndividual($post_author)->name;
    return $authorname;
}


function getDescription()
{
    $CI = &get_instance();
    $CI->load->model('Site');
    $descreiption = $CI->Site->getSitedata()->description;
    if ($descreiption !== NULL) {
        return $descreiption;
    } else {
        return "";
    }
}

function getSlogan()
{

    $CI = &get_instance();
    $CI->load->model('Site');
    $descreiption = $CI->Site->getSitedata()->slogan;
    if ($descreiption !== NULL) {
        return $descreiption;
    } else {
        return "";
    }
}
function getAddban()
{

    $CI = &get_instance();
    $CI->load->model('Site');
    $banimage = $CI->Site->getSitedata()->add1;
    $banlink = $CI->Site->getSitedata()->add2;
    //if($banimage==NULL){
    //
    //    $banimage = base_url()."includes/images/addban1.jpg";
    //} 
    return array($banimage, $banlink);
}

function getAuthorImgfromID($post_author)
{
    $CI = &get_instance();
    $CI->load->model('Backoffice_M');
    $authorimg = $CI->Backoffice_M->getIndividual($post_author)->profilepic;

    if ($authorimg !== NULL) {
        return base_url() . $authorimg;
    } else {
        return getLogo();
    }
}


function getAuthorDes($post_author)
{
    $CI = &get_instance();
    $CI->load->model('Backoffice_M');
    $authorimg = $CI->Backoffice_M->getIndividual($post_author)->descriptions;

    if ($authorimg !== NULL) {
        return $authorimg;
    } else {
        return "";
    }
}

function getAuthorDesig($post_author)
{
    $CI = &get_instance();
    $CI->load->model('Backoffice_M');
    $authorimg = $CI->Backoffice_M->getIndividual($post_author)->designation;

    if ($authorimg !== NULL) {
        return $authorimg;
    } else {
        return "";
    }
}

function getPostParentCategory($idcategory, $child = FALSE, $l, $u)
{
    $catarray = array();
    if (!$child) {
        $catarray[0] = $idcategory;
    } else {
        $catarray[0] = $idcategory;
        $CI = &get_instance();
        $CI->load->model('Category');
        $result = $CI->Category->get_sub_categories($idcategory);
        $i = 1;

        if ($result != NULL) {
            foreach ($result as $rst) {
                $catarray[$i] = $rst->idcategory;
                $i++;
            }
        }
    }
    $C_I = &get_instance();
    $cat_post =  $C_I->Post->catpost($catarray, $l, $u);
    return $cat_post;
}

function add_responsive_class($content)
{

    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML(utf8_decode($content));

    $imgs = $document->getElementsByTagName('img');
    $tables = $document->getElementsByTagName('table');
    foreach ($imgs as $img) {
        $img->setAttribute('class', 'img-fluid');
        // $img->removeAttribute('style');
    }

    foreach ($tables as $tab) {
        $tab->setAttribute('class', 'table-responsive table-hover table-striped');
        $tab->removeAttribute('border');
    }
   
    $html = $document->saveHTML();
     while(preg_match_all('#(<span.*?>)(.*?)(</span>)#', $html)) {  
        $html = preg_replace('#(<span.*?>)(.*?)(</span>)#', '$2', $html);
      }
    return $html;
}


/*function getServerLoad()
    {
        $load = null;

        if (stristr(PHP_OS, "win"))
        {
            $cmd = "wmic cpu get loadpercentage /all";
            @exec($cmd, $output);

            if ($output)
            {
                foreach ($output as $line)
                {
                    if ($line && preg_match("/^[0-9]+\$/", $line))
                    {
                        $load = $line;
                        break;
                    }
                }
            }
        }
        else
        {
            if (is_readable("/proc/stat"))
            {
                // Collect 2 samples - each with 1 second period
                // See: https://de.wikipedia.org/wiki/Load#Der_Load_Average_auf_Unix-Systemen
                $statData1 = _getServerLoadLinuxData();
                sleep(1);
                $statData2 = _getServerLoadLinuxData();

                if
                (
                    (!is_null($statData1)) &&
                    (!is_null($statData2))
                )
                {
                    // Get difference
                    $statData2[0] -= $statData1[0];
                    $statData2[1] -= $statData1[1];
                    $statData2[2] -= $statData1[2];
                    $statData2[3] -= $statData1[3];

                    // Sum up the 4 values for User, Nice, System and Idle and calculate
                    // the percentage of idle time (which is part of the 4 values!)
                    $cpuTime = $statData2[0] + $statData2[1] + $statData2[2] + $statData2[3];

                    // Invert percentage to get CPU time, not idle time
                    $load = 100 - ($statData2[3] * 100 / $cpuTime);
                }
            }
        }

        return $load;
    }
*/

function _getServerLoadLinuxData()
{
    if (is_readable("/proc/stat")) {
        $stats = @file_get_contents("/proc/stat");

        if ($stats !== false) {
            // Remove double spaces to make it easier to extract values with explode()
            $stats = preg_replace("/[[:blank:]]+/", " ", $stats);

            // Separate lines
            $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
            $stats = explode("\n", $stats);

            // Separate values and find line for main CPU load
            foreach ($stats as $statLine) {
                $statLineData = explode(" ", trim($statLine));

                // Found!
                if (
                    (count($statLineData) >= 5) &&
                    ($statLineData[0] == "cpu")
                ) {
                    return array(
                        $statLineData[1],
                        $statLineData[2],
                        $statLineData[3],
                        $statLineData[4],
                    );
                }
            }
        }
    }

    return null;
}

function server_stat()
{
    $a = array(
        "cpu" => 50,
        "ram" => memory_usage()

    );


    return $a;
}

function memory_usage()
{



    return 8;
}
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'বছর',
        'm' => 'মাস',
        'w' => 'সপ্তাহ',
        'd' => 'দিন',
        'h' => 'ঘন্টা',
        'i' => 'মিনিট',
        's' => 'সেকেন্ড',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' আগে' : 'কিছুক্ষণ আগে';
}
