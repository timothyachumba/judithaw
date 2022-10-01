// import LocomotiveScroll from 'locomotive-scroll'

// const scroll = new LocomotiveScroll({
//   el: document.querySelector('[data-scroll-container]'),
//   smooth: true,
//   multiplier: 0.75,
//   scrollFromAnywhere: true
// })

import fitty from 'fitty'
import 'lazysizes'

fitty('.fit')

window.addEventListener('load', (event) => {
  fitty('.fit')
})
