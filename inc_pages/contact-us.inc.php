<!-- CONTENT -->
<!-- Intro Section -->
<div class="breadcrumb contact-breadcrumb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4">
                <div class="part-txt">
                    <h1>contact Us</h1>
                    <ul>
                        <li><a href="<?= $path ?>">Home</a></li>
                        <li>-</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page 1 Area Start Here -->
<div class="contact">
    <div class="container">
        <div class="boxes">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                    <div class="single-box">
                        <div class="part-icon">
                            <span><i class="flaticon-phone-call"></i></span>
                        </div>
                        <div class="part-txt">
                            <h3>Phone</h3>
                            <?php
                        if (!empty($site_phone)) {
                            ?>
                            <span><?= $site_phone ?></span>
                            <?php
                        } else {
                            echo "";
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                    <div class="single-box">
                        <div class="part-icon">
                            <span><i class="flaticon-message"></i></span>
                        </div>
                        <div class="part-txt">
                            <h3>Email Us</h3>
                            <?php
                        if (!empty($site_email)) {
                            ?>
                            <span><?= $site_email ?></span>
                            <?php
                        } else {
                            echo "";
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                    <div class="single-box">
                        <div class="part-icon">
                            <span><i class="flaticon-pin"></i></span>
                        </div>
                        <div class="part-txt">
                            <h3>Our Address</h3>
                            <?php
                        if (!empty($site_address)) {
                            ?>
                            <span><?= $site_address ?></span>
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
        <form class="form contact-form" method="post" enctype="multipart/form-data">
            <fieldset>
                <?php
                                echo showMsg();
                                ?>
                <input type="hidden" name="contct_form" value="posted">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <input type="text" id="form-name" name="name" value="<?= $_POST['name']; ?>"
                            data-error="Name field is required" placeholder="Your name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <input type="email" id="form-email" name="email" value="<?= $_POST['email']; ?>"
                            data-error="Email field is required" placeholder="Your email" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <input type="text" id="form-phone" name="phone" value="<?= $_POST['phone']; ?>"
                            data-error="Phone field is required" placeholder="Your phone number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <textarea placeholder="Message *" class="textarea" name="message" id="form-message" rows="8"
                            cols="20" data-error="Message field is required"
                            required><?= $_POST['message']; ?></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center mb-4">
                                <div class="g-recaptcha btn" data-sitekey="6Lf_nWwUAAAAAOWsOO1Uc71lQo8aWGt1p93MlWym">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button class="def-btn def-btn-2">Send Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                        <div class='form-response'></div>
                    </div>
            </fieldset>
    </div>
</div>
</form>
</div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="google-map-area">
            <div style="width:100%; height:395px;">
                <?= $site_contact_map; ?>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<!--End Contact-->

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php @include_once ('inc_pages/shared/footer.php'); ?>