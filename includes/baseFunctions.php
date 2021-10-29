<?php
function pr($array) {
    if (is_array($array)) {
        echo "<pre style='position:absolute;z-index:99999;'>";
        print_r($array);
        echo "</pre>";
    } else {
        echo $array;
    }
}
function str($text) {
    return stripslashes($text);
}
function showMsg() {
    if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
        echo '<div class="alert alert-success text-center" role="alert" style="font-weight:bold;">
        <strong>SUCCESS:</strong> ' . $_SESSION['successMsg'] . '
        </div>';
        unset($_SESSION['successMsg']);
    } else if (isset($_SESSION['infoMsg']) && !empty($_SESSION['infoMsg'])) {
        echo '<div class="alert alert-info text-center" role="alert" style="font-weight:bold;">
        <strong>INFORMATION:</strong> ' . $_SESSION['infoMsg'] . '
        </div></div>';
        unset($_SESSION['infoMsg']);
    } else if (isset($_SESSION['errorMsg']) && !empty($_SESSION['errorMsg'])) {
        echo '	<div class="alert alert-danger text-center" role="alert" style="font-weight:bold;">
        <strong>ERROR:</strong> ' . $_SESSION['errorMsg'] . '
        </div>';
        unset($_SESSION['errorMsg']);
    }
}
function num($val, $size = 2) {
    return number_format(floatval($val), $size, '.', '');
}
function randCode($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') {
    // ABCDEFGHIJKLMNOPQRSTUVWXYZ
    $chars_length = (strlen($chars) - 1);
    $string = ($chars[rand(0, $chars_length)]);

    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars[rand(0, $chars_length)];
        if ($r != $string[$i - 1])
            $string .= $r;
    }

    return strtoupper($string);
}
function doEncode($string, $key = 'resume.com') {
    $string = base64_encode($string);
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }
    return ($hash);
}
function doDecode($string, $key = 'resume.com') {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i += 2) {
        $ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    $hash = base64_decode($hash);
    return ($hash);
}
function starsCount($value, $stars) {
    $star = 1;
    while ($star <= $stars) {
        echo $value;
        $star++;
    }
}
function getImgExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
function fetch($ex) {
    return $ex->fetch_array();
}
function fetch_assoc($ex) {
    return $ex->fetch_assoc();
}
function getList($query) {
    global $conn;
    $ex = $conn->query($query) or die($query);
    if (mysqli_num_rows($ex) > 0) {
        return $ex;
    }
    return false;
}
function redirectTo($page = '') {
    echo '<script type="text/javascript" language="javascript">document.location="' . PATH . $page . '";</script>';
}
function uploadImageThumb($image, $path, $img_width, $thumb_width) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

