import LocomotiveScroll from 'locomotive-scroll'

import 'lazysizes'

window.addEventListener('load', (event) => {
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.75,
    scrollFromAnywhere: true
  })
  scroll.on('scroll', (position) => {
    if ((position.scroll.y) > 100) {
      document.querySelector('#logo').classList.add('scale-down')
    } else {
      document.querySelector('#logo').classList.remove('scale-down')
    }
  })
})
