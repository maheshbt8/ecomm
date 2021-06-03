<?php 
	$contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
	$contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
	$contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
	$contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
	$contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
	
	$facebook =  $this->db->get_where('social_links',array('type' => 'facebook'))->row()->value;
	$googleplus =  $this->db->get_where('social_links',array('type' => 'google-plus'))->row()->value;
	$twitter =  $this->db->get_where('social_links',array('type' => 'twitter'))->row()->value;
	$skype =  $this->db->get_where('social_links',array('type' => 'skype'))->row()->value;
	$youtube =  $this->db->get_where('social_links',array('type' => 'youtube'))->row()->value;
	$pinterest =  $this->db->get_where('social_links',array('type' => 'pinterest'))->row()->value;
	
	$footer_text =  $this->db->get_where('general_settings',array('type' => 'footer_text'))->row()->value;
	$footer_category =  json_decode($this->db->get_where('general_settings',array('type' => 'footer_category'))->row()->value);
?>

	<!-- top-header -->
	
	<!--//tags -->
	<link href="<?php echo base_url();?>template/assests/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url();?>template/assests/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url();?>template/assests/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="<?php echo base_url();?>template/assests/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/assests/css/jquery-ui1.css">
	<!-- fonts -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>template/assests/css/font-awesome.min.css">
