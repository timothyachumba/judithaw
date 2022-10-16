import LocomotiveScroll from 'locomotive-scroll'

import fitty from 'fitty'
import 'lazysizes'

fitty('.fit', {
  minSize: 64,
  multiLine: true
})

function setStickyContainersSize () {
  const stikyContainer = document.querySelector('#scroll-direction-wrapper')
  const stikyContainerHeight = document.querySelector('.horizontal-gallery').scrollWidth
  stikyContainer.setAttribute('style', 'height: ' + stikyContainerHeight + 'px')
}

window.addEventListener('load', (event) => {
  fitty('.fit', {
    minSize: 64,
    multiLine: true
  })
  if (window.innerWidth > 920) {
    setStickyContainersSize()
  }
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.75,
    scrollFromAnywhere: true,
    tablet: {
      smooth: true
    }
  })
  document.querySelector('body').classList.add('loaded')
})

window.addEventListener('resize', (event) => {
  if (window.innerWidth > 920) {
    setStickyContainersSize()
  }
})
