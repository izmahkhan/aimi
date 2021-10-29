<!-- CONTENT -->
<!-- Intro Section -->

<div class="inner-page-banner-area" style="background-image: url('<?= $path; ?>uploads/banners/<?= $banners['news_bg']?>');">
  <div class="container">
    <div class="pagination-area">
      <h1>Events</h1>
      <ul>
        <li><a href="<?= $path; ?>">Home</a> -</li>
        <li>Event</li>
      </ul>
    </div>
  </div>
</div>
<!-- End Intro Section -->
<!-- Work Section -->
<div class="news-page-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">


       <?php
       global $conn;
       $event_slug= $_REQUEST['event'];
       $sql = "SELECT * FROM tbl_listings WHERE list_type='events' AND list_slug='".$event_slug."' AND  list_status='1'";
       $ex = $conn->query($sql);
       $row=$ex->fetch_array();
       ?>
       <div class="event-details-inner">
        <div class="event-details-img">
          <a href="javascript:void(0);"><img src="<?= $path ?>uploads/events/<?= $row['list_image'] ?>" alt="event" class="img-responsive"></a>
        </div>
        <h2 class="title-default-left-bold-lowhight"><a href="javascript:void(0);"><?= $row['list_title'] ?></a></h2>
        <ul class="event-info-inline title-bar-sm-high">
          <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php
                $ret = explode(',', $row['list_thumb']);
                ?>
                <?= $ret[0] ?>
                <?= $ret[1] ?>,
                <?= $ret[2] ?></li>
          <?php
          if (!empty($row['list_desc'])) {
            ?>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i><?= $row['list_desc'] ?></li>
            <?php
          }else{
            echo "";
          }
          ?>           
          
        </ul>
        <p><?= $row['list_detail'] ?></p>
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
              $got_cat= $row['list_slug'];  
              ?>
              <li>
                <a <?= ($_REQUEST['event'] == $got_cat) ? 'class="active"' : ''; ?> href="<?= $path ?>category/<?= $row['list_slug']; ?>"><?= $row['list_title']; ?></a>
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