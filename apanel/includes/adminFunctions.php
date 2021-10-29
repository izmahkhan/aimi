<?php

function getBredcrum($ary)
{

    $bcrum .= '	

    <ol class="breadcrumb">

    <li><a href="' . APATH . '"><i class="fa fa-home"></i> Home</a></li>

    ';



    foreach ($ary as $key => $value) {

        if ($key == '#') {

            $bcrum .= '<li class="active"><a href="javascript:void(0);">' . $value . '</a></li>';
        } else {

            $bcrum .= '<li><a href="' . APATH . '' . $key . '">' . $value . '</a></li>';
        }
    }



    $bcrum .= '

    </ol>

    ';

    return $bcrum;
}

function getStatus($status)
{

    if ($status == '1') {

        return '<strong style="color:#35aa47;">Active</strong>';
    } else {

        return '<strong style="color:#d84a38;">InActive</strong>';
    }
}

function getYesNoStatus($status)
{

    if ($status == '1') {

        return '<strong style="color:green;">Yes</strong>';
    } else {

        return '<strong style="color:orange;">No</strong>';
    }
}

function getFeatured($status)
{

    if ($status == '1') {

        return '<strong style="color:#35aa47;">Yes</strong>';
    } else {

        return '<strong style="color:#3C8DBC;">No</strong>';
    }
}

function deleteRows($table, $field, $ary)
{
    global $conn;

    if (isset($ary) && count($ary) > 0) {

        foreach ($ary as $delete_data) {

            $s = "delete FROM " . $table . " where " . $field . " = '" . $delete_data . "' ";

            $q = $conn->query($s) or die($s);

            $_SESSION['successMsg'] = 'Recoreds has been deleted successfully !';
        }
    }
}

function updateRows($table, $field1, $field2, $ary)
{
    global $conn;

    if (isset($ary) && count($ary) > 0) {
        global $conn;

        foreach ($ary as $status_data) {

            $s1 = "SELECT " . $field1 . " FROM " . $table . " where " . $field2 . " = '" . $status_data . "' ";

            $q1 = $conn->query($s1) or die($s1);

            $r1 = $q1->fetch_array();



            if ($r1[$field1] == "1") {

                $status = 0;
            } else {

                $status = 1;
            }



            $s = "update " . $table . " set " . $field1 . "  = '" . $status . "' where " . $field2 . "  = '" . $status_data . "' ";

            $q = $conn->query($s) or die($s);

            $_SESSION['successMsg'] = 'Records has been updated successfully !';
        }
    }
}

function deleteRow($table, $mode, $where)
{
    global $conn;

    if (isset($mode) && $mode == 'delete') {

        $s = "DELETE FROM `$table` WHERE $where ";

        $q = $conn->query($s) or die($s);

        $_SESSION['successMsg'] = 'Record has been deleted successfully !';
    }
}


/*

  function updateRecord($table, $ary, $where)

  {

  if(isset($ary) && count($ary)>0)

  {

  $sql = " UPDATE `$table` SET ";

  foreach($ary as $key => $val){

  $sql .= " `".$key."` = '".mysqli_real_escape_string($conn, $val)."'  ";

  if(end($ary) != $val) $sql .= ", ";

  }

  $sql .= " WHERE $where ";



  if(exQuery($sql))

  return true;

  else

  return false;

  }

  }

 */

function resetFeaturedVideo()
{
    global $conn;

    $s = "UPDATE tbl_videos SET vid_featured  = '0' WHERE 1 ";

    $q = $conn->query($s) or die($s);
}

// Form
function formText($label, $name, $value)
{
    ?>
    <div class="form-group subitem text">
        <label for="field"><?= $label; ?></label>
        <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" class="form-control" />
    </div>
<?
}
function formDatepicker($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label><?= $label; ?></label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" value="<?= stripslashes($value); ?>" name="<?= $name; ?>" class="form-control pull-right datepicker" autocomplete="off">
        </div>
        <!-- /.input group -->
    </div>
<?php

}
function formTextDate($label, $name, $value)
{
    ?>
    <div class="form-group subitem text">
        <label for="field"><?= $label; ?></label>
        <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" autocomplete="off" class="datepicker form-control" />
    </div>
<?
}

