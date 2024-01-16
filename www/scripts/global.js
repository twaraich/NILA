let scrollPos = window.scrollY
const header = document.querySelector("header")
const header_height = header.offsetHeight

const add_class_on_scroll = () => header.classList.add("sticky")
const remove_class_on_scroll = () => header.classList.remove("sticky")

window.addEventListener('scroll', function () {
    scrollPos = window.scrollY;
    if (scrollPos >= header_height) {
        add_class_on_scroll()
    } else {
        remove_class_on_scroll()
    }

})

const modalOverlay = document.getElementById('modalOverlay');
const body = document.getElementsByTagName('body')[0];
const html = document.getElementsByTagName('html')[0];


function openModal(id, video = 1) {
    // Open book a table modal
    const modal = document.getElementById(id);
    modal.classList.add('show');
    modalOverlay.classList.add('show');
    body.classList.add('no-scroll');
    html.classList.add('no-scroll');

    if (id === 'videoModal') {
        if (video === 1) {videoSource = foodVideo} else {videoSource = specialVideo}
        videoPlay(0); // load the first video
        ensureVideoPlays(); // play the video automatically      
        videoElement.addEventListener('ended', myHandler, false);
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('show');
    modalOverlay.classList.remove('show');
    body.classList.remove('no-scroll');
    html.classList.remove('no-scroll');

    if (id === 'videoModal') {
        videoElement.setAttribute("src", '');
    }
}

AOS.init({
    // Global settings:
    // disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    // animatedClassName: 'aos-animate', // class applied on animation
    // useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    // debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    // throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    // offset: 120, // offset (in px) from the original trigger point
    // delay: 0, // values from 0 to 3000, with step 50ms
    // duration: 400, // values from 0 to 3000, with step 50ms
    // easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them

});


// Scroll To menu
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        scrollToId(this.getAttribute("href"));
    });
});

window.addEventListener("load", () => {
    if (location.hash) {
        scrollIntoViewWithOffset(location.hash);
    }
});

const scrollToId = (id) => {
    document.querySelector(id).scrollIntoView({
        behavior: "smooth",
    });
};

const scrollIntoViewWithOffset = (selector) => {
    window.scrollTo({
        behavior: 'smooth',
        top: document.querySelector(selector).getBoundingClientRect().top -
            document.body.getBoundingClientRect().top -
            50,
    })
}

const openSlideMenu = () => {
  document.getElementById('sidebar').classList.add('sidebar__active');
  body.classList.add('no-scroll');
    html.classList.add('no-scroll');
    modalOverlay.classList.add('show');
}

const closeSlideMenu = () => {
    document.getElementById('sidebar').classList.remove('sidebar__active');
    body.classList.remove('no-scroll');
    html.classList.remove('no-scroll');
    modalOverlay.classList.remove('show');
}

// video
const foodVideo = ['videos/edit1.mp4', 'videos/edit2.mp4', 'videos/edit3.mp4'];
const specialVideo = ['videos/special.mp4', 'videos/special-2.mp4']
let videoSource = [];

let i = 0;
const videoCount = videoSource.length;
const videoElement = document.getElementById("videoPlayer");

function videoPlay(videoNum) {
    videoElement.setAttribute("src", 'https://nilarestaurant.no/' + videoSource[videoNum]);
    videoElement.autoplay = true;
    videoElement.load();
}

function myHandler() {
    i++;
    if (i == videoCount) {
        i = 0;
        videoPlay(i);
    } else {
        videoPlay(i);
    }
}

function ensureVideoPlays() {
    const video = document.getElementById('videoPlayer');

    if (!video) return;

    const promise = video.play();
    if (promise !== undefined) {
        promise.then(() => {
            // Autoplay started
        }).catch(error => {
            // Autoplay was prevented.
            video.muted = true;
            video.play();
        });
    }
}

