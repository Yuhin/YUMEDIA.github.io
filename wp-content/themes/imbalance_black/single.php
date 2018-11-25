<?php get_header(); ?> 
<?php get_sidebar(); ?>  
            <div id="main">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<div class="entry">
                <div class="postmetadata">
                    <span>Автор:</span> <?php the_author() ?><br />
                    <?php printf(__('<span>Рубрика:</span> %s'), get_the_category_list(', ')); ?><br />
					<?php comments_popup_link(__('Отзывов нет'), __('1 отзыв'), __('Отзывов (%)'), '', __('Обсуждение закрыто') ); ?><br />
                    <?php edit_post_link(__('[Править]'), '<br />', ''); ?>
                </div>
                <h1><?php the_title(); ?></h1>
                <div class="article" id="post-<?php the_ID(); ?>">
                    <?php the_content(); ?>
                    <div class="postmetadata"><?php the_tags(__('<span>Метки:</span>') . ' ', ', ', '<br />'); ?>
                    <span>Поделитесь статьей:</span> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>%26t=<?php the_title(); ?>">Facebook</a>, 
                    <?php if (function_exists('wp_get_shortlink')) { ?>
					<a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo wp_get_shortlink(get_the_ID()); ?>" title="Twitter!">Twitter</a>
					<?php } 
					else { ?>
					<a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php the_permalink(); ?>" title="Twitter!">Twitter</a>
					<?php } ?>
                    <br />

                    <?php comments_rss_link('RSS 2.0'); ?> | <a href="<?php trackback_url(); ?>">Трекбек</a>
                    </div>
                </div>
                <div id="comments">
					<?php comments_template(); ?>
                </div>
            <?php endwhile; ?>
            <?php else : ?>
                <h1 id="error"><?php _e("К сожалению, по вашему запросу ничего не найдено."); ?></h1>
            <?php endif; ?>
            </div>         
            </div>

<?php get_footer(); ?>
