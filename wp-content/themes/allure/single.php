<?php get_header(); ?>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- begin .post -->
    <article <?php post_class(); ?>>
        <div class="breadcrumbs"><?php the_breadcrumb(); ?></div>
        
        <h1><?php the_title(); ?></h1>   
        
        <!-- begin .post-meta -->
        <div class="meta">
            <span class="post-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?> <?php _e('by','site5framework') ?> <?php the_author_posts_link(); ?></span>
            
            <span class="post-date"> | <?php echo get_the_date(n); ?>.<?php echo get_the_date(d); ?>.<?php echo get_the_date(Y); ?></span> 
        </div>
        <!-- end .post-meta -->
        
        <div class="post_content">
        <?php the_content(); ?>
        </div>
        
        <?php if(of_get_option("sharebuttons")) { ?>
        <div class="share-buttons clearfix">
            <em>Share it!</em>
            
            <?php if(of_get_option('showfacebook')) { ?><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook." class="social-button-fb"><i class="fa fa-facebook"></i></a><?php } ?>
            <?php if(of_get_option('showtwitter')) { ?><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" class="social-button-twt"><i class="fa fa-twitter"></i></a><?php } ?>
            <?php if(of_get_option('showpinterest')) { ?><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" class="social-button-pint"><i class="fa fa-pinterest-p"></i></a><?php } ?>
        </div>
        <?php } ?>
        
        <span class="post-category clear"><em><?php _e('See more from','site5framework') ?>:</em> <?php the_category(', '); ?></span>
        
        <div class="post-author-box clearfix">
            <div class="author-pic"><?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?> </div>      
            <div class="author-info">
                <span><?php _e('ABOUT THE AUTHOR','site5framework') ?></span>
                <h4><?php the_author_posts_link(); ?></h4>
                <p><?php the_author_description(); ?> </p>
            </div>      
        </div>
    
        <?php comments_template(); ?>
        
    </article>
    <?php endwhile; ?>
    <!-- end .post -->
    
    <?php endif; ?>
    
<div class="clear"></div>
<?php get_footer(); ?>