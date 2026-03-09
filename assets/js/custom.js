/**
 * JRDM Custom JavaScript
 * Animations and interactive features
 */

(function($) {
	'use strict';

	/**
	 * Animate statistics counter.
	 * Starts from a value just below target (e.g. 82%) so big numbers finish in fixed time.
	 */
	function animateCounter() {
		$('.stat-number').each(function() {
			var $this = $(this);
			var countTo = $this.attr('data-count');

			if (!countTo) {
				var text = $this.text().trim();
				var match = text.match(/[\d,]+/);
				if (match) {
					countTo = match[0].replace(/,/g, '');
				}
			}

			if (!countTo || $this.hasClass('animated')) {
				return;
			}

			var target = parseInt(countTo, 10);
			if (isNaN(target) || target < 0) {
				return;
			}

			var elementTop = $this.offset().top;
			var elementBottom = elementTop + $this.outerHeight();
			var viewportTop = $(window).scrollTop();
			var viewportBottom = viewportTop + $(window).height();

			if (elementBottom <= viewportTop || elementTop >= viewportBottom) {
				return;
			}

			// Mark as animated only when we're actually going to animate it.
			$this.addClass('animated');

			// Start from slightly below target so animation length is similar for small and large numbers
			var start = Math.max(0, Math.floor(target * 0.82));
			var duration = 1200;
			var stepMs = 30;
			var steps = Math.max(1, Math.round(duration / stepMs));
			var increment = (target - start) / steps;

			$this.text(formatNumber(start));

			var current = start;
			var timer = setInterval(function() {
				current += increment;
				if (current >= target) {
					$this.text(formatNumber(target));
					clearInterval(timer);
				} else {
					$this.text(formatNumber(Math.floor(current)));
				}
			}, stepMs);
		});
	}

	/**
	 * Format number with commas
	 */
	function formatNumber(num) {
		return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	}

	/**
	 * Intersection Observer for better performance
	 */
	function initScrollAnimations() {
		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function(entries) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
						var $target = $(entry.target);
						if ($target.hasClass('stat-number') && !$target.hasClass('animated')) {
							animateCounter();
						}
						$target.addClass('fade-in');
					}
				});
			}, {
				threshold: 0.1,
				rootMargin: '0px 0px -50px 0px'
			});

			document.querySelectorAll('.stat-number, .card, .story-card').forEach(function(el) {
				observer.observe(el);
			});
		} else {
			// Fallback for older browsers
			$(window).on('scroll', function() {
				animateCounter();
			});
		}
	}

	/**
	 * Initialize on document ready
	 */
	$(document).ready(function() {
		initScrollAnimations();
		initHeroSlider();

		// When hero shortcode is present, mark body so duplicate block hero can be hidden
		if ($('.jrdm-hero-carousel').length) {
			$('body').addClass('jrdm-has-hero-shortcode');
		}

		// Lightbox for JRDM gallery shortcode with next/previous.
		var $overlay   = $('<div class="jrdm-lightbox-overlay" aria-hidden="true"></div>');
		var $backdrop  = $('<div class="jrdm-lightbox-backdrop"></div>').appendTo($overlay);
		var $content   = $('<img alt="" />').appendTo($overlay);
		var $close     = $('<button type="button" class="jrdm-lightbox-close" aria-label="Close">&times;</button>').appendTo($overlay);
		var $prev      = $('<button type="button" class="jrdm-lightbox-nav jrdm-lightbox-prev" aria-label="Previous image">&#10094;</button>').appendTo($overlay);
		var $next      = $('<button type="button" class="jrdm-lightbox-nav jrdm-lightbox-next" aria-label="Next image">&#10095;</button>').appendTo($overlay);

		var currentLinks = null;
		var currentIndex = -1;

		$('body').append($overlay);

		function openLightbox(src) {
			if (!src) return;
			$content.attr('src', src);
			$overlay.addClass('is-visible').attr('aria-hidden', 'false');
		}

		function closeLightbox() {
			$overlay.removeClass('is-visible').attr('aria-hidden', 'true');
			$content.attr('src', '');
			currentLinks = null;
			currentIndex = -1;
		}

		function showImageAt(index) {
			if (!currentLinks || !currentLinks.length) {
				return;
			}
			var total = currentLinks.length;
			if (index < 0) {
				index = total - 1;
			} else if (index >= total) {
				index = 0;
			}
			var $link   = currentLinks.eq(index);
			var fullSrc = $link.data('full-src') || $link.attr('href');
			if (!fullSrc) {
				return;
			}
			currentIndex = index;
			openLightbox(fullSrc);
		}

		$(document).on('click', '.jrdm-gallery-lightbox a', function(e) {
			var $link      = $(this);
			var galleryKey = $link.data('gallery');

			currentLinks = $('.jrdm-gallery-lightbox a').filter(function() {
				return $(this).data('gallery') === galleryKey;
			});

			e.preventDefault();
			currentIndex = currentLinks.index($link);
			if (currentIndex < 0) {
				currentIndex = 0;
			}
			showImageAt(currentIndex);
		});

		$backdrop.on('click', closeLightbox);
		$close.on('click', closeLightbox);

		$prev.on('click', function() {
			if (currentLinks) {
				showImageAt(currentIndex - 1);
			}
		});

		$next.on('click', function() {
			if (currentLinks) {
				showImageAt(currentIndex + 1);
			}
		});

		$(document).on('keyup', function(e) {
			if (e.key === 'Escape' || e.keyCode === 27) {
				closeLightbox();
			} else if (e.key === 'ArrowRight' || e.keyCode === 39) {
				if (currentLinks) {
					showImageAt(currentIndex + 1);
				}
			} else if (e.key === 'ArrowLeft' || e.keyCode === 37) {
				if (currentLinks) {
					showImageAt(currentIndex - 1);
				}
			}
		});

		// Horizontal slider behaviour for JRDM gallery (4 per view on desktop) + auto slide.
		$('.jrdm-gallery-slider').each(function() {
			var $slider   = $(this);
			var $viewport = $slider.find('.jrdm-gallery-viewport');
			var $track    = $viewport.find('.gallery-grid');

			if (!$track.length) {
				return;
			}

			var stepScroll = function(direction) {
				var width  = $viewport.width();
				var target = $viewport.scrollLeft() + (direction * width);
				$viewport.animate({ scrollLeft: target }, 400);
			};

			$slider.find('.jrdm-gallery-arrow-prev').on('click', function() {
				stepScroll(-1);
			});

			$slider.find('.jrdm-gallery-arrow-next').on('click', function() {
				stepScroll(1);
			});

			// Auto slide with pause on hover.
			var autoTimer = setInterval(function() {
				stepScroll(1);
			}, 6000);

			$slider.on('mouseenter', function() {
				if (autoTimer) {
					clearInterval(autoTimer);
					autoTimer = null;
				}
			}).on('mouseleave', function() {
				if (!autoTimer) {
					autoTimer = setInterval(function() {
						stepScroll(1);
					}, 6000);
				}
			});
		});
		
		// Trigger animation on scroll (fallback)
		$(window).on('scroll', function() {
			animateCounter();
		});
		
		// Trigger on page load if stats are visible
		setTimeout(function() {
			animateCounter();
		}, 500);
	});

	/**
	 * Hero slider – carousel with arrows, dots, autoplay, pause on hover
	 */
	function initHeroSlider() {
		$('.hero-slider').each(function() {
			var $slider = $(this);
			var $slides = $slider.find('.hero-slide');

			if ($slides.length <= 1) {
				$slides.show();
				return;
			}

			var current = 0;
			var timer = null;

			$slides.hide().eq(0).show().addClass('is-active');

			var $dots = $('<div class="hero-slider-dots" role="tablist" />');
			if ($slider.find('.hero-slider-inner').length) {
				$slider.find('.hero-slider-inner').after($dots);
			} else {
				$slider.append($dots);
			}

			$slides.each(function(index) {
				var $dot = $('<button type="button" class="hero-slider-dot" role="tab" />').appendTo($dots);
				if (index === 0) {
					$dot.addClass('is-active');
				}
				$dot.on('click', function() {
					goToSlide(index, true);
				});
			});

			function nextSlide() {
				var next = (current + 1) % $slides.length;
				goToSlide(next, false);
			}

			function goToSlide(index, resetTimer) {
				if (index === current) {
					return;
				}
				$slides.eq(current).removeClass('is-active').fadeOut(400);
				$slides.eq(index).addClass('is-active').fadeIn(400);
				$dots.find('.hero-slider-dot').removeClass('is-active').eq(index).addClass('is-active');
				current = index;
				if (resetTimer && timer) {
					clearInterval(timer);
					timer = setInterval(nextSlide, 7000);
				}
			}

			$slider.find('.hero-slider-prev').on('click', function() {
				var prev = current - 1;
				if (prev < 0) {
					prev = $slides.length - 1;
				}
				goToSlide(prev, true);
			});
			$slider.find('.hero-slider-next').on('click', function() {
				goToSlide((current + 1) % $slides.length, true);
			});

			timer = setInterval(nextSlide, 7000);

			$slider.on('mouseenter', function() {
				if (timer) {
					clearInterval(timer);
					timer = null;
				}
			}).on('mouseleave', function() {
				if (!timer) {
					timer = setInterval(nextSlide, 7000);
				}
			});
		});
	}

})(jQuery);
