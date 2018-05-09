<div class="container">
    <?php extract($PageVar); ?>
    <?php echo $this->element('frontend-breadcumb'); ?>
    <div class="row">
        <div class="col-md-12 mapsection"><img src="<?=IMG_FRONT?>map.jpg" alt="" class="img-responsive"></div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h3 class="ptitle">Contact Form</h3>
            <form class="contact-form">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="dropdown form-group department">
                          <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Select Department</button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Department 1</a></li>
                            <li><a href="#">Department 2</a></li>
                            <li><a href="#">Department 3</a></li>
                            <li><a href="#">Department 4</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Date of Birth (mm/dd/yyyy)</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Social Security Number</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Reason for Appointment</label>
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12 text-right">
                      <div class="form-group"><input type="submit" value="Submit" class="btn btn-primary"></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-sm-4 contact-details">
            <h3 class="ptitle">Patient care</h3>
            <div class="tagline">One of the most sublime experiences we can ever have is to wake up feeling healthy after we have been sick.</div>
            <address>Patient Care <br>
            33 Farlane Street<br>
            Keilor East<br>
            VIC 3033, Australia</address>
            <address>Phone: 1-800-643-4300<br>
            Fax: 1-800-112-2560<br>
            ABN: 32040030725</address>
            <ul>
                <li><img src="<?=IMG_FRONT?>phone.png" alt=""><span>Phone: <strong>1-800-643-4300</strong></span></li>
                <li><img src="<?=IMG_FRONT?>email.png" alt=""><span>E-mail: <a href="mailto:patientcare@mail.com">patientcare@mail.com</a></span></li>
                <li><img src="<?=IMG_FRONT?>face.png" alt=""><span><a href="#">facebook.com/patientcare</a></span></li>
                <li><img src="<?=IMG_FRONT?>tweet.png" alt=""><span><a href="#">twitter.com/patientcare</a></span></li>
                <li><img src="<?=IMG_FRONT?>google.png" alt=""><span><a href="#">google.com/patientcare</a></span></li>
            </ul>
        </div>
    </div>
</div>