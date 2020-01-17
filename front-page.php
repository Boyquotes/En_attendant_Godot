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
            'posts_per_page' => 10,
            'paged' => $paged
            );

            $wp_query = new WP_Query( $args );
            ?>
            <ul id="books_container">
            <?php 
            if( $wp_query->have_posts() ) : 
                while( $wp_query->have_posts() ) : 
                    $wp_query->the_post();
                    $book_title = get_the_title();
                    $book_article = get_the_content();
                    $book_author = get_field('author');
                    

                    ?> <!----- DIV Fiche livre ----->
                    <li class="fichelivre" id="<?php the_ID(); ?>">
                        <div class="titleandauthor <?php echo $class_color?>"> 
                        
                            <p class="titleofthebook"> <?php echo $book_title;?> </p>      
                            <p class="authorofthebook"> <?php echo $book_author?></p>
                            
                        </div>
                        <div class="contentofthebook">
                        <?php
                            // check if the repeater field has rows of data
                            if( have_rows('citations_livre') ):?>
                            
                            <ul class="liste_citations">
                            
                            <?php
                            // loop through the rows of data
                            while ( have_rows('citations_livre') ) : the_row();
                            $citation = get_sub_field('citation');
                            $page = get_sub_field('page'); ?>

                            <!----- Display a sub field value ----->                          
                            
                            <li class="citation">
                            <p> <?php echo $citation; ?></p>
                            <?php 

                            if( ! empty( $page ) ) {
                            ?> <p class="whichpage"><i class="far fa-bookmark"></i>p.<?php echo $page; ?></p></li>
                            
                            <?php
                            }
                            endwhile; ?>
                            </ul>


                            <?php else :
                            // no rows found
                            endif;

                        ?>
                        
                        </div>
                    </li>
                    <?php 
                
                endwhile; ?>
                </ul>
                <?php
               
                

            else : esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' ); 
            endif; ?>
                <div class="pagination">
                <?php 
                 

                /*posts_nav_link();*/


                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages
                ) );

                
                /*the_posts_pagination();*/
            
                /*
                previous_posts_link('&laquo; Previous');
                next_posts_link('More &raquo;'); */
                

                ?>

                </div>
                
        </div>
        
    </div>
</div>


<?php get_footer(); ?>