export default () => {
  const historySliderItems = document.querySelectorAll(".history-slider .history-slider-item");
  const historySliderSelect = document.querySelectorAll('.history-slider-select a');

  for (const date of historySliderSelect) {
    date.addEventListener('click', (event, t) => {
      event.preventDefault();

      for (const link of historySliderSelect) {
        if (link.dataset.id == event.target.dataset.id) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      }

      for (const slide of historySliderItems) {
        if (slide.dataset.id == event.target.dataset.id) {
          slide.classList.add('active');
        } else {
          slide.classList.remove('active');
        }
      }

    })
  }
};
