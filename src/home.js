import LocomotiveScroll from 'locomotive-scroll'

import 'lazysizes'

function Marquee (selector, speed) {
  const parentSelector = document.querySelector(selector)
  const clone = parentSelector.innerHTML
  const firstElement = parentSelector.children[0]
  let i = 0
  console.log(firstElement)
  parentSelector.insertAdjacentHTML('beforeend', clone)
  parentSelector.insertAdjacentHTML('beforeend', clone)

  setInterval(function () {
    firstElement.style.marginLeft = `-${i}px`
    if (i > firstElement.clientWidth) {
      i = 0
    }
    i = i + speed
  }, 0)
}

// after window is completed load
// 1 class selector for marquee
// 2 marquee speed 0.2
window.addEventListener('load', Marquee('#marquee', 0.5))

window.addEventListener('load', (event) => {
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    multiplier: 0.75,
    scrollFromAnywhere: true
  })
  document.querySelector('body').classList.add('loaded')
})
