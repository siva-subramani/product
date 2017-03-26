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

new WOW().init();

var responsiveflagMenu = false;
var categoryMenu = $('ul.mb-menu');
var mCategoryGrover = $('.mb-contener .cat-title');

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
	categoryMenu = $('ul.mb-menu');
	mCategoryGrover = $('.mb-contener .cat-title');
	//responsiveMenu();
	//$(window).resize(responsiveMenu);

	$('#uhu_counter').one('inview', function (event, visible) {
	   	if (visible == true) {
			$('.counter').countTo();
	    }
	});

	$('#currencies-block-top').topShow({
		min: 200,
		fadeSpeed: 500
	});

	$('#languages-block-top').topShow({
		min: 200,
		fadeSpeed: 500
	});

	$('.top-scroll').topHide({
		min: 200,
		fadeSpeed: 500
	});

	$('.top-scroll').click(function(e) {
		e.preventDefault();
		$.scrollTo(0,700);
	});

	$('#search-icon').on('click', function(){
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

	$('#clear-icon').on('click', function(){
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

// Cookie
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

// check resolution
function responsiveMenu()
{
   if ($(document).width() <= 767  && responsiveflagMenu == false)
	{
		if ($('#header .menu .mobile').length > 0)
		{
			$('#header .menu .umenu').remove();
			mobileInit();
			responsiveflagMenu = true;
		}
		//else
		//	location.reload(true);
	}
	else if ($(document).width() >= 768)
	{
		if ($('#header .menu .umenu').length > 0)
		{
			$('#header .menu .mobile').remove();
			responsiveflagMenu = false;
		}
		//else
		//	location.reload(true);
	}
}

function mobileInit()
{

	mCategoryGrover.on('click', function(e){
		$(this).toggleClass('active');
		$('ul.menu-content').stop().slideToggle('medium');
		return false;
	});

	$('.mb-menu > li > ul').addClass('menu-mobile clearfix').parent().prepend('<span class="grover"></span>');

	$(".mb-menu .grover").on('click', function(e){
		var catSubUl = $(this).next().next('.menu-mobile');
		if (catSubUl.is(':hidden'))
		{
			catSubUl.slideDown();
			$(this).addClass('active');
		}
		else
		{
			catSubUl.slideUp();
			$(this).removeClass('active');
		}
		return false;
	});


	$('.mobile > ul:first > li > a').on('click', function(e){
		var parentOffset = $(this).prev().offset();
	   	var relX = parentOffset.left - e.pageX;
		if ($(this).parent('li').find('ul').length && relX >= 0 && relX <= 20)
		{
			e.preventDefault();
			var mobCatSubUl = $(this).next('.menu-mobile');
			var mobMenuGrover = $(this).prev();
			if (mobCatSubUl.is(':hidden'))
			{
				mobCatSubUl.slideDown();
				mobMenuGrover.addClass('active');
			}
			else
			{
				mobCatSubUl.slideUp();
				mobMenuGrover.removeClass('active');
			}
		}
	});

}
