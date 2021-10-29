<section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
        <div class="row title">
            <h1 data-title="History"><span>FAQs</span></h1>
            <div class="page-breadcrumb">
                <a href="<?= $path; ?>">Home</a>
            </div>
        </div>
    </div>
</section>
<!-- Intro Section -->
<div class="faq padding pt-xs-40">
    <div class="container">
        <div class="row" >
            <div class="col-md-12 col-lg-12">
                <div class="block-title v-line mb-35">
                    <h2>Frequently Asked Questions</h2>
                    <p class="italic"> If you have any other question, please <a href="contact.php">contact us</a>. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 anim-section mb-30">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                 <?php
                 global $conn;
                 $sql = "SELECT * FROM tbl_listings WHERE list_type='faqs' AND list_status='1' ORDER BY list_order ASC";
                 $ex = $conn->query($sql);
                 while($row=  $ex->fetch_array()){

                  ?>

                  <div class="card">
                    <div class="card-header" role="tab" id="heading<?= $row['list_id'] ?>">
                        <h5 class="mb-0 panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $row['list_id'] ?>" aria-expanded="false" aria-controls="collapse<?= $row['list_id'] ?>">
                                <?= $row['list_title'] ?><i class="fa fa-plus collape-plus"></i>
                            </a>
                        </h5>
                    </div>

                    <div id="collapse<?= $row['list_id'] ?>" class="collapse bg-custom" role="tabpanel" aria-labelledby="heading<?= $row['list_id'] ?>">
                        <div class="card-block">
                            <p>   <?= $row['list_desc'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
</div>
<!-- Collape Section End Here -->      
</div>   
</div>
<?php @include_once ('inc_pages/shared/footer.php'); ?>