document.addEventListener('DOMContentLoaded', () => {
  // Carroussel 1
  const carousel1 = document.querySelector('.carousel');
  const firstImg1 = document.querySelectorAll(".carousel-img")[0];
  const arrowIcons1 = document.querySelectorAll('.wrapper i');

  let isDragStart1 = false, prevPageX1, prevScrollLeft1;

  const showHideIcons1 = () => {
    let scrollWidth1 = carousel1.scrollWidth - carousel1.clientWidth;
    arrowIcons1[0].style.display = carousel1.scrollLeft == 0 ? "none" : "block";
    arrowIcons1[1].style.display = carousel1.scrollLeft == scrollWidth1 ? "none" : "block";
  }

  arrowIcons1.forEach(icon => {
    icon.addEventListener('click', () => {
      let firstImgWidth1 = firstImg1.clientWidth + 90;
      carousel1.scrollLeft += icon.id == "left" ? -firstImgWidth1 : firstImgWidth1;
      setTimeout(() => showHideIcons1(), 50);
    });
  });

  const dragStart1 = (e) => {
    isDragStart1 = true;
    prevPageX1 = e.pageX || e.touches[0].pageX;
    prevScrollLeft1 = carousel1.scrollLeft;
  }

  const dragging1 = (e) => {
    if (!isDragStart1) return;
    e.preventDefault();
    carousel1.classList.add("dragging");
    let positionDiff1 = (e.pageX || e.touches[0].pageX) - prevPageX1;
    carousel1.scrollLeft = prevScrollLeft1 - positionDiff1;
    showHideIcons1();
  }

  const dragStop1 = () => {
    isDragStart1 = false;
    carousel1.classList.remove("dragging");
  }

  carousel1.addEventListener("mousedown", dragStart1);
  carousel1.addEventListener("touchstart", dragStart1);

  carousel1.addEventListener("mousemove", dragging1);
  carousel1.addEventListener("touchmove", dragging1);

  carousel1.addEventListener("mouseup", dragStop1);
  carousel1.addEventListener("mouseleave", dragStop1);
  carousel1.addEventListener("touchend", dragStop1);

  // Carroussel 2
  const carousel2 = document.querySelector('.carousel2');
  const firstImg2 = document.querySelectorAll(".carousel2-img")[0];
  const arrowIcons2 = document.querySelectorAll('.wrapper2 i');

  let isDragStart2 = false, prevPageX2, prevScrollLeft2;

  const showHideIcons2 = () => {
    let scrollWidth2 = carousel2.scrollWidth - carousel2.clientWidth;
    arrowIcons2[0].style.display = carousel2.scrollLeft == 0 ? "none" : "block";
    arrowIcons2[1].style.display = carousel2.scrollLeft == scrollWidth2 ? "none" : "block";
  }

  arrowIcons2.forEach(icon => {
    icon.addEventListener('click', () => {
      let firstImgWidth2 = firstImg2.clientWidth + 90;
      carousel2.scrollLeft += icon.id == "left2" ? -firstImgWidth2 : firstImgWidth2;
      setTimeout(() => showHideIcons2(), 50);
    });
  });

  const dragStart2 = (e) => {
    isDragStart2 = true;
    prevPageX2 = e.pageX || e.touches[0].pageX;
    prevScrollLeft2 = carousel2.scrollLeft;
  }

  const dragging2 = (e) => {
    if (!isDragStart2) return;
    e.preventDefault();
    carousel2.classList.add("dragging");
    let positionDiff2 = (e.pageX || e.touches[0].pageX) - prevPageX2;
    carousel2.scrollLeft = prevScrollLeft2 - positionDiff2;
    showHideIcons2();
  }

  const dragStop2 = () => {
    isDragStart2 = false;
    carousel2.classList.remove("dragging");
  }

  carousel2.addEventListener("mousedown", dragStart2);
  carousel2.addEventListener("touchstart", dragStart2);

  carousel2.addEventListener("mousemove", dragging2);
  carousel2.addEventListener("touchmove", dragging2);

  carousel2.addEventListener("mouseup", dragStop2);
  carousel2.addEventListener("mouseleave", dragStop2);
  carousel2.addEventListener("touchend", dragStop2);

  // Carroussel 3
  const carousel3 = document.querySelector('.carousel3');
  const firstImg3 = document.querySelectorAll(".carousel3-img")[0];
  const arrowIcons3 = document.querySelectorAll('.wrapper3 i');
  let isDragStart3 = false, prevPageX3, prevScrollLeft3;

  const showHideIcons3 = () => {
    let scrollWidth3 = carousel3.scrollWidth - carousel3.clientWidth;
    arrowIcons3[0].style.display = carousel3.scrollLeft == 0 ? "none" : "block";
    arrowIcons3[1].style.display = carousel3.scrollLeft == scrollWidth3 ? "none" : "block";
  }

  arrowIcons3.forEach(icon => {
    icon.addEventListener('click', () => {
      let firstImgWidth3 = firstImg3.clientWidth + 90;
      carousel3.scrollLeft += icon.id == "left3" ? -firstImgWidth3 : firstImgWidth3;
      setTimeout(() => showHideIcons3(), 50);
    });
  });

  const dragStart3 = (e) => {
    isDragStart3 = true;
    prevPageX3 = e.pageX || e.touches[0].pageX;
    prevScrollLeft3 = carousel3.scrollLeft;
  }

  const dragging3 = (e) => {
    if (!isDragStart3) return;
    e.preventDefault();
    carousel3.classList.add("dragging");
    let positionDiff3 = (e.pageX || e.touches[0].pageX) - prevPageX3;
    carousel3.scrollLeft = prevScrollLeft3 - positionDiff3;
    showHideIcons3();
  }

  const dragStop3 = () => {
    isDragStart3 = false;
    carousel3.classList.remove("dragging");
  }

  carousel3.addEventListener("mousedown", dragStart3);
  carousel3.addEventListener("touchstart", dragStart3);

  carousel3.addEventListener("mousemove", dragging3);
  carousel3.addEventListener("touchmove", dragging3);

  carousel3.addEventListener("mouseup", dragStop3);
  carousel3.addEventListener("mouseleave", dragStop3);
  carousel3.addEventListener("touchend", dragStop3);
});