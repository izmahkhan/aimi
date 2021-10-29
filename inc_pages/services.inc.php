<section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
        <div class="row title">
            <h1>Services</h1>
            <div class="page-breadcrumb">
                <a href="<?= $path; ?>">Home</a>
            </div>
        </div>
    </div>
</section>
<!-- Intro Section --> 
<!-- Service Section -->
<section id="service" class="padding ptb-xs-40">
    <div class="container">
        <div class="row">
           <?php
           global $conn;
           $sql = "SELECT * FROM tbl_listings WHERE list_type='services' ORDER BY list_order ASC";
           $ex = $conn->query($sql);
           while($row=  $ex->fetch_array()){

            ?>
            <!--Services Block-->
            <div class="services-block col-lg-4 col-md-6 col-xs-12 mb-30 mb-sm-30 mb-xs-30">
                <div class="inner-box hvr-float">
                    <div class="image">
                        <img src="<?= $path ?>uploads/media/<?= $row['list_image'] ?>" alt="">
                        <div class="icon-box">
                            <i class="<?= $row['list_thumb'] ?>"></i>
                        </div>
                        <div class="overlay-box clearfix">
                            <div class="text">
                                <?= $row['list_desc'] ?>
                            </div>
                            <a href="<?=$path;?>service/<?= $row['list_slug'] ?>" class="read-more">Read More</a>
                        </div>
                    </div>
                    <div class="lower-box">
                        <h3><a href="<?=$path;?>service/<?= $row['list_slug'] ?>"><?= $row['list_title'] ?></a></h3>
                    </div>
                </div>
            </div>
            <?php

        }
        ?>
        <!--Services Block-->

    </div>
</div>
</section>
<!-- Service Section end -->
<?php @include_once ('inc_pages/shared/footer.php'); ?>