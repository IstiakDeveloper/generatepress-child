<?php
/**
 * GeneratePress Child Theme Functions
 * JRDM Website Customizations
 *
 * @package GeneratePress_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue child theme styles and scripts
 */
function jrdm_enqueue_styles() {
	// Enqueue custom CSS
	wp_enqueue_style( 'jrdm-custom-style',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array( 'generate-style' ),
		wp_get_theme()->get( 'Version' )
	);
	
	// Enqueue custom JavaScript for animations
	wp_enqueue_script( 'jrdm-custom-script',
		get_stylesheet_directory_uri() . '/assets/js/custom.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'jrdm_enqueue_styles' );

/**
 * Enqueue Google Fonts
 */
function jrdm_enqueue_fonts() {
	// Inter for English text
	wp_enqueue_style( 'jrdm-font-english',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'jrdm_enqueue_fonts', 5 );

/**
 * Enqueue fonts/styles inside block editor.
 */
function jrdm_enqueue_editor_assets() {
	jrdm_enqueue_fonts();

	wp_enqueue_style(
		'jrdm-editor-style',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_editor_assets', 'jrdm_enqueue_editor_assets' );

/**
 * Add custom body classes
 */
function jrdm_body_classes( $classes ) {
	$classes[] = 'jrdm-theme';
	return $classes;
}
add_filter( 'body_class', 'jrdm_body_classes' );

/**
 * Register custom navigation menus
 */
function jrdm_register_menus() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'generatepress-child' ),
		'footer'  => __( 'Footer Menu', 'generatepress-child' ),
	) );
}
add_action( 'after_setup_theme', 'jrdm_register_menus' );

/**
 * Add theme support for custom logo
 */
function jrdm_theme_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 350,
		'flex-height' => true,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'jrdm_theme_setup' );

/**
 * JRDM Customizer settings (Top Bar).
 */
function jrdm_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'jrdm_top_bar',
		array(
			'title'       => __( 'JRDM Top Bar', 'generatepress-child' ),
			'description' => __( 'Top bar contact info and registration.', 'generatepress-child' ),
			'priority'    => 25,
		)
	);

	$wp_customize->add_setting(
		'jrdm_top_bar_enabled',
		array(
			'default'           => true,
			'sanitize_callback' => static function ( $value ) {
				return (bool) $value;
			},
		)
	);
	$wp_customize->add_control(
		'jrdm_top_bar_enabled',
		array(
			'type'    => 'checkbox',
			'section' => 'jrdm_top_bar',
			'label'   => __( 'Enable top bar', 'generatepress-child' ),
		)
	);

	$fields = array(
		'jrdm_phone' => array(
			'label'   => __( 'Phone', 'generatepress-child' ),
			'default' => '+880-2587-722361',
		),
		'jrdm_email' => array(
			'label'   => __( 'Email', 'generatepress-child' ),
			'default' => 'jrdmngo95@gmail.com',
		),
		'jrdm_circular_url' => array(
			'label'   => __( 'Circular Button URL', 'generatepress-child' ),
			'default' => '#',
		),
		'jrdm_annual_report_url' => array(
			'label'   => __( 'Annual Report Button URL', 'generatepress-child' ),
			'default' => '#',
		),
		'jrdm_donate_url' => array(
			'label'   => __( 'Donate Now Button URL', 'generatepress-child' ),
			// Default to /donate/ so user can just create a page with that slug.
			'default' => home_url( '/donate/' ),
		),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => ( false !== strpos( $key, '_url' ) ) ? 'esc_url_raw' : 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'type'    => 'text',
				'section' => 'jrdm_top_bar',
				'label'   => $field['label'],
			)
		);
	}
}
add_action( 'customize_register', 'jrdm_customize_register' );

/**
 * JRDM footer settings (contact + social).
 */
function jrdm_footer_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'jrdm_footer',
		array(
			'title'       => __( 'JRDM Footer', 'generatepress-child' ),
			'description' => __( 'Footer contact info and social links.', 'generatepress-child' ),
			'priority'    => 26,
		)
	);

	$settings = array(
		'jrdm_footer_address'       => array(
			'label'   => __( 'Address', 'generatepress-child' ),
			'default' => 'House-5/1, Block-C, Lalmatia, Dhaka-1207, Bangladesh',
			'type'    => 'text',
		),
		'jrdm_footer_phone'         => array(
			'label'   => __( 'Phone', 'generatepress-child' ),
			'default' => '+880-2587-722361',
			'type'    => 'text',
		),
		'jrdm_footer_email'         => array(
			'label'   => __( 'Email', 'generatepress-child' ),
			'default' => 'jrdmngo95@gmail.com',
			'type'    => 'text',
		),
		'jrdm_footer_facebook_url'  => array(
			'label'   => __( 'Facebook Page URL', 'generatepress-child' ),
			'default' => '',
			'type'    => 'url',
		),
		'jrdm_footer_twitter_url'   => array(
			'label'   => __( 'Twitter / X URL', 'generatepress-child' ),
			'default' => '',
			'type'    => 'url',
		),
		'jrdm_footer_linkedin_url'  => array(
			'label'   => __( 'LinkedIn URL', 'generatepress-child' ),
			'default' => '',
			'type'    => 'url',
		),
		'jrdm_footer_youtube_url'   => array(
			'label'   => __( 'YouTube URL', 'generatepress-child' ),
			'default' => '',
			'type'    => 'url',
		),
	);

	foreach ( $settings as $key => $data ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $data['default'],
				'sanitize_callback' => ( 'url' === $data['type'] ) ? 'esc_url_raw' : 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			$key,
			array(
				'type'    => $data['type'],
				'section' => 'jrdm_footer',
				'label'   => $data['label'],
			)
		);
	}
}
add_action( 'customize_register', 'jrdm_footer_customize_register' );

/**
 * JRDM Contact Form – Customizer settings (recipient, success message).
 */
