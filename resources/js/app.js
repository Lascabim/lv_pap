import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
  const images = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
  const interval = 5000;
  let index = 0;
  let intervalID;

  const heroElement = document.getElementById('hero');
  const leftArrow = document.getElementById('behindImage');
  const rightArrow = document.getElementById('frontImage');

  function changeImage() {
    heroElement.src = `/assets/hero/${images[index]}`;
  }

  function moveForward() {
    index = (index + 1) % images.length;
    changeImage();
  }

  function moveBackward() {
    index = (index - 1 + images.length) % images.length;
    changeImage();
  }

  function resetInterval() {
    clearInterval(intervalID);
    intervalID = setInterval(moveForward, interval);
  }

  changeImage();
  intervalID = setInterval(moveForward, interval);

  leftArrow.addEventListener('click', function () {
    moveBackward();
    resetInterval();
  });

  rightArrow.addEventListener('click', function () {
    moveForward();
    resetInterval();
  });
});

export const gColors = {
  white: 'white',
  lightgray: '#d1d1d1',
  gray: '#686E73',
  darkgray: '#322E40',
  dark: '#06090D',
  green: '#32A670',
  lightblue: '#def1ff',
  blue: '#0185ea',
  placeHolder: '#04070e',
};
