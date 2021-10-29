<style>
    footer,
    .inner-page-banner-area,
    #scrollUp {
        display: none !important;
    }

    @media print {
        .logo-area {
            display: none !important;
        }
        .header4-area {
            display: none !important;
        }
        footer,
        .inner-page-banner-area,
        #scrollUp {
            display: none !important;
            visibility: hidden !important;
        }
    }

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


if ($ex = getList("select * from tbl_merit_lists where ml_slug='" . $merit_list_count . "' and ml_type='" . $_REQUEST['type'] . "' ")) {
    $rs = fetch_assoc($ex);
?>
        <div class="container">
            <div class=" about-page2-inner">
                <p class="text-center">
                <div class="">
                    <div class="col-lg-12 col-md-12">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-merit">
                                    <thead>
                                        <tr class="tableizer-firstrow">
                                            <th colspan="7" class="text-center"><?= str($rs['ml_subtitle']); ?></th>
                                        </tr>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Application Number</th>
                                            <th>Applicant Name</th>
                                            <th>Gender</th>
                                            <th>Father / Guardian Name</th>
                                            <th>Final Aggregate</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?= str($rs['ml_detail']); ?>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                </p>
            </div>
        </div>
<?php
}
?>