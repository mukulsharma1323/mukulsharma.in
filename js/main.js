(function () {
  'use strict';

  var nav = document.querySelector('nav');
  var menu = document.getElementById('navbarDefault');
  var toggler = document.querySelector('.navbar-toggler');
  var backToTop = document.querySelector('.back-to-top');
  var navHeight = nav ? nav.offsetHeight : 0;

  function updateNavigation() {
    var reduced = window.scrollY > 50;
    if (nav) {
      nav.classList.toggle('navbar-reduce', reduced);
      nav.classList.toggle('navbar-trans', !reduced);
    }
    if (backToTop) backToTop.style.display = window.scrollY > 100 ? 'block' : 'none';
  }

  if (toggler && menu) {
    toggler.addEventListener('click', function () {
      var expanded = toggler.getAttribute('aria-expanded') === 'true';
      toggler.setAttribute('aria-expanded', String(!expanded));
      toggler.classList.toggle('collapsed', expanded);
      menu.classList.toggle('show', !expanded);
      if (nav) nav.classList.add('navbar-reduce');
    });
  }

  document.querySelectorAll('a.js-scroll[href*="#"]').forEach(function (link) {
    link.addEventListener('click', function (event) {
      var hash = link.hash;
      if (!hash) return;
      var target = document.querySelector(hash);
      if (!target) return;
      event.preventDefault();
      window.scrollTo({ top: target.offsetTop - navHeight + 5, behavior: 'smooth' });
      if (menu) menu.classList.remove('show');
      if (toggler) {
        toggler.classList.add('collapsed');
        toggler.setAttribute('aria-expanded', 'false');
      }
    });
  });

  if (backToTop) {
    backToTop.addEventListener('click', function (event) {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  var slider = document.querySelector('.text-slider');
  var sliderItems = document.querySelector('.text-slider-items');
  if (slider && sliderItems) {
    var words = sliderItems.textContent.split(',');
    var wordIndex = 0;
    var characterIndex = 0;
    var deleting = false;
    var type = function () {
      var word = words[wordIndex];
      characterIndex += deleting ? -1 : 1;
      slider.textContent = word.slice(0, Math.max(0, characterIndex));
      var delay = deleting ? 30 : 80;
      if (!deleting && characterIndex === word.length) {
        deleting = true;
        delay = 1100;
      } else if (deleting && characterIndex === 0) {
        deleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        delay = 180;
      }
      window.setTimeout(type, delay);
    };
    type();
  }

  var lightboxLoading;
  function loadLightbox() {
    if (lightboxLoading) return lightboxLoading;
    lightboxLoading = new Promise(function (resolve, reject) {
      var stylesheet = document.createElement('link');
      stylesheet.rel = 'stylesheet';
      stylesheet.href = 'lib/lightbox/css/lightbox.min.css';
      document.head.appendChild(stylesheet);

      var jquery = document.createElement('script');
      jquery.src = 'lib/jquery/jquery.min.js';
      jquery.onload = function () {
        var lightbox = document.createElement('script');
        lightbox.src = 'lib/lightbox/js/lightbox.min.js';
        lightbox.onload = resolve;
        lightbox.onerror = reject;
        document.body.appendChild(lightbox);
      };
      jquery.onerror = reject;
      document.body.appendChild(jquery);
    });
    return lightboxLoading;
  }

  document.querySelectorAll('a[data-lightbox]').forEach(function (link) {
    link.addEventListener('click', function openAfterLoad(event) {
      if (window.lightbox) return;
      event.preventDefault();
      loadLightbox().then(function () { link.click(); });
    });
  });

  updateNavigation();
  window.addEventListener('scroll', updateNavigation, { passive: true });
})();
