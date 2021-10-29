<?php include_once 'inc_pages/shared/header.php'; ?>

<!-- CONTENT -->
<!-- Intro Section -->
<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['general_bg']; ?>');">
    <div class="container">
        <div class="pagination-area">
            <h1><?= $page_meta_title; ?></h1>
            <ul>
                <li><a href="<?= $path; ?>">Home</a> -</li>
                <li>Admission -</li>
                <li>Merit List MBBS</li>
            </ul>
        </div>
    </div>
</div>
<!-- Intro Section -->

<div class="about-page2-area" style="padding:30px 0 80px;">
    <div class="container">
        <div class="container about-page2-inner">
            <p class="text-center">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                    <h2 class="title-default-left">Merit List MBBS</h2>
                    <?php
                    if ($ex = getList("select * from tbl_merit_lists where ml_type='mbbs' and ml_status='1' order by ml_order ASC ")) {
                        while ($rs = fetch_assoc($ex)) {
                    ?>
                     <div style="margin-bottom: 15px;"><a href="<?= $path; ?>merit-list/mbbs/<?=$rs['ml_slug']?>">Click here to view <?=$rs['ml_title']?></a></div> 
                    <!--<div style="margin-bottom: 15px;"><a href="javascript:void(0);">Click here to view <?=$rs['ml_title']?></a></div>-->
                    <?php
                        }
                    }
                    ?>
                    <h2 class="title-default-left">Merit List BDS</h2>
                    <?php
                    if ($ex = getList("select * from tbl_merit_lists where ml_type='bds' and ml_status='1' order by ml_order ASC ")) {
                        while ($rs = fetch_assoc($ex)) {
                    ?>
                     <div style="margin-bottom: 15px;"><a href="<?= $path; ?>merit-list/bds/<?=$rs['ml_slug']?>">Click here to view <?=$rs['ml_title']?></a></div> 
                    <!--<div style="margin-bottom: 15px;"><a href="javascript:void(0);">Click here to view <?=$rs['ml_title']?></a></div>-->
                    <?php
                        }
                    }
                    ?>
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
            </p>
        </div>
    </div>
</div>
<?php @include_once('inc_pages/shared/footer.php'); ?>