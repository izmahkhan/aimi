
<!-- CONTENT -->
<!-- Intro Section -->
<?php

global $conn;
$news_slug=$_REQUEST['slug'];
$sql = "SELECT * FROM tbl_news WHERE news_slug='".$news_slug."' AND  news_status='1'";
$ex = $conn->query($sql);
$row=$ex->fetch_array();
?>
<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['news_bg']?>');">
  <div class="container">
    <div class="pagination-area">
      <h1><?= substrLenght($row['news_title'], 0, 35, "") ?></h1>
      <ul>
        <li><a href="<?= $path; ?>">Home</a> -</li>
        <li>News</li>
      </ul>
    </div>
  </div>
</div>
<!-- End Intro Section -->
<!-- Work Section -->
<div class="news-details-page-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
        <div class="row news-details-page-inner">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="news-img-holder">
              <img src="<?= $path ?>uploads/news/<?= $row['news_image'] ?>" class="img-responsive" alt="research">
              <ul class="news-date1">
                <li><?= $row['news_validity'] ?></li>

              </ul>
            </div>
            <h2 class="title-default-left-bold-lowhight"><a href="javascript:void(0);"><?= $row['news_title'] ?></a></h2>
            <ul class="title-bar-high news-comments">
              <li><a href="javascript:void(0);"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row['news_date'] ?></a></li>
              <li><a href="<?= $path ?>category/<?= getCategorySlug($row['news_category']); ?>"><i class="fa fa-tags" aria-hidden="true"></i><?= getCategorybyId($row['news_category']) ?></a></li>
            </ul>
            <p><?= $row['news_detail'] ?></p>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
       <div class="sidebar">
         <div class="sidebar-box">
           <div class="sidebar-box-inner">
             <h3 class="sidebar-title">Search</h3>
             <div class="sidebar-find-course">
              <form id="checkout-form" action="<?= $path ?>news_search" method="post">
               <div class="form-group course-name">
                 <input id="first-name" placeholder="Type Here . . ." name="search_inp" class="form-control" type="text" />
               </div>
               <div class="form-group">
                 <button class="sidebar-search-btn-full disabled" type="submit" value="">Search</button>
               </div>
             </form>
           </div>
         </div>
       </div>
       <div class="sidebar-box">
         <div class="sidebar-box-inner">
           <h3 class="sidebar-title">Categories</h3>
           <ul class="sidebar-categories">
             <?php
             global $conn;
             $sql = "SELECT * FROM tbl_listings  WHERE list_type='categories' AND list_status='1' ORDER BY list_order ASC";
             $ex = $conn->query($sql);
             while($row=$ex->fetch_array()){
              ?>
              <li>
               <a href="<?= $path ?>category/<?= $row['list_slug']; ?>"><?= $row['list_title']; ?></a>
             </li>
             <?php

           }
           ?>
         </ul>
       </div>
     </div>
     <div class="sidebar-box">
      <div class="sidebar-box-inner">
        <h3 class="sidebar-title">Latest Posts</h3>
        <div class="sidebar-latest-research-area">
          <ul>
            <?php
            global $conn;
            $sqls = "SELECT * FROM tbl_news WHERE news_label='1' AND news_status='1' ORDER BY news_publish ASC LIMIT 0, 3";
            $exs = $conn->query($sqls);
            while($rows=$exs->fetch_array()){
              ?>
              <li>
                <div class="latest-research-img">
                  <a href="<?= $path ?>news/<?= $rows['news_slug'] ?>"><img src="<?= $path ?>uploads/news/<?= $rows['news_thumb'] ?>" class="img-responsive" alt="skilled"></a>
                </div>
                <div class="latest-research-content">
                  <h4><?= $rows['news_date'] ?></h4>
                  <p><?= $rows['news_title'] ?></p>
                </div>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!-- End Work Section -->
<!--End Contact-->
<?php @include_once ('inc_pages/shared/footer.php'); ?>