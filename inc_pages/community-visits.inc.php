<div class="breadcrumb portfolio-breadcrumb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-3">
                <div class="part-txt">
                    <h1>Community Visits</h1>
                    <ul>
                        <li><a href="<?= $path ?>">Home</a> -</li>
                        <li>Community Visits</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="portfolio">
    <div class="container">
        <div class="row">
            <?php
                global $conn;
                $sql = "SELECT * FROM tbl_gallery WHERE gal_type='community' ORDER BY gal_order ASC";
                $ex = $conn->query($sql);
                $found = false;
                while ($row =  $ex->fetch_array()) :
                    $found = true;
            ?>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box">
                    <div class="part-img">
                        <img src="<?= $path ?>uploads/gallery/<?= $row['gal_image'] ?>" alt="image">
                        <div class="overlay">
                            <a href="<?= $path ?>uploads/gallery/<?= $row['gal_image'] ?>" target="_blank"><i
                                    class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php

                                                                                                endwhile;
                                                                                   if (!$found) :
            ?>
            <div class="col-md-12 text-center">No Image Found.</div>
            <?php
                                                                                                endif;
            ?>
        </div>
    </div>
</div>