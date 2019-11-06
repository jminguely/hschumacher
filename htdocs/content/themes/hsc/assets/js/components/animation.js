import * as ScrollMagic from "scrollmagic"; // Or use scrollmagic-with-ssr to avoid server rendering problems
import { TweenMax, TimelineMax } from "gsap"; // Also works with TweenLite and TimelineLite
import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";

export default () => {
  ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);

  var controller = new ScrollMagic.Controller();

  const elements = document.getElementsByClassName('sticky-element');

  console.log(elements);

  for (let index = 0; index < array.length; index++) {
    const element = array[index];
    
  }

  // create a scene
  new ScrollMagic.Scene({
    duration: 300, // the scene should last for a scroll distance of 100px
    offset: 50 // start this scene after scrolling for 50px
  })
    .setPin('.sticky-element') // pins the element for the the scene's duration
    .addTo(controller); // assign the scene to the controller

};
