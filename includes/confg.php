<?php

$phpfile = $_REQUEST["page"];
$phpfilename = $phpfile . ".inc.php";
$phpcodefile = $phpfile . ".php";

if (file_exists("codes/" . $phpcodefile)) {
    include_once("codes/" . $phpcodefile);
}
if ($_REQUEST["page"] == 'index' || !isset($_REQUEST["page"])) {
    $includefile = "inc_pages/home.php";
} else if (file_exists("inc_pages/" . $phpfilename)) {
    if ($page_ex = getList("SELECT * FROM tbl_pages  WHERE page_link = '" . $_REQUEST['page'] . "' ")) {
        $page = fetch($page_ex);
        extract($page);
    }
    $includefile = "inc_pages/" . $phpfilename;
} else {
    if ($page_ex = getList("SELECT * FROM tbl_pages  WHERE page_link = '" . $_REQUEST['page'] . "' ")) {
        $page = fetch($page_ex);
        extract($page);
        $includefile = "inc_pages/page.php";
    } else {
        redirectTo('page-not-found');
        //        $includefile = "pages/404.inc.php";
    }
}
//pr($_SESSION);

if ($_REQUEST['mode'] == 'sandbox') {
    $sandbox = true;
}
$merit_list_count = '6th';

$texts = getTexts();
extract($texts);
