// JavaScript code voor animalfavorites:
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');
let sliderContainer = document.getElementById('sliderContainer');
let slider = document.getElementById('slider');
let cards = slider.getElementsByTagName('li');

let elementsToShow = 4;
let sliderContainerWidth = sliderContainer.clientWidth;
let cardWidth = sliderContainerWidth / elementsToShow;
let sliderWidth = cards.length * cardWidth;

slider.style.width = sliderWidth + 'px';

for (let index = 0; index < cards.length; index++) {
    const element = cards[index];
    element.style.width = cardWidth + 'px';
}

prevBtn.classList.add('hidden');

function prev() {
    if (+slider.style.marginLeft.slice(0, -2) < 0) {
        slider.style.marginLeft = ((+slider.style.marginLeft.slice(0, -2)) + cardWidth) + 'px';
        nextBtn.classList.remove('hidden');
    } else {
        prevBtn.classList.add('hidden');
    }
}

function next() {
    if (+slider.style.marginLeft.slice(0, -2) > ((cardWidth * elementsToShow) - sliderWidth)) {
        slider.style.marginLeft = ((+slider.style.marginLeft.slice(0, -2)) - cardWidth) + 'px';
        prevBtn.classList.remove('hidden');
    } else {
        console.log('The End');
        nextBtn.classList.add('hidden');
    }
}