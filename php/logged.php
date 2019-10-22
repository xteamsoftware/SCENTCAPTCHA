<?php	

	//includo
	define('WP_USE_THEMES', false);
	/** Loads the WordPress Environment and Template */
	require( '../wp-blog-header.php' );
	/** Sets up WordPress vars and included files. */
	require_once( '../wp-settings.php');


	require('../wp-load.php');
	require_once('../wp-includes/pluggable.php');
	
	if ( is_user_logged_in() == true ) 
	{
        	$current_user = wp_get_current_user();
	        printf( "OK:" );
		//printf( __( 'Username: %s', 'textdomain' ), esc_html( $current_user->user_login ) ) . '<br />';
		//printf( __( 'User email: %s', 'textdomain' ), esc_html( $current_user->user_email ) ) . '<br />';
		//printf( __( 'User first name: %s', 'textdomain' ), esc_html( $current_user->user_firstname ) ) . '<br />';
		//printf( __( 'User last name: %s', 'textdomain' ), esc_html( $current_user->user_lastname ) ) . '<br />';
		printf( __( 'User display name: %s', 'textdomain' ), esc_html( $current_user->display_name ) ) . '<br />';
		printf( __( '[ID]:%s', 'textdomain' ), esc_html( $current_user->ID ) );
    	} 
	else 
	{
        	printf( "ERROR" );
	}
?>