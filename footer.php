    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 VerdantForge Dynamics. All rights reserved. | Crafting sustainable futures through premium packaging solutions.</p>
        </div>
    </footer>

    <script>
        // Custom Cursor
        const cursor = document.getElementById('cursor');
        let mouseX = 0;
        let mouseY = 0;
        let cursorX = 0;
        let cursorY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        function animateCursor() {
            const dx = mouseX - cursorX;
            const dy = mouseY - cursorY;
            
            cursorX += dx * 0.1;
            cursorY += dy * 0.1;
            
            cursor.style.left = cursorX + 'px';
            cursor.style.top = cursorY + 'px';
            
            requestAnimationFrame(animateCursor);
        }

        animateCursor();

        // Show cursor on mouse move
        document.addEventListener('mousemove', () => {
            cursor.style.opacity = '1';
        });

        // Hide cursor when leaving window
        document.addEventListener('mouseleave', () => {
            cursor.style.opacity = '0';
        });

        // Cursor hover effects
        const hoverElements = document.querySelectorAll('a, button, .product-card, .stat-card');
        hoverElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.classList.add('active');
            });
            el.addEventListener('mouseleave', () => {
                cursor.classList.remove('active');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
            observer.observe(el);
        });

        // Counter animation for stats
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            };
            
            updateCounter();
        }

        // Trigger counter animation when stats are visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = parseInt(stat.dataset.target);
                        animateCounter(stat, target);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Form submission with animation
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Sending...';
            submitBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.textContent = 'Message Sent! ✓';
                submitBtn.style.background = 'linear-gradient(135deg, #059669, #047857)';
                
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.style.background = 'var(--gradient-2)';
                    submitBtn.disabled = false;
                    this.reset();
                }, 3000);
            }, 2000);
        });

        // Parallax effect for hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroBackground = document.querySelector('.hero-bg');
            if (heroBackground) {
                heroBackground.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });

        // Add stagger animation to product cards
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.2}s`;
        });

        // Add stagger animation to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });

        // Enhanced hover effects for buttons
        const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.02)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
          const answer = button.nextElementSibling;
          const isExpanded = button.getAttribute('aria-expanded') === 'true';
  
          // Close all open items (optional: remove this block if you want multiple open)
          document.querySelectorAll('.faq-answer.expanded').forEach(openAnswer => {
            openAnswer.classList.remove('expanded');
            openAnswer.previousElementSibling.setAttribute('aria-expanded', 'false');
          });
  
          // Toggle current one
          if (!isExpanded) {
            answer.classList.add('expanded');
            button.setAttribute('aria-expanded', 'true');
          } else {
            answer.classList.remove('expanded');
            button.setAttribute('aria-expanded', 'false');
          }
        });
      });
    });
  </script>

  <script>
    //thumnbail switch
    function switchImage(el) {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');

    mainImage.src = el.src;

    thumbnails.forEach(img => img.classList.remove('active'));
    el.classList.add('active');
  }
  </script>


  <script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const navLinks = document.getElementById('nav-links');
    const mobileOverlay = document.getElementById('mobile-overlay');

    // Handle scroll effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    function toggleMobileMenu() {
        mobileMenuToggle.classList.toggle('active');
        navLinks.classList.toggle('active');
        mobileOverlay.classList.toggle('active');
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    }

    mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    mobileOverlay.addEventListener('click', toggleMobileMenu);

    // Close mobile menu when clicking nav links
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if (navLinks.classList.contains('active')) {
                toggleMobileMenu();
            }
        });
    });

    // Close mobile menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navLinks.classList.contains('active')) {
            toggleMobileMenu();
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && navLinks.classList.contains('active')) {
            toggleMobileMenu();
        }
    });

    // Smooth scroll for anchor links (if you add them)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<script>
    const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightbox-img");
const lightboxVideo = document.getElementById("lightbox-video");
const caption = document.getElementById("lightbox-caption");
const closeBtn = document.querySelector(".lightbox .close");
const prevBtn = document.querySelector(".lightbox .prev");
const nextBtn = document.querySelector(".lightbox .next");

let currentIndex = 0;
const items = Array.from(document.querySelectorAll(".gallery-item"));

function showItem(index) {
  const item = items[index];
  const type = item.dataset.type;
  caption.textContent = item.dataset.caption || "";

  if (type === "image") {
    lightboxImg.src = item.querySelector("img").src;
    lightboxImg.style.display = "block";
    lightboxVideo.style.display = "none";
  } else {
    lightboxVideo.src = item.dataset.src;
    lightboxVideo.style.display = "block";
    lightboxImg.style.display = "none";
    lightboxVideo.play();
  }
}

items.forEach((item, index) => {
  item.addEventListener("click", () => {
    currentIndex = index;
    lightbox.classList.remove("hidden");
    showItem(currentIndex);
  });
});

prevBtn.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  showItem(currentIndex);
});

nextBtn.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % items.length;
  showItem(currentIndex);
});

// Close when clicking X
closeBtn.addEventListener("click", () => {
  lightbox.classList.add("hidden");
  lightboxVideo.pause();
  lightboxVideo.currentTime = 0;
});

// Close when clicking outside content
lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) {
    lightbox.classList.add("hidden");
    lightboxVideo.pause();
    lightboxVideo.currentTime = 0;
  }
});

</script>

</body>

</html>
