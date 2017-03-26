/*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

var responsiveflagMenu = false;

function setCookie(NameOfCookie, value, expiredays)
{   
	var ExpireDate = new Date ();
	ExpireDate.setTime(ExpireDate.getTime() + (expiredays * 24 * 3600 * 1000));
		  
	document.cookie = NameOfCookie + "=" + escape(value) + ((expiredays == null) ? "" : "; expires=" + ExpireDate.toGMTString());   
} 

function getCookie(NameOfCookie)
{
	if (document.cookie.length > 0)
	{
		begin = document.cookie.indexOf(NameOfCookie+"=");
		if (begin != -1)      
		{
			begin += NameOfCookie.length+1;
			end = document.cookie.indexOf(";", begin);
			if (end == -1) end = document.cookie.length;
				return unescape(document.cookie.substring(begin, end)); 
		}
	}
	return null;
}

function delCookie(NameOfCookie)   
{
	if(getCookie(NameOfCookie)){
		document.cookie = NameOfCookie + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";   
	}
}	

jQuery.fn.topHide = function(settings) {
	settings = jQuery.extend({
		min: 1,
		fadeSpeed: 200
	}, settings);
	
	return this.each(function() {
		//listen for scroll
		var el = $(this);
		el.hide(); //in case the user forgot
		$(window).scroll(function() {
			if($(window).scrollTop() >= settings.min)
			{
				el.fadeIn(settings.fadeSpeed);
			}
			else
			{
				el.fadeOut(settings.fadeSpeed);
			}
		});
	});
};

jQuery.fn.topShow = function(settings) {
	settings = jQuery.extend({
		min: 1,
		fadeSpeed: 200
	}, settings);
	
	return this.each(function() {
		//listen for scroll
		var el = $(this);
		//el.hide(); //in case the user forgot
		$(window).scroll(function() {
			if($(window).scrollTop() >= settings.min)
			{
				el.fadeOut(settings.fadeSpeed);
			}
			else
			{
				el.fadeIn(settings.fadeSpeed);
			}
		});
	});
};

$(document).ready(function(){
  if ($(document).width() < 768  && responsiveflagMenu == false)
  {
    if ($('.menu').length > 0)
    {
      //$('#header .menu .umenu').remove();
      init_MobileMenu();
      responsiveflagMenu = true;
    }
  }
  else if ($(document).width() >= 768)
  {
    if ($('#header .menu .umenu').length > 0)
    {
      //$('#header .menu .mobile').remove();
      responsiveflagMenu = false;
    }
  }

  $('#uhu_counter').one('inview', function (event, visible) {
    if (visible == true) {
      $('.counter').countTo();
    }
  });

  //$('#currencies-block-top').topShow({
  //  min: 200,
  //  fadeSpeed: 500
  //});

  //$('#languages-block-top').topShow({
  //  min: 200,
  //  fadeSpeed: 500
  //});

  $('.top-scroll').topHide({
    min: 200,
    fadeSpeed: 500
  });

  $('.top-scroll').click(function(e) {
    e.preventDefault();
    $.scrollTo(0,700);
  });

  $('#search-icon, #clear-icon').on('click', function(){
    if ($('#search_block_top').hasClass('searchup'))
    {
      $('#search_block_top').removeClass('searchup');
    }
    else
    {
      $('#search_block_top').addClass('searchup');
    }
    return false;
  });
});


function init_MobileMenu()
{
  $('.menu>ul li a.nav_a').each(function(){
    $(this).parent().prepend('<span class="grover"><i class="material-icons touchspin-down"></i></span>');
  });

  $('#hamburger-icon').on('click', function(){
    $('#hamburger-icon').toggleClass('active');
    $('.menu').toggleClass('main-nav-mobile');
    $('.menu ul').toggleClass('opened-nav-animate');
    $('.menu ul').toggleClass('nav_item');
    setTimeout(function(){$('.menu ul').toggleClass('opened-nav');},100)
  });

  $('.grover').on('click',function(e){
    e.stopPropagation();
    e.preventDefault();
    if ($(this).children('i').hasClass('touchspin-down'))
    {
      $(this).children('i').removeClass('touchspin-down');
      $(this).children('i').addClass('touchspin-up');
    }
    else
    {
      $(this).children('i').removeClass('touchspin-up');
      $(this).children('i').addClass('touchspin-down');
    }
    $(this).closest('li').toggleClass('active-menu-item');
    $(this).closest('li').children('.nav_pop').slideToggle();
  });
}

new WOW().init();
