const state = {};
const carouselList = document.querySelector('.carousel__list');
const carouselItems = document.querySelectorAll('.carousel__item');
const elems = Array.from(carouselItems);
const dots = document.querySelectorAll('.carousel-dot');

carouselList.addEventListener('click', function (event) {
  const newActive = event.target.closest('.carousel__item');

  if (!newActive || newActive.dataset.pos == 0) return;

  update(newActive);
});

// Tombol panah
function prevSlide() {
  const prev = elems.find((el) => el.dataset.pos == -1);
  if (prev) update(prev);
}

function nextSlide() {
  const next = elems.find((el) => el.dataset.pos == 1);
  if (next) update(next);
}

function update(newActive) {
  const newPos = newActive.dataset.pos;

  const current = elems.find((el) => el.dataset.pos == 0);
  const prev = elems.find((el) => el.dataset.pos == -1);
  const next = elems.find((el) => el.dataset.pos == 1);
  const first = elems.find((el) => el.dataset.pos == -2);
  const last = elems.find((el) => el.dataset.pos == 2);

  [current, prev, next, first, last].forEach((item) => {
    const currentPos = item.dataset.pos;
    item.dataset.pos = getNewPos(currentPos, newPos);
    item.classList.remove('carousel__item_active');
  });

  // Tambahkan class aktif ke elemen tengah baru
  const newCenter = elems.find((el) => el.dataset.pos == 0);
  newCenter.classList.add('carousel__item_active');

  // Update dot indikator (jika pakai)
  updateDots();
}

function getNewPos(current, active) {
  const diff = current - active;
  if (Math.abs(diff) > 2) return -current;
  return diff;
}

function updateDots() {
  const activeIndex = elems.findIndex((el) => el.dataset.pos == 0);
  dots.forEach((dot, idx) => {
    dot.classList.toggle('active', idx === activeIndex);
  });
}
