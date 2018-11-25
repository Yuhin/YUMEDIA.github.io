<?php get_header(); ?> 
				  <?php /* If this is a category archive */ if (is_category()) { ?>
                    <h1><?php printf(__('Рубрика &#8216;%s&#8217;'), single_cat_title('', false)); ?></h1>
                  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    <h1"><?php printf(__('Метка &#8216;%s&#8217;'), single_tag_title('', false) ); ?></h1>
                  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    <h1><?php printf(_c('Архив за %s | Ежедневный архив'), get_the_time(__('d M Y'))); ?></h1>
                  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    <h1><?php printf(_c('Архив за %s | Архив по месяцам'), get_the_time(__('F Y'))); ?></h1>
                  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    <h1><?php printf(_c('Архив за %s | Архив по годам'), get_the_time(__('Y'))); ?></h1>
                  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    <h1><?php _e('Архив автора'); ?></h1>
                  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h1><?php _e('Архив сайта'); ?></h1>
                  <?php } ?>

              <ul class="mcol">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
              	<li class="article" id="post-<?php the_ID(); ?>">

			<?php
			if ( has_post_thumbnail() ) { ?>
                    	<?php 
                    	$imgsrcparam = array(
						'alt'	=> trim(strip_tags( $post->post_excerpt )),
						'title'	=> trim(strip_tags( $post->post_title )),
						);
                    	$thumbID = get_the_post_thumbnail( $post->ID, 'background', $imgsrcparam ); ?>
                        <div class="preview"><a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a></div>

                    
                    <?php } else {?>
                        <div class="preview"><a href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" /></a></div>
                    <?php } ?>

                    <div class="article-over">
                      <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      <?php the_excerpt(); ?>
                      <div class="postmetadata">
                          Опубликовано: <?php the_time(__('d M Y', 'kubrick')) ?>&nbsp;&#721;&nbsp;
                          <?php comments_popup_link(__('Ваш отзыв'), __('1 отзыв'), __('Отзывов (%)'), '', __('Обсуждение закрыто') ); ?><br />
                          <?php printf(__('Рубрика: %s'), get_the_category_list(', ')); ?>
                      </div>
                    </div>
                </li> <?php ?>
            <?php endwhile; ?>
            <?php else : ?>


            <?php endif; ?>
            </ul>

            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <?php endwhile; ?>
            <?php else : ?>
                <h1 id="error"><?php _e("К сожалению, по вашему запросу ничего не найдено."); ?></h1>
            <?php endif; ?>


            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<?php get_footer(); ?>