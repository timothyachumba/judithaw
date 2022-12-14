import LocomotiveScroll from 'locomotive-scroll'

import fitty from 'fitty'
import 'lazysizes'

fitty('.fit', {
  minSize: 64,
  multiLine: true
})

function setStickyContainersSize () {
  const stikyContainer = document.querySelector('#scroll-direction-wrapper')
  if (stikyContainer !== null) {
    const stikyContainerHeight = document.querySelector('.horizontal-gallery').scrollWidth
    stikyContainer.setAttribute('style', 'height: ' + stikyContainerHeight + 'px')
  }
}

window.addEventListener('load', (event) => {
  document.querySelector('body').classList.add('loaded')
  if (window.innerWidth > 920) {
    setStickyContainersSize()
  }
  fitty('.fit', {
    minSize: 64,
    multiLine: true
  })
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.75,
    scrollFromAnywhere: false,
    mobile: {
      smooth: true
    },
    tablet: {
      smooth: true,
      multiplier: 100,
      scrollFromAnywhere: true
    }
  })
})

window.addEventListener('resize', (event) => {
  if (window.innerWidth > 920) {
    setStickyContainersSize()
  }
})
