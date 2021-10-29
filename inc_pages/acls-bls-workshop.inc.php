<style>
.blog-inner ul li:before {
    color: #E7B03C;
    font-family: "Font Awesome 5 Free";
    content: "\f14a";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;
    font-weight: 900;
}

.blog-inner ul li {
    list-style-type: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Roboto', sans-serif;
    line-height: 1.5;
    font-weight: 400;
    margin: 0 0 20px 0;
    color: #212121;
}

.blog-inner ul li {
    list-style-type: none;
    position: relative;
    padding-left: 30px;
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: bold;
}

.blog-inner h2 {
    margin-bottom: 20px;
    text-transform: capitalize;
    text-align: left;
    font-weight: 500;
    color: #2E3092;
}
</style>
<div class="breadcrumb portfolio-breadcrumb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="part-txt">
                    <h1>ACLS - BLS WORKSHOP</h1>
                    <ul>
                        <li><a href="<?= $path ?>">Home</a> -</li>
                        <li>ACLS - BLS WORKSHOP</li>
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
                                                                                                $sql = "SELECT * FROM tbl_gallery WHERE gal_type='acls' ORDER BY gal_order ASC";
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