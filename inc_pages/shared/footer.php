<!-- footer begin -->
<div class="footer">
    <div class="container">
        <div class="main-footer">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="about-txt">
                        <h3>Abbotabad International Medical Institute</h3>
                        <p><?= $site_footer_text ?></p>
                        <ul>
                            <li><span><i class="flaticon-pin"></i></span><?= $site_address ?></li>
                            <li><span><i class="flaticon-phone-call"></i></span>callto: <?= $site_phone ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="link">
                        <h3>Our Services</h3>
                        <ul>
                            <?php
				global $conn;
				$sqlc = "SELECT * FROM tbl_listings WHERE list_type='courses' AND list_status='1' AND list_label='1' ORDER BY list_order ASC";
				$exc = $conn->query($sqlc);
				while ($rowc = $exc->fetch_array()) {
				?>


                            <li><a href="<?= $rowc['list_link'] ?>"><?= $rowc['list_title'] ?></a></li>
                            <?php
				}
				?>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="link">
                        <h3>Useful Links</h3>
                        <ul>

                            <?php
                                    global $conn;
                                    $sql3 = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_label='1'";
                                    $ex3 = $conn->query($sql3);
                                    while ($row3 = $ex3->fetch_array()) {
                                    ?>


                            <li><a href="<?= $path ?><?= $row3['page_link'] ?>"><?= $row3['page_title'] ?></a></li>
                            <?php
                                    }
                                    ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="newsletter">
                        <h3>Social media links</h3>
                        <p>You can find about us more by visiting our social sites</p>
                        <div class="social">

                            <?php
                            if (!empty($site_facebook)) {
                            ?>

                            <a target="_blank" href="<?= $site_facebook ?>" class="fb"><i
                                    class="flaticon-facebook"></i></a>

                            <?php
                            } else {
                                echo "";
                            }
                            ?>

                            <?php
                            if (!empty($site_twitter)) {
                            ?>

                            <a target="_blank" href="<?= $site_twitter ?>" class="tw"><i
                                    class="flaticon-twitter"></i></a>
                            <?php
                            } else {
                                echo "";
                            }
                            ?>
                            <?php
                            if (!empty($site_youtube)) {
                            ?>

                            <a target="_blank" href="<?= $site_youtube ?>" class="yt"><i
                                    class="flaticon-youtube"></i></a>
                            <?php
                            } else {
                                echo "";
                            }
                            ?>
                            <?php
                            if (!empty($site_instagram)) {
                            ?>

                            <a href="<?= $site_instagram ?>" class="ins"><i class="flaticon-instagram"></i></a>


                            <?php
                            } else {
                                echo "";
                            }
                            ?>
                            <?php
                            if (!empty($site_linkedin)) {
                            ?>
                            <a href="<?= $site_linkedin ?>" class="ld"><i class="flaticon-linkedin"></i></a>
                            <?php
                            } else {
                                echo "";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <p><?= $site_meta_copyright ?></p>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="link">
                        <p>Designed &amp; Powered by <a href="https://aimi.edu.pk"
                                target="_blank"><b>aimi.edu.pk</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->


<!-- jquery -->
<script src="<?= $path; ?>assets/js/jquery-3.6.0.min.js"></script>
<!-- flagstrap -->
<script src="<?= $path; ?>assets/js/jquery.flagstrap.min.js"></script>
<!-- appear js -->
<script src="<?= $path; ?>assets/js/jquery.appear.min.js"></script>
<!-- odometer -->
<script src="<?= $path; ?>assets/js/odometer.min.js"></script>
<!-- owl carousel -->
<script src="<?= $path; ?>assets/js/owl.carousel.min.js"></script>
<!-- slick slider -->
<script src="<?= $path; ?>assets/js/slick.min.js"></script>
<!-- video popup -->
<script src="<?= $path; ?>assets/js/video.popup.js"></script>
<!-- popper js -->
<script src="<?= $path; ?>assets/js/popper.min.js"></script>
<!-- bootstrap -->
<script src="<?= $path; ?>assets/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="<?= $path; ?>assets/js/main.js"></script>

<?php
// if ($_REQUEST['test'] == 'popup') {
if ($_REQUEST['page'] == '' || $_REQUEST['page'] == 'index') {
?>
<script>
var modal = document.getElementById('myModal');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
$(document).on('click', '.closeBtn', function() {
    $('#myModal').hide();
});

function initNewsletterPopup() {
    $('#myModal').show();
}
initNewsletterPopup();
</script>
<?php
}
// }
?>
<script>
// custom js
$(document).ready(function() {
    $(".alpha").keypress(function(e) {
        var regex = new RegExp("^[a-zA-Zs ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    $(".alphanumeric").keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    $(".numeric").keypress(function(e) {
        var regex = new RegExp("^[0-9s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });

    $(document).on("paste", ".alpha", function(e) {
        $this = $(this);
        setTimeout(function() {
            var newValue = $this.val();
            var dataFull = newValue.replace(/[^\w\s]/gi, "");
            var dataFull2 = dataFull.replace(/[0-9]/g, "");
            var dataFull3 = dataFull2.trim();
            $this.val(dataFull3);
        });
    });
    $(document).on("paste", ".alphanumeric", function(e) {
        $this = $(this);
        setTimeout(function() {
            var newValue = $this.val();
            var dataFull = newValue.replace(/[^\w\s]/gi, "");
            // var dataFull2 = dataFull.replace(/[0-9]/g, '');
            var dataFull3 = dataFull.trim();
            $this.val(dataFull3);
        });
    });
    $(document).on("paste", ".numeric", function(e) {
        $this = $(this);
        setTimeout(function() {
            var newValue = $this.val();
            var dataFull = newValue.replace(/[^\w\s]/gi, "");
            var dataFull2 = dataFull.split(" ").join("");
            var dataFull3 = dataFull2.substring(0, 8);
            $this.val(dataFull3);
        });
    });
});
</script>
</body>

</html>