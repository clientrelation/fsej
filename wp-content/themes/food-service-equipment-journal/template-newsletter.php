<?php
/**
 * Template Name: Newsletter
 */

//get_header(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Food Service Equipment newsletter</title>
<!--[if lte IE 8]>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php //wp_head();?>
<style>
body {
	font-family:'Arial', Helvetica, sans-serif;
}
</style>
</head>

<body>
<!--viewTracking-->
<?php    $args = array( 'post_type' => 'newsletter', 'posts_per_page' => 1 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						//remove_filter('the_content','wpautop'); ?>

<table width="750" border="0" cellspacing="0" cellpadding="0"  align="center">
  <tr>
    <td align="left" valign="top"><a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo12.jpg?t=<?php echo time();?>" width="747" height="67"></a></td>
  </tr>
  <!-- Top Banner-->
<?php
$topposts = get_posts(array(
    'showposts' => 1,
    'post_type' => 'adbanner',
    'tax_query' =>array(
	 array(
        'taxonomy' => 'bannertype',
        'field' => 'term_id',
        'terms' => 361 )
    ))
);
 
foreach ($topposts as $toppost) {
      /*echo $mypost->post_title . '<br/>';
      echo $mypost->post_content . '<br/>';
      echo  $mypost->ID . '<br/><br/>';*/
	  $banner_link = get_post_meta( $toppost->ID, 'banner_link',true ); 
?>
  <tr>
    <td style="padding:12px 0"><a href="<?php echo $banner_link;?>" style="border:0px;"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($toppost->ID) );  ?>" width="747" height="90"></a></td>
  </tr>
   <?php }
?>
</table>

<table width="750" border="0" cols="0" align="center">
    <tr>
        <td>
            <table width="480" align="left" border="0" cols="0" >
                <tr>
                    <td>
                        <table width="500" border="0" cellspacing="0" cellpadding="0" align="left">
                        <?php $post_objects = get_field('select_top_news');
						/*echo '<pre>';
							print_r( get_field('featured_post')  );
						echo '</pre>';
						*/$featured_posts = get_field('featured_post');
						
						if( $featured_posts ): 
						
							// override $post
							$post = $featured_posts;
							setup_postdata( $post ); 
						
							?>
						<!-- Featured article-->
                            <tr>
                                <td valign="top" width="200" height="200">
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($testi_query->ID) );  ?>" width="193" height="193"/>
                                </td>
                                <td align="left" valign="top">
                                    <table width="290" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="left" valign="top"  style="font-family:arial, Geneva, sans-serif; font-size:22px; color:#2d2c2c; font-weight:bold; line-height:20px; padding-bottom:8px;"><?php the_title(); ?></td>
                                        </tr>
                                        <tr>
                                            <td  align="left" valign="middle" style="font-size:12px; font-weight:bold;"><a href="#" style="text-decoration:none; color:#bbbbbb; text-decoration:none">By <?php echo get_the_author();?></a></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#4e4c4c; font-weight:normal; line-height:20px; padding-bottom:6px;"><?php echo content(15);?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                <table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td height="30" align="center" valign="middle" bgcolor="#feb63e" style=" background:#000; font-family:Verdana, Geneva, sans-serif; font-size:11px; color:#FFF; font-weight:bold; text-transform:uppercase;"><a href="<?php echo get_permalink(); ?>" style="text-decoration:none; color:#FFF;">Read More</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="25" align="left" valign="top" style="line-height:25px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                             <?php endif; ?>
                        </table>
						<tr>
                        <td>
                        	<table width="500" border="0" align="left">
                            <tr>
                                <td valign="top" width="500" bgcolor="#000000" style="color:#fff; text-transform:uppercase; font-size:20px;
                            font-weight:bold; padding:8px;">top news</td>
                            </tr>
                            <!-- Top News articles-->
								 <?php  if( $post_objects ): ?>
                                     <?php foreach( $post_objects as $post_object_top): ?>
                            <tr>
                                <td width="500"  style="border-bottom:1px solid #c4c4c4;" align="left"> 
                                    <table width="165" height="110" align="left">
                                        <tr>
                                            <td align="left" width="165" height="110" style="margin-right:5px"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post_object_top->ID) );  ?>" width="162" height="108" alt=""/></td>
                                        </tr>
                                    </table>
                                    <table width="300" align="left">
                                        <tr>
                                            <td style="font-size:11px; color:#858383; text-transform:uppercase;"><?php echo get_the_date(); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:15px; color:#000; font-weight:bold;"> <a href="<?php echo get_permalink($post_object_top->ID); ?>" style="color:#000; text-decoration:none;"> <?php echo get_the_title($post_object_top->ID); ?></a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            
                            
                             <?php endforeach; ?>
            				<?php endif;?> 
                        </table>
                        </td>
                        </tr>
                        
                        <tr>
                            <td valign="top" style="padding:10px 0 0 0;">
                                <table width="500" align="left" border="0" cellpadding="0" cellspacing="0" style="padding-bottom:15px;">
                                    <tr>
                                        <td width="160" valign="top">
                                            <table width="160" align="left">
                                                <tr>
                                                    <td valign="top" style="font:bold 16px Arial, Helvetica, sans-serif; color:#000; padding:0px; margin:0px;"> Andrew Seymour </td>
                                                </tr>
                                                <tr>
                                                    <td style="font: normal 12px Arial, Helvetica, sans-serif; color:#666666;"> Group Editor </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 11px Arial, Helvetica, sans-serif; color:#000; padding:10px 0 0 0; margin:0px;"> +44 2031 764234 </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 10px Arial, Helvetica, sans-serif; color:#000; padding:0px 0 0 0; margin:0px;"><a style="text-decoration:none; color:#000;" href="mailto:andrew.seymour@itppromedia.com">andrew.seymour@itppromedia.com </a></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="190" valign="top">
                                            <table width="190" align="left">
                                                <tr>
                                                    <td valign="top" style="font:bold 16px Arial, Helvetica, sans-serif; color:#000; padding:0px; margin:0px;"> Anne-Marie Judge </td>
                                                </tr>
                                                <tr>
                                                    <td style="font: normal 12px Arial, Helvetica, sans-serif; color:#666666;"> Group Commercial Manager </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 11px Arial, Helvetica, sans-serif; color:#000; padding:10px 0 0 0; margin:0px;">+44 2031 765632 </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 10px Arial, Helvetica, sans-serif; color:#000; padding:0px 0 0 0; margin:0px;"><a style="text-decoration:none; color:#000;" href="mailto:anne-marie.judge@itppromedia.com">anne-marie.judge@itppromedia.com </a></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="160" valign="top">
                                            <table width="160" align="left">
                                                <tr>
                                                    <td valign="top" style="font:bold 16px Arial, Helvetica, sans-serif; color:#000; padding:0px; margin:0px;"> Mark Harris </td>
                                                </tr>
                                                <tr>
                                                    <td style="font: normal 12px Arial, Helvetica, sans-serif; color:#666666;"> Sales Executive </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 11px Arial, Helvetica, sans-serif; color:#000; padding:10px 0 0 0; margin:0px;"> +44 2031 764226 </td>
                                                </tr>
                                                <tr>
                                                    <td style="font:bold 10px Arial, Helvetica, sans-serif; color:#000; padding:0px 0 0 0; margin:0px;"><a style="text-decoration:none; color:#000;" href="mailto:mark.harris@itppromedia.com">mark.harris@itppromedia.com </a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </td>
                </tr>
            </table>
            </td><td valign="top">
            <table width="220" align="right" border="0" cols="0">
                <tr>
                    <td valign="top" height="30" style="font:bold 20px Arial, Helvetica, sans-serif; text-transform:uppercase; color:#000;">Most Popular
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <table width="210" cellspacing="5" cellpadding="3" border="0"> 
                        <?php //MOST POPULAR
                    $args = array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  );
                    $recent_posts = wp_get_recent_posts( $args );
                    foreach( $recent_posts as $recent ){?>           
                            <tr>
                                <td width="5" height="5" valign="top" style="font-size:20px; padding:0 0 0 0px;" >&bull;</td>
                                <td align="left" style="font-size:14px;"><?php echo '<a href="' . get_permalink($recent["ID"]) . '" style="color:#000; text-decoration:none;">' .   $recent["post_title"].'</a>'; ?></td>
                            </tr>
  					<?php } ?>			
                            </table>
                            <table width="220" cellspacing="0" cellpadding="3" border="0">     
                                <tr>
                                <!-- Side Banner-->
                                 <?php
									$sideposts = get_posts(array(
										'showposts' => 1,
										'post_type' => 'adbanner',
										'tax_query' =>array(
										 array(
											'taxonomy' => 'bannertype',
											'field' => 'term_id',
											'terms' => 362 )
										))
									);
									 
									foreach ($sideposts as $sidepost) {
										  /*echo $mypost->post_title . '<br/>';
										  echo $mypost->post_content . '<br/>';
										  echo  $mypost->ID . '<br/><br/>';*/
										   $banner_link = get_post_meta( $sidepost->ID, 'banner_link',true ); 
									
									?>  
                                    <td align="right" style="font-size:14px; "><a href="<?php echo $banner_link; ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($sidepost->ID) );  ?>" width="220" height="70"></a>
                                    </td>
                                     <?php }?>
                                </tr>
                                <tr>
                                    <td align="left" style="font-size:14px;"><b> To view the latest digital edition of Foodservice Equipment Journal, please click on the magazine cover:</b></td>
                                </tr>
                                <tr>
                                 <?php
 //digital post
