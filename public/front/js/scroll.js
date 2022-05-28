const scroll = document.querySelector(".scroll");
const scrollOptions = {
  behavior: "smooth",
  left: 0,
  top: 0,
};

function getScrollTop() {
  return (
    window.pageYOffset - document.documentElement.clientTop
  );
}

function scrollToTop(e, duration = 750) {
  const start = window.performance.now();
  const scrollTop = getScrollTop();
  window.scrollTo(scrollOptions);
}

scroll.addEventListener("click", scrollToTop);