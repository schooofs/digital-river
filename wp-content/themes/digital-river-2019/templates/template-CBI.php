<?php
/**
 * Template Name: Template CBI
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>

<style type="text/css">

	
	.top-wrapper, .clients-wrapper, .bottom-wrapper{font-family:"HelveticaNeueW01-55Roma";}
	.left_border{width:100% !important;}
	
	.top-wrapper{width:100%; height:180px; margin-top:75px; margin-bottom:75px;}
	.top-wrapper .copy-space{width: 745px;  padding:20px;  float:left; line-height:1.3;}
	.top-wrapper .CTA-wrapper{height: auto; width: 250px; float: right; margin: auto; background-color: #F4F4F4; padding: 10px; margin-top: 23px;}
	.top-wrapper .CTA-wrapper .header{font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; font-size:30px;  color: #a8ca1f;}
	.top-wrapper .CTA-wrapper .sub-header{font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; font-size:20px;  margin-top: 5px;}
	.top-wrapper .CTA-wrapper .button-wrapper{width: auto; height: auto; margin-top: 10px;}
	.top-wrapper .CTA-wrapper #action{
		  position: relative;
		  vertical-align: top;
		  width: 100%;
		  height: 100%;
		  padding: 9px 14px;
		  font-size: 16px;
		  color: white;
		  text-align: center;
		  background: #a8ca1f;;
		  border: 0;
		  cursor: pointer;
		  border-radius:2px;
	 }

     .top-wrapper .CTA-wrapper #action:hover{
            background: #a0c01f;
     }
	
	.clients-wrapper{width:100%; height:auto; border-top: solid 1px #b1b1b1; border-left: solid 1px #b1b1b1; }
	.clients-wrapper .row{width: 100%; height: auto; border-top: 1px solid #B1B1B1; overflow:hidden;}
	.clients-wrapper .row:first-child{border:none; }
	.clients-wrapper .row .client{width:379px; height:auto; float:left; overflow:hidden;}
	.clients-wrapper .row .client .header{width:100%; height:auto;   text-align:center; font-size:26px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase;}
	.clients-wrapper .row .client ul{margin: 0px; padding-left: 17px; margin-left: 50px; margin-top: 10px; line-height:1 ;}
	.clients-wrapper .row .client ul li{list-style-type: disc; padding:5px; line-height:1 ;}
	.clients-wrapper .row .client .client-logo-wrapper{width: 100px; height:100px; margin-left:auto; margin-right:auto; margin-top: 35px;}
	.clients-wrapper .row .client .client-logo-wrapper .client-logo{width:auto; height:auto; max-width:100px; max-height:100px; margin:0 auto;}
	.clients-wrapper .row .client .client-action{width:200px; height:auto; margin-left:auto; margin-right:auto; margin-top:5px; margin-bottom:5px; text-align:center;}
	.clients-wrapper .row .client .client-action a{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client .client-action a:hover{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client .client-action a:visited{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client-right{border-right:solid 1px #b1b1b1; }
	.clients-wrapper .row .client-middle{border-left:solid 1px #b1b1b1; border-right:solid 1px #b1b1b1;}
	
	
	
	.client-logo-wrapper {
    height: 25px;      /* equals max image height */
    width: 160px;

    white-space: nowrap;
    
    text-align: center; margin: 1em 0;
}

.client-logo-wrapper:before,
.client-logo-wrapper_before {
    content: "";
    display: inline-block;
    height: 100%;
    vertical-align: middle;
}

	.client-logo-wrapper img {

    vertical-align: middle;
    max-height: 25px;
    max-width: 160px;
}

