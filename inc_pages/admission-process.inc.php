<style>
.blog-inner ul li:before {

    content: "\f14a";
    position: absolute;
    left: 0 !important;
    top: 0 !important;
    z-index: 1;
    color: #E7B03C;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;

}

.blog-inner ul li {
    list-style-type: none;
    position: relative !important;
    padding-left: 30px !important;
    margin-bottom: 15px;
    font-size: 14px;
    font-weight: 600;

}

.blog-inner h3 {
    font-size: 24px !important;
}

.blog-inner p {
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



.blog-inner h2 {
    margin-bottom: 20px;
    text-transform: capitalize;
    text-align: left;
    font-weight: 600 !important;
    color: #2E3092;
}


.blog-inner ul {
    margin-bottom: 25px;
}

@media only screen and (max-width: 767px) {
    .sidebar {
        margin-top: 30px;
    }
}

.sidebar-box:last-child {
    margin-bottom: 0;
}

.sidebar-box {
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 10px 30px -5px rgb(51 51 51 / 12%);
    box-shadow: 0px 10px 30px -5px rgb(51 51 51 / 12%);
    border-radius: 10px;
    padding: ;
    margin-bottom: 40px;
}

.sidebar-box .sidebar-box-inner {
    padding: 30px 25px;
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
<div class="blog-inner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-details">
                    <div class="main-txt">
                        <p> <?= $page_detail; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="sidebar">
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <?php include_once('shared/adminssion_leftbar.php'); ?>
                        </div>
                    </div>

                </div>
            </div>
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

        </div>
    </div>
</div>
<?php @include_once('inc_pages/shared/footer.php'); ?>