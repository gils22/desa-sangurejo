document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll(".fa-star");
  const ratingInput = document.getElementById("rating-value");
  const ratingLabel = document.getElementById("rating-label");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      const rating = index + 1;
      ratingInput.value = rating;

      stars.forEach((s, i) => {
        if (i < rating) {
          s.classList.add("active");
        } else {
          s.classList.remove("active");
        }
      });

      ratingLabel.textContent = `Rating: ${rating} bintang`;
    });
  });
});
