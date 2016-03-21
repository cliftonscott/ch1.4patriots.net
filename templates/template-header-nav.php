<div class="navbar navbar-inverse navbar-static-top">
    <?php
    if(substr_count($_SERVER["PHP_SELF"],"/") == 1) {
        $logoImage = "<a href='" . url('/index.php') . "'>";
        $logoImage.= "<img src='/assets/images/logo-small.png' alt='power4patriots' class='img-responsive'/>";
        $logoImage.= "</a>";
    } else {
        $logoImage = "<img src='/assets/images/logo-small.png' alt='power4patriots' class='img-responsive'/>";
    }
    ?>
    <div class="navbar-header">
        <div class="navbar-brand"><?php echo $logoImage;?></div>
        <a href="#" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo url('/index.php'); ?>">Home</a></li>
            <?php
            $afid = $analyticsObj->affiliateId;
            if(empty($afid)) {
                $afid = "MINISITE";
            }
            ?>
            <li><a href="<?php echo url('/video/index.php?AFID=' . $afid); ?>">Purchase</a></li>
            <li><a href="<?php echo url('/contact.php'); ?>">Contact</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Info <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo url('/faq.php'); ?>">FAQ</a></li>
                    <li><a href="<?php echo url('/testimonials.php'); ?>">Testimonials</a></li>
                    <li><a href="http://food4patriotsreview.com/" target="_blank">Review Site</a></li>
                    <li><a href="<?php echo url('/newsroom.php'); ?>">Newsroom</a></li>
                    <li><a href="<?php echo url('/returns.php'); ?>">Returns</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo url('/privacy.php'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo url('/terms.php'); ?>">Terms Conditions</a></li>
                    <li><a href="<?php echo url('/disclaimer.php'); ?>">Disclaimer</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
</div><!-- /container -->
</div><!-- /navbar wrapper -->
<div class="navbar-phone-contain">
    <div class="container nopadding">
        <div class="navbar-phone">
            <?php
            if($productId = 17) {
                echo("<div id=\"phone-txt\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-598-5012</div>
 			<div id=\"phone-button\"><button type=\"button\" class=\"btn btn-primary\"><a href=\"tel:1-800-598-5012\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-598-5012</a></button></div>");
            }
            else {
                echo("<div id=\"phone-txt\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-728-0008</div>
 			<div id=\"phone-button\"><button type=\"button\" class=\"btn btn-primary\"><a href=\"tel:1-800-728-0008\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-728-0008</a></button></div>");
            }  ?>
        </div>
    </div>
</div><!-- /navbar phone --> 
