<!-- CONTENT -->
<!-- Intro Section -->
<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['general_bg']; ?>');">
    <div class="container">
        <div class="pagination-area">
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
<!-- Intro Section -->

<div class="about-page2-area" style="padding:30px 0 80px;">
    <div class="container">
        <div class="about-page2-inner">
            <p class="text-center">
                <div class="">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        <?= $page_detail; ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <?php include_once('shared/adminssion_leftbar.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (!empty($page_file)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                if (!empty($page_file2)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file2_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file2); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                if (!empty($page_file3)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file3_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file3); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                if (!empty($page_file4)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file4_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file4); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                if (!empty($page_file5)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file5_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file5); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                if (!empty($page_file6)) {
                ?>
                    <h3 style="padding: 15px 0px 8px 0px;margin: 0px;"><?= $page_file6_name; ?></h3>
                    <a target="_blank" href="<?= ("../uploads/files/" . $page_file6); ?>" class="btn btn-info btn-lg"><i class="fa fa-file-text"></i> Download PDF</a>
                <?php
                }
                ?>
            </p>
        </div>
    </div>
</div>
<!-- Section End-->
<?php @include_once('inc_pages/shared/footer.php'); ?>