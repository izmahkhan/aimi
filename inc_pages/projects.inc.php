<!-- CONTENT -->
<!-- Intro Section -->
<section class="inner-intro  padding bg-img overlay-dark light-color">
    <div class="container">
        <div class="row title">
            <h1>Projects</h1>
            <div class="page-breadcrumb">
                <div class="page-breadcrumb">
                     <a href="<?= $path; ?>">Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Intro Section -->
<!-- Work Section -->
<section id="work" class="padding ptb-xs-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <ul class="container-filter categories-filter">
                    <li>
                        <a class="categories active" data-filter="*">All</a>
                    </li>
                    <?= getCategories(); ?>

                </ul>
            </div>
        </div>
        <!-- End work Filter -->
        <div class="row container-grid nf-col-3">

          <?php
          global $conn;
          $sql = "SELECT * FROM tbl_projects WHERE  project_status='1' ORDER BY project_order ASC";
          $ex = $conn->query($sql);
          while($row=  $ex->fetch_array()){

            ?>

            <div class="nf-item <?= getCategorySlug($row['project_category']) ?> spacing">
                <div class="item-box">
                    <a> <img alt="1" src="<?= $path ?>uploads/projects/<?= $row['project_thumb']?>" class="item-container"> </a>
                    <div class="link-zoom">
                        <a href="<?=$path;?>projects/<?= $row['project_slug'] ?>" class="project_links"> <i class="fa fa-link"> </i> </a>
                        <a href="<?= $path ?>uploads/projects/<?= $row['project_thumb']?>" class="fancylight popup-btn" data-fancybox-group="light" > <i class="fa fa-search-plus"></i> </a>
                    </div>
                    <div class="gallery-heading">
                        <h4><a href="<?=$path;?>projects/<?= $row['project_slug'] ?>"><?= shortText($row['project_title'], 0, 25,'') ?></a></h4>
                        <p>
                            <?= shortText($row['project_text'], 0, 150,'...') ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php

        }
        ?>


    </div>

</div>
</section>
<!-- End Work Section -->
<!--End Contact-->
<?php @include_once ('inc_pages/shared/footer.php'); ?>