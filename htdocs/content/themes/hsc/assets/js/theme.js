import slider from  './components/slider'

document.addEventListener("DOMContentLoaded", function() {
  document.documentElement.classList.remove("no-js");
  document.documentElement.classList.add("js");

  document.querySelector('.toggle-navigation').onclick = (e) => {
    e.preventDefault();
    document.body.classList.toggle('modal-nav-is-visible');
  }

  slider();
});
