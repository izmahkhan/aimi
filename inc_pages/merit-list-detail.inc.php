<style>
    .search_width {
        width: 50%;
        margin: auto;
    }

    @media (max-width: 768px) {
        .title-default-left {
            font-size: 14px;
        }

        .search_width {
            width: 80%;
        }
    }

    .table-merit td,
    .table-merit th {
        font-size: 12px;
        padding: 5px 8px;
    }
</style>
<?php
$merit_type = 'MBBS';

if ($_REQUEST['type'] == 'bds') {
    $merit_type = 'BDS';
}

$merit_list_count = '1st';
if (!empty($_REQUEST['list'])) {
    $merit_list_count = $_REQUEST['list'];
}


if ($ex = getList("select * from tbl_merit_lists where ml_slug='" . $merit_list_count . "' and ml_type='" . $_REQUEST['type'] . "'  ")) {  // and ml_status='1'
    $rs = fetch_assoc($ex);
?>
    <div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['general_bg']; ?>');">
        <div class="container">
            <div class="pagination-area">
                <h1><?= $page_meta_title; ?></h1>
                <ul>
                    <li><a href="<?= $path; ?>">Home</a> -</li>
                    <li>Admission -</li>
                    <li>Merit List <?php echo $merit_type; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-page2-area" style="padding:30px 0 80px;">
        <div class="container">
            <div class=" about-page2-inner">
                <p class="text-center">
                <div class="">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="title-default-left"><?= str($rs['ml_title']); ?>
                            <a href="<?= $path; ?>admission-process" class="btn btn-primary btn-sm pull-right" style="color:#fff;"><i class="fa fa-arrow-left"></i> Back</a>
                        </h2>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-merit">
                                    <thead>
                                        <tr class="tableizer-firstrow">
                                            <th colspan="7" class="text-center"><?= str($rs['ml_subtitle']); ?></th>
                                        </tr>
                                        <?php if($_GET['mode'] == 'test'){ ?>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Application Number</th>
                                            <th>Applicant Name</th>
                                            <th>Gender</th>
                                            <th>Father / Guardian Name</th>
                                            <th>Final Aggregate</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php }else{ ?>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Father / Guardian Name</th>
                                            <th>Final Aggregate</th>
                                        </tr>
                                        <?php } ?>
                                    </thead>
                                    <?= str($rs['ml_detail']); ?>
                                </table>
                            </div>
                            <div>
                                <?php
                                if (!empty($rs['ml_info_green'])) {
                                ?>
                                    <div class="alert alert-success" style="font-size: 20px;">
                                        <?= str($rs['ml_info_green']); ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (!empty($rs['ml_info_red'])) {
                                ?>
                                    <div class="alert alert-danger" style="font-size: 20px;">
                                        <?= str($rs['ml_info_red']); ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">-->
                    <!--    <div class="sidebar">-->
                    <!--        <div class="sidebar-box">-->
                    <!--            <div class="sidebar-box-inner">-->
                    <!--                <?php // include_once('shared/adminssion_leftbar.php'); ?>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                </p>
            </div>
        </div>
    </div>
<?php
} else {
    redirectTo('merit-list');
}
?>

<?php @include_once('inc_pages/shared/footer.php'); ?>
<?php if($_GET['mode'] != 'test'){ ?>
<script>
    window.addEventListener('selectstart', function(e) {
        e.preventDefault();
    });
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php } ?>