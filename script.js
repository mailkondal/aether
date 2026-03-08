// Enhanced Preloader with progress
window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    const loadingProgress = document.querySelector('.loading-progress');
    
    // Simulate loading progress
    let progress = 0;
    const progressInterval = setInterval(() => {
        progress += Math.random() * 15;
        if (progress >= 100) {
            progress = 100;
            clearInterval(progressInterval);
            
            setTimeout(() => {
                preloader.classList.add('hidden');
                
                // Start hero animations after preloader
                setTimeout(() => {
                    initializeHeroAnimations();
                }, 500);
            }, 500);
        }
        loadingProgress.style.width = progress + '%';
    }, 100);
});

// Initialize hero animations
function initializeHeroAnimations() {
    const heroLines = document.querySelectorAll('.hero-line');
    heroLines.forEach((line, index) => {
        const words = line.querySelectorAll('.word');
        words.forEach((word, wordIndex) => {
            const delay = (index * 0.8) + (wordIndex * 0.2);
            word.style.animationDelay = delay + 's';
        });
    });
}

// Enhanced Header scroll effect
let lastScrollY = window.scrollY;
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    const currentScrollY = window.scrollY;
    
    if (currentScrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
    
    // Hide/show header on scroll
    if (currentScrollY > lastScrollY && currentScrollY > 100) {
        header.style.transform = 'translateY(-100%)';
    } else {
        header.style.transform = 'translateY(0)';
    }
    
    lastScrollY = currentScrollY;
});

// Enhanced Navigation toggle
const navToggle = document.getElementById('navToggle');
const navMenu = document.getElementById('navMenu');

if (navToggle && navMenu) {
    navToggle.addEventListener('click', function() {
        navToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        if (navMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            navToggle.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    // Close menu when clicking overlay
    const navOverlay = document.querySelector('.nav-overlay');
    if (navOverlay) {
        navOverlay.addEventListener('click', function() {
            navToggle.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
}

// Enhanced smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Enhanced scroll animations with continuous triggering
function isElementInViewport(el, threshold = 0.1) {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    const elementHeight = rect.height;
    const elementTop = rect.top;
    const elementBottom = rect.bottom;
    
    // Element is considered in viewport if any part is visible
    return (
        elementBottom >= 0 &&
        elementTop <= windowHeight &&
        (elementBottom - elementTop) >= elementHeight * threshold
    );
}

function animateOnScroll() {
    // Get all elements with animate-on-scroll class
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    animateElements.forEach((element, index) => {
        const isInViewport = isElementInViewport(element, 0.1);
        const delay = parseFloat(element.dataset.delay) || 0;
        
        if (isInViewport) {
            // Add visible class with delay
            setTimeout(() => {
                element.classList.add('visible');
                
                // Handle special animations for different element types
                if (element.classList.contains('story-paragraph')) {
                    animateStoryParagraph(element);
                } else if (element.classList.contains('service-item')) {
                    animateServiceItem(element);
                } else if (element.classList.contains('service-description')) {
                    animateServiceDescription(element);
                } else if (element.classList.contains('summary-text')) {
                    animateSummaryText(element);
                }
            }, delay * 1000);
        } else {
            // Remove visible class when out of viewport for continuous animation
            element.classList.remove('visible');
            
            // Reset special animations
            if (element.classList.contains('story-paragraph')) {
                resetStoryParagraph(element);
            } else if (element.classList.contains('service-item')) {
                resetServiceItem(element);
            } else if (element.classList.contains('service-description')) {
                resetServiceDescription(element);
            } else if (element.classList.contains('summary-text')) {
                resetSummaryText(element);
            }
        }
    });
}

// Animate story paragraphs
function animateStoryParagraph(element) {
    const lines = element.querySelectorAll('.paragraph-line');
    lines.forEach((line, index) => {
        setTimeout(() => {
            line.style.opacity = '1';
            line.style.transform = 'translateX(0)';
        }, index * 200);
    });
}

function resetStoryParagraph(element) {
    const lines = element.querySelectorAll('.paragraph-line');
    lines.forEach(line => {
        line.style.opacity = '0';
        line.style.transform = 'translateX(-50px)';
    });
}

// Animate service items
function animateServiceItem(element) {
    const words = element.querySelectorAll('.service-word');
    words.forEach((word, index) => {
        setTimeout(() => {
            word.style.opacity = '1';
            word.style.transform = 'translateY(0)';
        }, index * 100);
    });
}

function resetServiceItem(element) {
    const words = element.querySelectorAll('.service-word');
    words.forEach(word => {
        word.style.opacity = '0';
        word.style.transform = 'translateY(50px)';
    });
}

// Animate service descriptions
function animateServiceDescription(element) {
    const lines = element.querySelectorAll('.desc-line');
    lines.forEach((line, index) => {
        setTimeout(() => {
            line.style.opacity = '1';
            line.style.transform = 'translateX(0)';
        }, index * 200);
    });
}

function resetServiceDescription(element) {
    const lines = element.querySelectorAll('.desc-line');
    lines.forEach(line => {
        line.style.opacity = '0';
        line.style.transform = 'translateX(-30px)';
    });
}

// Animate summary text
function animateSummaryText(element) {
    const lines = element.querySelectorAll('.summary-line');
    lines.forEach((line, index) => {
        setTimeout(() => {
            line.style.opacity = '1';
            line.style.transform = 'scale(1)';
        }, index * 300);
    });
}

function resetSummaryText(element) {
    const lines = element.querySelectorAll('.summary-line');
    lines.forEach(line => {
        line.style.opacity = '0';
        line.style.transform = 'scale(0.9)';
    });
}

// Throttle scroll events for better performance
let ticking = false;

function requestTick() {
    if (!ticking) {
        requestAnimationFrame(() => {
            animateOnScroll();
            ticking = false;
        });
        ticking = true;
    }
}

window.addEventListener('scroll', requestTick);

// Initialize animations on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initial check for elements already in viewport
    setTimeout(() => {
        animateOnScroll();
    }, 100);
    
    // Add loading state to hero video
    const heroVideo = document.querySelector('.hero-video video');
    if (heroVideo) {
        heroVideo.addEventListener('loadeddata', function() {
            console.log('Hero video loaded');
        });
        
        heroVideo.addEventListener('error', function() {
            console.log('Hero video failed to load, adding fallback');
            const videoContainer = document.querySelector('.hero-video');
            if (videoContainer) {
                videoContainer.style.display = 'none';
            }
            // Add a fallback gradient background
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.background = 'linear-gradient(135deg, #000000 0%, #333333 50%, #000000 100%)';
            }
        });
    }
});

// Enhanced parallax effect for hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    const heroVideo = document.querySelector('.hero-video');
    
    if (hero && heroVideo) {
        const rate = scrolled * -0.3;
        heroVideo.style.transform = `translateY(${rate}px)`;
    }
    
    // Parallax for particles
    const particles = document.querySelectorAll('.particle');
    particles.forEach((particle, index) => {
        const speed = (index + 1) * 0.1;
        const yPos = -(scrolled * speed);
        particle.style.transform = `translateY(${yPos}px)`;
    });
});

// Enhanced hover effects for footer links
document.querySelectorAll('.footer-link').forEach(link => {
    link.addEventListener('mouseenter', function() {
        this.style.transform = 'translateX(10px)';
    });
    
    link.addEventListener('mouseleave', function() {
        this.style.transform = 'translateX(0)';
    });
});

// Add stagger animation for navigation menu items
function staggerNavAnimation() {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach((link, index) => {
        link.style.transitionDelay = `${index * 0.1}s`;
    });
}

// Initialize stagger animation
staggerNavAnimation();

// Enhanced intersection observer for better performance
if ('IntersectionObserver' in window) {
    const observerOptions = {
        threshold: [0, 0.1, 0.5, 1],
        rootMargin: '50px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            const element = entry.target;
            
            if (entry.isIntersecting) {
                if (element.classList.contains('animate-on-scroll') && !element.classList.contains('visible')) {
                    const delay = parseFloat(element.dataset.delay) || 0;
                    setTimeout(() => {
                        element.classList.add('visible');
                    }, delay * 1000);
                }
            } else {
                // Remove visible class for continuous animation
                if (element.classList.contains('animate-on-scroll')) {
                    element.classList.remove('visible');
                }
            }
        });
    }, observerOptions);

    // Observe all animate-on-scroll elements
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
}

