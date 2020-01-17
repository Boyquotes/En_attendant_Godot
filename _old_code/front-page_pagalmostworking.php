<?php get_header( ); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 leftnav">
            <nav class="header">
                <?php $blog_title = get_bloginfo(); ?>
                <h1 id="godot_title"> <?php echo $blog_title ?> </h1>
                <p class="godot_subtitle"> Blog-mémo de rencontres littéraires </p>
            </nav>  
        </div>
        

        <div class="col-sm-8 rightcontent">
            <?php
            $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
            $args = array(
            'post_type'   => 'book',
            'post_status' => 'publish',
            'order'=>'DESC',
            'posts_per_page' => 3,
            'paged' => $paged
            );

            $wp_query = new WP_Query( $args );
            ?>

            <?php 
            if( $wp_query->have_posts() ) : 
                while( $wp_query->have_posts() ) : 
                    $wp_query->the_post();
                    $book_title = get_the_title();
                    $book_article = get_the_content();
                    $book_author = get_field('author');
           

                    ?> <!----- DIV Fiche livre ----->
                    <div class="titleandauthor"> 
                        <a class="derouleur" href=""> 
                        <p class="titleofthebook"> <?php echo $book_title;?> </p>      
                        <p class="authorofthebook"> <?php echo $book_author?></p>
                        </a>
                    </div>
                    <div class="contentofthebook">
                    <p class="contentofthebook"><?php echo $book_article ;?></p>
                    </div>

                    <?php 
                
                endwhile; 
                echo $paged;
                $total_pages = $wp_query->max_num_pages;

            else : esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' ); 
            endif;
             
            if ($total_pages > 1){
                ?><nav class="pagination"> <?php
                pagination_bar(); 
                previous_posts_link('&laquo; Previous');
                next_posts_link('More &raquo;');
    
                /* $current_page = max(1, get_query_var('page'));

            echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            ));*/
            }   
            ?>

        </div>
        
    </div>
</div>


<?php get_footer(); ?>