.bottom-wrapper{width: 100%; background-color: #F4F4F4; height: auto; overflow:hidden; margin-bottom: 40px; border-bottom: solid 1px #a8ca1f; border-top: solid 1px #a8ca1f; margin-bottom:75px;  margin-top:75px;}
.bottom-wrapper .column1, .bottom-wrapper .column2{width: 520px; float:left; height:auto; margin:25px;}
.bottom-wrapper .header{/* font engscrift */ font-size:30px; text-transform:uppercase; color: #000; margin-top:20px; margin-left:25px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase;}
.bottom-wrapper .sub-header{margin-top:15px; font-size:26px; font-family: 'DIN 1451 W01 Engschrift'; }
.bottom-wrapper .copy{margin-top:5px; line-height:1.3;}
.bottom-wrapper .copy ul{margin-left:20px; margin-top:5px; margin-bottom:5px; }
.bottom-wrapper .copy li{list-style-type: disc;}

	@media only screen 
	and (max-width : 1180px)
	and (min-width : 700px){
		.clients-wrapper .row .client-right{border-right:none; }
		.clients-wrapper .row .client-middle{border-left:none; border-right:none;}
		.clients-wrapper .row{border-top: none;}
		.clients-wrapper{border-top:none; border-left:none;}
		.even{background-color:#EEEEEE;}
		.clients-wrapper .row .client{border-bottom:none !important; }
		.clients-wrapper .row .client {
			width: 33%;
		}
		.clients-wrapper .row .client .copy {
			width: 225px;

		}
		
		.top-wrapper {
			height: auto;
			overflow: hidden;
		}
		
		.clients-wrapper .row .client {
			height: 360px !important;
			border-right: none !important;
		}
		
		.clients-wrapper .row{
			height: 360px !important;
		}
		
		.top-wrapper .CTA-wrapper {

			float: left;
			margin-left: 20px;
			margin-right: 10px;
		}
				
	}
	

	@media only screen 
	and (max-width : 700px){
		.clients-wrapper .row .client-right{border-right:none; }
		.clients-wrapper .row .client-middle{border-left:none; border-right:none;}
		.clients-wrapper .row{border-top: none; float: left; clear:left;}
		.clients-wrapper{border-top:none; border-left:none;}
		.even{background-color:#EEEEEE;}
		.clients-wrapper .row .client{border-bottom:none !important; width:100%; border-right: none !important;}
		.top-wrapper .copy-space {
			width: 80%;
			padding: 20px;
			float: left;
			line-height: 1.3;
			margin-left: 10%;
			margin-right: 10%;
		}
		.top-wrapper .CTA-wrapper {
			float: left;
			clear: left;
			margin-left: 10%;
		}
		.clients-wrapper .row .client .copy{
				width: 90%;
				margin-left: 5%;
				margin-right: 10%;
		}
		
		.bottom-wrapper .column1, .bottom-wrapper .column2 {

			width: 90%;
			margin:0px;
			margin-left: 5%;
		}
		
		.bottom-wrapper .sub-header {
			margin-top: 30px;

		}
		
		.top-wrapper {
			height: auto;
			margin-top: 75px;
			margin-bottom: 75px;
			overflow: hidden;
		}
	
	}

	

</style>


<!-- Content Container -->
<section id="template_j" class="content_container">
    <div class="left_border"></div>
    <div class="container">
        <div class="row">


	
    <div class="top-wrapper">
		<div class="copy-space">
        Our commerce business infrastructure empowers you to sell your products in countries around the world. This robust yet flexible offering helps remove barriers of entry into challenging global markets and protects you from risk. 
        <br>
        <br>
        Backed by 20 years of commerce experience and powered by our proprietary software, technology and intellectual property, Digital River’s commerce business infrastructure is a core differentiator in the marketplace. We’ll help you get there – virtually anywhere you want to do business.
        </div>
        <div class="CTA-wrapper">
        	<div class="header">Ready to go global?</div>
            <div class="sub-header">Call us at +1-800-598-7450</div>
            <a href="<?php echo site_url('/company/contact-us/','http'); ?> "><div class="button-wrapper"><input type="button" id="action" value="Contact Us" /></div></a>
        </div>
    </div>
	
    <div class="clients-wrapper">
            <div class="row">
                <div class="client client-left even">
                	<div class="client-logo-wrapper">
                        <img alt='Merchant and Seller of Record Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Merchant.png'); ?>" />
                    </div>
                    <div class="header">Merchant &amp; Seller of Record</div>
                    <div class="copy">
                    	<ul>
                        	<li>MOR &amp; SOR solutions available</li>
                            <li>Digital River assumes risk</li>
                        </ul>
                    </div>
                </div>
                <div class="client client-middle odd">
                	<div class="client-logo-wrapper">
                        <img alt='Local Legal Entities Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Local-Entities.png'); ?>" />
                    </div>
                    <div class="header">Local Legal Entities</div>
                    <div class="copy">
                    	<ul>
                        	<li>In complex countries</li>
                            <li>Local expertise and payment mets</li>
                        </ul>
                    </div>
                </div>
                 <div class="client client-right even">
                	<div class="client-logo-wrapper">
                        <img alt='Fraud Management Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Fraud.png'); ?>" />
                    </div>
                    <div class="header">Proactive Fraud Management</div>
                    <div class="copy">
                    	 <ul>
                        	<li>In-house fraud system learns over time</li>
                        </ul>
                    </div>
                </div>
            </div> 
            
            <div class="row">
                <div class="client client-left odd">
                	<div class="client-logo-wrapper">
                        <img alt='Tax Solutions Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Tax-Solution.png'); ?>" />
                    </div>
                    <div class="header">Full-Service Tax Solution</div>
                    <div class="copy">
                    	<ul>
                        	<li>Manage audit risk</li>
                            <li>Day-to-day compliance</li>
                            <li>Offshore tax structure</li>
                        </ul>
                    </div>
                </div>
                <div class="client client-middle even">
                	<div class="client-logo-wrapper">
                        <img alt='Order Management Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Order-Management.png'); ?>" />
                    </div>
                    <div class="header">Order Management</div>
                    <div class="copy">
                    	<ul>
                        	<li>Order and financial data management</li>
                            <li>Fulfillment and logistics</li>
                        </ul>
                    </div>
                </div>
                 <div class="client client-right odd">
                	<div class="client-logo-wrapper">
                        <img alt='Cloud Enablement Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Cloud.png'); ?>" />
                    </div>
                    <div class="header">Cloud Enablement</div>
                    <div class="copy">
                    	 <ul>
                        	<li>Subscriptions</li>
                            <li>Usage-based billing</li>
                            <li>Inter-term billing</li>
                            <li>Cloud billing</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
                        
            <div class="row">
                <div class="client client-left even">
                	<div class="client-logo-wrapper">
                        <img alt='Analytics and Reporting Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Intellegence.png'); ?>" />
                    </div>
                    <div class="header">Business Intelligence</div>
                    <div class="copy">
                    	<ul>
                        	<li>Analytics</li>
                            <li>Reporting</li>
                            <li>Predictive modeling</li>
                        </ul>
                    </div>
                </div>
                <div class="client client-middle odd">
                	<div class="client-logo-wrapper">
                        <img alt='Security and Compliance Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Security-Compliance.png'); ?>" />
                    </div>
                    <div class="header">Security &amp; Compliance</div>
                    <div class="copy">
                    	<ul>
                        	<li>PCI</li>
                            <li>SOX</li>
                            <li>SSAE16</li>
                            <li>WEEE</li>
                        </ul>
                    </div>
                </div>
                 <div class="client client-right even">
                	<div class="client-logo-wrapper">
                        <img alt='Customer Service Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Customer-Service.png'); ?>" />
                    </div>
                    <div class="header">Customer Service</div>
                    <div class="copy">
                    	 <ul>
                        	<li>Call center support</li>
                            <li>Escalation Management</li>
                        </ul>
                    </div>
                </div>
            </div> 
            
            
            <div class="row">
                    <div class="client client-left odd">
                        <div class="client-logo-wrapper">
                            <img alt='Integrated Services Icon' class="client-logo" src="<?php echo get_image_path('cbi-page-assets/Integrated.png'); ?>" />
                        </div>
                        <div class="header">Integrated Services</div>
                        <div class="copy">
                            <ul>
                                <li>Consultative client service through site launch</li>
                            </ul>
                        </div>
                    </div>
               
            </div>  

            
            
    
    </div>

	<div class="bottom-wrapper">
    	<div class="header">What does that mean?</div>
        
        <div class="column1">
            <div class="sub-header">Merchant of Record</div>
            <div class="copy">We assume the financial liability for all customer transactions, including tax and compliance risk, to ensure your administrative responsibilities are handled with precision and full compliance with local laws to protect you from risk.</div>
            <div class="sub-header">Increase Speed to Market</div>
            <div class="copy">Digital River’s CBI provides a complete solution to all global ecommerce needs. Our local expertise enables you to go to market faster, and easier.
             We provide the infrastructure to allow your business to be effective in each region across the globe.
             <ul>
             	<li>Expertise in local laws, regional languages and payment methods to guarantee success in complex countries</li>
             </ul>
             </div>
            <div class="sub-header">Seller of Record</div>
            <div class="copy">As the Seller of Record, Digital River assumes responsibility for maintaining and establishing returns policy and terms of conditions of sale to smoothly handle all title of product transactions.
            <ul>
            	<li>Local entities enable localized collection methods, fulfillment and customer service</li>
                <li>Standardized financial set-up processes</li>
            </ul>
            </div>
    	</div>
        <div class="column2">
                <div class="sub-header">Global Tax Complexities</div>
        <div class="copy">We assume the financial liability for all customer transactions, including tax and compliance risk, to ensure your administrative responsibilities are handled with precision and full compliance with local laws to protect you from risk.</div>
         <div class="sub-header">Security and Compliance</div>
        <div class="copy">
        	Digital River complies with all PCI standards to protect your customers—and your business reputation— to ensure a secure shopper experience.
        	<ul>
            	<li>Proactive fraud management using our in-house fraud system to identify potential fraud activity by leveraging a community database of past fraud experiences</li>
            </ul>
        </div>
        </div>
    </div>
	
   
	


           
        </div>
    </div>
