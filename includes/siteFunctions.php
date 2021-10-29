<?php

function getSlider() {
    $output = array();

    if ($ex = getList("SELECT * FROM tbl_slider WHERE slider_status='1' ORDER BY slider_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPosts($blg_main = '') {
    $where_main = '';
    $output = array();

    if ($blg_main != '')
        $where_main = " AND blg_main='" . $blg_main . "' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getMenuPosts($blg_main) {
    $where_main = '';
    $output = array();

    $where_main = " AND blg_main='" . $blg_main . "' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPostName($blg_id) {
    $output = '';
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_id='" . $blg_id . "'  ")) {
        while ($line = fetch_assoc($ex)) {
            $output = $line['blg_title'];
        }
    }
    return $output;
}

function getDetailPosts($blg_main = '') {
    $where_main = '';
    $output = array();

    if (!empty($blg_main)) {
        $where_main = " AND blg_main='$blg_main' ";

        if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
            while ($line = fetch_assoc($ex)) {
                $output[] = $line;
            }
        }
    }
    return $output;
}

function getHomePosts() {
    $where_main = '';
    $output = array();

    $where_main = " AND blg_home='1' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getOffers() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_offer WHERE offer_status='1' ORDER BY offer_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getNews() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_news WHERE news_status='1' ORDER BY news_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getServicesPosts() {
    $output = array();

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' ORDER BY blg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getOtherServicesPosts() {
    $where_main = '';
    $output = array();

    $where_main = " AND blg_main='5' ";

    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' " . $where_main)) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPost($id) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' AND blg_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getOffer($id) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_offer WHERE offer_status='1' AND offer_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPostBySlug($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blog WHERE blg_status='1' AND blg_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPackageBySlug($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_packages WHERE pkg_status='1' AND pkg_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getAreaBySlug($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_practice_areas WHERE pa_status='1' AND pa_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getNewsBySlug($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_news WHERE news_status='1' AND news_slug='" . $slug . "' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getPostTitle($id) {
    $output = array();
    if ($ex = getList("SELECT blg_title FROM tbl_blog WHERE blg_id='" . $id . "' ")) {
        $output = fetch_assoc($ex);
    }
    return stripslashes($output['blg_title']);
}

function getVideoId($url) {
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
    return $matches[0];
}

function isSubPost($id, $slug) {
//$output = array();
    if ($ex = getList("SELECT blg_id FROM tbl_blog WHERE blg_main='" . $id . "' AND blg_slug='" . $slug . "' ")) {
        return true;
//$output = fetch_assoc($ex);
    }
    return false;
}

function getGallery() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_gallery WHERE gal_status='1' ORDER BY gal_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getFaqs() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_faqs WHERE fq_status='1' ORDER BY fq_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPackages() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_packages WHERE pkg_status='1' order by pkg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getPartners() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_partners WHERE par_status='1' order by par_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getTexts() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_texts WHERE 1 ")) {
        while ($line = fetch_assoc($ex)) {
            $output[$line['txt_type']] = $line;
        }
    }
    return $output;
}

function getTextField($type, $field) {
    $output = array();
    if ($ex = getList("SELECT `$field` FROM tbl_texts WHERE txt_type='$type' ")) {
        $rs = fetch_assoc($ex);
        $output = str($rs[$field]);
    }
    return $output;
}

function getCategories() {
   global $conn;
   $sql = "SELECT * FROM tbl_listings  WHERE list_type='categories' AND list_status='1' ORDER BY list_order ASC";
   $ex = $conn->query($sql);
   while($row=$ex->fetch_array()){
    ?>
    <li>
     <a href="<?= $path ?>news/<?= $row['list_slug']; ?>"><?= $row['list_title']; ?></a>
 </li>
 <?php

}

}

function getCategory($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_product_categories WHERE pcat_slug='$slug' AND pcat_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}
function getCategorybyId($id) {
   global $conn;
   $sql = "SELECT * FROM tbl_listings  WHERE list_type='categories' AND list_status='1' AND list_id='" . $id . "' ORDER BY list_order ASC";
   $ex = $conn->query($sql);
   while($row=$ex->fetch_array()){
      echo $row['list_title'];

  }
}


function getProducts($cat_id = '') {
    $output = array();
    $where = "";
    if (!empty($cat_id)) {
        $where = " AND (pcat_id='$cat_id' || pcat_type_id='$cat_id') ";
    }
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' $where ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function searchProducts($q) {
    $output = array();
    $where = " AND (p_title LIKE '%$q%' OR p_desc LIKE '%$q%' OR p_description LIKE '%$q%' OR p_specifications LIKE '%$q%' OR p_tags LIKE '%$q%') ";
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' $where ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getFeaturedProducts() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_status='1' AND p_featured='1' ORDER BY p_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getProduct($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_products WHERE p_slug='$slug' AND p_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getProductImages($pid) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_product_images WHERE pimg_status='1' AND p_id='$pid' ORDER BY pimg_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getBlog() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_status='1' ORDER BY b_order DESC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getRecentBlog() {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_status='1' ORDER BY b_date DESC LIMIT 0,4 ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getBlogPost($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_blogs WHERE b_slug='$slug' AND b_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getListings($type, $params = array()) {
    $output = array();
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function searchListings($type, $params = array(), $keywords = '') {
    $output = array();
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if (!empty($keywords)) {
        $where .= " AND (list_title LIKE '%$keywords%' "
        . " OR list_desc LIKE '%$keywords%' "
        . " OR list_detail LIKE '%$keywords%')";
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getListingsSingle($type, $params = array()) {
    $output = array();
    if (count($params) > 0) {
        foreach ($params as $key => $val) {
            $where .= " AND `$key`='$val' ";
        }
    }
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_type='$type' AND list_status='1' $where order by list_order ASC ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getListingsBySlug($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_listings WHERE list_slug='$slug' order by list_order ASC ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function getMenuPage($slug) {
    $output = array();
    if ($ex = getList("SELECT * FROM tbl_menu_pages WHERE page_name='$slug' AND page_status='1' ")) {
        $output = fetch_assoc($ex);
    }
    return $output;
}

function splitString($str, $tag = 'span') {
    $str = str($str);
    $str_ary = explode(' ', $str);
    $str_half = ceil(count($str_ary) / 2);
    $str_ary = explode(' ', $str, $str_half + 1);
    $string2 = $str_ary[$str_half];
    unset($str_ary[$str_half]);
    $string1 = implode(' ', $str_ary);
    return $string1 . " <$tag>" . $string2 . "</$tag>";
}

function getMenuPages($parent = 0) {
    $output = array();
    $where = "";
    if ($ex = getList("SELECT * FROM tbl_pages WHERE page_menu='1' AND page_status='1' $where ORDER BY page_id ASC ")) {
        while ($line = fetch_assoc($ex)) {
            $output[] = $line;
        }
    }
    return $output;
}

function getMenuParentName($parent) {
    $output = array();
    if (!empty($parent)) {
        if ($ex = getList("SELECT * FROM tbl_pages WHERE page_id='$parent' AND page_status='1'")) {
            $line = fetch_assoc($ex);
            $output = str($line['page_title']);
        }
    } else {
        $output = '';
    }
    return $output;
}
function getPagingforNews($table, $where, $limit, $tpage, $seprater, $pager) {
 global $conn;
 $nxt = '';
 $prv = '';
    $tbl_name = $table;  //your table name
    $adjacents = 5;
//  echo $_REQUEST['page'];
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages = $conn->query($query)->fetch_array();
    $total_pages = $total_pages[num];

    $targetpage = $tpage; //your file name  (the name of this file)
//  $limit = 12;
//  $_GET['pager']          //how many items to show per page
    $page = $pager;
    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $seprator = $seprater;

    $sql = "SELECT * from $tbl_name $where  LIMIT $start, $limit";

    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class=\"pagination-center\">";
        $pagination .= "<ul>";
//previous button


//pages
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li><span class=\"current\">$counter</span></li>";
                else
                    $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
                $pagination .= "...";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a></li>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=1\">1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=2\">2</a></li>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
                $pagination .= "...";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a></li>";
            }
//close to end; only hide early pages
            else {
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=1\">1</a></li>";
                $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=2\">2</a></li>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a></li>";
                }
            }
        }
//next button

        $pagination .= "</ul>\n";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}
