<!--  Main Banner Start Here-->
<!-- Slider 1 Area Start Here -->
<style>
header .item {
    height: 100vh;
    position: relative;
}

header .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

header .item .cover {
    padding: 75px 0;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
}

header .item .cover .header-content {
    position: relative;
    padding: 56px;
    overflow: hidden;
}

header .item .cover .header-content .line {
    content: "";
    display: inline-block;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    position: absolute;
    border: 9px solid #fff;
    -webkit-clip-path: polygon(0 0, 60% 0, 36% 100%, 0 100%);
    clip-path: polygon(0 0, 60% 0, 36% 100%, 0 100%);
}

header .item .cover .header-content h2 {
    font-weight: 300;
    font-size: 35px;
    color: #fff;
}

header .item .cover .header-content h1 {
    font-size: 56px;
    font-weight: 600;
    margin: 5px 0 20px;
    word-spacing: 3px;
    color: #fff;
}

header .item .cover .header-content h4 {
    font-size: 24px;
    font-weight: 300;
    line-height: 36px;
    color: #fff;
}

header .owl-item.active h1 {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    animation-name: fadeInDown;
    animation-delay: 0.3s;
}

header .owl-item.active h2 {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    animation-name: fadeInDown;
    animation-delay: 0.3s;
}

header .owl-item.active h4 {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    animation-name: fadeInUp;
    animation-delay: 0.3s;
}

header .owl-item.active .line {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    animation-name: fadeInLeft;
    animation-delay: 0.3s;
}

header .owl-nav .owl-prev {
    position: absolute;
    left: 15px;
    top: 43%;
    opacity: 0;
    -webkit-transition: all 0.4s ease-out;
    transition: all 0.4s ease-out;
    background: rgba(0, 0, 0, 0.5) !important;
    width: 40px;
    cursor: pointer;
    height: 40px;
    position: absolute;
    display: block;
    z-index: 1000;
    border-radius: 0;
}

header .owl-nav .owl-prev span {
    font-size: 1.6875rem;
    color: #fff;
}

header .owl-nav .owl-prev:focus {
    outline: 0;
}

header .owl-nav .owl-prev:hover {
    background: #000 !important;
}

header .owl-nav .owl-next {
    position: absolute;
    right: 15px;
    top: 43%;
    opacity: 0;
    -webkit-transition: all 0.4s ease-out;
    transition: all 0.4s ease-out;
    background: rgba(0, 0, 0, 0.5) !important;
    width: 40px;
    cursor: pointer;
    height: 40px;
    position: absolute;
    display: block;
    z-index: 1000;
    border-radius: 0;
}

header .owl-nav .owl-next span {
    font-size: 1.6875rem;
    color: #fff;
}

header .owl-nav .owl-next:focus {
    outline: 0;
}

header .owl-nav .owl-next:hover {
    background: #000 !important;
}

header:hover .owl-prev {
    left: 0px;
    opacity: 1;
}

header:hover .owl-next {
    right: 0px;
    opacity: 1;
}

.blink_me {
    animation: blinker 1.2s linear infinite;
}

@keyframes blinker {
    80% {
        opacity: 0.2;
    }
}

.banner:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    z-index: -1;
}
</style>


<!-- banner begin -->
<header>
    <div class="owl-carousel owl-theme banner owl-car">
        <?php
			global $conn;
			$sql = "SELECT * FROM tbl_slider WHERE slider_status='1' ORDER BY slider_order ASC";
			$ex = $conn->query($sql);
			while ($row = $ex->fetch_array()) {
			?>
        <div class="item">
            <img src="<?= $path; ?>uploads/slider/<?= $row['slider_image']; ?>" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-7 col-lg-7 col-md-6">
                            <div class="banner-txt">
                                <div class="line"></div>
                                <h1><?= $row['slider_title']; ?></h1>
                                <h4><?= $row['slider_desc']; ?></h4>
                                <div class="btn-box">
                                    <a href="#services" class="left-btn">Our Services</a>
                                    <a href="<?= $path ?>contact-us" class="right-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
			}
			?>

    </div>
</header>

<!-- banner end -->


<!-- process begin -->
<?php
$home_secs = unserialize(str($home_secs['txt_data']));
?>
<div class="process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4">
                <div class="heading">
                    <h5>HOW WE WORK</h5>
                    <h2>Our Work Process</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box" style="cursor: pointer;"
                    onclick="document.location='<?= $path; ?>admission-process';">
                    <div class="part-icon">
                        <i style="font-size: 50px; color:white !important" class="fa <?= $home_secs['font1'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title1'] ?></h3>
                        <p><?= $home_secs['desc1'] ?></p>
                    </div>
                    <span>01</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box" style="cursor: pointer;"
                    onclick="document.location='<?= $path; ?>admission-process';">
                    <div class="part-icon">
                        <i style="font-size: 50px; color:white !important" class="fa <?= $home_secs['font2'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title2'] ?></h3>
                        <p><?= $home_secs['desc2'] ?></p>
                    </div>
                    <span>02</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="single-box" style="cursor: pointer;"
                    onclick="document.location='<?= $path; ?>admission-process';">
                    <div class="part-icon">
                        <i style="font-size: 30px; color:white !important" class="fa <?= $home_secs['font3'] ?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="part-txt">
                        <h3><?= $home_secs['title3'] ?></h3>
                        <p><?= $home_secs['desc3'] ?></p>
                    </div>
                    <span>03</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- process end -->
<!-- Service 1 Area Start Here -->
<!-- About 1 Area Start Here -->