$digitalposts = get_posts(array(
    'showposts' => 1,
    'post_type' => 'adbanner',
    'tax_query' =>array(
	 array(
        'taxonomy' => 'bannertype',
        'field' => 'term_id',
        'terms' => 363 )
    ))
);
 
foreach ($digitalposts as $digitalpost) {
      /*echo $mypost->post_title . '<br/>';
      echo $mypost->post_content . '<br/>';
      echo  $digitalpost->ID . '<br/><br/>';*/
 $banner_link = get_post_meta( $digitalpost->ID, 'banner_link',true ); 
?>
         
                                    <td align="right"  style="font-size:14px;"><a href="<?php echo $banner_link; ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($digitalpost->ID) );  ?>" width="220" height="290"></a></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td width="160" align="center">
                                        <table width="130" align="center">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="font:bold 20px Arial, Helvetica, sans-serif; color:#000; padding:0px; margin:0px;"> Follow us on</td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><a href="https://twitter.com/fejournal"><img width="104" height="24" alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png"></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
  <!-- Copyright for food journal-->
<table align="center" width="750" bgcolor="#000000" style="padding:10px" >
  <tr>
    <td width="450" align="left" style="color:#323232; font-size:14px;">Copyright © 2015 by Foodservice Equipment Journal. </td>
    <td align="right"><a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/food-service-logo.png" width="142" height="38" alt=""/></a></td>
  </tr>
</table>
  <!-- DISCLAIMER--> 
<DISCLAIMER type="newsletters" from="newsletters" unsubscribe="">
<?php endwhile;?>
<?php //wp_footer();?>
</body>
</html>
<?php //get_footer(); ?>