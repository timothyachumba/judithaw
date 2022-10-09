import LocomotiveScroll from 'locomotive-scroll'

import fitty from 'fitty'
import 'lazysizes'

fitty('.fit')

function setStickyContainersSize () {
  const stikyContainer = document.querySelector('#scroll-direction-wrapper')
  const stikyContainerHeight = document.querySelector('.horizontal-gallery').scrollWidth
  stikyContainer.setAttribute('style', 'height: ' + stikyContainerHeight + 'px')
}

window.addEventListener('load', (event) => {
  fitty('.fit')
  setStickyContainersSize()
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.75,
    scrollFromAnywhere: true
  })
})

window.addEventListener('resize', (event) => {
  setStickyContainersSize()
})
