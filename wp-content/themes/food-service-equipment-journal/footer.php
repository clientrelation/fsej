<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
?>
            </div>
         </div>
     </div>

    <?php if( is_home() ) : ?>
        <!-- Bottom sidebar position -->
        <?php if( is_active_sidebar( 'dw_focus_bottom' ) ) : ?>
        <div id="bottom">
            <div class="container">
            <?php dynamic_sidebar('dw_focus_bottom'); ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Footer -->
    <footer id="colophon" class="site-footer dark" role="contentinfo">
        <div class="container">

            <div id="site-tools">
                <div class="row-fluid">
                    <div class="span9"><?php dw_breadcrumb(); ?></div>
                    <?php if( is_active_sidebar( 'dw_focus_footer_1' ) 
                        || is_active_sidebar( 'dw_focus_footer_2' ) 
                        || is_active_sidebar( 'dw_focus_footer_3' )  
                        || is_active_sidebar( 'dw_focus_footer_4' )  ) { ?>
                    <div class="span3"><a href="#" class="footer-toggle pull-right">Site index</a></div>
                    <?php } ?>
                </div>
            </div>

            <?php if( is_active_sidebar( 'dw_focus_footer_1' ) 
                        || is_active_sidebar( 'dw_focus_footer_2' ) 
                        || is_active_sidebar( 'dw_focus_footer_3' )  
                        || is_active_sidebar( 'dw_focus_footer_4' )  ) { ?>
            <div id="sidebar-footer" class="row-fluid">
                <?php if( is_active_sidebar('dw_focus_footer_1') ) { ?>
                <div id="sidebar-footer-1" class="span3">
                <?php dynamic_sidebar('dw_focus_footer_1'); ?>
                </div>
                <?php } ?>
                <?php if( is_active_sidebar('dw_focus_footer_2') ) { ?>
                <div id="sidebar-footer-2" class="span3">
                <?php dynamic_sidebar('dw_focus_footer_2'); ?>
                </div>
                <?php } ?>
                <?php if( is_active_sidebar('dw_focus_footer_3') ) { ?>
                <div id="sidebar-footer-3" class="span3">
                <?php dynamic_sidebar('dw_focus_footer_3'); ?>
                </div>
                <?php } ?>
                <?php if( is_active_sidebar('dw_focus_footer_4') ) { ?>
                <div id="sidebar-footer-4" class="span3">
                <?php dynamic_sidebar('dw_focus_footer_4'); ?>
                </div>
                <?php } ?>
            </div>

            <?php } ?>

            <div class="footer-shadown"></div>
        </div>

        <div id="site-info" class="container">
            <div class="clearfix">
                <div class="copyright">
                	<p>Published by & © 2015 <a href="http://www.itp.com/index.php" title="Promedia">Promedia Publishing Ltd</a>. All Rights Reserved.</p>
                    <?php /*?><p>Copyright &copy; <?php echo date('Y'); ?> by <a href="#" title="Food service equipment journal" rel="nofollow">Food service equipment journal</a>. Proudly powered by <a href="http://www.itp.com/index.php" title="Promedia">Promedia</a></p><?php */?>
                    <?php /*?><p><a title="Food service equipment journal" href="http://www.itp.com/index.php" rel="nofollow">WordPress Theme by Promedia</a></p><?php */?>
                </div>
                <div class="logo">
                    <a class="small-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </div>
            </div>
        </div>
    </footer><!-- #colophon .site-footer -->
<a class="scroll-top" href="#masthead" title="<?php _e( 'Scroll to top', 'dw-focus' ); ?>"><?php _e( 'Top', 'dw-focus' ); ?></a>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory')?>/js/validate.js"></script>
<script>
// just for the demos, avoids form submit
/*jQuery.validator.setDefaults({
debug: true,
success: "valid"
});
jQuery( "#myForm" ).validate({
rules: {
field: {
required: true,
email: true
}
}
});*/
</script>
<!--<script type="text/javascript">

jQuery.ajaxSetup({
scriptCharset: "utf-8", //maybe "ISO-8859-1"
contentType: "application/json; charset=utf-8"
});
function setGroup(){
data =	jQuery('#myForm').serializeArray();
jQuery.get( 'http://www.corsproxy.com/' + 'mailserver2.itp.net/smpro/subscribe/s.pl',data ,

 function(response) { 
 console.log(  );
 jQuery('#target').html(response);
data= jQuery('#target').find("table tr:first td p:first").text().split(':');
console.log(data[1]);
 jQuery('#target').html(data[1]);
  });

}
</script>
-->
<?php /*?><script type="text/javascript">
jQuery(document).ajaxStart(function() {
jQuery('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...'); // show the gif image when ajax starts
}).ajaxStop(function() {
jQuery('#loading').html('');
});
jQuery.ajaxPrefilter(function(options) {
if(options.crossDomain && jQuery.support.cors) {
var http = (window.location.protocol === 'http:' ? 'http:' : 'https:');
options.url = http + '//cors-anywhere.herokuapp.com/' + options.url;
}
});

function setGroup(){
data =	jQuery('#myForm').serializeArray();
data =jQuery.param(data);
jQuery.get(
'http://mailserver2.itp.net/smpro/subscribe/s.pl?'+data,
function(response) {
jQuery('#target').html(response);
data= jQuery('#target').find("table tr:first td p:first").text().split(':');
jQuery('#target').html(data[1]);

});
}
//setGroup();
</script><?php */?>
<script>
jQuery(document).ready(function(){
        jQuery(".newsletteralert > a").click(function() {
            alert("Please enter your email address  into the '\Free industry e-newsletter\' box on the right-hand side of the website");
        });
});
</script>
<script>
jQuery(document).ready(function(){
       var author_val = jQuery("#noauthor").find('a').text();
	   //alert(author_val);
	   if(author_val == "No Author"){
		   jQuery("#noauthor").hide();
	  }
});
</script>

<?php wp_footer(); ?>
<script type="text/javascript">
function NewsletterSubscribe(inputid, formid){
		var emailValue = document.getElementById(inputid);
		var nl_list_id=document.getElementById('l').value;
		var lnm=document.getElementById('lnm').value;
		var flag=validateForm(document.getElementById(formid))
		if(!flag){return;}
			var mail = emailValue.value;
	window.open("http://www.itp.com/newsletters/subscribe.php?l="+nl_list_id+"&lnm="+lnm+"&subscribe=subscribe&e="+mail, '', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=yes,width=460,height=250');
			emailValue.value='';
	}
    
 </script>
</body>
</html>