// Add dynamic text effects
function addTextEffects() {
    const textElements = document.querySelectorAll('.hero-title, .section-title');
    
    textElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.textShadow = '0 0 20px rgba(255, 255, 255, 0.5)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.textShadow = 'none';
        });
    });
}

// Initialize text effects
addTextEffects();

// Add smooth page transitions
function addPageTransitions() {
    const links = document.querySelectorAll('a[href$=".html"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            
            // Add fade out effect
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.3s ease';
            
            setTimeout(() => {
                window.location.href = href;
            }, 300);
        });
    });
}

// Initialize page transitions
addPageTransitions();


// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Close navigation menu
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        
        if (navMenu && navMenu.classList.contains('active')) {
            navToggle.classList.remove('active');
            navMenu.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
});

// Add resize handler for responsive adjustments
window.addEventListener('resize', function() {
    // Reset navigation on resize
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (window.innerWidth > 768) {
        if (navToggle) navToggle.classList.remove('active');
        if (navMenu) navMenu.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Recalculate animations
    setTimeout(() => {
        animateOnScroll();
    }, 100);
});

// Add performance monitoring
function addPerformanceMonitoring() {
    // Monitor scroll performance
    let scrollCount = 0;
    let lastScrollTime = Date.now();
    
    window.addEventListener('scroll', function() {
        scrollCount++;
        const currentTime = Date.now();
        
        if (currentTime - lastScrollTime > 1000) {
            // Reset counter every second
            scrollCount = 0;
            lastScrollTime = currentTime;
        }
        
        // Throttle animations if too many scroll events
        if (scrollCount > 10) {
            return;
        }
    });
}

// Initialize performance monitoring
addPerformanceMonitoring();