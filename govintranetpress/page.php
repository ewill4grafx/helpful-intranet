<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>


					<div class="col-lg-8 col-md-8 col-sm-8 white">
						<div class="row">
							<div class='breadcrumbs'>
								<?php if(function_exists('bcn_display') && !is_front_page()) {
									bcn_display();
									}?>
							</div>
						</div>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
						<?php
				if ('open' == $post->comment_status && $_GET['action']=='discussion') {
					 comments_template( '', true ); 
				}
			 ?>
					
	</div> 
	<div class="col-lg-4 col-md-4 col-sm-4">
	<?php
		the_post_thumbnail('medium', array('class'=>'img img-responsive')); 
		echo wpautop( "<p class='news_date'>".get_post_thumbnail_caption()."</p>" );
								$thispage = new Pod('page',$id);
						$relatedpages = $thispage->get_field('page_related_pages');
						$relatedtasks = $thispage->get_field('page_related_tasks');
						if ($relatedpages){
							foreach ((array)$relatedpages as $r){
								$html.= "<li><a href='".$r['guid']."'>".$r['post_title']."</a></li>";
							}
						}
						if ($relatedtasks){
							foreach ((array)$relatedtasks as $r){
								$html.= "<li><a href='/tasks/".$r['post_name']."'>".$r['post_title']."</a></li>";
							}
						}
						if ($html){
							echo "<div class='widget-box'>
							<h3 class='widget-title'>Related</h3>
							<ul>".$html."
							</ul>
							</div>";
						}						

	?>
	</div>
	

<?php endwhile; ?>

<?php get_footer(); ?>