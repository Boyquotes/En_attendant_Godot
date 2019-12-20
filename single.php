<?php get_header( ); ?>

<div class="container">

        
    <div class="row">

        <!--_____ Left • Sidebar_____  -->
        
        <div class="col-sm-4 leftnav">
            <nav class="header">
                <?php $blog_title = get_bloginfo(); ?>
                <h1 id="godot_title"> <?php echo $blog_title ?> </h1>
                <p class="godot_subtitle"> Blog-mémo de rencontres littéraires et cinématographiques </p>
            </nav>  
        </div>
        
        <!--_____ Right • Content and articles _____  -->

        <div class="col-sm-8 rightcontent">
               

                <!----- DIV Fiche livre ----->
                <div class="fichelivre" id="<?php the_ID(); ?>">
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

                    <div class="contentofthebook">
                    <?php 
                        if( ! empty( $book_article ) ) {
                        echo  '<p class="contentofthebook">' . $book_article .'</p>';
                        } 
                    ?>

                    <?php /* the_field('citations'); */?>
                


                    </div>
                    
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

            
                
                <?php previous_post_link('<strong> &larr; %link    </strong>'); ?>
                <?php next_post_link('<strong>%link &rarr;</strong>'); ?> 

            
            <?php wp_reset_postdata(); ?>


        </div>
        
        

        

        
    </div>
          

</div>

<?php get_footer(); ?>