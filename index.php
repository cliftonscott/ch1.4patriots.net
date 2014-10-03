<? include_once ('template-top.php'); ?>
    
<? include_once ('template-header-nav.php'); /*Add template-header-nav.php to add top menu*/?> 
  
<div class="container-main">
	
<div class="container">
  <div class="row">
      <div class="col-sm-12 col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="media/images/f4p/f4p-product-slide-01.jpg" alt="Patriot Power Generator">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="media/images/f4p/f4p-product-slide-04.jpg" alt="Patriot Power Deluxe">
                  <div class="carousel-caption">
                  </div>
                </div>
                 <div class="item">
                  <img src="media/images/f4p/f4p-product-slide-03.jpg" alt="Patriot Power Accesories">
                  <div class="carousel-caption">
                  </div>
                </div>
          </div><!-- Controls -->
 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
		</div>
	</div>
	<div class="col-sm-12 col-md-12">
    	<div class="clearfix">
		<div class="row">
			<div class="col-sm-6 col-md-6  text-center hidden-xs" style="margin-top:30px;"><a class="btn btn-success btn-lg btn-block" href="/video/index.php?AFID=<?php echo $afid;?>" target="_self"><i class="fa fa-video-camera"></i>  Watch Video</a></div>
			<div class="col-sm-6 col-md-6  text-center" style="margin-top:30px;"><a class="btn btn-primary btn-lg btn-block" href="/letter/index.php?AFID=<?php echo $afid;?>" target="_self"><i class="fa fa-info-circle"></i> Read Description</a></div>
        </div>
        </div>
	</div>	
  
</div>
</div>  
<div class="container">  
  <hr>
  
  <div class="jumbotron text-left">
    <h2 class="darkRed"><i class="fa fa-comments-o"></i> Testimonials</h2>

		<div class="container" id="testimonials-row">		
			<div class="row">
				<div class="col-md-12 column">				
					<div class="carousel slide" id="testimonials-rotate" data-ride="carousel">
						<ol class="carousel-indicators hide">
							<li class="active" data-slide-to="0" data-target="#testimonials-rotate">
							</li>
							<li data-slide-to="1" data-target="#testimonials-rotate">
							</li>
							<li data-slide-to="2" data-target="#testimonials-rotate">
							</li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="testimonials  col-md-12">
									
										<p>
											<i class="fa fa-quote-left fa-3x pull-left"></i>&quot;I like that this is compact, protected and safe. I now feel more able to feed my family in time of crisis. I wish I could afford more of them.&quot; - <strong>Mark S.</strong>
										</p>
									
								</div>
								
								<div class="clearfix"></div>
							</div>
							<div class="item">
								<div class="testimonials  col-md-12">
									
										<p>
											<i class="fa fa-quote-right fa-3x pull-right"></i> &quot;The packaging is fantastic - they went right on the shelf. Coming from you I know the product is a superior product and will be great when I need them. I feel even more secure with your product because it would be the first item that I would load up in an emergency. Yes, I would definitely recommend your superior product to others.&quot; - <strong>Molly S.</strong>
										</p>
									
								</div>
								
								<div class="clearfix"></div>
							</div>
							<div class="item">
								<div class="testimonials  col-md-12">
									
										<p>
											<i class="fa fa-quote-left fa-3x pull-left"></i>&quot;I like the construction of the containers, the listing on the outer side panel of contents. They can be stacked 1 on top of the other. I do feel better knowing I have a year’s supply of food on hand.&quot; - <strong>J. Charger  </strong>
										</p>
									
								</div>
								
								<div class="clearfix"></div>
							</div>
						</div> 					
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
    <p style="padding-bottom:20px;"><a class="btn btn-large btn-success pull-right" href="/testimonials.php" target="ext">Read More</a></p>
  </div>
  <div class="jumbotron text-left">
    <h2 class="darkRed"><i class="fa fa-users"></i> Patriot Headquarters Blog</h2>
    <p class="lead">Check out the latest articles and videos on off-grid living and self-reliance from our partners at Patriot Headquarters.</p>
    <p style="padding-bottom:20px;"><a class="btn btn-large btn-success pull-right" href="http://www.patriotheadquarters.com" target="ext">Visit Blog</a></p>
  </div>
  
</div> 
<script>
$(document).ready(function(){
        $('#testimonials-rotate').carousel({
            interval: 7000
        })
        $('#mcarousel-example-generic').carousel({
            interval: 5000
        })
    });
</script>
<? include_once ('template-bottom.php'); ?>
