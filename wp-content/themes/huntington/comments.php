<?php 
	$custom_comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' => '<input type="text" id="name" name="author" placeholder="' . esc_html__('Name *','huntington') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" />',
		    'email'  => '<input name="email" type="text" id="email" placeholder="' . esc_html__('Email *','huntington') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />',
		    'url'    => '<input name="url" type="text" id="url" placeholder="' . esc_html__('Website','huntington') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" />') 
		),
		'comment_field' => '<textarea name="comment" placeholder="' . esc_html__('Enter your comment here...','huntington') . '" id="comments" aria-required="true"></textarea>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','huntington' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'cancel_reply_link' => esc_html__( 'Cancel' , 'huntington' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'label_submit' => esc_html__( 'Submit' , 'huntington' )
	);
?>

<div class="comments">

	<div class="comment-count">
		<h5><?php comments_number( esc_html__( '0 Comments', 'huntington' ), esc_html__( '1 Comment', 'huntington' ), esc_html__( '% Comments', 'huntington' ) ); ?></h5>
	</div>
	
	<?php 
		if( have_comments() ){
			echo '<ol id="singlecomments" class="commentlist clearfix">';
				wp_list_comments( 'type=all&callback=ebor_custom_comment' );
			echo '</ol>';
			paginate_comments_links();
		}
	?>

	<div class="comment-form-wrapper"> 
	
		<div class="comment-form-icon-wrapper"></div>
		<?php comment_form( $custom_comment_form ); ?>
	
	</div>

</div>