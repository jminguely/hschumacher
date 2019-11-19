import * as ScrollMagic from "scrollmagic"; // Or use scrollmagic-with-ssr to avoid server rendering problems
import { TweenMax, TimelineMax } from "gsap"; // Also works with TweenLite and TimelineLite
import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";

import lottie from 'lottie-web';

export default () => {
  ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);

  var controller = new ScrollMagic.Controller();

  // const elements = document.getElementsByClassName('sticky-element');

  // console.log(elements);

  // for (let index = 0; index < array.length; index++) {
  //   const element = array[index];
  // }

  // // create a scene
  // new ScrollMagic.Scene({
  //   duration: 300, // the scene should last for a scroll distance of 100px
  //   offset: 50 // start this scene after scrolling for 50px
  // })
  //   .setPin('.sticky-element') // pins the element for the the scene's duration
  //   .addTo(controller); // assign the scene to the controller

  const animationSettings = {
    container: document.getElementById('animation-intro'),
    renderer: 'svg',
    loop: false,
    autoplay: true,
    path: `${themosis.animationsurl}/intro.json`
  };

  lottie.loadAnimation(animationSettings);

  const animationLines = document.getElementsByClassName('animation-lines');
  
  for (let index = 0; index < animationLines.length; index++) {
    let animationPlayed = false;
    const animationSequence = animationLines[index].getAttribute('data-seq');

    const animation = lottie.loadAnimation({
      container: animationLines[index],
      renderer: 'svg',
      loop: false,
      autoplay: false,
      path: `${themosis.animationsurl}/lines.json`
    });
    animation.goToAndStop(1, true);

    animation.addEventListener('DOMLoaded',function(){
      
      var scene = new ScrollMagic.Scene({triggerElement: animationLines[index], duration: 200})
        .addTo(controller)
        .on("enter leave", function (e) {
          if (e.type == "enter" && !animationPlayed) {
            animationPlayed = true;
            animation.playSegments([0 + (50 * animationSequence), 50 + (50 * animationSequence)], true);
          }
        });
    });

  
  }
};
