<!-- CONTENT -->
<!-- Intro Section -->
<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['general_bg']; ?>');">
    <div class="container">
        <div class="pagination-area">
            <h1><?= $page_meta_title; ?></h1>
            <ul>
                <li><a href="<?= $path; ?>">Home</a> -</li>
                <li>Admission -</li>
                <li>Waiting List MBBS & BDS</li>
            </ul>
        </div>
    </div>
</div>
<!-- Intro Section -->

<div class="about-page2-area" style="padding:30px 0 80px;">
    <div class="container">
        <div class="row about-page2-inner">
            <p class="text-center">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                        <h2 class="title-default-left">Waiting List MBBS</h2>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20%">Date</th>
                                        <th>Title</th>
                                        <th class="text-center" width="15%">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = getListings('waiting_mbbs');
                                    if (count($res) > 0) {
                                        foreach ($res as $rs) {
                                    ?>
                                            <tr>
                                                <td><?= date('M d, Y', strtotime($rs['list_desc'])); ?></td>
                                                <td><?= str($rs['list_title']); ?></td>
                                                <td class="text-center"><a href="<?= $path; ?>waiting-list-mbbs/<?= doEncode($rs['list_id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-text"></i> View</a></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No record found!</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <h2 class="title-default-left">Waiting List BDS</h2>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20%">Date</th>
                                        <th>Title</th>
                                        <th class="text-center" width="15%">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $res = getListings('waiting_mbdbs');
                                    if (count($res) > 0) {
                                        foreach ($res as $rs) {
                                    ?>
                                            <tr>
                                                <td><?= date('M d, Y', strtotime($rs['list_desc'])); ?></td>
                                                <td><?= str($rs['list_title']); ?></td>
                                                <td class="text-center"><a href="<?= $path; ?>waiting-list-bds/<?= doEncode($rs['list_id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-text"></i> View</a></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No record found!</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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