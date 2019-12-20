<?php get_header( ); ?>

    <div class="container">
        


<div class="row">
<div class="col-sm-3 leftnav">
<nav class="header">
<h1 id="godot_title"> <?php the_title(); ?> </h1>
<p class="godot_subtitle"> Blog-mémo de rencontres littéraires et cinématographiques </p>
</nav>  
</div>

<div class="col-sm-9 rightcontent">

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<?php wp_get_archives('type=postbypost&limit=10'); ?>



</div>

<?php get_footer();?>  