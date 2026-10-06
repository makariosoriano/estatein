(function () {
  const close = document.querySelector('.announce-close');
  const bar = document.querySelector('.announce-bar');
  if (close && bar) {
    close.addEventListener('click', function () {
      bar.style.display = 'none';
    });
  }

  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.nav-primary');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      nav.classList.toggle('is-open');
    });
  }
})();
