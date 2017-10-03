//----START--------ANIMATE ON SCROLL----------------//
wow = new WOW({animateClass: 'animated',
              offset: 100});
wow.init();
//----END----------ANIMATE ON SCROLL------------//
//----START----Smooth Scroll TO DIV -------------//

$('.menu ul li a').click(function(){
    $('html, body').animate({
        scrollTop: $('#' + $(this).data('value')).offset().top
    },1000);
});
//----END---Smooth Scroll TO DIV ---------------//
//----START---- Counter -------------//
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
//----END---- Counter -------------//


try{
    // Set the date we're counting down to
    var countDownDate = new Date("Oct 5, 2017 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

	// Get todays date and time
	var now = new Date().getTime();
	
	// Find the distance between now an the count down date
	var distance = countDownDate - now;
	
	// Time calculations for days, hours, minutes and seconds
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	// Display the result in the element with id="demo"
	var demo = document.getElementById("demo");
	if(demo != null){
	    demo.innerHTML = days + "d " + hours + "h " +
		minutes + "m " + seconds + "s ";
	}

	// If the count down is finished, write some text 
	if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
	}
    }, 1000);

}catch(err){
    console.log(err);
}
