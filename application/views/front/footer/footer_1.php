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
<style>
.footer1 {
  
    padding: 0px;
}
</style>
<footer class="footer1">
	<div class="footer1-widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-sm col-xs-12">
					<div class="widget">
						<a href="<?php echo base_url(); ?>">
                          	<img class="img-responsive" src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="">
						</a>
						<p><?php echo $footer_text ;?></p>
						<?php
							echo form_open(base_url() . 'home/subscribe', array(
								'class' => '',
								'method' => 'post'
							));
						?>    
							<div class="form-group row">
                            	<div class="col-md-12">
									<input type="text" class="form-control col-md-8" name="email" id="subscr" placeholder="<?php echo translate('email_address'); ?>">
                                	<span class="btn btn-subcribe subscriber enterer"><?php echo translate('subscribe'); ?></span>
                                </div>
							</div>                
					   </form> 
					</div>
				</div>
				<div class="col-md-3 hidden-xs hidden-sm">
					<div class="widget widget-categories">
						<h4 class="widget-title"><?php echo translate('categories');?></h4>
						<ul>
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
					</div>
				</div>
				<div class="col-md-3  col-sm-12 hidden-xs">
					<div class="widget widget-categories">
						<h4 class="widget-title"><?php echo translate('useful_links');?></h4>
						<ul>
							<li>
								<a href="<?php echo base_url(); ?>home/"><?php echo translate('home');?>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>home/category/0/0-0"><?php echo translate('all_products');?>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>home/others_product/featured"><?php echo translate('featured_products');?>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>home/contact/"><?php echo translate('contact');?>
								</a>
							</li>
                            <?php
							$this->db->where('status','ok');
                            $all_page = $this->db->get('page')->result_array();
							foreach($all_page as $row){
							?>
                            <li>
                                <a href="<?php echo base_url(); ?>home/page/<?php echo $row['parmalink']; ?>">
                                    <?php echo $row['page_name']; ?>
                                </a>
                            </li>
                            <?php
							}
							?>
						</ul>
					</div>
				</div>
				<div class="col-md-3 hidden-xs hidden-sm">
					<div class="widget contact">
						<h4 class="widget-title"><?php echo translate('contact_us');?></h4>
						<div class="media-list">
							<div class="media">
								<i class="pull-left fa fa-home"></i>
								<div class="media-body">
									<strong><?php echo translate('address');?>:</strong>
                                    <br>
									<?php echo $contact_address;?>
								</div>
							</div>
							<div class="media">
								<i class="pull-left fa fa-phone"></i>
								<div class="media-body">
									<strong><?php echo translate('phone');?>:</strong>
                                    <br>
									<?php echo $contact_phone;?>
								</div>
							</div>
							<div class="media">
								<i class="pull-left fa fa-globe"></i>
								<div class="media-body">
									<strong><?php echo translate('website');?>:</strong>
                                    <br>
									<a href="https://<?php echo $contact_website;?>"><?php echo $contact_website;?></a>
								</div>
							</div>
							<div class="media">
								<i class="pull-left fa fa-envelope-o"></i>
								<div class="media-body">
									<strong><?php echo translate('email');?>:</strong>
                                    <br>
									<a href="mailto:<?php echo $contact_email;?>">
										<?php echo $contact_email;?>
									</a>
								</div>
							</div>
							<ul class="social-nav model-2" style="float: left;margin-top: 10px">
								<?php
								if ($facebook != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $facebook;?>" class="facebook social_a"><i class="fa fa-facebook"></i></a></li>
								<?php
								} if ($twitter != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $twitter;?>" class="twitter social_a"><i class="fa fa-twitter"></i></a></li>
								<?php
								} if ($googleplus != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $googleplus;?>" class="google-plus social_a"><i class="fa fa-google-plus"></i></a></li>
								<?php
								} if ($pinterest != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $pinterest;?>" class="pinterest social_a"><i class="fa fa-pinterest"></i></a></li>
								<?php
								} if ($youtube != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $youtube;?>" class="youtube social_a"><i class="fa fa-youtube"></i></a></li>
								<?php
								} if ($skype != '') {
								?>
								<li style="border-top: none;"><a href="<?php echo $skype;?>" class="skype social_a"><i class="fa fa-skype"></i></a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="footer1-meta">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-xs-12">
					<div class="copyright" version="Currently <?= demo()?'demo':''?> v<?php echo $this->db->get_where('general_settings',array('type'=>'version'))->row()->value; ?>">
						<?php echo date('Y'); ?> &copy; 
						<?php echo translate('all_rights_reserved'); ?> @ 
						<a href="<?php echo base_url(); ?>">
							<?php echo $system_title; ?>
						</a> 
							| 
						<a href="<?php echo base_url(); ?>home/legal/terms_conditions" class="link">
							<?php echo translate('terms_&_condition'); ?>
						</a> 
							| 
						<a href="<?php echo base_url(); ?>home/legal/privacy_policy" class="link">
							<?php echo translate('privacy_policy'); ?>
						</a>
					</div>
				</div>
				<div class="col-md-4 hidden-xs hidden-sm">
					<div class="payments" style="font-size: 30px;">
						<ul>
							<li><img src="<?php echo base_url(); ?>uploads/others/payment.png"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="footer-nav-area" id="footerNav">
      <div class="container px-0">
        <div class="footer-nav position-relative">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="<?php echo base_url(); ?>home"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
</svg><span>Home</span></a></li>
            <li><a href="<?php echo base_url(); ?>home/all_category"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"></path>
</svg><span>Categories</span></a></li>
            <li>                        <a href="<?php echo base_url(); ?>home/all_brands">
<svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-folder2-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"></path>
</svg><span>Brands</span></a></li>
            <li><a href="<?php echo base_url(); ?>home/all_vendor/">  <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
	</svg><span>Vendors</span></a></li>
            <li><a href="<?php echo base_url(); ?>home/contact"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg><span>Contact</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <style type="text/css">
    	@media only screen and (min-width: 960px) {
#footerNav{display:none;}
}
    	.footer-nav-area {
    position: fixed !important;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    background-color: #ffffff;
    width: 100%;
    height: 62px;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    border-top: 1px solid #ebebeb;
}
.footer-nav {
    background-color: #ffffff;
    width: 100%;
    height: 62px;
}
.footer-nav ul {
    position: relative;
    z-index: 10;
    width: 100%;
}
.footer-nav ul li {
    position: relative;
    z-index: 1;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 0px;
    flex: 1 1 0;
}
ul li:hover, ul li:focus {
    list-style: none;
    text-decoration: none;
}
.footer-nav ul li.active a {
    color: #0134d4;
}
.footer-nav ul li a:hover, .footer-nav ul li a:focus {
    color: #0134d4;
}
.footer-nav ul li a {
    position: relative;
    display: block;
    font-size: 12px;
    text-align: center;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 1;
    color: #1f0757;
    z-index: 1;
}
.footer-nav ul li.active a span {
    color: #0134d4;
}
.footer-nav ul li a:hover span, .footer-nav ul li a:focus span {
    color: #0134d4;
}
.footer-nav ul li a span {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    color: #1f0757;
    display: block;
    margin-top: .25rem;
}
    </style>
<style>
.link:hover{
	text-decoration:underline;
}
.model-2 a {
	margin: 0px 1px;
	height: 32px;
	width: 32px;
	line-height: 32px;

}
@media screen and (max-width: 600px) {
  footer {
    visibility: hidden;
    clear: both;
    float: left;
    margin: 10px auto 5px 20px;
    width: 28%;
    display: none;
  }
  #mobile_footer{
  	position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
  }
  /*#mobile_footer {
    clear: both;
    float: left;
    margin: 10px auto 5px 20px;
    width: 100%;
  }*/
}
</style>