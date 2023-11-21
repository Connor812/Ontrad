let currentIndex = 0;
const cardWidth = 210; // 200px width + 10px margin-right
const scrollMenuSongs = document.querySelector('.scrollMenuSongs');
const maxIndex = Math.floor((scrollMenuSongs.scrollWidth - scrollMenuSongs.clientWidth + cardWidth) / cardWidth);
console.log('works');

function scrollHorizontally(direction) {
    currentIndex = Math.max(0, Math.min(currentIndex + direction, maxIndex));
    const scrollAmount = -Math.min(currentIndex * cardWidth, scrollMenuSongs.scrollWidth - scrollMenuSongs.clientWidth);
    scrollMenuSongs.style.transform = `translateX(${scrollAmount}px)`;
}

let currentIndexTheme = 0;
const cardWidthTheme = 210; // 200px width + 10px margin-right
const scrollMenuThemes = document.querySelector('.scrollMenuThemes');
const maxIndexThemes = Math.floor((scrollMenuThemes.scrollWidth - scrollMenuThemes.clientWidth + cardWidthTheme) / cardWidthTheme);
console.log('works');

function scrollHorizontallyThemes(direction) {
    currentIndexTheme = Math.max(0, Math.min(currentIndexTheme + direction, maxIndexThemes));
    const scrollAmount = -Math.min(currentIndexTheme * cardWidthTheme, scrollMenuThemes.scrollWidth - scrollMenuThemes.clientWidth);
    scrollMenuThemes.style.transform = `translateX(${scrollAmount}px)`;
}