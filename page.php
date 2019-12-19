<?php get_header( ); ?>

    <div class="container">
        


        <div class="row">
            <div class="col-sm-4 leftnav">
                <nav class="header">
                    <h1 id="godot_title"> <?php the_title(); ?> </h1>
                    <p class="godot_subtitle"> Blog-mémo de rencontres littéraires et cinématographiques </p>
                </nav>  
            </div>

            <div class="col-sm-8 rightcontent">
            
            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>

            <?php wp_get_archives('type=postbypost&limit=10'); ?>




            <p>______________________</p>
            <?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
<ul>
 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
 
</ul>
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
            </div>
        </div>
          
<?php
$args = array(
  'post_type'   => 'testimonials',
  'post_status' => 'publish',
  'tax_query'   => array(
  	array(
  		'taxonomy' => 'testimonial_service',
  		'field'    => 'slug',
  		'terms'    => 'diving'
  	)
  )
 );
 
$testimonials = new WP_Query( $args );
if( $testimonials->have_posts() ) :
?>
  <ul>
    <?php
      while( $testimonials->have_posts() ) :
        $testimonials->the_post();
        ?>
          <li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
else :
  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
?>




 <p>______________________</p>



<?php
$args = array(
  'post_type'   => 'book',
  'post_status' => 'publish',
 );
 
$thebooks = new WP_Query( $args );
if( $thebooks->have_posts() ) :
?>
  <ul>
    <?php
      while( $thebooks->have_posts() ) :
        $thebooks->the_post();
        ?>
          <li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
else :
  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
?>
 

    </div>

<?php get_footer(); ?>  