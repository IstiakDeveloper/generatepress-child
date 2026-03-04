<?php
/**
 * JRDM Homepage Complete Pattern.
 * All sections: Hero, Stats (animated), Services, Success Stories, Leadership/Team, Notice, Photo Gallery, Video Gallery, Partners
 *
 * @package GeneratePress_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'register_block_pattern' ) ) {
	return;
}

register_block_pattern(
	'jrdm/homepage-starter',
	array(
		'title'       => __( 'JRDM Homepage (Complete)', 'generatepress-child' ),
		'description' => __( 'Complete homepage with all sections: Hero, Animated Stats, Services, Stories, Leadership, Notice, Photo Gallery, Video Gallery, Partners.', 'generatepress-child' ),
		'categories'  => array( 'jrdm' ),
		'content'     => '<!-- wp:group {"className":"hero-slider"} -->
<div class="wp-block-group hero-slider"><!-- wp:group {"className":"hero-slide is-active"} -->
<div class="wp-block-group hero-slide is-active"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","level":1,"className":"hero-title"} -->
<h1 class="wp-block-heading has-text-align-left hero-title">Our Commitment to Rural Development</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"hero-description"} -->
<p class="has-text-align-left hero-description">Joypurhat Rural Development Movement (JRDM) works to build financial self-reliance of rural communities through microcredit, training, and development programs.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"className":"hero-buttons"} -->
<div class="wp-block-buttons hero-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Apply for Loan</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","className":"hero-slide-image"} -->
<figure class="wp-block-image size-large hero-slide-image"><img alt="JRDM field activity"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-slide"} -->
<div class="wp-block-group hero-slide"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"left","level":1,"className":"hero-title"} -->
<h1 class="wp-block-heading has-text-align-left hero-title">Empowering Rural Communities</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"hero-description"} -->
<p class="has-text-align-left hero-description">Through responsible microfinance and capacity building, JRDM supports thousands of families to build sustainable livelihoods.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"className":"hero-buttons"} -->
<div class="wp-block-buttons hero-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">View Programs</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Donate Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","className":"hero-slide-image"} -->
<figure class="wp-block-image size-large hero-slide-image"><img alt="JRDM training session"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","layout":{"type":"constrained"},"className":"stats-bar"} -->
<div class="wp-block-group alignfull stats-bar"><!-- wp:columns {"align":"wide","className":"stats-container"} -->
<div class="wp-block-columns alignwide stats-container"><!-- wp:column {"className":"stat-box"} -->
<div class="wp-block-column stat-box"><!-- wp:paragraph -->
<p><span class="stat-number" data-count="46235">46,235</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="stat-label">Total Members</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"stat-box"} -->
<div class="wp-block-column stat-box"><!-- wp:paragraph -->
<p><span class="stat-number" data-count="38803">38,803</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="stat-label">Borrowers</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"stat-box"} -->
<div class="wp-block-column stat-box"><!-- wp:paragraph -->
<p><span class="stat-number" data-count="391">391</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="stat-label">Employees</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"stat-box"} -->
<div class="wp-block-column stat-box"><!-- wp:paragraph -->
<p><span class="stat-number" data-count="33">33</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="stat-label">Offices</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"stat-box"} -->
<div class="wp-block-column stat-box"><!-- wp:paragraph -->
<p><span class="stat-number" data-count="1332">1,332</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="stat-label">Villages</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"services-section"} -->
<div class="wp-block-group services-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Our Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section-subtitle"} -->
<p class="has-text-align-center section-subtitle">We are here to support you through microcredit, training, and development programs.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"services-grid"} -->
<div class="wp-block-columns services-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3,"className":"card-title"} -->
<h3 class="wp-block-heading card-title">Microcredit</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card-content"} -->
<p class="card-content">Easy-term loans for small businesses and income-generating activities.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a class="card-link" href="#">Learn More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3,"className":"card-title"} -->
<h3 class="wp-block-heading card-title">Entrepreneur Loan</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card-content"} -->
<p class="card-content">Special loans for entrepreneurs starting new businesses.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a class="card-link" href="#">Learn More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3,"className":"card-title"} -->
<h3 class="wp-block-heading card-title">Agriculture Loan</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card-content"} -->
<p class="card-content">Loan facilities for agricultural work and farm development.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a class="card-link" href="#">Learn More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3,"className":"card-title"} -->
<h3 class="wp-block-heading card-title">Training</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card-content"} -->
<p class="card-content">Business and skills development training programs.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a class="card-link" href="#">Learn More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"success-stories-section"} -->
<div class="wp-block-group success-stories-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Success Stories</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"stories-grid"} -->
<div class="wp-block-columns stories-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"story-card"} -->
<div class="wp-block-group story-card"><!-- wp:image {"sizeSlug":"thumbnail","className":"story-avatar"} -->
<figure class="wp-block-image size-thumbnail story-avatar"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><strong>Rokeya Begum</strong><br><span class="small">Joypurhat Sadar</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"story-excerpt"} -->
<p class="story-excerpt">Started a small shop with microcredit and is now self-reliant…</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"story-card"} -->
<div class="wp-block-group story-card"><!-- wp:image {"sizeSlug":"thumbnail","className":"story-avatar"} -->
<figure class="wp-block-image size-thumbnail story-avatar"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><strong>Abdul Karim</strong><br><span class="small">Panchbibi</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"story-excerpt"} -->
<p class="story-excerpt">Increased production with agriculture loan, bringing prosperity to family…</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"story-card"} -->
<div class="wp-block-group story-card"><!-- wp:image {"sizeSlug":"thumbnail","className":"story-avatar"} -->
<figure class="wp-block-image size-thumbnail story-avatar"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><strong>Salma Khatun</strong><br><span class="small">Kalai</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"story-excerpt"} -->
<p class="story-excerpt">Started handicraft business after training, increasing income…</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"leadership-section"} -->
<div class="wp-block-group leadership-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Our Leadership Team</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section-subtitle"} -->
<p class="has-text-align-center section-subtitle">Meet the dedicated team leading JRDM towards rural development and financial inclusion.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"leadership-grid"} -->
<div class="wp-block-columns leadership-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"leadership-card"} -->
<div class="wp-block-group leadership-card"><!-- wp:image {"sizeSlug":"medium","className":"leadership-photo"} -->
<figure class="wp-block-image size-medium leadership-photo"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"leadership-name"} -->
<h3 class="wp-block-heading leadership-name">Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"leadership-position"} -->
<p class="leadership-position">Position</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"leadership-card"} -->
<div class="wp-block-group leadership-card"><!-- wp:image {"sizeSlug":"medium","className":"leadership-photo"} -->
<figure class="wp-block-image size-medium leadership-photo"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"leadership-name"} -->
<h3 class="wp-block-heading leadership-name">Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"leadership-position"} -->
<p class="leadership-position">Position</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"leadership-card"} -->
<div class="wp-block-group leadership-card"><!-- wp:image {"sizeSlug":"medium","className":"leadership-photo"} -->
<figure class="wp-block-image size-medium leadership-photo"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"leadership-name"} -->
<h3 class="wp-block-heading leadership-name">Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"leadership-position"} -->
<p class="leadership-position">Position</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"leadership-card"} -->
<div class="wp-block-group leadership-card"><!-- wp:image {"sizeSlug":"medium","className":"leadership-photo"} -->
<figure class="wp-block-image size-medium leadership-photo"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"leadership-name"} -->
<h3 class="wp-block-heading leadership-name">Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"leadership-position"} -->
<p class="leadership-position">Position</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"notice-board-section"} -->
<div class="wp-block-group notice-board-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Notice Board</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"notice-board-container"} -->
<div class="wp-block-columns notice-board-container"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<div class="notice-list"><div class="notice-item"><div class="notice-date">February 18, 2026</div><a class="notice-title" href="#">New Loan Application Notice</a></div><div class="notice-item"><div class="notice-date">February 10, 2026</div><a class="notice-title" href="#">Weekly Meeting Notice</a></div><div class="notice-item"><div class="notice-date">February 1, 2026</div><a class="notice-title" href="#">Training Program</a></div></div>
<!-- /wp:html --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3,"className":"card-title"} -->
<h3 class="wp-block-heading card-title">Latest Event</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card-content"} -->
<p class="card-content">Add your latest event/image here.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"photo-gallery-section"} -->
<div class="wp-block-group photo-gallery-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Photo Gallery</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section-subtitle"} -->
<p class="has-text-align-center section-subtitle">Capturing moments from our programs, events, and community activities.</p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"linkTo":"media","className":"gallery-grid","columns":4} -->
<figure class="wp-block-gallery has-nested-images columns-4 is-cropped gallery-grid"><!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"medium"} -->
<figure class="wp-block-image size-medium"><img alt=""/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"video-gallery-section"} -->
<div class="wp-block-group video-gallery-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Video Gallery</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section-subtitle"} -->
<p class="has-text-align-center section-subtitle">Watch our programs, success stories, and community impact videos.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"video-grid"} -->
<div class="wp-block-columns video-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"video-card"} -->
<div class="wp-block-group video-card"><!-- wp:embed {"url":"https://www.youtube.com/watch?v=dQw4w9WgXcQ","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=dQw4w9WgXcQ
</div></figure>
<!-- /wp:embed --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"video-card"} -->
<div class="wp-block-group video-card"><!-- wp:embed {"url":"https://www.youtube.com/watch?v=dQw4w9WgXcQ","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=dQw4w9WgXcQ
</div></figure>
<!-- /wp:embed --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"video-card"} -->
<div class="wp-block-group video-card"><!-- wp:embed {"url":"https://www.youtube.com/watch?v=dQw4w9WgXcQ","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=dQw4w9WgXcQ
</div></figure>
<!-- /wp:embed --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"},"className":"partners-section"} -->
<div class="wp-block-group partners-section"><!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Our Partners</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"partners-grid"} -->
<div class="wp-block-columns partners-grid"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","className":"partner-logo"} -->
<figure class="wp-block-image size-full partner-logo"><img alt="Partner Logo"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","className":"partner-logo"} -->
<figure class="wp-block-image size-full partner-logo"><img alt="Partner Logo"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","className":"partner-logo"} -->
<figure class="wp-block-image size-full partner-logo"><img alt="Partner Logo"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","className":"partner-logo"} -->
<figure class="wp-block-image size-full partner-logo"><img alt="Partner Logo"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
	)
);
