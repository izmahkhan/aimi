<section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
        <div class="row title">
            <h1>Services Details</h1>
            <div class="page-breadcrumb">
                <a href="<?= $path; ?>">Home</a>
            </div>
        </div>
    </div>
</section>
<!-- Intro Section -->  
<!-- Service Section -->
<div id="services-section" class="pt-80 pt-xs-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sx-12">
                <div class="margin-bottom-25">
                    <div class="sec-title">
                        <h2>Our<span> Services</span></h2>
                        
                    </div>
                </div>
                <div class="single-sidebar-widget">
                    <div class="special-links">
                        <ul>
                           <?php
                           global $conn;
                           $service_slug=$_GET['slug'];
                           $sql = "SELECT * FROM tbl_listings WHERE list_type='services' ORDER BY list_order ASC";
                           $ex = $conn->query($sql);
                           while($row=  $ex->fetch_array()){
                               ?>
                               <li><a class="<?= ($row['list_slug'] == $service_slug ) ? 'active' : ''; ?>" href="<?=$path;?>service/<?= $row['list_slug'] ?>"><?= $row['list_title'] ?></a></li>

                               <?php

                           }
                           ?>
                       </ul>
                   </div>
               </div>
           </div>
           <div class="col-lg-8">
            <?php
            global $conn;
            $service_slug=$_GET['slug'];
            $sql = "SELECT * FROM tbl_listings WHERE list_slug='$service_slug' AND list_type='services' ORDER BY list_order ASC";
            $ex = $conn->query($sql);
            while($row=  $ex->fetch_array()){

                ?>

                <div class="full-pic">
                    <figure> <img src="<?= $path ?>uploads/media/<?= $row['list_banner'] ?>" alt=""> </figure>
                </div>
                <div class="text-box mt-40">
                    <div class="box-title mb-20">
                        <h2><?= $row['list_title'] ?></h2>
                    </div>
                    <div class="text-content">
                        <?= $row['list_detail'] ?>
                    </div>
                    <?php

                }
                ?>
                
            </div>
        </div>
    </div>


</div>
</div>
</div>
</div>
<?php @include_once ('inc_pages/shared/footer.php'); ?>