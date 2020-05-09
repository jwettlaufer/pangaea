$(document).ready(function() { // wait for document ready
    // init
    const controller = new ScrollMagic.Controller();

    // get all slides
    const slides = document.querySelectorAll("section.panel");

    // create scene for every slide
    for (let i=0; i<slides.length; i++) {
        new ScrollMagic.Scene({
                triggerElement: slides[i],
                offset: 50,												 // start a little later
				triggerHook: 1,
                reverse:false
            })
            .setClassToggle(".panel", "visible") // add class toggle
					//	.addIndicators() // add indicators (requires plugin)
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
						//	.addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
							.addTo(controller);
		}
});