<?php session_start();
error_reporting(1);

if ($_SERVER['HTTP_HOST'] != 'localhost') {
    $hostname_dbconn = "localhost";
    $rating_dbname = "aimiedu_new_db";
    $username_dbconn = "aimiedu_ibs0";
    $password_dbconn = "$,z}WvUusD?=";


    $path = "https://aimi.edu.pk/";
} else {
    $hostname_dbconn = "localhost";
    $rating_dbname = "aimi";
    $username_dbconn = "root";
    $password_dbconn = "";

    $path = "http://localhost/aimi/";
}

global $conn;
$conn = mysqli_connect($hostname_dbconn, $username_dbconn, $password_dbconn, $rating_dbname) or die(mysqli_error());

$apath = $path . "apanel/";
define('PATH', $path);
define('APATH', $apath);
$domain = "aimi.com.pk";
$sandbox = false;

date_default_timezone_set('Asia/Karachi');

$site_sql = "SELECT * FROM `tbl_siteadmin` WHERE 1 ";
$site_ex = $conn->query($site_sql) or die(mysqli_error());
$aConfig = $site_ex->fetch_assoc();
extract($aConfig);

if ($site_info_data) :
    $site_data = (array) unserialize(stripslashes($site_info_data));
    extract($site_data);
endif;
if ($site_contact_data) :
    $site_data = (array) unserialize(stripslashes($site_contact_data));
    extract($site_data);
endif;
if ($site_meta_data) :
    $site_data = (array) unserialize(stripslashes($site_meta_data));
    extract($site_data);
endif;
if ($site_social_data) :
    $site_data = (array) unserialize(stripslashes($site_social_data));
    extract($site_data);
endif;
if (!empty($site_og_data) && isset($site_og_data)) :
    $site_data = (array) unserialize(stripslashes($site_og_data));
    extract($site_data);
endif;