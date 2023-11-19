let currentIndex = 0;
const cardWidth = 210; // 200px width + 10px margin-right
const scrollMenu = document.querySelector('.scrollmenu');
const maxIndex = Math.floor((scrollMenu.scrollWidth - scrollMenu.clientWidth + cardWidth / 2) / cardWidth);

function scrollHorizontally(direction) {
    currentIndex = Math.max(0, Math.min(currentIndex + direction, maxIndex));
    const scrollAmount = -currentIndex * cardWidth;
    scrollMenu.style.transform = `translateX(${scrollAmount}px)`;
}

console.log('works');