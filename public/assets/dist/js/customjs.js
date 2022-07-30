function showText(toggleText) {
    toggleText.classList.toggle("active");
}

// image masonry

// init Masonry
// $('.grid').masonry({
//     itemSelector: '.grid-item',
//     percentPosition: true,
//     gutter: 10,
//     stagger: 30
// });

// external js: masonry.pkgd.js


// endimage masonry

// tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
// endtooltip

// close btn youtube
$('.klos').on('click', function () {
    let video = $(this).parent().parent().next().find('iframe').attr("src")
    $(this).parent().parent().next().find('iframe').attr("src", "")
    $(this).parent().parent().next().find('iframe').attr("src", video)
})
// end btn

// Aos 
AOS.init();
// end AOS
