<!-- CONTENT -->
<!-- Intro Section -->
<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['general_bg']; ?>');">
    <div class="container">
        <div class="pagination-area">
            <h1><?= $page_meta_title; ?></h1>
            <ul>
                <li><a href="<?= $path; ?>">Home</a> -</li>
                <li>Admission -</li>
                <li>Waiting List MBBS</li>
            </ul>
        </div>
    </div>
</div>
<!-- Intro Section -->

<?php
$list_id = doDecode($_REQUEST['id']);
if ($rs = getListingsSingle('waiting_mbbs', array('list_id' => $list_id))) {
} else {
    redirectTo('waiting-list');
    exit;
}

?>
<div class="about-page2-area" style="padding:30px 0 80px;">
    <div class="container">
        <div class="row about-page2-inner">
            <p class="text-center">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        <h2 class="title-default-left">Waiting List MBBS - <?= date('M d, Y', strtotime($rs['list_desc'])); ?>
                            <a href="<?= $path; ?>waiting-list" class="btn btn-primary btn-sm pull-right" style="color:#fff;"><i class="fa fa-arrow-left"></i> Back</a>
                        </h2>
                        <div>
                            <?php
                            if ($rs) {
                            ?>
                                <div style="width: 100%;height:520px;margin:auto;position:relative;">
                                    <?php $url = $path . "uploads/media/" . $rs['list_image'];  ?>
                                    <iframe src="http://docs.google.com/viewer?url=<?= urlencode($url) ?>&embedded=true" allowfullscreen="allowfullscreen" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" style="position: absolute;width: 100%; height: 600px;border: none;"></iframe>
                                    <div style="width: 50px;height: 55px;background: transparent;position: absolute;z-index: 99999;right: 2px;"></div>
                                    <div style="clear: both;"></div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
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