<?php get_header( ); ?>

<div class="container">

        
    <div class="row">

        <!--_____ Left • Sidebar_____  -->
        
        <div class="col-sm-4 leftnav">
            <nav class="header">
                <?php $blog_title = get_bloginfo(); ?>
                <h1 id="godot_title"> <?php echo $blog_title ?> </h1>
                <p class="godot_subtitle"> Blog-mémo de rencontres littéraires </p>
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
                'order'=>'DESC',
                'paged' => $paged
                );

                $wp_query = new WP_Query( $args );
                if( $wp_query->have_posts() ) :
            ?>
                
            <ul>
                <?php while( $wp_query->have_posts() ) : $wp_query->the_post();?>

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
                    <?php 
                        if( ! empty( $book_article ) ) {
                        echo  '<p class="contentofthebook">' . $book_article .'</p>';
                        } 
                    ?>
                    </div>
                    
                </li>
              

                <?php endwhile; ?>
                <?php previous_posts_link('&laquo; Previous') ?>
                <?php next_posts_link('More &raquo;') ?>
                
                
            </ul>

            
            <?php wp_reset_postdata(); ?>
            <?php else : esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' ); endif; ?>

        </div>
        
        

        

        
    </div>
          

</div>

<?php get_footer(); ?>