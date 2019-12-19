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
                    <li class="fichelivre">

                    <?php
                            $book_title = get_the_title();
                            $book_article = get_the_content();
                            $book_author = get_field('author');
                            $book_citations = get_field('citations');

                    ?>
                            
                        
                    <div class="titleandauthor"> <a class="derouleur" href="#">      
                        <?php            
                            
                            if( ! empty( $book_title ) ) {
                                echo  '        
                                <p class="nameofthebook">' . $book_title .'</p>';
                        }
                        ?>

                        <?php            

                        if( ! empty( $book_author ) ) {
                            echo  '        
                            <p class="authorofthebook">' . $book_author .'</p>';
                        }
                        ?>
                    </a></div>

                        <?php            

                        if( ! empty( $book_citations ) ) {
                        echo  '        
                        <p class="citationsofthebook">' . $book_citations .'</p>';
                        }
                        ?>


                        <?php            

                        if( ! empty( $book_article ) ) {
                            echo  '        
                            <p class="contentofthebook">' . $book_article .'</p>';
                        }
                        ?>

                        





                        
                     
                        
                       <p> <?php  /*printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></p>
                       <p> <?php 
                       
                         /* 
                       
                        <p class="book_title"><?php printf( '%1$s - %2$s', get_the_title());  ?> </p>
                        <p class="book_article"><?php printf( '%1$s - %2$s', get_the_content());  ?> </p>
                         printf( '%1$s - %2$s', get_the_title(),  );  */?>
                        

                        

                    </li>
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
        </div>
          

 

    </div>

<?php get_footer(); ?>