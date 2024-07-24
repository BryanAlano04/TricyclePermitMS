(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Animate the skills items on reveal
   */
  let skillsAnimation = document.querySelectorAll('.skills-animation');
  skillsAnimation.forEach((item) => {
    new Waypoint({
      element: item,
      offset: '80%',
      handler: function(direction) {
        let progress = item.querySelectorAll('.progress .progress-bar');
        progress.forEach(el => {
          el.style.width = el.getAttribute('aria-valuenow') + '%';
        });
      }
    });
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();

document.addEventListener('DOMContentLoaded', function () {
  const nextButtons = document.querySelectorAll('.btn.next');
  const steps = document.querySelectorAll('.form-step');
  const progressIndicators = document.querySelectorAll('.form-progress-indicator');
  const progressBar = document.querySelector('.form-progress progress');

  let currentStep = 0;

  nextButtons.forEach(button => {
      button.addEventListener('click', () => {
          steps[currentStep].classList.add('waiting');
          progressIndicators[currentStep].classList.add('active');
          currentStep++;
          steps[currentStep].classList.remove('waiting');
          updateProgress();
      });
  });

  function updateProgress() {
      const progressValue = (currentStep / (steps.length - 1)) * 100;
      progressBar.value = progressValue;
  }
});


// Add this to your main.js or a separate script file

// Function to show modal
function showModal(modalId) {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById(modalId).style.display = 'block';
}

// Function to hide modal
function hideModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
}

document.getElementById('add-applicants-btn').onclick = function() {
  showModal('add-applicants-modal');
};

document.getElementById('edit-applicants-btn').onclick = function() {
  showModal('edit-applicants-modal');
};

document.querySelectorAll('.close').forEach(button => {
  button.onclick = function() {
    hideModal(this.closest('.modal').id);
  };
});

document.getElementById('overlay').onclick = function() {
  document.querySelectorAll('.modal').forEach(modal => {
    modal.style.display = 'none';
  });
  this.style.display = 'none';
};

function showSignInForm() {
  document.getElementById('signInForm').style.display = 'block';
  document.getElementById('signUpForm').style.display = 'none';
  document.getElementById('forgetPasswordForm').style.display = 'none';
}

function showSignUpForm() {
  document.getElementById('signInForm').style.display = 'none';
  document.getElementById('signUpForm').style.display = 'block';
  document.getElementById('forgetPasswordForm').style.display = 'none';
}

function showForgetPasswordForm() {
  document.getElementById('signInForm').style.display = 'none';
  document.getElementById('signUpForm').style.display = 'none';
  document.getElementById('forgetPasswordForm').style.display = 'block';
}

// Ensure the Sign In form is shown when the modal is triggered
$('#signInModal').on('shown.bs.modal', function () {
  showSignInForm(); // Show Sign In form when modal is opened
});

// document.addEventListener("DOMContentLoaded", function() {
//   const form = document.getElementById('forgetPasswordForm');
//   const messageDiv = document.getElementById('message');

//   form.addEventListener('submit', function(event) {
//       event.preventDefault(); // Prevent the default form submission
      
//       const formData = new FormData(form); // Create FormData object from the form

//       fetch('index.php', { // The PHP script handling the form
//           method: 'POST',
//           body: formData
//       })
//       .then(response => response.text()) // Handle the response from the server
//       .then(data => {
//           messageDiv.innerHTML = data; // Display the message returned from the server
//       })
//       .catch(error => {
//           console.error('Error:', error); // Log any errors
//       });
//   });
// });









$(document).ready(function() {
  var currentStep = 0;
  var steps = $(".step");
  var indicators = $(".step-indicators .indicator");

  function showStep(index) {
      steps.removeClass("active");
      $(steps[index]).addClass("active");
      indicators.removeClass("completed");
      indicators.each(function(i) {
          if (i <= index) {
              $(this).addClass("completed");
          }
      });
  }

  $(".btn-next").click(function() {
      if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);
      }
  });

  $(".btn-prev").click(function() {
      if (currentStep > 0) {
          currentStep--;
          showStep(currentStep);
      }
  });

  $("#multiStepForm").submit(function(event) {
      event.preventDefault();
      alert("Form submitted!");
  });
}); 



