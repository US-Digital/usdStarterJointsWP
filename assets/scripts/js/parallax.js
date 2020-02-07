const background = document.querySelector('.parallax-container')

if (background) {
  window.addEventListener('scroll', function(e) {
    var scrolled = window.pageYOffset
    const output = 'calc(50% - ' + scrolled * 0.25 + 'px)'
    console.log(output)
    background.style.backgroundPositionY = output
  })
}
