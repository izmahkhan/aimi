<!-- CONTENT -->
<!-- Intro Section -->
<section class="inner-intro  padding bg-img overlay-dark light-color">
    <div class="container">
        <div class="row title">
            <h1>Get A Quote</h1>
            <div class="page-breadcrumb">
               <a href="<?= $path; ?>">Home</a>

           </div>
       </div>
   </div>
</section>
<!-- End Intro Section -->
<!-- Contact Section -->
<section class="padding ptb-xs-60">
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="headeing pb-30">
                    <h2>Get A Quote</h2>
                    <span class="b-line l-left line-h"></span>
                </div>
                <!-- Contact FORM -->
                <form action="" class="contact-form" method="post" enctype="multipart/form-data">
                    <!-- IF MAIL SENT SUCCESSFULLY -->
                    <?php
                    echo showMsg();
                    ?>
                    <input type="hidden" name="quote_form" value="posted">
                    <!-- END IF MAIL SENT SUCCESSFULLY -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-field">
                                <input class="form-full" type="text" name="name" value="<?=$_POST['name'];?>" size="40" aria-required="true" aria-invalid="false" placeholder="Your name" required="">   
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-field">
                                <input class="form-full" type="url" name="website" value="<?=$_POST['website'];?>" size="40" aria-required="true" aria-invalid="false" placeholder="Your website(optional)">  
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                        <div class="form-field">
                           <input class="form-full" type="email" name="email" value="<?=$_POST['email'];?>" size="40" aria-required="true" aria-invalid="false" placeholder="Your email" required="">  

                       </div>
                   </div>
                   <div class="col-lg-6">
                    <div class="form-field">
                        <input class="form-full" type="text" name="phone" value="<?=$_POST['phone'];?>" size="40" aria-required="true" aria-invalid="false" placeholder="Your phone(optional)">  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-field">
                     <input class="form-full" type="text" name="subject" value="<?=$_POST['subject'];?>" size="40" aria-invalid="false" placeholder="Subject" required="">   
                 </div>
             </div>

             <div class="col-lg-12 mb-20">
                <div class="form-field">
                   <textarea class="form-control" name="message" rows="7" aria-invalid="false" placeholder="Your message" required=""><?=$_POST['message'];?></textarea>
               </div>

           </div>
           <div class="col-lg-12 text-center">

              <div class="g-recaptcha" data-sitekey="6Lf_nWwUAAAAAOWsOO1Uc71lQo8aWGt1p93MlWym"></div>

          </div>
      </div>
      <div class="col-lg-12 mt-30">
        <button type="submit" class="btn-text">SEND MESSAGE</button>
    </div>
</div>
</form>
<!-- END Contact FORM -->
</div>



</div>
</div>
<!-- Map Section -->

</section>
<!-- Map -->
<section class="map-box">
  <div class="map">
    <?= $site_contact_map ?>
</div>
</section>
<!-- Contact Section -->
<!--End Contact-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php @include_once ('inc_pages/shared/footer.php'); ?>