</section>
<?php get_footer(); ?>


<!--[if lte IE 8]>

<style type="text/css">
/* Move this to conditional comments */
.client-logo-wrapper {
    list-style:none;
    behavior: expression(
        function(t){
            t.insertAdjacentHTML('afterBegin','<span class="client-logo-wrapper_before"></span>');
            t.runtimeStyle.behavior = 'none';
        }(this)
    );
}
</style>

	<![endif]-->






<script type="text/javascript">

	jQuery(document).ready(function(){

		var client;
		var winner = 0;
		
		jQuery(".clients-wrapper").children('.row').each(function (){
			jQuery(this).children('.client').each(function (){
				client = jQuery(this).height();	
				if(client > winner){
					winner = client;	
				}		

			})
			//adding some padding to the bottom of each .client
			winner += 20;				
			jQuery(this).children('.client').css({height:winner+"px"});
			winner = 0;
			
		})
		
		var lastRow = jQuery(".clients-wrapper").children('.row').last();
		var lastClientClass = jQuery(lastRow).children('.client').last().attr("class");
		if (lastClientClass.indexOf("client-left") >= 0){
				jQuery(jQuery(lastRow).children('.client').last()).css({borderRight:"solid 1px #b1b1b1"});
		}
		jQuery(".clients-wrapper").children('.row').last().children().each(function() {
            jQuery(this).css({borderBottom:"solid 1px #b1b1b1"})
        });
		
		
	})
	

	
</script>