function jrdm_contact_form_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'jrdm_contact_form',
		array(
			'title'       => __( 'JRDM Contact Form', 'generatepress-child' ),
			'description' => __( 'Manage contact form recipient and messages.', 'generatepress-child' ),
			'priority'    => 27,
		)
	);

	$wp_customize->add_setting(
		'jrdm_contact_recipient',
		array(
			'default'           => get_option( 'admin_email' ),
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'jrdm_contact_recipient',
		array(
			'type'    => 'email',
			'section' => 'jrdm_contact_form',
			'label'   => __( 'Recipient email', 'generatepress-child' ),
		)
	);

	$wp_customize->add_setting(
		'jrdm_contact_success_message',
		array(
			'default'           => __( 'Thank you. Your message has been sent successfully.', 'generatepress-child' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'jrdm_contact_success_message',
		array(
			'type'    => 'textarea',
			'section' => 'jrdm_contact_form',
			'label'   => __( 'Success message', 'generatepress-child' ),
		)
	);

	$wp_customize->add_setting(
		'jrdm_contact_map_embed_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'jrdm_contact_map_embed_url',
		array(
			'type'        => 'url',
			'section'     => 'jrdm_contact_form',
			'label'       => __( 'Map embed URL', 'generatepress-child' ),
			'description' => __( 'Paste the embed URL from Google Maps (Share → Embed a map → copy src="..."). Leave empty to hide map.', 'generatepress-child' ),
		)
	);
}
add_action( 'customize_register', 'jrdm_contact_form_customize_register' );

/**
 * Handle contact form submission (run before output).
 */
function jrdm_contact_form_process() {
	if ( ! isset( $_POST['jrdm_contact_nonce'] ) || ! wp_verify_nonce( $_POST['jrdm_contact_nonce'], 'jrdm_contact_form' ) ) {
		return;
	}
	if ( ! isset( $_POST['jrdm_contact_submit'] ) ) {
		return;
	}

	$recipient = sanitize_email( get_theme_mod( 'jrdm_contact_recipient', get_option( 'admin_email' ) ) );
	if ( ! is_email( $recipient ) ) {
		$recipient = get_option( 'admin_email' );
	}

	$name    = isset( $_POST['jrdm_contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['jrdm_contact_name'] ) ) : '';
	$email   = isset( $_POST['jrdm_contact_email'] ) ? sanitize_email( wp_unslash( $_POST['jrdm_contact_email'] ) ) : '';
	$phone   = isset( $_POST['jrdm_contact_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['jrdm_contact_phone'] ) ) : '';
	$subject = isset( $_POST['jrdm_contact_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['jrdm_contact_subject'] ) ) : '';
	$message = isset( $_POST['jrdm_contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['jrdm_contact_message'] ) ) : '';

	$errors = array();
	if ( '' === $name ) {
		$errors[] = __( 'Please enter your name.', 'generatepress-child' );
	}
	if ( '' === $email || ! is_email( $email ) ) {
		$errors[] = __( 'Please enter a valid email address.', 'generatepress-child' );
	}
	if ( '' === $message ) {
		$errors[] = __( 'Please enter your message.', 'generatepress-child' );
	}

	if ( ! empty( $errors ) ) {
		set_transient( 'jrdm_contact_errors', $errors, 60 );
		set_transient( 'jrdm_contact_post', array(
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'subject' => $subject,
			'message' => $message,
		), 60 );
		return;
	}

	// Save submission in dashboard (Contact Form CPT).
	$post_title = $subject ? $subject : __( '(No subject)', 'generatepress-child' );
	$insert     = wp_insert_post(
		array(
			'post_type'   => 'jrdm_contact',
			'post_title'  => $post_title,
			'post_content' => $message,
			'post_status' => 'publish',
			'post_author' => 0,
		),
		true
	);
	if ( is_wp_error( $insert ) ) {
		$insert = 0;
	}
	if ( $insert && $insert > 0 ) {
		update_post_meta( $insert, '_jrdm_contact_name', $name );
		update_post_meta( $insert, '_jrdm_contact_email', $email );
		update_post_meta( $insert, '_jrdm_contact_phone', $phone );
	}

	$body = sprintf(
		"%s: %s\n%s: %s\n%s: %s\n%s: %s\n\n%s",
		__( 'Name', 'generatepress-child' ),
		$name,
		__( 'Email', 'generatepress-child' ),
		$email,
		__( 'Phone', 'generatepress-child' ),
		$phone,
		__( 'Subject', 'generatepress-child' ),
		$subject,
		__( 'Message', 'generatepress-child' ) . ":\n" . $message
	);

	$mail_subject = sprintf(
		/* translators: %s: site name */
		__( '[%s] Contact form submission', 'generatepress-child' ),
		get_bloginfo( 'name' )
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	$sent = wp_mail( $recipient, $mail_subject, $body, $headers );

	// Success if saved to dashboard; email is best-effort.
	if ( $insert && $insert > 0 ) {
		set_transient( 'jrdm_contact_success', 1, 60 );
	} elseif ( $sent ) {
		set_transient( 'jrdm_contact_success', 1, 60 );
	} else {
		set_transient( 'jrdm_contact_errors', array( __( 'Failed to send. Please try again or email us directly.', 'generatepress-child' ) ), 60 );
	}
}
add_action( 'init', 'jrdm_contact_form_process', 5 );

/**
 * Register Contact Form submissions CPT (dashboard: Contact Form menu).
 */
function jrdm_register_contact_cpt() {
	$labels = array(
		'name'               => _x( 'Contacts', 'post type general name', 'generatepress-child' ),
		'singular_name'      => _x( 'Contact', 'post type singular name', 'generatepress-child' ),
		'menu_name'          => __( 'Contact Form', 'generatepress-child' ),
		'all_items'          => __( 'All Contacts', 'generatepress-child' ),
		'view_item'          => __( 'View Contact', 'generatepress-child' ),
		'edit_item'          => __( 'View / Edit Contact', 'generatepress-child' ),
		'search_items'       => __( 'Search Contacts', 'generatepress-child' ),
		'not_found'          => __( 'No contacts found', 'generatepress-child' ),
		'not_found_in_trash' => __( 'No contacts in Trash', 'generatepress-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'          => 'dashicons-email-alt',
		'menu_position'     => 22,
		'publicly_queryable' => false,
		'rewrite'            => false,
		'capability_type'    => 'post',
	);

	register_post_type( 'jrdm_contact', $args );
}
add_action( 'init', 'jrdm_register_contact_cpt' );

/**
 * Contact list table: show Name, Email, Subject, Date.
 */
function jrdm_contact_list_columns( $columns ) {
	$new = array();
	$new['cb'] = $columns['cb'];
	$new['title'] = __( 'Subject', 'generatepress-child' );
	$new['jrdm_contact_name'] = __( 'Name', 'generatepress-child' );
	$new['jrdm_contact_email'] = __( 'Email', 'generatepress-child' );
	$new['date'] = $columns['date'];
	return $new;
}
function jrdm_contact_list_column_content( $column, $post_id ) {
	if ( 'jrdm_contact_name' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_jrdm_contact_name', true ) );
	}
	if ( 'jrdm_contact_email' === $column ) {
		$email = get_post_meta( $post_id, '_jrdm_contact_email', true );
		if ( $email ) {
			echo '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>';
		}
	}
}
add_filter( 'manage_jrdm_contact_posts_columns', 'jrdm_contact_list_columns' );
add_action( 'manage_jrdm_contact_posts_custom_column', 'jrdm_contact_list_column_content', 10, 2 );

/**
 * Meta box: Sender details (name, email, phone) on Contact edit screen.
 */
function jrdm_contact_add_meta_box() {
	add_meta_box(
		'jrdm_contact_sender',
		__( 'Sender details', 'generatepress-child' ),
		'jrdm_contact_sender_meta_box',
		'jrdm_contact',
		'side',
		'high'
	);
}
function jrdm_contact_sender_meta_box( $post ) {
	$name  = get_post_meta( $post->ID, '_jrdm_contact_name', true );
	$email = get_post_meta( $post->ID, '_jrdm_contact_email', true );
	$phone = get_post_meta( $post->ID, '_jrdm_contact_phone', true );
	?>
	<p><strong><?php esc_html_e( 'Name', 'generatepress-child' ); ?></strong><br><?php echo esc_html( $name ); ?></p>
	<p><strong><?php esc_html_e( 'Email', 'generatepress-child' ); ?></strong><br><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
	<p><strong><?php esc_html_e( 'Phone', 'generatepress-child' ); ?></strong><br><?php echo esc_html( $phone ); ?></p>
	<?php
}
add_action( 'add_meta_boxes', 'jrdm_contact_add_meta_box' );

/**
 * Hide "Add New" for Contact Form (submissions only from front-end form).
 */
function jrdm_contact_hide_add_new() {
	global $submenu;
	if ( isset( $submenu['edit.php?post_type=jrdm_contact'] ) ) {
		foreach ( $submenu['edit.php?post_type=jrdm_contact'] as $key => $item ) {
			if ( isset( $item[2] ) && 'post-new.php?post_type=jrdm_contact' === $item[2] ) {
				unset( $submenu['edit.php?post_type=jrdm_contact'][ $key ] );
				break;
			}
		}
	}
}
add_action( 'admin_menu', 'jrdm_contact_hide_add_new', 999 );

/**
 * Contact Form menu: show submission count in sidebar.
 */
function jrdm_contact_menu_count() {
	global $menu;
	$count = (int) wp_count_posts( 'jrdm_contact' )->publish;
	foreach ( $menu as $key => $item ) {
		if ( isset( $item[2] ) && 'edit.php?post_type=jrdm_contact' === $item[2] ) {
			if ( $count > 0 ) {
				$menu[ $key ][0] = esc_html__( 'Contact Form', 'generatepress-child' ) . ' <span class="awaiting-mod count-' . (int) $count . '"><span class="pending-count">' . number_format_i18n( $count ) . '</span></span>';
			}
			break;
		}
	}
}
add_action( 'admin_menu', 'jrdm_contact_menu_count', 1000 );

/**
 * Shortcode: Professional contact form.
 *
 * Usage: [jrdm_contact_form]
 * Manage recipient and success message under Appearance → Customize → JRDM Contact Form.
 * Shows phone, email, address from Appearance → Customize → JRDM Footer.
 */
function jrdm_contact_form_shortcode() {
	$success = get_transient( 'jrdm_contact_success' );
	$errors  = get_transient( 'jrdm_contact_errors' );
	$posted  = get_transient( 'jrdm_contact_post' );

	$success_msg = get_theme_mod( 'jrdm_contact_success_message', __( 'Thank you. Your message has been sent successfully.', 'generatepress-child' ) );

	// Delete transients only after we've used them for output (so success/errors show once).
	$show_success = (bool) $success;
	$show_errors  = is_array( $errors ) ? $errors : array();
	$show_posted  = is_array( $posted ) ? $posted : array();

	if ( $success ) {
		delete_transient( 'jrdm_contact_success' );
	}
	if ( $errors ) {
		delete_transient( 'jrdm_contact_errors' );
	}
	if ( $posted ) {
		delete_transient( 'jrdm_contact_post' );
	}

	// Contact info from Customizer (JRDM Footer + Contact Form map).
	$contact_phone   = trim( (string) get_theme_mod( 'jrdm_footer_phone', '+880-2587-722361' ) );
	$contact_email   = trim( (string) get_theme_mod( 'jrdm_footer_email', 'jrdmngo95@gmail.com' ) );
	$contact_map_url  = trim( (string) get_theme_mod( 'jrdm_contact_map_embed_url', '' ) );

	ob_start();

	if ( $show_success ) {
		?>
		<div class="jrdm-contact-form-wrap">
			<div class="jrdm-contact-form-message jrdm-contact-success" role="alert">
				<?php echo esc_html( $success_msg ); ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	?>
	<div class="jrdm-contact-form-section">
		<?php if ( $contact_phone || $contact_email ) : ?>
			<div class="jrdm-contact-info-bar">
				<?php if ( $contact_phone ) : ?>
					<div class="jrdm-contact-info-item">
						<span class="jrdm-contact-info-icon" aria-hidden="true"><?php echo wp_kses( '&#x260E;', array() ); ?></span>
						<div class="jrdm-contact-info-content">
							<span class="jrdm-contact-info-label"><?php esc_html_e( 'Phone', 'generatepress-child' ); ?></span>
							<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $contact_phone ) ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( $contact_email ) : ?>
					<div class="jrdm-contact-info-item">
						<span class="jrdm-contact-info-icon" aria-hidden="true">&#x2709;</span>
						<div class="jrdm-contact-info-content">
							<span class="jrdm-contact-info-label"><?php esc_html_e( 'Email', 'generatepress-child' ); ?></span>
							<a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $contact_map_url ) : ?>
			<div class="jrdm-contact-map-block">
				<span class="jrdm-contact-info-label"><?php esc_html_e( 'Find us', 'generatepress-child' ); ?></span>
				<div class="jrdm-contact-map-embed">
					<iframe src="<?php echo esc_url( $contact_map_url ); ?>" width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e( 'Location map', 'generatepress-child' ); ?>"></iframe>
				</div>
			</div>
		<?php endif; ?>

		<div class="jrdm-contact-form-wrap">
		<?php if ( ! empty( $show_errors ) ) : ?>
			<ul class="jrdm-contact-form-message jrdm-contact-errors" role="alert">
				<?php foreach ( $show_errors as $err ) : ?>
					<li><?php echo esc_html( $err ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<form id="jrdm-contact-form" class="jrdm-contact-form" method="post" action="<?php echo esc_url( get_permalink() ); ?>#jrdm-contact-form">
			<?php wp_nonce_field( 'jrdm_contact_form', 'jrdm_contact_nonce' ); ?>

			<p class="jrdm-form-row jrdm-form-row-half">
				<label for="jrdm_contact_name"><?php esc_html_e( 'Name', 'generatepress-child' ); ?> <span class="required">*</span></label>
				<input type="text" id="jrdm_contact_name" name="jrdm_contact_name" value="<?php echo esc_attr( isset( $show_posted['name'] ) ? $show_posted['name'] : '' ); ?>" required>
			</p>

			<p class="jrdm-form-row jrdm-form-row-half">
				<label for="jrdm_contact_email"><?php esc_html_e( 'Email', 'generatepress-child' ); ?> <span class="required">*</span></label>
				<input type="email" id="jrdm_contact_email" name="jrdm_contact_email" value="<?php echo esc_attr( isset( $show_posted['email'] ) ? $show_posted['email'] : '' ); ?>" required>
			</p>

			<p class="jrdm-form-row jrdm-form-row-half">
				<label for="jrdm_contact_phone"><?php esc_html_e( 'Phone', 'generatepress-child' ); ?></label>
				<input type="tel" id="jrdm_contact_phone" name="jrdm_contact_phone" value="<?php echo esc_attr( isset( $show_posted['phone'] ) ? $show_posted['phone'] : '' ); ?>">
			</p>

			<p class="jrdm-form-row jrdm-form-row-half">
				<label for="jrdm_contact_subject"><?php esc_html_e( 'Subject', 'generatepress-child' ); ?></label>
				<input type="text" id="jrdm_contact_subject" name="jrdm_contact_subject" value="<?php echo esc_attr( isset( $show_posted['subject'] ) ? $show_posted['subject'] : '' ); ?>">
			</p>

			<p class="jrdm-form-row">
				<label for="jrdm_contact_message"><?php esc_html_e( 'Message', 'generatepress-child' ); ?> <span class="required">*</span></label>
				<textarea id="jrdm_contact_message" name="jrdm_contact_message" rows="5" required><?php echo esc_textarea( isset( $show_posted['message'] ) ? $show_posted['message'] : '' ); ?></textarea>
			</p>

			<p class="jrdm-form-row jrdm-form-submit">
				<button type="submit" name="jrdm_contact_submit" class="jrdm-contact-submit"><?php esc_html_e( 'Send Message', 'generatepress-child' ); ?></button>
			</p>
		</form>
		</div>
	</div>
	<?php

	return ob_get_clean();
}
add_shortcode( 'jrdm_contact_form', 'jrdm_contact_form_shortcode' );

/**
 * Render JRDM top bar (code-first, no widget required).
 */
function jrdm_render_top_bar() {
	if ( ! function_exists( 'generate_do_attr' ) ) {
		return;
	}

	if ( ! get_theme_mod( 'jrdm_top_bar_enabled', true ) ) {
		return;
	}

	$phone            = trim( (string) get_theme_mod( 'jrdm_phone', '+880-2587-722361' ) );
	$email            = trim( (string) get_theme_mod( 'jrdm_email', 'jrdmngo95@gmail.com' ) );
	$circular_url     = (string) get_theme_mod( 'jrdm_circular_url', '#' );
	$annual_report_url = (string) get_theme_mod( 'jrdm_annual_report_url', '#' );
	$donate_url       = (string) get_theme_mod( 'jrdm_donate_url', '#' );

	?>
	<div <?php generate_do_attr( 'top-bar' ); ?>>
		<div <?php generate_do_attr( 'inside-top-bar' ); ?>>
			<div class="top-bar-left">
				<?php if ( '' !== $phone ) : ?>
					<a href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
				<?php endif; ?>
				<?php if ( '' !== $email ) : ?>
					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
				<?php endif; ?>
			</div>
			<div class="top-bar-right">
				<a href="<?php echo esc_url( $circular_url ); ?>" class="top-bar-btn top-bar-btn-orange">Circular</a>
				<a href="<?php echo esc_url( $annual_report_url ); ?>" class="top-bar-btn top-bar-btn-green">Annual Report</a>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Replace GeneratePress widget-based top bar with our code-first version.
 */
function jrdm_override_top_bar() {
	if ( has_action( 'generate_before_header', 'generate_top_bar' ) ) {
		remove_action( 'generate_before_header', 'generate_top_bar', 5 );
	}
	add_action( 'generate_before_header', 'jrdm_render_top_bar', 5 );
}
add_action( 'after_setup_theme', 'jrdm_override_top_bar', 20 );

/**
 * Footer copyright / privacy link.
 */
function jrdm_generate_copyright( $copyright ) {
	$year = date_i18n( 'Y' );
	$name = get_bloginfo( 'name' );

	$privacy_url = function_exists( 'get_privacy_policy_url' ) ? get_privacy_policy_url() : '';
	$privacy     = $privacy_url ? sprintf( '<a href="%s">%s</a>', esc_url( $privacy_url ), esc_html__( 'Privacy Policy', 'generatepress-child' ) ) : '';

	$right = $privacy ? sprintf( '<span class="jrdm-footer-right">%s</span>', $privacy ) : '';

	return sprintf(
		'<div class="jrdm-footer-bottom"><span class="jrdm-footer-center">%s</span>%s</div>',
		esc_html( sprintf( 'Copyright © JRDM %s', $year ) ),
		$right
	);
}
add_filter( 'generate_copyright', 'jrdm_generate_copyright' );

/**
 * Register Gutenberg block styles.
 */
function jrdm_register_block_styles() {
	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	register_block_style(
		'core/button',
		array(
			'name'  => 'primary',
			'label' => __( 'JRDM Primary (Yellow)', 'generatepress-child' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'secondary',
			'label' => __( 'JRDM Secondary (Green)', 'generatepress-child' ),
		)
	);

	register_block_style(
		'core/button',
		array(
			'name'  => 'danger',
			'label' => __( 'JRDM Urgent (Burgundy)', 'generatepress-child' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'JRDM Card', 'generatepress-child' ),
		)
	);
}
add_action( 'init', 'jrdm_register_block_styles' );

/**
 * Register block pattern category.
 */
function jrdm_register_pattern_category() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'jrdm',
			array(
				'label' => __( 'JRDM', 'generatepress-child' ),
			)
		);
	}
}
add_action( 'init', 'jrdm_register_pattern_category' );

/**
 * Load block patterns.
 */
function jrdm_register_patterns() {
	$pattern_file = get_stylesheet_directory() . '/patterns/homepage.php';
	if ( file_exists( $pattern_file ) ) {
		require $pattern_file;
	}
}
add_action( 'init', 'jrdm_register_patterns', 20 );

/**
 * Add Donate button to navigation.
 */
function jrdm_add_donate_button( $items, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$donate_url = trim( (string) get_theme_mod( 'jrdm_donate_url', '' ) );

		// Fallback: if Customizer field is empty or '#', point to /donate/.
		if ( '' === $donate_url || '#' === $donate_url ) {
			$donate_url = home_url( '/donate/' );
		}

		$items .= '<li class="menu-item menu-item-donate"><a href="' . esc_url( $donate_url ) . '" class="donate-button">DONATE NOW</a></li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'jrdm_add_donate_button', 10, 2 );

/**
 * Shortcode: JRDM Photo Gallery with lightbox.
 *
 * Usage option 1 (manual IDs): [jrdm_gallery ids="1,2,3,4" columns="3"]
 * Usage option 2 (saved gallery): [jrdm_gallery id="123" columns="3"]
 */
function jrdm_photo_gallery_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'ids'     => '',
			'id'      => 0,
			'columns' => 3,
		),
		$atts,
		'jrdm_gallery'
	);

	$ids = array();

	// Manual list of attachment IDs.
	if ( ! empty( $atts['ids'] ) ) {
		$ids = array_filter( array_map( 'absint', explode( ',', $atts['ids'] ) ) );
	} elseif ( ! empty( $atts['id'] ) ) {
		// Load IDs from saved JRDM Gallery post.
		$gallery_post_id = (int) $atts['id'];
		if ( $gallery_post_id > 0 ) {
			$stored = get_post_meta( $gallery_post_id, '_jrdm_gallery_images', true );
			if ( ! empty( $stored ) && is_string( $stored ) ) {
				$ids = array_filter( array_map( 'absint', explode( ',', $stored ) ) );
			}
		}
	}

	$columns = max( 1, min( 6, (int) $atts['columns'] ) );

	if ( empty( $ids ) ) {
		return '';
	}

	$gallery_id = uniqid( 'jrdm-gallery-' );

	ob_start();
	?>
	<div class="photo-gallery-section">
		<div class="jrdm-gallery-slider jrdm-gallery-lightbox" data-gallery-id="<?php echo esc_attr( $gallery_id ); ?>">
			<button type="button" class="jrdm-gallery-arrow jrdm-gallery-arrow-prev" aria-label="<?php esc_attr_e( 'Previous images', 'generatepress-child' ); ?>">&#10094;</button>
			<div class="jrdm-gallery-viewport">
				<div class="gallery-grid columns-<?php echo (int) $columns; ?>">
					<?php foreach ( $ids as $image_id ) : ?>
						<?php
						$full_src = wp_get_attachment_image_src( $image_id, 'large' );
						$thumb    = wp_get_attachment_image_src( $image_id, 'medium_large' );

						if ( ! $full_src ) {
							continue;
						}

						$thumb_src = $thumb ? $thumb[0] : $full_src[0];
						$alt       = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
						?>
						<figure class="jrdm-gallery-item">
							<a href="<?php echo esc_url( $full_src[0] ); ?>" data-full-src="<?php echo esc_url( $full_src[0] ); ?>" data-gallery="<?php echo esc_attr( $gallery_id ); ?>">
								<img src="<?php echo esc_url( $thumb_src ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
							</a>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="button" class="jrdm-gallery-arrow jrdm-gallery-arrow-next" aria-label="<?php esc_attr_e( 'Next images', 'generatepress-child' ); ?>">&#10095;</button>
		</div>
	</div>
	<?php

	return ob_get_clean();
}
add_shortcode( 'jrdm_gallery', 'jrdm_photo_gallery_shortcode' );

/**
 * Shortcode: JRDM dynamic notices.
 *
 * Usage: [jrdm_notices posts="5" category="notice"]
 * - Mark any post with the "Notice" category (slug: notice) and it will appear here.
 */
function jrdm_notices_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'    => 5,
			'category' => 'notice',
		),
		$atts,
		'jrdm_notices'
	);

	$limit    = max( 1, (int) $atts['posts'] );
	$category = sanitize_title( $atts['category'] );

	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => $limit,
			'ignore_sticky_posts' => true,
			'category_name'       => $category,
		)
	);

	ob_start();

	if ( $query->have_posts() ) {
		$latest = null;
		$others = array();

		while ( $query->have_posts() ) {
			$query->the_post();

			$item = array(
				'title'   => get_the_title(),
				'link'    => get_permalink(),
				'date'    => get_the_date(),
				'excerpt' => wp_trim_words( get_the_excerpt(), 25, '…' ),
			);

			if ( null === $latest ) {
				$latest = $item;
			} else {
				$others[] = $item;
			}
		}

		wp_reset_postdata();

		?>
		<div class="notice-board-dynamic">
			<div class="notice-board-list-col">
				<div class="notice-list">
					<?php if ( $latest ) : ?>
						<div class="notice-item notice-item-latest">
							<div class="notice-date"><?php echo esc_html( $latest['date'] ); ?></div>
							<a class="notice-title" href="<?php echo esc_url( $latest['link'] ); ?>">
								<?php echo esc_html( $latest['title'] ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php foreach ( $others as $item ) : ?>
						<div class="notice-item">
							<div class="notice-date"><?php echo esc_html( $item['date'] ); ?></div>
							<a class="notice-title" href="<?php echo esc_url( $item['link'] ); ?>">
								<?php echo esc_html( $item['title'] ); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( $latest ) : ?>
				<div class="notice-board-featured-col">
					<div class="notice-featured-card is-style-card">
						<div class="notice-featured-meta"><?php echo esc_html( $latest['date'] ); ?></div>
						<h3 class="notice-featured-title">
							<a href="<?php echo esc_url( $latest['link'] ); ?>">
								<?php echo esc_html( $latest['title'] ); ?>
							</a>
						</h3>
						<p class="notice-featured-excerpt">
							<?php echo esc_html( $latest['excerpt'] ); ?>
						</p>
						<p class="notice-featured-link">
							<a href="<?php echo esc_url( $latest['link'] ); ?>">
								<?php esc_html_e( 'Read full notice →', 'generatepress-child' ); ?>
							</a>
						</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php
	} else {
		?>
		<div class="notice-board-dynamic">
			<div class="notice-board-list-col">
				<div class="notice-list">
					<div class="notice-item">
						<div class="notice-date"><?php echo esc_html( date_i18n( 'F j, Y' ) ); ?></div>
						<div class="notice-title"><?php esc_html_e( 'No notices available at the moment.', 'generatepress-child' ); ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'jrdm_notices', 'jrdm_notices_shortcode' );

/**
 * Register JRDM Committee Member custom post type.
 *
 * Used for showing governing body / committee grid via shortcode.
 */
function jrdm_register_committee_cpt() {
	$labels = array(
		'name'               => __( 'Committee Members', 'generatepress-child' ),
		'singular_name'      => __( 'Committee Member', 'generatepress-child' ),
		'add_new'            => __( 'Add New', 'generatepress-child' ),
		'add_new_item'       => __( 'Add New Committee Member', 'generatepress-child' ),
		'edit_item'          => __( 'Edit Committee Member', 'generatepress-child' ),
		'new_item'           => __( 'New Committee Member', 'generatepress-child' ),
		'view_item'          => __( 'View Committee Member', 'generatepress-child' ),
		'search_items'       => __( 'Search Committee Members', 'generatepress-child' ),
		'not_found'          => __( 'No committee members found', 'generatepress-child' ),
		'not_found_in_trash' => __( 'No committee members found in Trash', 'generatepress-child' ),
		'menu_name'          => __( 'Committee', 'generatepress-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		// Simple admin screen: just name, photo, order.
		'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
		'menu_icon'          => 'dashicons-groups',
		'menu_position'      => 21,
		'publicly_queryable' => false,
		'exclude_from_search'=> true,
		'rewrite'            => false,
	);

	register_post_type( 'jrdm_committee', $args );
}
add_action( 'init', 'jrdm_register_committee_cpt' );

/**
 * Meta box for committee member details (position, organization).
 */
function jrdm_committee_add_meta_box() {
	add_meta_box(
		'jrdm_committee_details',
		__( 'Committee Member Details', 'generatepress-child' ),
		'jrdm_committee_details_meta_box',
		'jrdm_committee',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'jrdm_committee_add_meta_box' );

function jrdm_committee_details_meta_box( $post ) {
	wp_nonce_field( 'jrdm_committee_details_save', 'jrdm_committee_details_nonce' );

	$position = get_post_meta( $post->ID, '_jrdm_member_position', true );
	$org      = get_post_meta( $post->ID, '_jrdm_member_org', true );
	?>
	<p>
		<label for="jrdm-member-position"><strong><?php esc_html_e( 'Position / Designation', 'generatepress-child' ); ?></strong></label><br />
		<input type="text" class="widefat" id="jrdm-member-position" name="jrdm_member_position" value="<?php echo esc_attr( $position ); ?>" placeholder="<?php esc_attr_e( 'Chairman, Vice-Chairman, Member, etc.', 'generatepress-child' ); ?>" />
	</p>
	<p>
		<label for="jrdm-member-org"><strong><?php esc_html_e( 'Organization / Affiliation (optional)', 'generatepress-child' ); ?></strong></label><br />
		<input type="text" class="widefat" id="jrdm-member-org" name="jrdm_member_org" value="<?php echo esc_attr( $org ); ?>" placeholder="<?php esc_attr_e( 'e.g. JRDM Central Committee', 'generatepress-child' ); ?>" />
	</p>
	<p>
		<?php esc_html_e( 'Use the featured image box on the right to upload the member photo.', 'generatepress-child' ); ?>
	</p>
	<?php
}

/**
 * Save committee member meta.
 */
function jrdm_committee_save_meta( $post_id ) {
	if ( ! isset( $_POST['jrdm_committee_details_nonce'] ) || ! wp_verify_nonce( $_POST['jrdm_committee_details_nonce'], 'jrdm_committee_details_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'jrdm_committee' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	} else {
		return;
	}

	if ( isset( $_POST['jrdm_member_position'] ) ) {
		update_post_meta(
			$post_id,
			'_jrdm_member_position',
			sanitize_text_field( wp_unslash( $_POST['jrdm_member_position'] ) )
		);
	}

	if ( isset( $_POST['jrdm_member_org'] ) ) {
		update_post_meta(
			$post_id,
			'_jrdm_member_org',
			sanitize_text_field( wp_unslash( $_POST['jrdm_member_org'] ) )
		);
	}
}
add_action( 'save_post_jrdm_committee', 'jrdm_committee_save_meta' );

/**
 * Shortcode: Committee members grid.
 *
 * Usage: [jrdm_committee columns="4" limit="12"]
 */
function jrdm_committee_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'columns' => 4,
			'limit'   => 12,
		),
		$atts,
		'jrdm_committee'
	);

	$columns = max( 1, min( 6, (int) $atts['columns'] ) );
	$limit   = max( 1, (int) $atts['limit'] );

	$query = new WP_Query(
		array(
			'post_type'      => 'jrdm_committee',
			'posts_per_page' => $limit,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'date'       => 'DESC',
			),
		)
	);

	if ( ! $query->have_posts() ) {
		return '';
	}

	ob_start();
	?>
	<section class="committee-section">
		<div class="committee-grid columns-<?php echo (int) $columns; ?>">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();

				$position = get_post_meta( get_the_ID(), '_jrdm_member_position', true );
				$org      = get_post_meta( get_the_ID(), '_jrdm_member_org', true );
				?>
				<article class="committee-card">
					<div class="committee-photo">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'medium' );
						}
						?>
					</div>
					<h3 class="committee-name"><?php the_title(); ?></h3>
					<?php if ( $position ) : ?>
						<p class="committee-position"><?php echo esc_html( $position ); ?></p>
					<?php endif; ?>
					<?php if ( $org ) : ?>
						<p class="committee-org"><?php echo esc_html( $org ); ?></p>
					<?php endif; ?>
				</article>
				<?php
			endwhile;

			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php

	return ob_get_clean();
}
add_shortcode( 'jrdm_committee', 'jrdm_committee_shortcode' );

/**
 * Hero Slider: custom post type for carousel slides (admin-managed).
 */
function jrdm_register_hero_slider_cpt() {
	$labels = array(
		'name'               => _x( 'Hero Slider', 'post type general name', 'generatepress-child' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'generatepress-child' ),
		'add_new'            => __( 'Add New Slide', 'generatepress-child' ),
		'add_new_item'       => __( 'Add New Slide', 'generatepress-child' ),
		'edit_item'          => __( 'Edit Slide', 'generatepress-child' ),
		'new_item'           => __( 'New Slide', 'generatepress-child' ),
		'view_item'          => __( 'View Slide', 'generatepress-child' ),
		'search_items'      => __( 'Search Slides', 'generatepress-child' ),
		'not_found'          => __( 'No slides found.', 'generatepress-child' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'generatepress-child' ),
		'menu_name'          => __( 'Hero Slider', 'generatepress-child' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => false,
		'has_archive'         => false,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
		'menu_icon'           => 'dashicons-slides',
		'menu_position'       => 22,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'rewrite'             => false,
	);

	register_post_type( 'jrdm_slide', $args );
}
add_action( 'init', 'jrdm_register_hero_slider_cpt' );

/**
 * Hero slide meta box: description, button(s).
 */
function jrdm_hero_slide_meta_box() {
	add_meta_box(
		'jrdm_hero_slide_details',
		__( 'Slide Content', 'generatepress-child' ),
		'jrdm_hero_slide_meta_box_cb',
		'jrdm_slide',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'jrdm_hero_slide_meta_box' );

function jrdm_hero_slide_meta_box_cb( $post ) {
	wp_nonce_field( 'jrdm_hero_slide_save', 'jrdm_hero_slide_nonce' );

	$desc   = get_post_meta( $post->ID, '_jrdm_slide_description', true );
	$btn1   = get_post_meta( $post->ID, '_jrdm_slide_btn_text', true );
	$url1   = get_post_meta( $post->ID, '_jrdm_slide_btn_url', true );
	$btn2   = get_post_meta( $post->ID, '_jrdm_slide_btn2_text', true );
	$url2   = get_post_meta( $post->ID, '_jrdm_slide_btn2_url', true );
	?>
	<p>
		<label for="jrdm_slide_description"><strong><?php esc_html_e( 'Description / Subtitle', 'generatepress-child' ); ?></strong></label><br>
		<textarea class="widefat" id="jrdm_slide_description" name="jrdm_slide_description" rows="3" placeholder="<?php esc_attr_e( 'Short tagline or description for this slide.', 'generatepress-child' ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
	</p>
	<p>
		<label for="jrdm_slide_btn_text"><strong><?php esc_html_e( 'Primary Button Text', 'generatepress-child' ); ?></strong></label><br>
		<input type="text" class="widefat" id="jrdm_slide_btn_text" name="jrdm_slide_btn_text" value="<?php echo esc_attr( $btn1 ); ?>" placeholder="<?php esc_attr_e( 'e.g. Apply for Loan', 'generatepress-child' ); ?>">
	</p>
	<p>
		<label for="jrdm_slide_btn_url"><strong><?php esc_html_e( 'Primary Button URL', 'generatepress-child' ); ?></strong></label><br>
		<input type="url" class="widefat" id="jrdm_slide_btn_url" name="jrdm_slide_btn_url" value="<?php echo esc_attr( $url1 ); ?>" placeholder="https://">
	</p>
	<p>
		<label for="jrdm_slide_btn2_text"><strong><?php esc_html_e( 'Secondary Button Text (optional)', 'generatepress-child' ); ?></strong></label><br>
		<input type="text" class="widefat" id="jrdm_slide_btn2_text" name="jrdm_slide_btn2_text" value="<?php echo esc_attr( $btn2 ); ?>" placeholder="<?php esc_attr_e( 'e.g. Learn More', 'generatepress-child' ); ?>">
	</p>
	<p>
		<label for="jrdm_slide_btn2_url"><strong><?php esc_html_e( 'Secondary Button URL (optional)', 'generatepress-child' ); ?></strong></label><br>
		<input type="url" class="widefat" id="jrdm_slide_btn2_url" name="jrdm_slide_btn2_url" value="<?php echo esc_attr( $url2 ); ?>" placeholder="https://">
	</p>
	<p class="description"><?php esc_html_e( 'Use "Featured Image" on the right to set the slide image. Use "Order" in Page Attributes to order slides.', 'generatepress-child' ); ?></p>
	<?php
}

function jrdm_hero_slide_save_meta( $post_id ) {
	if ( ! isset( $_POST['jrdm_hero_slide_nonce'] ) || ! wp_verify_nonce( $_POST['jrdm_hero_slide_nonce'], 'jrdm_hero_slide_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'jrdm_slide' !== $_POST['post_type'] ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'jrdm_slide_description' => '_jrdm_slide_description',
		'jrdm_slide_btn_text'    => '_jrdm_slide_btn_text',
		'jrdm_slide_btn_url'    => '_jrdm_slide_btn_url',
		'jrdm_slide_btn2_text'  => '_jrdm_slide_btn2_text',
		'jrdm_slide_btn2_url'   => '_jrdm_slide_btn2_url',
	);
	foreach ( $fields as $post_key => $meta_key ) {
		if ( isset( $_POST[ $post_key ] ) ) {
			$value = 'jrdm_slide_btn_url' === $post_key || 'jrdm_slide_btn2_url' === $post_key
				? esc_url_raw( wp_unslash( $_POST[ $post_key ] ) )
				: sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) );
			update_post_meta( $post_id, $meta_key, $value );
		}
	}
}
add_action( 'save_post_jrdm_slide', 'jrdm_hero_slide_save_meta' );

/**
 * Shortcode: Hero carousel slider (for homepage hero section).
 *
 * Usage: [jrdm_hero_slider]
 * Add slides under Dashboard → Hero Slider. Order via Page Attributes → Order.
 */
function jrdm_hero_slider_shortcode() {
	$query = new WP_Query(
		array(
			'post_type'      => 'jrdm_slide',
			'posts_per_page' => 20,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
		)
	);

	if ( ! $query->have_posts() ) {
		return '';
	}

	ob_start();
	?>
	<div class="hero-slider jrdm-hero-carousel">
		<button type="button" class="hero-slider-arrow hero-slider-prev" aria-label="<?php esc_attr_e( 'Previous slide', 'generatepress-child' ); ?>">&#10094;</button>
		<button type="button" class="hero-slider-arrow hero-slider-next" aria-label="<?php esc_attr_e( 'Next slide', 'generatepress-child' ); ?>">&#10095;</button>
		<div class="hero-slider-inner">
			<?php
			$first = true;
			while ( $query->have_posts() ) {
				$query->the_post();
				$desc = get_post_meta( get_the_ID(), '_jrdm_slide_description', true );
				$btn1 = get_post_meta( get_the_ID(), '_jrdm_slide_btn_text', true );
				$url1 = get_post_meta( get_the_ID(), '_jrdm_slide_btn_url', true );
				$btn2 = get_post_meta( get_the_ID(), '_jrdm_slide_btn2_text', true );
				$url2 = get_post_meta( get_the_ID(), '_jrdm_slide_btn2_url', true );
				$class = $first ? 'hero-slide is-active' : 'hero-slide';
				$first = false;
				?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<div class="hero-slide-background">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'full', array( 'class' => 'hero-slide-bg-image' ) ); ?>
						<?php endif; ?>
					</div>
					<div class="hero-slide-content-wrap">
						<div class="hero-slide-content">
							<h2 class="hero-title"><?php the_title(); ?></h2>
							<?php if ( $desc ) : ?>
								<p class="hero-description"><?php echo esc_html( $desc ); ?></p>
							<?php endif; ?>
							<?php if ( $btn1 || $btn2 ) : ?>
								<div class="hero-buttons">
									<?php if ( $btn1 ) : ?>
										<a href="<?php echo esc_url( $url1 ? $url1 : '#' ); ?>" class="hero-btn hero-btn-primary"><?php echo esc_html( $btn1 ); ?></a>
									<?php endif; ?>
									<?php if ( $btn2 ) : ?>
										<a href="<?php echo esc_url( $url2 ? $url2 : '#' ); ?>" class="hero-btn hero-btn-secondary"><?php echo esc_html( $btn2 ); ?></a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="hero-slide-image-col">
								<?php the_post_thumbnail( 'large', array( 'class' => 'hero-slide-image' ) ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'jrdm_hero_slider', 'jrdm_hero_slider_shortcode' );

/**
 * Counter / Stats: CPT for homepage countable items (Division, District, etc.).
 */
function jrdm_register_counter_cpt() {
	$labels = array(
		'name'               => _x( 'Counters', 'post type general name', 'generatepress-child' ),
		'singular_name'      => _x( 'Counter', 'post type singular name', 'generatepress-child' ),
		'add_new'            => __( 'Add New', 'generatepress-child' ),
		'add_new_item'       => __( 'Add New Counter', 'generatepress-child' ),
		'edit_item'          => __( 'Edit Counter', 'generatepress-child' ),
		'new_item'           => __( 'New Counter', 'generatepress-child' ),
		'view_item'          => __( 'View Counter', 'generatepress-child' ),
		'search_items'       => __( 'Search Counters', 'generatepress-child' ),
		'not_found'          => __( 'No counters found.', 'generatepress-child' ),
		'not_found_in_trash' => __( 'No counters found in Trash.', 'generatepress-child' ),
		'menu_name'          => __( 'Counters', 'generatepress-child' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => false,
		'has_archive'         => false,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'page-attributes' ),
		'menu_icon'           => 'dashicons-chart-bar',
		'menu_position'       => 23,
		'publicly_queryable'  => false,
		'exclude_from_search' => true,
		'rewrite'             => false,
	);

	register_post_type( 'jrdm_counter', $args );
}
add_action( 'init', 'jrdm_register_counter_cpt' );

/**
 * Counter meta: numeric value.
 */
function jrdm_counter_meta_box() {
	add_meta_box(
		'jrdm_counter_value',
		__( 'Counter Value', 'generatepress-child' ),
		'jrdm_counter_meta_box_cb',
		'jrdm_counter',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'jrdm_counter_meta_box' );

function jrdm_counter_meta_box_cb( $post ) {
	wp_nonce_field( 'jrdm_counter_save', 'jrdm_counter_nonce' );
	$value = get_post_meta( $post->ID, '_jrdm_counter_value', true );
	?>
	<p>
		<label for="jrdm_counter_value"><strong><?php esc_html_e( 'Number to display', 'generatepress-child' ); ?></strong></label><br>
		<input type="number" min="0" step="1" class="widefat" id="jrdm_counter_value" name="jrdm_counter_value" value="<?php echo esc_attr( $value ); ?>" placeholder="e.g. 64">
	</p>
	<p class="description"><?php esc_html_e( 'Title above = label (e.g. Divisions, Districts). This number will animate on scroll.', 'generatepress-child' ); ?></p>
	<?php
}

function jrdm_counter_save_meta( $post_id ) {
	if ( ! isset( $_POST['jrdm_counter_nonce'] ) || ! wp_verify_nonce( $_POST['jrdm_counter_nonce'], 'jrdm_counter_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'jrdm_counter' !== $_POST['post_type'] ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['jrdm_counter_value'] ) ) {
		$val = absint( $_POST['jrdm_counter_value'] );
		update_post_meta( $post_id, '_jrdm_counter_value', $val );
	}
}
add_action( 'save_post_jrdm_counter', 'jrdm_counter_save_meta' );

/**
 * Shortcode: Dynamic counters with animation.
 *
 * Usage: [jrdm_counters]
 * Add items under Dashboard → Counters. Order via Page Attributes → Order.
 * Desktop: 4 per row. Counter animates when section comes into view.
 */
function jrdm_counters_shortcode() {
	$query = new WP_Query(
		array(
			'post_type'      => 'jrdm_counter',
			'posts_per_page' => 50,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
		)
	);

	if ( ! $query->have_posts() ) {
		return '';
	}

	ob_start();
	?>
	<section class="jrdm-counters-section stats-bar">
		<div class="stats-container jrdm-counters-grid">
			<?php
			while ( $query->have_posts() ) {
				$query->the_post();
				$num = (int) get_post_meta( get_the_ID(), '_jrdm_counter_value', true );
				$label = get_the_title();
				?>
				<div class="stat-box">
					<span class="stat-number" data-count="<?php echo (int) $num; ?>">0</span>
					<span class="stat-label"><?php echo esc_html( $label ); ?></span>
				</div>
				<?php
			}
			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php
	return ob_get_clean();
}
add_shortcode( 'jrdm_counters', 'jrdm_counters_shortcode' );

/**
 * Tidy sidebar widgets: remove default Recent Comments widget.
 */
function jrdm_unregister_default_widgets() {
	// Remove Recent Comments widget from classic widgets list.
	unregister_widget( 'WP_Widget_Recent_Comments' );
}
add_action( 'widgets_init', 'jrdm_unregister_default_widgets', 20 );

/**
 * Shortcode: Bangladesh holiday calendar (Google public calendar embed).
 *
 * Usage: [jrdm_bd_holiday_calendar]
 * Place this in a Shortcode block inside a sidebar/widget area.
 */
function jrdm_bd_holiday_calendar_shortcode() {
	// Public Google Calendar for Bangladesh Holidays.
	$calendar_src = 'https://calendar.google.com/calendar/embed?src=en.bd%23holiday%40group.v.calendar.google.com&ctz=Asia%2FDhaka&showTitle=0&showNav=1&showDate=1&showPrint=0&showTabs=0&showCalendars=0';

	ob_start();
	?>
	<div class="jrdm-calendar-embed" aria-label="<?php esc_attr_e( 'Bangladesh Holiday Calendar', 'generatepress-child' ); ?>">
		<iframe
			src="<?php echo esc_url( $calendar_src ); ?>"
			style="border:0"
			scrolling="no"
			frameborder="0"></iframe>
	</div>
	<?php

	return ob_get_clean();
}
add_shortcode( 'jrdm_bd_holiday_calendar', 'jrdm_bd_holiday_calendar_shortcode' );

/**
 * Admin: JRDM Shortcodes documentation page.
 */
function jrdm_register_shortcodes_help_page() {
	add_menu_page(
		__( 'JRDM Shortcodes', 'generatepress-child' ),
		__( 'JRDM Shortcodes', 'generatepress-child' ),
		'manage_options',
		'jrdm-shortcodes',
		'jrdm_render_shortcodes_help_page',
		'dashicons-editor-code',
		59
	);
}
add_action( 'admin_menu', 'jrdm_register_shortcodes_help_page' );

function jrdm_render_shortcodes_help_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'JRDM Theme Shortcodes', 'generatepress-child' ); ?></h1>
		<p><?php esc_html_e( 'Use the following shortcodes to place dynamic content (gallery, notices, committee, contact form, calendar, hero slider) anywhere in your pages.', 'generatepress-child' ); ?></p>

		<h2><?php esc_html_e( 'Hero Slider (Homepage Carousel)', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Add slides under "Hero Slider" in the admin. Use on the homepage hero section:', 'generatepress-child' ); ?></p>
		<code>[jrdm_hero_slider]</code>

		<h2><?php esc_html_e( 'Counters (Stats / Numbers)', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Add counter items under "Counters" in the admin (e.g. Divisions, Districts). Use on homepage:', 'generatepress-child' ); ?></p>
		<code>[jrdm_counters]</code>

		<h2><?php esc_html_e( 'Photo Gallery', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Create a Gallery item under "Galleries" and then use:', 'generatepress-child' ); ?></p>
		<code>[jrdm_gallery id="123" columns="4"]</code>

		<h2><?php esc_html_e( 'Notice Board', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Add posts in the "Notice" category and show latest notices:', 'generatepress-child' ); ?></p>
		<code>[jrdm_notices posts="5" category="notice"]</code>

		<h2><?php esc_html_e( 'Committee Members', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Add members under the "Committee" menu and then use:', 'generatepress-child' ); ?></p>
		<code>[jrdm_committee columns="4" limit="12"]</code>

		<h2><?php esc_html_e( 'Contact Form', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Professional contact form (Name, Email, Phone, Subject, Message). Manage recipient email and success message under Appearance → Customize → JRDM Contact Form.', 'generatepress-child' ); ?></p>
		<code>[jrdm_contact_form]</code>

		<h2><?php esc_html_e( 'Bangladesh Holiday Calendar (Sidebar)', 'generatepress-child' ); ?></h2>
		<p><?php esc_html_e( 'Use inside a Shortcode block or widget in the sidebar:', 'generatepress-child' ); ?></p>
		<code>[jrdm_bd_holiday_calendar]</code>

		<p style="margin-top:24px;">
			<em><?php esc_html_e( 'Tip: You can copy any shortcode from here and paste it into a Shortcode block on the desired page.', 'generatepress-child' ); ?></em>
		</p>
	</div>
	<?php
}

/**
 * Register JRDM Gallery custom post type (easy admin sidebar menu).
 */
function jrdm_register_gallery_cpt() {
	$labels = array(
		'name'               => __( 'Galleries', 'generatepress-child' ),
		'singular_name'      => __( 'Gallery', 'generatepress-child' ),
		'add_new'            => __( 'Add New', 'generatepress-child' ),
		'add_new_item'       => __( 'Add New Gallery', 'generatepress-child' ),
		'edit_item'          => __( 'Edit Gallery', 'generatepress-child' ),
		'new_item'           => __( 'New Gallery', 'generatepress-child' ),
		'view_item'          => __( 'View Gallery', 'generatepress-child' ),
		'search_items'       => __( 'Search Galleries', 'generatepress-child' ),
		'not_found'          => __( 'No galleries found', 'generatepress-child' ),
		'not_found_in_trash' => __( 'No galleries found in Trash', 'generatepress-child' ),
		'menu_name'          => __( 'Galleries', 'generatepress-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => false,
		'has_archive'        => false,
		'hierarchical'       => false,
		'supports'           => array( 'title' ),
		'menu_icon'          => 'dashicons-format-gallery',
		'menu_position'      => 20,
		'publicly_queryable' => false,
		'exclude_from_search'=> true,
		'rewrite'            => false,
	);

	register_post_type( 'jrdm_gallery', $args );
}
add_action( 'init', 'jrdm_register_gallery_cpt' );

/**
 * Meta box: select images for JRDM Gallery.
 */
function jrdm_gallery_add_meta_box() {
	add_meta_box(
		'jrdm_gallery_images',
		__( 'Gallery Images', 'generatepress-child' ),
		'jrdm_gallery_images_meta_box',
		'jrdm_gallery',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'jrdm_gallery_add_meta_box' );

function jrdm_gallery_images_meta_box( $post ) {
	wp_nonce_field( 'jrdm_gallery_images_save', 'jrdm_gallery_images_nonce' );

	$stored = get_post_meta( $post->ID, '_jrdm_gallery_images', true );
	$ids    = array();

	if ( ! empty( $stored ) && is_string( $stored ) ) {
		$ids = array_filter( array_map( 'absint', explode( ',', $stored ) ) );
	}

	wp_enqueue_media();

	?>
	<p><?php esc_html_e( 'Select the images you want to show in this gallery. Then copy the shortcode shown below into any page.', 'generatepress-child' ); ?></p>

	<p>
		<button type="button" class="button button-secondary" id="jrdm-gallery-select">
			<?php esc_html_e( 'Select / Edit Images', 'generatepress-child' ); ?>
		</button>
	</p>

	<input type="hidden" id="jrdm-gallery-images-field" name="jrdm_gallery_images" value="<?php echo esc_attr( $stored ); ?>" />

	<ul id="jrdm-gallery-preview" class="jrdm-gallery-preview">
		<?php foreach ( $ids as $image_id ) : ?>
			<?php
			$thumb = wp_get_attachment_image_src( $image_id, 'thumbnail' );
			if ( ! $thumb ) {
				continue;
			}
			?>
			<li>
				<img src="<?php echo esc_url( $thumb[0] ); ?>" alt="" />
			</li>
		<?php endforeach; ?>
	</ul>

	<p>
		<strong><?php esc_html_e( 'Shortcode:', 'generatepress-child' ); ?></strong><br />
		<code>[jrdm_gallery id="<?php echo (int) $post->ID; ?>"]</code>
	</p>

	<style>
		#jrdm-gallery-preview {
			margin: 10px 0 15px;
			padding: 0;
			display: flex;
			flex-wrap: wrap;
			gap: 8px;
		}
		#jrdm-gallery-preview li {
			list-style: none;
		}
		#jrdm-gallery-preview img {
			display: block;
			width: 70px;
			height: 70px;
			object-fit: cover;
			border-radius: 4px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.2);
		}
	</style>

	<script>
		jQuery(function($) {
			var frame;

			$('#jrdm-gallery-select').on('click', function(e) {
				e.preventDefault();

				if (frame) {
					frame.open();
					return;
				}

				frame = wp.media({
					title: '<?php echo esc_js( __( 'Select Gallery Images', 'generatepress-child' ) ); ?>',
					button: {
						text: '<?php echo esc_js( __( 'Use these images', 'generatepress-child' ) ); ?>'
					},
					multiple: true
				});

				frame.on('select', function() {
					var selection = frame.state().get('selection');
					var ids       = [];
					var $list     = $('#jrdm-gallery-preview').empty();

					selection.each(function(attachment) {
						attachment = attachment.toJSON();
						if (!attachment.id) {
							return;
						}
						ids.push(attachment.id);

						var thumb = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;

						$('<li><img /></li>')
							.find('img')
								.attr('src', thumb)
							.end()
							.appendTo($list);
					});

					$('#jrdm-gallery-images-field').val(ids.join(','));
				});

				frame.open();
			});
		});
	</script>
	<?php
}

/**
 * Save JRDM Gallery images meta.
 */
function jrdm_gallery_save_meta( $post_id ) {
	if ( ! isset( $_POST['jrdm_gallery_images_nonce'] ) || ! wp_verify_nonce( $_POST['jrdm_gallery_images_nonce'], 'jrdm_gallery_images_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'jrdm_gallery' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	} else {
		return;
	}

	if ( isset( $_POST['jrdm_gallery_images'] ) ) {
		$value = sanitize_text_field( wp_unslash( $_POST['jrdm_gallery_images'] ) );
		update_post_meta( $post_id, '_jrdm_gallery_images', $value );
	}
}
add_action( 'save_post_jrdm_gallery', 'jrdm_gallery_save_meta' );

/**
 * Custom footer content – three-column professional layout.
 */
function jrdm_custom_footer_content() {
	$address = trim( (string) get_theme_mod( 'jrdm_footer_address', 'House-5/1, Block-C, Lalmatia, Dhaka-1207, Bangladesh' ) );
	$phone   = trim( (string) get_theme_mod( 'jrdm_footer_phone', '+880-2587-722361' ) );
	$email   = trim( (string) get_theme_mod( 'jrdm_footer_email', 'jrdmngo95@gmail.com' ) );

	$facebook_url = trim( (string) get_theme_mod( 'jrdm_footer_facebook_url', '' ) );
	$twitter_url  = trim( (string) get_theme_mod( 'jrdm_footer_twitter_url', '' ) );
	$linkedin_url = trim( (string) get_theme_mod( 'jrdm_footer_linkedin_url', '' ) );
	$youtube_url  = trim( (string) get_theme_mod( 'jrdm_footer_youtube_url', '' ) );

	$facebook_iframe_src = '';
	if ( '' !== $facebook_url ) {
		$facebook_iframe_src = sprintf(
			'https://www.facebook.com/plugins/page.php?href=%s&tabs=timeline&width=340&height=200&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true',
			rawurlencode( $facebook_url )
		);
	}
	?>
	<div class="footer-widgets">
		<div class="footer-widget footer-widget-about">
			<h3><?php esc_html_e( 'About JRDM', 'generatepress-child' ); ?></h3>
			<p>
				<?php echo esc_html__( 'JRDM is a national micro finance institute committed to empowering low-income communities through sustainable microcredit and development programs.', 'generatepress-child' ); ?>
			</p>

			<ul class="footer-contact-list footer-contact-inline">
				<?php if ( '' !== $phone ) : ?>
					<li>
						<span class="label"><?php esc_html_e( 'Phone', 'generatepress-child' ); ?></span>
						<span class="value"><a href="<?php echo esc_url( 'tel:' . preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></span>
					</li>
				<?php endif; ?>
				<?php if ( '' !== $email ) : ?>
					<li>
						<span class="label"><?php esc_html_e( 'Email', 'generatepress-child' ); ?></span>
						<span class="value"><a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
					</li>
				<?php endif; ?>
			</ul>
		</div>

		<div class="footer-widget">
			<h3><?php esc_html_e( 'Quick Links', 'generatepress-child' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'generatepress-child' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'generatepress-child' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>"><?php esc_html_e( 'Programs', 'generatepress-child' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'Photo Gallery', 'generatepress-child' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'generatepress-child' ); ?></a></li>
			</ul>
		</div>

		<div class="footer-widget footer-widget-contact">
			<h3><?php esc_html_e( 'Address & Social', 'generatepress-child' ); ?></h3>
			<ul class="footer-contact-list">
				<?php if ( '' !== $address ) : ?>
					<li>
						<span class="label"><?php esc_html_e( 'Address', 'generatepress-child' ); ?></span>
						<span class="value"><?php echo esc_html( $address ); ?></span>
					</li>
				<?php endif; ?>
			</ul>

			<?php if ( $facebook_url || $twitter_url || $linkedin_url || $youtube_url ) : ?>
				<ul class="footer-social">
					<?php if ( $facebook_url ) : ?>
						<li><a class="social-icon social-icon-facebook" href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer">F</a></li>
					<?php endif; ?>
					<?php if ( $twitter_url ) : ?>
						<li><a class="social-icon social-icon-twitter" href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer">X</a></li>
					<?php endif; ?>
					<?php if ( $linkedin_url ) : ?>
						<li><a class="social-icon social-icon-linkedin" href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer">in</a></li>
					<?php endif; ?>
					<?php if ( $youtube_url ) : ?>
						<li><a class="social-icon social-icon-youtube" href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" rel="noopener noreferrer">▶</a></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $facebook_iframe_src ) : ?>
				<div class="footer-facebook-embed">
					<iframe
						src="<?php echo esc_url( $facebook_iframe_src ); ?>"
						width="340"
						height="200"
						style="border:none;overflow:hidden"
						scrolling="no"
						frameborder="0"
						allowfullscreen="true"
						allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
}
add_action( 'generate_before_footer_content', 'jrdm_custom_footer_content' );