//$imagename = str_replace(" ","_",strtolower($imagename));
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'svg') {
            $image_thumb = "thumb_" . $imagename . "." . $ext;
            $imagename = "image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                $obj_img = new SimpleImage();

//                $obj_img->load($path . $imagename);
//                $obj_img->resizeToWidth(intval($img_width));
//                $obj_img->save($path . $imagename);

                $obj_img->load($path . $imagename);
                $obj_img->resizeToWidth(intval($thumb_width));
                $obj_img->save($path . $image_thumb);

                $res[0] = $imagename;
                $res[1] = $image_thumb;

                return $res;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function uploadMultiImageThumb($image, $path, $img_width, $thumb_width) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'svg') {
            $image_thumb = "thumb_" . $imagename . "." . $ext;
            $imagename = "image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                $obj_img = new SimpleImage();

                $obj_img->load($path . $imagename);
                $obj_img->resizeToWidth(intval($thumb_width));
                $obj_img->save($path . $image_thumb);

                $res[0] = $imagename;
                $res[1] = $image_thumb;

                return $res;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadImage($image, $path, $img_width = 1024) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPEG') {
//$imagename = str_replace(" ","_",strtolower($imagename));
            $imagename = "image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                include_once('SimpleImage.php');
                $obj_img = new SimpleImage();

                $obj_img->load($path . $imagename);
                $obj_img->resizeToWidth(intval($img_width));
                $obj_img->save($path . $imagename);

                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function uploadBanner($image, $path) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'gif' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPEG') {
//$imagename = str_replace(" ","_",strtolower($imagename));
            $imagename = "Image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function uploadFile($image, $path) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'txt') {
            $imagename = "file_" . $imagename . "." . $ext;
            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadMeritFile($image, $path) {
    if (isset($image) && $image['name'] != "") {
        $imagename = time();
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        // if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'xls' || $ext == 'xlsx') {
        if ($ext == 'csv' || $ext == 'xls' || $ext == 'xlsx') {
            $imagename = "merit_list_" . $imagename . "." . $ext;
            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function exQuery($query) {
    global $conn;
    $ex = $conn->query($query) or die($query);
    return $ex;
}
function getImage($image, $width) {
    $img = '';

    if ($width != '') {
        $width = 'width="' . intval($width) . '"';
    }

    $data = explode("/", $image);

    if (!empty($data[count($data) - 1])) {
        if (file_exists($image)) {
            $img = '<img src="' . $image . '" border="0" ' . $width . ' />';
        } else {
            $img = '<img src="' . PATH . 'images/no_image.jpg" border="0" ' . $width . '  />';
        }
    } else {
        $img = '<img src="' . PATH . 'images/no_image.jpg" border="0" ' . $width . '  />';
    }

    return $img;
}
function getImageSrc($image) {
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = '' . PATH . $image;
        } else {
            $img = '' . APATH . 'assets/images/no_image.jpg';
        }
    } else {
        $img = '' . APATH . 'assets/images/no_image.jpg';
    }

    return $img;
}
function getOnlyImageSrc($image) {
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = '' . PATH . $image;
        }
    }

    return $img;
}
function getBannerSrc($image) {
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = "background-image: url('" . PATH . $image . "');";
        }
    }

    return $img;
}
function isImage($image) {
    if (!empty($image)) {
        $ary = explode("/", $image);
        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            return true;
        }
    }

    return false;
}
function getProfileImg($image) {
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $img = PATH . $image;
        } else {
            $img = '' . PATH . 'assets/images/no_pic.png';
        }
    } else {
        $img = '' . PATH . 'assets/images/no_pic.png';
    }

    return $img;
}
function getPage($page, $field) {
    global $conn;
    $sql = "SELECT `" . $field . "` FROM tbl_pages WHERE page_name='" . $page . "' ";
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return stripslashes($rs[$field]);
}
function getPageById($id, $field) {
    global $conn;
    $sql = "SELECT `" . $field . "` FROM tbl_pages WHERE page_id='" . $id . "' ";
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs[$field];
}
function getPaging($table, $where, $limit, $tpage, $seprater, $pager) {
    global $conn;
    $nxt = 'next';
    $prv = 'previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
//	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages_ex = $conn->query($query);
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
//	$limit = 12; 	
//	$_GET['pager']		    //how many items to show per page
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
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
            }
        }
//next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}
function getPaging2($table, $where, $limit, $tpage, $seprater, $pager2) {
    global $conn;
    $nxt = 'Next';
    $prv = 'Previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
//	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages_ex = $conn->query($query);
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
//	$limit = 12; 	
//	$_GET['pager2']		    //how many items to show per page
    $page = $pager2;
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
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lastpage\">$lastpage</a>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lastpage\">$lastpage</a>";
            }
//close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
            }
        }
//next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}
function getMultiPaging($select, $table, $where, $limit, $tpage, $seprater, $pager) {
    global $conn;
    $nxt = 'Next';
    $prv = 'Previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
//	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages_ex = $conn->query($query);
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
//	$limit = 12; 	
//	$_GET['pager']		    //how many items to show per page
    $page = $pager;
    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $seprator = $seprater;

    $sql = "SELECT $select from $tbl_name $where  LIMIT $start, $limit";

    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
            }
        }