<style>
	.header{border-bottom:0px solid}
	.dropdown-item{
		width: auto !important;
		border-right: none !important;
	}
	</style>
	<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
				<?php
                            $home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;
                        ?>
                        <a href="<?php echo base_url();?>">
						<span>S</span>mart
						<span>S</span>hopp
                            <img src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop"/>
					</a>
				</h1>
                        
                       
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					
					<?php
                    	if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok' && $this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok') {
                            if($this->db->get_where('ui_settings',array('type'=>'header_store_locator_status'))->row()->value == 'yes') {
					?>
                    <li <?php if($asset_page=='store_locator'){ ?>class="active"<?php } ?>>
						<a href="<?php echo base_url(); ?>home/store_locator">
                            <span class="fa fa-truck" aria-hidden="true"></span>
							<?php echo translate('store_locator');?>
                        
							</a>
					
                    <?php
                            }
						}
					?>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li class="dropdown">
									<a  href="#" data-toggle="dropdown"><span class="fa fa-pencil-square-o" aria-hidden="true"></span>Sign Up
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu agile_short_dropdown">
										<li class="dropdown-item">
											<a href="<?php echo base_url(); ?>/home/login_set/registration">Customer Registration</a>
										</li>
										<li class="dropdown-item">
											<a href="<?php echo base_url(); ?>/home/vendor_logup/registration">Vendor Registration</a>
										</li>
										<li class="dropdown-item">
											<a href="<?php echo base_url(); ?>/home/supplier_logup/registration">Supplier Registration</a>
										</li>
										<li class="dropdown-item">
											<a href="<?php echo base_url(); ?>/home/distributor_logup/registration">Distributor Registration</a>
										</li>
									</ul>
								</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<?php
                            echo form_open(base_url() . 'home/text_search/', array(
                                'method' => 'post',
                                'accept-charset' => "UTF-8"
                            ));
                        ?>
				<div class="agileits_search">
			 <input  type="search" name="query"  accept-charset="utf-8" placeholder="<?php echo translate('what_are_you_looking_for');?>?"/>

						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	

    <?php
            	$others_list=$this->uri->segment(3);
			?>
	<div class="ban-top">
		<div class="container">
			
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock"  id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
							<?php if($this->db->get_where('ui_settings',array('type'=>'header_homepage_status'))->row()->value == 'yes'){?>
                    <li <?php if($asset_page=='home'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home">
                            <?php echo translate('homepage');?>
                        </a>
                    </li>    
					<?php } if($this->db->get_where('ui_settings',array('type'=>'header_all_categories_status'))->row()->value == 'yes'){?>
                    <li class="dropdown <?php if($asset_page=='all_category'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/all_category" class="nav-stylehead dropdown-toggle" data-toggle="dropdown">
							<?php echo translate('all_categories');?>
                        <b class="caret"></b></a>
									<ul class="dropdown-menu agile_short_dropdown">
                        	<?php
								$all_category = $this->db->get('category')->result_array();
								foreach($all_category as $row)
								{
									if($this->crud_model->if_publishable_category($row['category_id'])){
							?>
                            <li>
						

                                <a  href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>">
                                    <?php echo $row['category_name']; ?>
                                </a>
                            </li>
                            <?php
									}
								}
							?>
                        </ul>
                    </li>
                    <?php } ?>

                         
                    
								
									 <?php if(0){
                            if(1){ ?>
                    <li <?php if($page_name=='customer_product_bulk_upload'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/customer_product_bulk_upload">
                            <?php echo translate('Bulk upload');?>
                       </a>
                    </li>
                    <?php }} if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){
                                if($this->db->get_where('ui_settings',array('type'=>'header_classifieds_status'))->row()->value == 'yes'){?>
                    <li <?php if($page_name=='customer_products'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/customer_products">
                            <?php echo translate('classifieds');?>
                        </a>
                    </li>
                    <?php }} if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {
                                if($this->db->get_where('ui_settings',array('type'=>'header_latest_products_status'))->row()->value == 'yes'){
					?>
                    <li class="<?php if($others_list=='latest'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/others_product/latest">
                            <?php echo translate('latest_products');?>
                       </a>
                    </li>
                    <?php
						}}
					?>
						
								                    <?php
                    	if ($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok') {
                            if($this->db->get_where('ui_settings',array('type'=>'header_all_brands_status'))->row()->value == 'yes') {
					?>
                    <li <?php if($asset_page=='all_brands'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/all_brands">
                            <?php echo translate('all_brands');?>
                       </a>
                    </li>
                    <?php
						}
                    }
					?>
								<?php
                    	if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
                            if ($this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok'){
                                if($this->db->get_where('ui_settings',array('type'=>'header_all_vendors_status'))->row()->value == 'yes') {
					?>
                    <li <?php if($asset_page=='all_vendor'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/all_vendor/">
                            <?php echo translate('all_vendors');?>
                       </a>
                    </li>
                    <?php
                                }
						    } 
                        }
					?>
								
								
								  <?php if($this->db->get_where('ui_settings',array('type'=>'header_blogs_status'))->row()->value == 'yes') {?>
                    <li class="dropdown <?php if($asset_page=='blog'){ echo 'active'; } ?>">
                        <a class="nav-stylehead dropdown-toggle" href="<?php echo base_url(); ?>home/blog" data-toggle="dropdown">
                            <?php echo translate('blogs');?>
                     										<b class="caret"></b>
 </a>
									<ul class="dropdown-menu agile_short_dropdown">
                        	<?php
								$blogs=$this->db->get('blog_category')->result_array();
								foreach($blogs as $row){
							?>
                            <li>
                                <a href="<?php echo base_url(); ?>home/blog/<?php echo $row['blog_category_id']; ?>">
                                    <?php echo $row['name']; ?>
                                </a>
                            </li>
                            <?php
								}
							?>
                        </ul>
                    </li>
                    <?php }?>
					
					 <?php if($this->db->get_where('ui_settings',array('type'=>'header_contact_status'))->row()->value == 'yes') {?>
                    <li <?php if($asset_page=='contact'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/contact">
                            <?php echo translate('contact');?>
                     </a>
                    </li>
                    <?php } if($this->db->get_where('ui_settings',array('type'=>'header_more_status'))->row()->value == 'yes') {?>
                    <li class = "dropdown">
                       

      <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">
							<?php echo translate('more');?>
                       										<b class="caret"></b>
 </a>
									<ul class="dropdown-menu agile_short_dropdown">
                            <?php
								if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
							?>
							<li class="<?php if($others_list=='latest'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>home/others_product/latest">
									<?php echo translate('latest_products');?>
								</a>
							</li>
							<?php
								}
							?>
							<?php if($this->crud_model->get_type_name_by_id('general_settings','82','value') == 'ok'){
                            if($this->db->get_where('ui_settings',array('type'=>'header_bundled_product_status'))->row()->value == 'yes'){ ?>
                    <li <?php if($page_name=='bundled_product'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/bundled_product">
                            <?php echo translate('bundled_product');?>
                        </a>
                    </li>
                     <?php } }?>
							   <?php if($this->db->get_where('ui_settings',array('type'=>'header_featured_products_status'))->row()->value == 'yes'){?>
								<li class="<?php if($others_list=='featured'){ echo 'active'; } ?>">
									<a class="nav-stylehead" href="<?php echo base_url(); ?>home/others_product/featured">                     
									<?php echo translate('featured_products');?>

									</a>
								</li>
                                <?php } if($this->db->get_where('ui_settings',array('type'=>'header_todays_deal_status'))->row()->value == 'yes'){?>
                    <li class="<?php if($others_list=='todays_deal'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/others_product/todays_deal">
                            <?php echo translate('todays_deal');?>
                        </a>
                    </li>
                    <?php }?>
                            <?php
							$this->db->where('status','ok');
                            $all_page = $this->db->get('page')->result_array();
							foreach($all_page as $row2){
							?>
                            <li class="dropdown">
                                <a href="<?php echo base_url(); ?>home/page/<?php echo $row2['parmalink']; ?>">
                                    <?php echo $row2['page_name']; ?>
                                </a>
                            </li>
                            <?php
							}
							?>
                        </ul>
                    </li>
                    <?php }?>
								
								
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	
		<script>
			$(".dropdown ").on("click", function() {


$(".dropdown-toggle").attr("aria-expanded","true");
$('.dropdown').addClass('open');
});
	$(".dropdown ").on("click", function() {


$(".dropdown-toggle").attr("aria-expanded","true");
$('.dropdown').addClass('open');
});
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
		<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

<body>
<script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-149859901-1'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149859901-1');
</script>

<script>
     window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
     ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
     ga('require', 'eventTracker');
     ga('require', 'outboundLinkTracker');
     ga('require', 'urlChangeTracker');
     ga('send', 'pageview');
   </script>
<script async src='<?php echo base_url();?>template/assests/js/autotrack.js'></script>

	<!-- js-files -->
	<!-- jquery -->
	<script src="<?php echo base_url();?>template/assests/js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="<?php echo base_url();?>template/assests/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="<?php echo base_url();?>assests/js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="<?php echo base_url();?>template/assests/js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="<?php echo base_url();?>template/assests/js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="<?php echo base_url();?>template/assests/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo base_url();?>template/assests/js/move-top.js"></script>
	<script src="<?php echo base_url();?>template/assests/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		// $(document).ready(function () {
		// 	/*
		// 	var defaults = {
		// 		containerID: 'toTop', // fading element id
		// 		containerHoverID: 'toTopHover', // fading element hover id
		// 		scrollSpeed: 1200,
		// 		easingType: 'linear' 
		// 	};
		// 	*/
		// 	$().UItoTop({
		// 		easingType: 'easeOutQuart'
		// 	});

		// });
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo base_url();?>template/assests/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->