// Wrap every letter in a span
var textWrapper = document.getElementById('animated_title');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='l'>$&</span>");

anime.timeline({loop: false})
    .add({
        targets: '#animated_title .l',
        scale: [4,1],
        opacity: [0,1],
        translateZ: 0,
        easing: "easeOutExpo",
        duration: 950,
        delay: (el, i) => 70*i
    });