//next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}
function getField($table, $where, $field) {
    global $conn;
    $sql = "SELECT " . $field . " FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs[$field];
}
function getFieldSum($table, $where, $field) {
    global $conn;
    $sql = "SELECT " . $field . " as total FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs['total'];
}
function getTable($table, $where) {
    global $conn;
    $sql = "SELECT * FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs;
}
function toSlugUrl($text) {
    $text = trim($text);
    $text = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
    $text = str_replace("--", '-', $text);
    $text = str_replace("--", '-', $text);
    return strtolower($text);
}
function toAltUrl($text) {
    $text = explode(".", $text);
    $text = $text[0];
    $text = preg_replace('/[^A-Za-z0-9-]+/', ' ', $text);
    $text = str_replace("thumb_", "", $text);
    $text = str_replace("Image_", "", $text);
    return strtolower(trim($text));
}
function slugToText($text) {
    $text = strtolower(str_replace('--', ' ', $text));
    $text = strtolower(str_replace('-', ' ', $text));
    $text = strtolower(str_replace('_', ' ', $text));
    $text = ucwords($text);
    return $text;
}
function strDefault($text, $default) {
    if (empty($text))
        return $default;
    else
        return $text;
}
function get_sub_menu($sub_pg_id) {
    ?>

<?php
    global $conn;
    $quer1 = "SELECT COUNT(*) FROM tbl_pages WHERE page_status='1' AND page_parent='" . $sub_pg_id . "' AND page_menu='1'";
    $exec1 = $conn->query($quer1);
    $sm_row = $exec1->fetch_assoc();
    $total = array_shift($sm_row);
    $quer = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_parent='" . $sub_pg_id . "' AND page_menu='1'";
    $exec = $conn->query($quer);
    if ($total > 0) {
        echo '<ul class="dropdown-menu thired-level">';
        while ($sub_row2 = $exec->fetch_array()) {
            ?>

<li><a href="<?= $sub_row2['page_link'] ?>" class="navcap dropdown-item"><?= $sub_row2['page_title'] ?></a>
</li>

<?php
        }
        echo'</ul>';
    } else {
        echo '';
    }
    ?>

<?php
}
function get_parent_menu($po_id) {
    global $conn;
    $quee = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_menu='1'";
    $exee = $conn->query($quee);
    while ($subrow1 = $exee->fetch_array()) {

        if ($subrow1['page_parent'] == $po_id) {
            echo "class='has-child-menu'";
        } else {
            echo "";
        }
    }
}
function getMenuPagesList() {
    global $conn;
    $output = array();
    $sql = "SELECT * FROM tbl_menu_pages WHERE 1 ";

    $ex = $conn->query($sql) or die($sql);
    while ($rs = $ex->fetch_array()) {
        $output[$rs['page_id']]['slug'] = $rs['page_name'];
        $output[$rs['page_id']]['title'] = str($rs['page_title']);
    }
    return $output;
}
function filesize_formatted($path) {
    $size = filesize($path);
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}
function getCategorySlug($id) {
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_id='" . $id . "' AND list_status='1'";
    $ex = $conn->query($sql);
    $row = $ex->fetch_array();
    return $row['list_slug'];
}
function getCategoryId($slug) {
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_slug='" . $slug . "'  AND list_status='1'";
    $ex = $conn->query($sql);
    $row = $ex->fetch_array();
    return $row['list_id'];
}
function getCategoryName($slug) {
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_slug='" . $slug . "' AND list_type='categories'  AND list_status='1'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return stripslashes($row['list_title']);
    }
}
function substrLenght($value, $min, $max, $inc) {
    if (strlen($value) > $max) {
        $value = substr($value, $min, $max) . $inc;
    } echo $value;
}
function shortText($title, $start, $limit, $more) {

    if (strlen($title) > $limit) {
        $title = substr($title, $start, $limit) . $more;
    }
    echo $title;
}
function getProjectId($slug) {
    global $conn;
    $sql = "SELECT * FROM tbl_projects WHERE project_slug='" . $slug . "' AND project_status='1'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array())
        echo stripslashes($row['project_id']);
}
function saveRecord($table, $ary) {
    global $conn;

    if (isset($ary) && count($ary) > 0) {

        /* $sql = " INSERT INTO `$table` SET ";

          foreach($ary as $key => $val){

          $sql .= " `".$key."` = '".mysqli_real_escape_string($conn, $val)."'  ";

          if(end($ary) != $val) $sql .= ", ";

          } */





        $sql = " INSERT INTO `$table` SET ";

        foreach ($ary as $key => $val) {

            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);



        if (exQuery($sql))
            return true;
        else
            return false;
    }
}
function updateRecord($table, $ary, $where) {
    global $conn;

    if (isset($ary) && count($ary) > 0) {

        $sql = " UPDATE `$table` SET ";

        foreach ($ary as $key => $val) {

            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);



        $sql .= " WHERE $where ";



        if (exQuery($sql))
            return true;
        else
            return false;
    }
}
?>