document
  .getElementById("scrollToTopBtn")
  .addEventListener("click", function (e) {
    e.preventDefault(); // Mencegah aksi default <a>
    window.scrollTo({
      top: 0,
      behavior: "smooth", // Smooth scroll ke atas
    });
  });
