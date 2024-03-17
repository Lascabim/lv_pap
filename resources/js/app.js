import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
  const images = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
  const interval = 5000;
  let index = 0;

  const heroElement = document.getElementById('hero');

  function changeImage() {
    heroElement.src = `/assets/hero/${images[index]}`;
    index = (index + 1) % images.length;
}

  changeImage();
  setInterval(changeImage, interval);
});
