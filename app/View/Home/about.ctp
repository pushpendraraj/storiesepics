<div class="container">
    <?php extract($PageVar); ?>
    <?php echo $this->element('frontend-breadcumb'); ?>
    <div class="row welcomeabout">
        <div class="col-md-6 col-sm-6">
            <img src="<?=IMG_FRONT?>vdo.jpg" alt="" class="img-responsive">
        </div>
        <div class="col-md-6 col-sm-6">
            <h2>Welcome to Patient Care</h2>
            <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor.</p>
            <h3 class="ptitle">Our Motto</h3>
            <p class="hightlight">The mind has great influence over the body, and maladies often have their origin there.</p>
            <span>Jean Baptiste Moličre</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h3 class="ptitle">Our Features</h3>
            <p class="hightlight">There's lots of people in this world who spend so much time watching their health that they haven't the time to enjoy it. </p>
            <span class="writer">Josh Billings</span>
            
            <div class="panel-group cqc-accordian features" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default active">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Cras rutrum leo at odio volutpat id blandit fugiats?
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                      <ul class="features-list">
                        <li><img src=<?=IMG_FRONT?>hex1.png alt="">
                        <p>Donec ipsum diam, pretium mollis dapibus risus. Nullam dolor nibh pulvinar at interdum eget, suscipit id felis. Pellentesque est faucibus tincidunt risus.</p>
                        <a href="#">Read more →</a>
                        </li>
                          <li><img src=<?=IMG_FRONT?>hex2.png alt="">
                        <p>Donec ipsum diam, pretium mollis dapibus risus. Nullam dolor nibh pulvinar at interdum eget, suscipit id felis. Pellentesque est faucibus tincidunt risus.</p>
                        <a href="#">Read more →</a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Donec fermentum porttitor nunc amet gravida?
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    Donec fermentum porttitor nunc amet gravida?
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     Aenean faucibus sapien a odio varius?
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    Aenean faucibus sapien a odio varius? 
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Donec pulvinar lectus quis laoreet vestibulum?
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                    Donec pulvinar lectus quis laoreet vestibulum?
                  </div>
                </div>
              </div>
            </div>
            
            
        </div>
        <div class="col-md-6 col-sm-6">
            <h3 class="ptitle">Why Choose Patient Care?</h3>
            <ul class="why_pc">
                <li><img src="<?=IMG_FRONT?>pc.jpg" alt="">
                <p>Donec ipsum diam, pretium mollis dapibus risus. Nullam id dolor id nibh pulvinar at interdum eget, suscipit eget felis. Pellentesque est faucibus tincidunt risus id interdum primis.</p>
                <a href="#">Read more →</a>
                </li>
                <li><img src="<?=IMG_FRONT?>pc.jpg" alt="">
                <p>Donec ipsum diam, pretium mollis dapibus risus. Nullam id dolor id nibh pulvinar at interdum eget, suscipit eget felis. Pellentesque est faucibus tincidunt risus id interdum primis.</p>
                <a href="#">Read more →</a>
                </li>
                <li><img src="<?=IMG_FRONT?>pc.jpg" alt="">
                <p>Donec ipsum diam, pretium mollis dapibus risus. Nullam id dolor id nibh pulvinar at interdum eget, suscipit eget felis. Pellentesque est faucibus tincidunt risus id interdum primis.</p>
                <a href="#">Read more →</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="ptitle">Meet The Team</h3>
            <div class="row">
                <div class="col-md-3 col-sm-3 team text-center">
                    <img src="<?=IMG_FRONT?>team.jpg" alt="" class="img-responsive">
                    <div class="userinfo"><strong>Ann Blyumin, Prof. </strong> Primary Health Care</div>
                    <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue.Duis mollis, est non commodo luctus.</p>
                    <ul>
                        <li><a href="#"><img src="<?=IMG_FRONT?>faceic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>googleic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>mailic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>forestic.jpg" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 team text-center">
                    <img src="<?=IMG_FRONT?>team.jpg" alt="" class="img-responsive">
                    <div class="userinfo"><strong>Ann Blyumin, Prof. </strong> Primary Health Care</div>
                    <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue.Duis mollis, est non commodo luctus.</p>
                    <ul>
                        <li><a href="#"><img src="<?=IMG_FRONT?>faceic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>googleic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>mailic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>forestic.jpg" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 team text-center">
                    <img src="<?=IMG_FRONT?>team.jpg" alt="" class="img-responsive">
                    <div class="userinfo"><strong>Ann Blyumin, Prof. </strong> Primary Health Care</div>
                    <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue.Duis mollis, est non commodo luctus.</p>
                    <ul>
                        <li><a href="#"><img src="<?=IMG_FRONT?>faceic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>googleic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>mailic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>forestic.jpg" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 team text-center">
                    <img src="<?=IMG_FRONT?>team.jpg" alt="" class="img-responsive">
                    <div class="userinfo"><strong>Ann Blyumin, Prof. </strong> Primary Health Care</div>
                    <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue.Duis mollis, est non commodo luctus.</p>
                    <ul>
                        <li><a href="#"><img src="<?=IMG_FRONT?>faceic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>googleic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>mailic.jpg" alt=""></a></li>
                        <li><a href="#"><img src="<?=IMG_FRONT?>forestic.jpg" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
