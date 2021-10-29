<?php include_once("includes/conn.php");
include_once('includes/baseFunctions.php');
include_once('includes/siteFunctions.php');
include_once("includes/confg.php");
$banners = unserialize(str($banners['txt_data']));
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Abbottabad International Medical College</title>
    <meta name="description"
        content="Abbottabad's Serene pine Hills, Crisp Coll evenings & Airy days provide the ideal educational environment. AIMI beckons you to join our highly professional planned educational facilities keeping abreast with the lates international standard.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?= $site_meta_keywords; ?>" />
    <meta name="author" content="Muhammad Umair - iBuildsoft.com">

    <meta name="google-site-verification" content="_ubxXxLM1fBGZq7XMWQD1TNtIVbEMJb16AU2r5LKAH8" />

    <meta property="fb:app_id" content="" />
    <meta property="og:title" content="<?= $site_meta_title ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $path; ?>" />
    <meta property="og:description" content="<?= $site_meta_description; ?>" />
    <meta property="og:image" content="<?= $path; ?>uploads/fb.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="400" />
    <meta property="og:image:alt" content="<?= $site_meta_title ?>" />
    <meta property="og:locale" content="en_US">




    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- animate css old -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/animate-2.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="<?= $path; ?>assets/flaticon/flaticon.css">
    <!-- odometer -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/odometer.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/owl.carousel.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/slick.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/bootstrap.min.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="<?= $path; ?>assets/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-W4VQGP4');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-30945853-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-30945853-2');
    </script>
    <style type="text/css">
    .nav_active {
        color: #E7B03C !important;
    }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4VQGP4" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- preloader begin -->
    <div class="preloader">
        <div class="loader"><img src="<?= $path; ?>assets/images/spinner.gif" alt="image"></div>
    </div>
    <!-- preloader end -->
    <!-- header begin -->
    <div class="header">
        <div class="top-header">
            <div class="container">
                <div class="row no-gutters justify-content-between align-items-center">
                    <div class="col-xl-4 col-lg-5 col-sm-8">
                        <div class="top-left">
                            <ul>
                                <li><i class="flaticon-message"></i><span><?= $site_email ?></span></li>
                                <li><i class="flaticon-phone-call"></i><span><?= $site_phone ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-4 d-flex justify-content-sm-end justify-content-center">
                        <div class="top-right">
                            <a href="<?= $site_facebook ?>" class="fb"><i class="flaticon-facebook"></i></a>
                            <a href="<?= $site_twitter ?>" class="tw"><i class="flaticon-twitter"></i></a>
                            <a href="<?= $site_instagram ?>" class="ins"><i class="flaticon-instagram"></i></a>
                            <a href="<?= $site_linkedin ?>" class="ld"><i class="flaticon-linkedin"></i></a>
                            <a href="<?= $site_youtube ?>" class="yt"><i class="flaticon-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header">
            <div class="bg">
                <div class="">
                    <div class="bg-2">
                        <div class="bg-3">
                            <div class="row">
                                <div class="d-xl-none d-lg-none col-4">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="flaticon-menu-button-of-three-horizontal-lines"></i>
                                    </button>
                                </div>
                                <div class="col-xl-2 col-lg-1 col-4 d-flex align-items-center">

                                    <div class="container">

                                        <div class="logo">
                                            <a href="<?= $path; ?>">
                                                <img src="<?= $path; ?>uploads/logo/<?= $site_logo ?>" alt="LOGO"
                                                    style="max-width:130px!important;">
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-8 col-lg-9 next">
                                    <nav id="desktop-nav" class="navbar navbar-expand-lg navbar-light">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item">
                                                    <a href="<?= $path; ?>"
                                                        class="nav-link <?= ($_REQUEST['page'] == 'index' || empty($_REQUEST['page'])) ? 'nav_active' : ''; ?>">Home</a>
                                                </li>
                                                <?php
                                        global $conn;
                                        $sql = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_parent='0' AND page_menu='1'";
                                        $ex = $conn->query($sql);
                                        while ($row = $ex->fetch_array()) {
                                        ?>
                                                <li class="nav-item dropdown"><a class="nav-link" href="<?php
if ($row['page_parent'] == 0 && empty($row['page_link']))
{
if (empty($row['page_link'])) {
                                                                echo 'javascript:void(0);';
                                                            } else {
                                                                echo $path . $row['page_link'];
                                                            }
                                                            ?>" role="button"
                                                        data-toggle="dropdown"><?= $get_e ?><?= $row['page_title'] ?></a>

                                                    <?php
                                                    }
                                                    else{
if (empty($row['page_link'])) {
                                                                echo 'javascript:void(0);';
                                                            } else {
                                                                echo $path . $row['page_link'];
                                                            }
                                                            ?>"><?= $get_e ?><?= $row['page_title'] ?></a>
                                                    <?php
                                                    }
                                                 
                                                    ?>





                                                    <ul class="dropdown-menu">
                                                        <?php
                                                    global $conn;
                                                    $que = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_parent='" . $row['page_id'] . "' AND page_menu='1' ORDER BY page_id DESC";
                                                    $exe = $conn->query($que);

                                                    while ($sub_row1 = $exe->fetch_array()) {
                                                    ?>

                                                        <li <?= get_parent_menu($sub_row1['page_id']); ?>><a
                                                                href="<?= $path ?><?= $sub_row1['page_link'] ?>"
                                                                class="navcap dropdown-item"><?= $get_e ?><?= $sub_row1['page_title'] ?></a>
                                                            <?php ?>

                                                            <?= get_sub_menu($sub_row1['page_id']) ?>

                                                        </li>


                                                        <?php
                                                    }
                                                    ?>
                                                    </ul>
                                                </li>
                                                <?php
                                        }
                                        ?>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="<?= $path ?>contact-us">Contact Us</a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="<?= $path ?>feedback">Feedback</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-4">
                                    <div class="bottom-right">




                                        <a href="<?= $path ?>apply-now" class="follow text-primary">Apply for
                                            job</a>

                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->