<!-- about begin -->
<div class="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="image-box">
                    <div class="part-img">
                        <img src="<?= $path; ?>uploads/media/<?= $home_secs['sec_banner'] ?>" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="part-txt">
                    <div class="heading">
                        <h5>About Us</h5>
                        <h2><?= $home_secs['title'] ?></h2>
                    </div>
                    <p><?= $home_secs['desc'] ?></p>

                </div>
            </div>
        </div>
    </div>
</div>








<!-- about end -->


<!-- Service 2 Area Start Here -->

<!-- service begin -->
<div class="blog" id="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6">
                <div class="heading">
                    <h5>AIMI Services</h5>
                    <h2>Latest Updates</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="blog-slider owl-carousel">
                    <?php
				global $conn;
				$sqlc = "SELECT * FROM tbl_listings WHERE list_type='courses' AND list_status='1' AND list_label='1' ORDER BY list_order ASC";
				$exc = $conn->query($sqlc);
				while ($rowc = $exc->fetch_array()) {
				?>
                    <div class="single-box">
                        <div class="part-img">
                            <img src="<?= $path ?>uploads/courses/<?= $rowc['list_image'] ?>" alt="image">
                        </div>
                        <div class="part-txt">
                            <a href="blog-details.html" class="title"><?= $rowc['list_title'] ?></a>
                            <p><?= $rowc['list_desc'] ?></p>
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
<!-- service end -->

<div class="partner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6">
                <div class="heading">
                    <h2>Affiliation - Recognition</h2>
                </div>
            </div>
        </div>
        <div class="bg">
            <div class="brand-slider owl-carousel">
                <?php
			global $conn;
			$sql5 = "SELECT * FROM tbl_listings WHERE list_type='partners' AND list_status='1' ORDER BY list_order ASC";
			$ex5 = $conn->query($sql5);
			while ($row5 = $ex5->fetch_array()) {
			?>
                <div class="single-img">
                    <a href="<?= $row5['list_detail'] ?>" target="_blank">
                        <img src="<?= $path ?>uploads/partners/<?= $row5['list_image'] ?>" alt="logo">
                        <?= $row5['list_title'] ?>
                    </a>
                </div>
                <?php
			}
			?>
            </div>
        </div>
    </div>
</div>






<?php @include_once('inc_pages/shared/footer.php'); ?>
<script>
$(document).ready(function() {

    var $slider = $(".slider"),
        $slideBGs = $(".slide__bg"),
        diff = 0,
        curSlide = 0,
        numOfSlides = $(".slide").length - 1,
        animating = false,
        animTime = 500,
        autoSlideTimeout,
        autoSlideDelay = 6000,
        $pagination = $(".slider-pagi");

    function createBullets() {
        for (var i = 0; i < numOfSlides + 1; i++) {
            var $li = $("<li class='slider-pagi__elem'></li>");
            $li.addClass("slider-pagi__elem-" + i).data("page", i);
            if (!i) $li.addClass("active");
            $pagination.append($li);
        }
    };

    createBullets();

    function manageControls() {
        $(".slider-control").removeClass("inactive");
        if (!curSlide) $(".slider-control.left").addClass("inactive");
        if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
    };

    function autoSlide() {
        autoSlideTimeout = setTimeout(function() {
            curSlide++;
            if (curSlide > numOfSlides) curSlide = 0;
            changeSlides();
        }, autoSlideDelay);
    };

    autoSlide();

    function changeSlides(instant) {
        if (!instant) {
            animating = true;
            manageControls();
            $slider.addClass("animating");
            $slider.css("top");
            $(".slide").removeClass("active");
            $(".slide-" + curSlide).addClass("active");
            setTimeout(function() {
                $slider.removeClass("animating");
                animating = false;
            }, animTime);
        }
        window.clearTimeout(autoSlideTimeout);
        $(".slider-pagi__elem").removeClass("active");
        $(".slider-pagi__elem-" + curSlide).addClass("active");
        $slider.css("transform", "translate3d(" + -curSlide * 100 + "%,0,0)");
        $slideBGs.css("transform", "translate3d(" + curSlide * 50 + "%,0,0)");
        diff = 0;
        autoSlide();
    }

    function navigateLeft() {
        if (animating) return;
        if (curSlide > 0) curSlide--;
        changeSlides();
    }

    function navigateRight() {
        if (animating) return;
        if (curSlide < numOfSlides) curSlide++;
        changeSlides();
    }

    $(document).on("mousedown touchstart", ".slider", function(e) {
        if (animating) return;
        window.clearTimeout(autoSlideTimeout);
        var startX = e.pageX || e.originalEvent.touches[0].pageX,
            winW = $(window).width();
        diff = 0;

        $(document).on("mousemove touchmove", function(e) {
            var x = e.pageX || e.originalEvent.touches[0].pageX;
            diff = (startX - x) / winW * 70;
            if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /=
                2;
            $slider.css("transform", "translate3d(" + (-curSlide * 100 - diff) + "%,0,0)");
            $slideBGs.css("transform", "translate3d(" + (curSlide * 50 + diff / 2) +
                "%,0,0)");
        });
    });

    $(document).on("mouseup touchend", function(e) {
        $(document).off("mousemove touchmove");
        if (animating) return;
        if (!diff) {
            changeSlides(true);
            return;
        }
        if (diff > -8 && diff < 8) {
            changeSlides();
            return;
        }
        if (diff <= -8) {
            navigateLeft();
        }
        if (diff >= 8) {
            navigateRight();
        }
    });

    $(document).on("click", ".slider-control", function() {
        if ($(this).hasClass("left")) {
            navigateLeft();
        } else {
            navigateRight();
        }
    });

    $(document).on("click", ".slider-pagi__elem", function() {
        curSlide = $(this).data("page");
        changeSlides();
    });

});
$('.owl-car').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    mouseDrag: false,
    autoplay: true,
    animateOut: 'slideOutUp',
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
</script>