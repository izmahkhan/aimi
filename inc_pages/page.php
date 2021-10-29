<style>
.desc ul li:before {
    color: #E7B03C;
    font-family: "Font Awesome 5 Free";
    content: "\f14a";
    display: inline-block;
    padding-right: 10px;
    vertical-align: middle;
    font-weight: 900;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Roboto', sans-serif;
    line-height: 1.5;
    font-weight: 400;
    margin: 0 0 20px 0;
    color: #212121;
}

.desc ul li {
    list-style-type: none;
    position: relative;
    padding-left: 30px;
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: bold;
}

.desc h2 {
    margin-bottom: 20px;
    text-transform: capitalize;
    text-align: left;
    font-weight: 700 !important;
    color: #2E3092;
    font-size: 18px !important;
}

tr th {
    background-color: #2e3092;
    color: #fff;
}




.desc h3 {
    font-size: 24px !important;
}

.desc p {
    margin-bottom: 30px;
    line-height: 1.5;
    margin: 0 0 20px 0;
    font-size: 15px !important;
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}


.desc ul {
    margin-bottom: 25px;
}
</style>

<div class="breadcrumb portfolio-breadcrumb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="part-txt">
                    <h1><?= $page_meta_title; ?></h1>
                    <ul>
                        <li><a href="<?= $path; ?>">Home</a> -</li>
                        <?php
				if (intval($page_parent) > 0) {
					$parent_name = getPageById($page_parent, 'page_title');
					?>
                        <li><?= $parent_name; ?> -</li>
                        <?php
				}
				?>
                        <li><?= $page_meta_title; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-inner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 desc">
                <p><?= $page_detail; ?>
                    <?php
				if (!empty($page_file)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				if (!empty($page_file2)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file2_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file2); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				if (!empty($page_file3)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file3_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file3); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				if (!empty($page_file4)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file4_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file4); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				if (!empty($page_file5)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file5_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file5); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				if (!empty($page_file6)) {
					?>
                <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file6_name; ?></h3>
                <a target="_blank" href="<?= ("../uploads/files/" . $page_file6); ?>" class="btn btn-info btn-lg"><i
                        class="fa fa-file-text"></i> Download PDF</a>
                <?php
				}
				?>
                </p>
                <p class="mt-4">
                    <!-- <h3>Class Activity Report</h3> -->
                </p>
            </div>
        </div>
    </div>
</div>
<?php
if ($_REQUEST['page'] == 'about') {
	?>
<?php
		$home_secs = unserialize(str($home_secs['txt_data']));
		?>
<div class="process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4">
                <div class="heading">
                    <h5>Why choose our institution?</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box">
                    <div class="part-icon">
                        <i style="font-size: 50px; color:white !important" class="fa <?= $home_secs['font1'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title1'] ?></h3>
                        <p><?= $home_secs['desc1'] ?></p>
                    </div>
                    <span>01</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box">
                    <div class="part-icon">
                        <i style="font-size: 50px; color:white !important" class="fa <?= $home_secs['font2'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title2'] ?></h3>
                        <p><?= $home_secs['desc2'] ?></p>
                    </div>
                    <span>02</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box">
                    <div class="part-icon">
                        <i style="font-size: 30px; color:white !important" class="fa <?= $home_secs['font3'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title3'] ?></h3>
                        <p><?= $home_secs['desc3'] ?></p>
                    </div>
                    <span>03</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>
<!-- Section End-->
<?php @include_once('inc_pages/shared/footer.php'); ?>