function formTextIcon($label, $name, $value, $icon)
{
    ?>
    <div class="form-group">
        <label for="<?= $name; ?>"><?= $label; ?></label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-<?= $icon; ?>"></i></span>
            <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" class="form-control" />
        </div>
    </div>
<?
}

function formSelectStatus($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>Active</option>
            <option value="0" <?= ($value == '0' ? 'selected="selected"' : ''); ?>>Inactive</option>
        </select>
    </div>
<?
}

function formTextArea($label, $name, $value, $rows = 3, $limit = "")
{
    if (!empty($limit)) {
        $limit = " maxlength='$limit' ";
    }
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <textarea class="form-control" minlength="0" <?= $limit; ?> rows="<?= $rows; ?>" name="<?= $name; ?>" id="<?= $name; ?>"><?= (stripslashes($value)); ?></textarea>
    </div>
<?
}

function formTextEditor($label, $name, $value, $height = 500)
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <?php
            $oFCKeditor = new FCKeditor($name);
            $oFCKeditor->BasePath = "lib/fckeditor/";
            $oFCKeditor->Height = $height;
            $oFCKeditor->Value = stripslashes($value);
            $oFCKeditor->Create();
            ?>
    </div>
<?
}

function formImageFile($label, $name, $value, $resolution = '1024px x 728px', $directory = 'media')
{
    ?>
    <input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>">
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
            <div class="col-md-2">
                <div class="img_file" style="background-image:url('<?= getImageSrc("../uploads/" . $directory . "/" . $value); ?>');">&nbsp;</div>
            </div>
            <div class="col-md-5">
                <label for="field">Upload Image</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <em>Best Resolution:</em> <strong><?= $resolution; ?></strong><br>
                    <em>Allowed Formats:</em> <strong>JPG, JPEG, PNG, GIF</strong>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?
}

function formDownloadFile($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
            <div class="col-md-6">
                <label for="field">Upload File</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-6">
                <p style="padding:0px;">
                    <?php if (!empty($value)) { ?><br>
                        <a href="<?= ("../uploads/files/" . $value); ?>" class="btn btn-info btn-sm fileDownloadBtn">Download</a>
                        <a href="javascript:void();" class="btn btn-danger btn-sm fileDeleteBtn" data-file-name="<?= $name; ?>"><i class="fa fa-trash"></i></a>
                    <?php } ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?
}

function formDownloadFileForms($label, $name, $value, $directory = 'media')
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
            <div class="col-md-7">
                <label for="field">Upload File</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <?php if (!empty($value)) { ?><br>
                        <a target="_blank" href="<?= ("../uploads/$directory/" . $value); ?>" class="btn btn-info btn-sm">Download</a> <?php echo $data['item_file']; ?>
                    <?php } ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?
}


function saveData($table, $ary)
{
    global $conn;
    if (isset($ary) && count($ary) > 0) {

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
function selectCategories()
{
    ?>


    <?php
        global $conn;

        $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_status='1'";
        $ex = $conn->query($sql);
        while ($row = $ex->fetch_array()) {
            echo  $row['list_title'];
        }
    }

    function  formGender($label, $name, $value)
    {
        ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name ?>" id="<?= $name ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>Male</option>
            <option value="2" <?= ($value == '2' ? 'selected="selected"' : ''); ?>>Female</option>
        </select>
    </div>
<?php
}
function  formRating($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name ?>" id="<?= $name ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>1</option>
            <option value="2" <?= ($value == '2' ? 'selected="selected"' : ''); ?>>2</option>
            <option value="3" <?= ($value == '3' ? 'selected="selected"' : ''); ?>>3</option>
            <option value="4" <?= ($value == '4' ? 'selected="selected"' : ''); ?>>4</option>
            <option value="5" <?= ($value == '5' ? 'selected="selected"' : ''); ?>>5</option>

        </select>
    </div>
<?php
}






function  formCategories($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label>Select <?= $label; ?></label>
        <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-control">
            <?php
                global $conn;
                $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_status='1'";
                $ex = $conn->query($sql);
                while ($row = $ex->fetch_array()) {
                    ?>
                <option value="<?= $row['list_id']; ?>" <?= ($row['list_id'] == $value ? 'selected' : ''); ?>><?= $row['list_title']; ?></option>

            <?php
                }
                ?>
        </select>
    </div>
<?php
}



?>