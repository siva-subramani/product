
<!-- MODULE Block uhuslider -->
<div id="uhuslider" class="cols marginb">
	<div class="block_content">
		<div class="loading" style="background-image: url(http://www.ababyhub.com/themes/lava0133/assets/img/13302/loading.gif);"></div>
		<ul id="uhu_slider" style="display: none;" class="cycle-slideshow">
		 
		
			<li class="slide0 group">
				<a href="">				<img class="slider img-fluid" src="" />
				</a>
								<div class="slide_content" style="display: none;">
										<h2 class="sd2 animated slide-h2">Pedaliaceae</h4>
					
										<h3 class="sd3 animated slide-h3">12 3D-Transitions</h4>
					
										<h4 class="sd4 animated slide-h4">Full Parallax Effect</h4>
					
										<h6 class="sd6 animated slide-link slidelink">
						<a class="btn lnk_view" href="">
						<span>Buy Now</span>
						</a>
					</h6>
									</div>

												</li>
			
		 
		
			<li class="slide1 group">
				<a href="">				<img class="slider img-fluid" src="" />
				</a>
								<div class="slide_content" style="display: none;">
										<h2 class="sd2">Pedaliaceae</h4>
					
										<h3 class="sd3">Support Bxslider</h4>
					
										<h4 class="sd4">Full customize</h4>
					
										<h6 class="sd6 slidelink">
						<a class="btn lnk_view" href="">
						<span>Buy Now</span>
						</a>
					</h6>
										</div>

												</li>
			
		 
		
			<li class="slide2 group">
								<img class="slider img-fluid" src="" />
				
								<div class="slide_content" style="display: none;">
					
					
					
										</div>

												</li>
			
				</ul>
	</div>
</div>
<script type="text/javascript">
function loadImage(url, callback) { 
    var img = new Image();
     img.src = url;

    if (img.complete) { 
		callback.call(img);
    } else { 
        img.onload = function () { 
			callback.call(img);
            img.onload = null;
        }; 
    }; 
}; 
function imgLoading(){ 
	 $('.loading').css('background-image', 'url(http://www.ababyhub.com/themes/lava0133/assets/img/13302/loading.gif)');
	imgPreLoaded();
	 $('.loading').hide();
	 $('#uhu_slider').css('display', 'block');
}

function imgPreLoaded(){ 
	body =  $('#index').width();

	if (body < 768)
	{ 
					 $('#uhu_slider li.slide0 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_13.jpg');
					 $('#uhu_slider li.slide1 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_23.jpg');
					 $('#uhu_slider li.slide2 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_33.jpg');
			}
	else if (body < 1030)
	{ 
		 
			 $('#uhu_slider li.slide0 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_12.jpg');
		 
			 $('#uhu_slider li.slide1 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_22.jpg');
		 
			 $('#uhu_slider li.slide2 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_32.jpg');
			}
	else
	{ 
					 $('#uhu_slider li.slide0 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_11.jpg');
					 $('#uhu_slider li.slide1 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_21.jpg');
					 $('#uhu_slider li.slide2 img.slider').attr('src', 'http://www.ababyhub.com/themes/lava0133/assets/img/13302/slider_31.jpg');
			}
}

 $(document).ready(function(){ 
	loadImage('http://www.ababyhub.com/themes/lava0133/assets/img/13302/loading.gif',imgLoading);
	 $('#uhu_slider').refineSlide({ 
		maxWidth: 1180,
		delay: 5000,
		transitionDuration: 800,
		autoPlay: true,
		transition: 'random',
		fallback3d: 'sliceV',
		useThumbs: false,
		useArrows: true,
		arrowTemplate: '<div class="rs-arrows bx-control"><span class="rs-prev cycle-prev"><i class="material-icons">chevron_left</i></span><span class="rs-next cycle-next"><i class="material-icons">chevron_right</i></span></div>',
		onInit: function(){ 
			 $('.sd2').hide();
			 $('.sd3').hide();
			 $('.sd4').hide();
			 $('.sd6').hide();
			 $('.slide-logo').hide();
			 $('.slide_content').css('display', 'block');
			 $('.slide-h2').addClass('fadeInUp').delay(500);
			 $('.slide-h3').addClass('fadeInUp').delay(1500);
			 $('.slide-h4').addClass('fadeInUp').delay(2500);
			 $('.slide-link').addClass('fadeInUp').delay(3500);
			 $('.slide-logo').addClass('slideInLeft').delay(4500);
			 $('.sd2').show(20);
			 $('.sd3').show(20);
			 $('.sd4').show(20);
			 $('.sd6').show(20);
			 $('.slide-logo').show(20);
		},
		afterChange: function(){ 
			 $('.slide-h2').addClass('fadeInUp').delay(500);
			 $('.slide-h3').addClass('fadeInUp').delay(1500);
			 $('.slide-h4').addClass('fadeInUp').delay(2500);
			 $('.slide-link').addClass('fadeInUp').delay(3500);
			 $('.slide-logo').addClass('slideInLeft').delay(4500);
			 $('.sd2').show(20);
			 $('.sd3').show(20);
			 $('.sd4').show(20);
			 $('.sd6').show(20);
			 $('.slide-logo').show(20);
			 $('.slide_content').css('display', 'block');
		},
		onChange: function(){ 
			 $('.sd2').hide();
			 $('.sd3').hide();
			 $('.sd4').hide();
			 $('.sd6').hide();
			 $('.slide-logo').hide();
		},
	}); 
}); 
</script>
<!-- /MODULE Block uhuslider -->
