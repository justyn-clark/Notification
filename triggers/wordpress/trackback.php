<?php
/**
 * Trackback triggers
 */

namespace Notification\Triggers\WordPress\Trackback;

/**
 * Published
 */

function added_template() {

	$html = '<p>' . __( 'Howdy!', 'notification' ) . '</p>';
	$html .= '<p>' . __( 'There is new trackback to your article:', 'notification' ) . '</p>';
	$html .= '<p>{comment_content}</p>';

	return $html;

}

register_trigger( array(
	'slug'     => 'wordpress/trackback/added',
	'name'     => __( 'Trackback added', 'notification' ),
	'group'    => __( 'WordPress : Trackbacks', 'notification' ),
	'template' => call_user_func( __NAMESPACE__ . '\\added_template' ),
	'tags'     => array(
		'ID'               => 'integer',
		'post_ID'          => 'integer',
		'author_name'      => 'string',
		'author_email'     => 'email',
		'author_url'       => 'url',
		'author_IP'        => 'string',
		'author_user_id'   => 'integer',
		'author_agent'     => 'string',
		'comment_date'     => 'string',
		'comment_content'  => 'string',
		'comment_approved' => 'string',
		'comment_type'     => 'string',
	)
) );

function added( $ID, $comment ) {

	if ( $comment->comment_type != 'trackback' ) {
		return;
	}

	notification( 'wordpress/trackback/added', array(
		'ID'               => $ID,
		'post_ID'          => $comment->comment_post_ID,
		'author_name'      => $comment->comment_author,
		'author_email'     => $comment->comment_author_email,
		'author_url'       => $comment->comment_author_url,
		'author_IP'        => $comment->comment_author_IP,
		'author_user_id'   => $comment->user_id,
		'author_agent'     => $comment->comment_agent,
		'comment_date'     => $comment->comment_date,
		'comment_content'  => $comment->comment_content,
		'comment_approved' => $comment->comment_approved,
		'comment_type'     => $comment->comment_type,
	) );

}
add_action( 'wp_insert_comment', __NAMESPACE__ . '\\added', 10, 2 );

/**
 * Approved
 */

function approved_template() {

	$html = '<p>' . __( 'Howdy!', 'notification' ) . '</p>';
	$html .= '<p>' . __( 'Trackback:', 'notification' ) . '</p>';
	$html .= '<p>{comment_content}</p>';
	$html .= '<p>' . __( 'from {author_name} has been approved.', 'notification' ) . '</p>';

	return $html;

}

register_trigger( array(
	'slug'     => 'wordpress/trackback/approved',
	'name'     => __( 'Trackback approved', 'notification' ),
	'group'    => __( 'WordPress : Trackbacks', 'notification' ),
	'template' => call_user_func( __NAMESPACE__ . '\\approved_template' ),
	'tags'     => array(
		'ID'               => 'integer',
		'post_ID'          => 'integer',
		'author_name'      => 'string',
		'author_email'     => 'email',
		'author_url'       => 'url',
		'author_IP'        => 'string',
		'author_user_id'   => 'integer',
		'author_agent'     => 'string',
		'comment_date'     => 'string',
		'comment_content'  => 'string',
		'comment_approved' => 'string',
		'comment_type'     => 'string',
	)
) );

function approved( $ID, $comment ) {

	notification( 'wordpress/trackback/approved', array(
		'ID'               => $ID,
		'post_ID'          => $comment->comment_post_ID,
		'author_name'      => $comment->comment_author,
		'author_email'     => $comment->comment_author_email,
		'author_url'       => $comment->comment_author_url,
		'author_IP'        => $comment->comment_author_IP,
		'author_user_id'   => $comment->user_id,
		'author_agent'     => $comment->comment_agent,
		'comment_date'     => $comment->comment_date,
		'comment_content'  => $comment->comment_content,
		'comment_approved' => $comment->comment_approved,
		'comment_type'     => $comment->comment_type,
	) );

}
add_action( 'comment_approved_trackback', __NAMESPACE__ . '\\approved', 10, 2 );

/**
 * Unapproved
 */

function unapproved_template() {

	$html = '<p>' . __( 'Howdy!', 'notification' ) . '</p>';
	$html .= '<p>' . __( 'Trackback:', 'notification' ) . '</p>';
	$html .= '<p>{comment_content}</p>';
	$html .= '<p>' . __( 'from {author_name} has been unapproved.', 'notification' ) . '</p>';

	return $html;

}

register_trigger( array(
	'slug'     => 'wordpress/trackback/unapproved',
	'name'     => __( 'Trackback unapproved', 'notification' ),
	'group'    => __( 'WordPress : Trackbacks', 'notification' ),
	'template' => call_user_func( __NAMESPACE__ . '\\unapproved_template' ),
	'tags'     => array(
		'ID'               => 'integer',
		'post_ID'          => 'integer',
		'author_name'      => 'string',
		'author_email'     => 'email',
		'author_url'       => 'url',
		'author_IP'        => 'string',
		'author_user_id'   => 'integer',
		'author_agent'     => 'string',
		'comment_date'     => 'string',
		'comment_content'  => 'string',
		'comment_approved' => 'string',
		'comment_type'     => 'string',
	)
) );

