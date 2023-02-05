const toggler = document.getElementById("toggler");
const mNav = document.getElementById("mobile__nav");
const close = document.getElementById("toggler__expanded");

toggler.addEventListener("click", () => {
  mNav.classList.remove("-translate-y-full");
  mNav.classList.toggle("hidden");
});

close.addEventListener("click", () => {
  mNav.classList.add("-translate-y-full");
  mNav.classList.toggle("hidden");
});

const toggler2 = document.getElementById("toggler2");
const mNav2 = document.getElementById("mobile__nav2");
const close2 = document.getElementById("toggler__expanded2");

toggler2.addEventListener("click", () => {
  mNav2.classList.remove("-translate-x-full");
});

close2.addEventListener("click", () => {
  mNav2.classList.add("-translate-x-full");
});


/* range */
window.onload = function(){
  slideOne();
  slideTwo();
};

let first = document.getElementById("slider-1");
let second = document.getElementById("slider-2");
let min = document.getElementById("range-1");
let max = document.getElementById("range-2");
let minGap = 0;

function slideOne(){
  if(parseInt(second.value) - parseInt(first.value) <= minGap){
      first.value = parseInt(second.value) - minGap;
  }
  min.textContent = first.value;
  min.dataset.from = first.value;
  fillColor();    
}
function slideTwo(){
  if(parseInt(second.value) - parseInt(first.value) <= minGap){
      second.value = parseInt(first.value) + minGap;
  }
  max.textContent = second.value;
  max.dataset.before = second.value;
  fillColor();
}