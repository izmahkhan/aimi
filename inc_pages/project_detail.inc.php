<!-- CONTENT -->
<!-- Intro Section -->
<section class="inner-intro  padding bg-img overlay-dark light-color">
  <div class="container">
    <div class="row title">
      <h1>Project Details</h1>
      <div class="page-breadcrumb">
        <a href="<?= $path; ?>">Home</a>
      </div>
    </div>
  </div>
</section>
<!-- End Intro Section -->
<!-- End Intro Section -->
<div id="project-detail-section" class="padding pb-60 pt-xs-60">
  <div class="container">
    <div class="row ">
     <?php
     global $conn;
     $project_slug=$_GET['slug'];
     $sql = "SELECT * FROM tbl_projects WHERE project_slug='$project_slug' AND  project_status='1' ORDER BY project_order ASC";
     $ex = $conn->query($sql);
     $row=$ex->fetch_array();
     ?>


     <div class="col-sm-12">
      <div class="heading-box pb-30 ">
        <h2><span>Our</span> Project</h2>
        <span class="b-line l-left"></span>
      </div>

    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="project-details">
          <figure>
            <img src="<?= $path ?>uploads/projects/<?= $row['project_image']?>" alt="">
          </figure>
          <div class="project-info col-sm-12 col-lg-4 ">
            <h3>Project Description</h3>
            <?= $row['project_desc']; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-7 mt-30">
      <div class="box-title mb-20">
        <h3><?= $row['project_title']; ?></h3>
      </div>
      <div class="text-content">
        <?= $row['project_detail']; ?>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-lg-12 mt-40">
    <ul class="project-gallery text-center">
     <?php
     global $conn;
     $pid = $row['project_id'];
     $sql = "SELECT * FROM tbl_project_images WHERE  project_id='". $pid ."' AND  image_status='1' ORDER BY image_order ASC";
     $ex = $conn->query($sql);
     while($rows=  $ex->fetch_array()){

      ?>
      <li class="col-md-3 col-sm-6 col-xs-6 mb-20">
        <a href="<?= $path; ?>uploads/projects_images/<?= $rows['image_name']; ?>" class="fancylight" data-fancybox-group="light"><img src="<?= $path; ?>uploads/projects_images/<?= $rows['image_name']; ?>" title="<?= $rows['image_title']; ?>" alt="<?= $rows['image_alt']; ?>"></a>
      </li>
      <?php
    }
    ?>
  </ul>
</div>




</div>
</div>
<!-- Related Project-->
<div class="padding gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading-box pb-30 ">
          <h2><span>Other</span> Project</h2>
          <span class="b-line l-left"></span>
        </div>

      </div>
      <div class="col-sm-12">
        <div id="related-project" class="nf-carousel-theme">
         <?php
         global $conn;
         $project_slug=$_GET['slug'];
         $sql = "SELECT * FROM tbl_projects WHERE  project_status='1' ORDER BY project_order ASC";
         $ex = $conn->query($sql);
         while($row=  $ex->fetch_array()){
          ?>
          <div class="project-item">
            <div class="about-block clearfix">
              <figure>
                <a href="<?=$path;?>projects/<?= $row['project_slug'] ?>"><img class="img-responsive" src="<?= $path ?>uploads/projects/<?= $row['project_thumb']?>" alt="Photo"></a>
              </figure>
              <div class="text-box mt-25">
                <div class="box-title mb-15">
                  <h3><a href="<?=$path;?>projects/<?= $row['project_slug'] ?>"><?= shortText($row['project_title'], 0, 30, '...') ?></a></h3>
                </div>
                <div class="text-content">
                  <p>
                    <?= shortText($row['project_text'], 0, 120, '...') ?>
                  </p>
                  <a href="<?=$path;?>projects/<?= $row['project_slug'] ?>" class="btn-text mt-15">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <?php

        }
        ?>

      </div>
    </div>
  </div>
</div>
</div>
<!-- Related Project-->
<?php @include_once ('inc_pages/shared/footer.php'); ?>