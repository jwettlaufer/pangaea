$(document).ready(function() { // wait for document ready
    // init
    const controller = new ScrollMagic.Controller();

    /*
    const introScene = new ScrollMagic.Scene({
        triggerElement: '.title',
        triggerHook: 0,
        duration: '30%'
    })
    .setPin('.title', {pushFollowers: false})
    .addTo(controller);
    */

    // get all slides
    const slides = document.querySelectorAll("section.panel");

    // create scene for every slide
    for (let i=0; i<slides.length; i++) {
        new ScrollMagic.Scene({
                triggerElement: slides[i],
                duration: '50%',
                triggerHook: 0.1
            })
            .setPin(slides[i], {pushFollowers: false})
            .addIndicators() // add indicators (requires plugin)
            .addTo(controller);
    }

    const revealElements = document.getElementsByClassName("digit");
		for (let i=0; i<revealElements.length; i++) { // create a scene for each element
			new ScrollMagic.Scene({
								triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
								offset: 50,												 // start a little later
								triggerHook: 0.9,
							})
							.setClassToggle(revealElements[i], "visible") // add class toggle
							.addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
							.addTo(controller);
		}
});