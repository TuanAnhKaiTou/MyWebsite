$(document).ready(function(){	
$("#slider").owlCarousel(
{
items:1,
loop: true,
autoplay: true,
autoplayTime: 3000,
nav: true,
navText:['<i class="fa fa-angle-left" ></i>','<i class="fa fa-angle-right" ></i>']
});
$("#product,#product1,#product2,#gallery").owlCarousel(
{
loop: true,
autoplay: true,
autoplayTime: 3000,
nav: true,
margin:10,
navText:['<i class="fa fa-angle-left" ></i>','<i class="fa fa-angle-right" ></i>'],
responsiveClass:true,
	responsive:{
		0:{
			items:1,
		},
		600:{
			items:3,
		},
		1000:{
			items:5,
		}
	}
}
);
$.quickup({
quScrollText: '<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>',
});
$("#zoom").elevateZoom({
constrainType:"height",
constrainSize:274,
zoomType: "lens",
containLensZoom: true,
gallery:'gallery',
cursor: 'pointer',
galleryActiveClass: "active"
}); 

});