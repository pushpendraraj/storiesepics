<h3 class="ptitle">Patient Care Testimonials</h3>
  <?php extract($PageVar); ?>
    <div id="testimonial" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      <?php for($i=0; $i<count($Testimonials); $i++){ ?>
        <div class="item <?php echo ($i==0)?'active':'';?>">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <p class="hightlight"><?=$Testimonials[$i]['Testimonial']['comment']; ?></p>
                  <span class="writer">- <?=ucwords($Testimonials[$i]['Testimonial']['published_by']); ?></span>
              </div>
              <?php if(!empty($Testimonials[$i+1])){ ?>
              <div class="col-md-6 col-sm-6">
                <p class="hightlight"><?=$Testimonials[$i+1]['Testimonial']['comment']; ?></p>
                  <span class="writer">- <?=ucwords($Testimonials[$i+1]['Testimonial']['published_by']); ?></span>
              </div>
              <?php } ?>
            </div>
        </div>
      <?php } ?>  
      </div>
      <a class="left carousel-control" href="#testimonial" role="button" data-slide="prev">&rarr;</a>
      <a class="right carousel-control" href="#testimonial" role="button" data-slide="next">&larr;</a>
    </div>