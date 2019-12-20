<?php get_header( ); ?>

<div class="container">

        
    <div class="row">

        <!--_____ Left • Sidebar_____  -->

        <div class="col-sm-4 leftnav">
            <nav class="header">
                <h1 id="godot_title"> <?php the_title(); ?> </h1>
                <p class="godot_subtitle"> Blog-mémo de rencontres littéraires et cinématographiques </p>
            </nav>  
        </div>
        
        <!--_____ Right • Content and articles _____  -->

        <div class="col-sm-8 rightcontent">
            
            <!-- Query For post with "book" post type -->
            <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                'post_type'   => 'book',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'paged' => $paged
                );

                $thebooks = new WP_Query( $args );
                if( $thebooks->have_posts() ) :
            ?>
                
            <ul>
                <?php while( $thebooks->have_posts() ) : $thebooks->the_post();?>

                <!----- DIV Fiche livre ----->
                <li class="fichelivre" id="<?php the_ID(); ?>">
                    <?php
                            $book_title = get_the_title();
                            $book_article = get_the_content();
                            $book_author = get_field('author');
                            $book_content = get_field('citations');
                    ?>
                    
                    <div class="titleandauthor"> 
                        <a class="derouleur" href="#">          
                        <!-- Titre du livre  -->
                        <?php              
                        if( ! empty( $book_title ) ) {
                            echo  '        
                            <p class="titleofthebook">' . $book_title .'</p>';
                        }
                        ?>
                        
                        <!-- Auteur du livre  -->
                        <?php          
                        if( ! empty( $book_author ) ) {
                            echo  '        
                            <p class="authorofthebook">' . $book_author .'</p>';
                        }
                        ?>
                        </a>
                    </div>


                    <!-- Contenu de la page wordpress  -->
                    <?php    /*  

                    if( ! empty( $book_article ) ) {
                    echo  '        
                    <p class="contentofthebook">' . $book_article .'</p>';
                    } 
                    */?>

                    <!-- Contenu du livre  -->
                    <?php   /*         

                    if( ! empty( $book_content ) ) {
                    echo  '        
                    <div class="contentofthebook">' . $book_content .'</div>';
                    } */
                    ?>

                    <div class="contentofthebook">
                    <?php the_field('citations'); ?>
                    </div>
                    
                </li>

                

                <?php endwhile; ?>
                <?php next_post_link(); ?>
            </ul>

            
            <?php wp_reset_postdata(); ?>
            <?php else : esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' ); endif; ?>

        </div>
        
        

        

        
    </div>
          

</div>

<?php get_footer(); ?>