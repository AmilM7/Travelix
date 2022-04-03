// Wrap every letter in a span
var textWrapper = document.getElementById('animated_title1');
textWrapper.innerHTML = textWrapper.textContent.replace(/\w+/g, "<span class='l'>$&</span>");

anime.timeline({loop: false})
    .add({
        targets: '#animated_title1 .l',
        opacity: [0,1],
        translateZ: 0,
        easing: "easeOutExpo",
        duration: 200,
        delay: (el, i) => 50*i
    });



const counters = document.querySelectorAll('.counter');
const speed = 100;

counters.forEach(counter => {
        const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const inc = target / speed;

                if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 60);
                } else {
                        count.innerText = target;
                }
        }

    updateCount();
})


