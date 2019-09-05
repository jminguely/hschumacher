export default () => {
  const sliderItems = document.querySelectorAll(".slider .slider-item");
  const sliderSelect = document.querySelectorAll('.slider-select a');

  for (const date of sliderSelect) {
    date.addEventListener('click', (event, t) => {
      event.preventDefault();

      for (const link of sliderSelect) {
        if (link.dataset.id == event.target.dataset.id) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      }

      for (const slide of sliderItems) {
        if (slide.dataset.id == event.target.dataset.id) {
          slide.classList.add('active');
        } else {
          slide.classList.remove('active');
        }
      }

    })
  }
};