function unapproved( $ID, $comment ) {

	notification( 'wordpress/pingback/unapproved', array(
		'ID'               => $ID,
		'post_ID'          => $comment->comment_post_ID,
		'author_name'      => $comment->comment_author,
		'author_email'     => $comment->comment_author_email,
		'author_url'       => $comment->comment_author_url,
		'author_IP'        => $comment->comment_author_IP,
		'author_user_id'   => $comment->user_id,
		'author_agent'     => $comment->comment_agent,
		'comment_date'     => $comment->comment_date,
		'comment_content'  => $comment->comment_content,
		'comment_approved' => $comment->comment_approved,
		'comment_type'     => $comment->comment_type,
	) );

}
add_action( 'comment_unapproved_trackback', __NAMESPACE__ . '\\unapproved', 10, 2 );

/**
 * Trashed
 */

function trashed_template() {

	$html = '<p>' . __( 'Howdy!', 'notification' ) . '</p>';
	$html .= '<p>' . __( 'Trackback:', 'notification' ) . '</p>';
	$html .= '<p>{comment_content}</p>';
	$html .= '<p>' . __( 'from {author_name} has been moved to trash.', 'notification' ) . '</p>';

	return $html;

}

register_trigger( array(
	'slug'     => 'wordpress/trackback/trashed',
	'name'     => __( 'Trackback moved to trash', 'notification' ),
	'group'    => __( 'WordPress : Trackbacks', 'notification' ),
	'template' => call_user_func( __NAMESPACE__ . '\\trashed_template' ),
	'tags'     => array(
		'ID'               => 'integer',
		'post_ID'          => 'integer',
		'author_name'      => 'string',
		'author_email'     => 'email',
		'author_url'       => 'url',
		'author_IP'        => 'string',
		'author_user_id'   => 'integer',
		'author_agent'     => 'string',
		'comment_date'     => 'string',
		'comment_content'  => 'string',
		'comment_approved' => 'string',
		'comment_type'     => 'string',
	)
) );

function trashed( $ID, $comment ) {

	notification( 'wordpress/trackback/trashed', array(
		'ID'               => $ID,
		'post_ID'          => $comment->comment_post_ID,
		'author_name'      => $comment->comment_author,
		'author_email'     => $comment->comment_author_email,
		'author_url'       => $comment->comment_author_url,
		'author_IP'        => $comment->comment_author_IP,
		'author_user_id'   => $comment->user_id,
		'author_agent'     => $comment->comment_agent,
		'comment_date'     => $comment->comment_date,
		'comment_content'  => $comment->comment_content,
		'comment_approved' => $comment->comment_approved,
		'comment_type'     => $comment->comment_type,
	) );

}
add_action( 'comment_trash_trackback', __NAMESPACE__ . '\\trashed', 10, 2 );

/**
 * Marked as spam
 */

function spam_template() {

	$html = '<p>' . __( 'Howdy!', 'notification' ) . '</p>';
	$html .= '<p>' . __( 'Trackback:', 'notification' ) . '</p>';
	$html .= '<p>{comment_content}</p>';
	$html .= '<p>' . __( 'from {author_name} has been moved to trash.', 'notification' ) . '</p>';

	return $html;

}

register_trigger( array(
	'slug'     => 'wordpress/trackback/spam',
	'name'     => __( 'Trackback marked as spam', 'notification' ),
	'group'    => __( 'WordPress : Trackbacks', 'notification' ),
	'template' => call_user_func( __NAMESPACE__ . '\\spam_template' ),
	'tags'     => array(
		'ID'               => 'integer',
		'post_ID'          => 'integer',
		'author_name'      => 'string',
		'author_email'     => 'email',
		'author_url'       => 'url',
		'author_IP'        => 'string',
		'author_user_id'   => 'integer',
		'author_agent'     => 'string',
		'comment_date'     => 'string',
		'comment_content'  => 'string',
		'comment_approved' => 'string',
		'comment_type'     => 'string',
	)
) );

function spam( $ID, $comment ) {

	notification( 'wordpress/trackback/spam', array(
		'ID'               => $ID,
		'post_ID'          => $comment->comment_post_ID,
		'author_name'      => $comment->comment_author,
		'author_email'     => $comment->comment_author_email,
		'author_url'       => $comment->comment_author_url,
		'author_IP'        => $comment->comment_author_IP,
		'author_user_id'   => $comment->user_id,
		'author_agent'     => $comment->comment_agent,
		'comment_date'     => $comment->comment_date,
		'comment_content'  => $comment->comment_content,
		'comment_approved' => $comment->comment_approved,
		'comment_type'     => $comment->comment_type,
	) );

}
add_action( 'comment_trash_trackback', __NAMESPACE__ . '\\spam', 10, 2 );
