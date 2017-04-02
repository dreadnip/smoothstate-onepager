$(document).ready(function () {

/* ==================================================================
    global variables
================================================================== */

var $body = $('body'),
$main = $('#main'),
$site = $('html, body'),
transition = 'fade',
smoothState;

project_images = [];
index = 0;

/* ==================================================================
    smoothstate - global - page transitions
================================================================== */

smoothState = $main.smoothState({
    onBefore: function($anchor, $container) {
        var current = $('[data-viewport]').first().data('viewport'),
        target = $anchor.data('target');
        current = current ? current : 0;
        target = target ? target : 0;
        if (current === target) {
            transition = 'fade';
        } else if (current < target) {
            transition = 'moveright';
        } else {
            transition = 'moveleft';
        }

        if(target >= 1){
            load_img(target);
        }
    },
    onStart: {
        duration: 400,
        render: function (url, $container) {
            $main.attr('data-transition', transition);
            $main.addClass('is-exiting');
            $site.animate({scrollTop: 0});
        }
    },
    onReady: {
        duration: 0,
        render: function ($container, $newContent) {
            $container.html($newContent);
            $container.removeClass('is-exiting');
            adjust_buttons();
        }
    },
}).data('smoothState');

/* ==================================================================
    project page - hide/display the project text and the appropriate
    buttons when the 'txt' is clicked 
================================================================== */

$('body').on('click', '.btn-txt', function(e) {
    e.preventDefault();
    var img_width = $('.project_img').width();
    $('.project_img').hide();
    $('.btn-txt').hide();
    $('.img_counter').hide();

    $('.project_text').width(img_width);
    $('.button_container').width(img_width);
    
    $('.project_text').show();
    $('.btn-img').show();
});

$('body').on('click', '.btn-img', function(e) {
    e.preventDefault();
    $('.project_img').show();
    $('.btn-txt').show();
    $('.img_counter').show();

    $('.project_text').hide();
    $('.btn-img').hide();
});

/* ==================================================================
    project page - changes the src of the main img based on it's 
    index after a click
================================================================== */

$('body').on('click', '.project_img', function(e) {
    index++;
    if(index >= project_images.length) {
      index = 0;
  }

  var img_url = project_images[index];
  replace_img($('.project_img'), img_url);
});

function replace_img(oldImage, newSrc) {
    var img = new Image();
    img.className = "project_img";

    img.onload = function() {
        var parent = oldImage.parent();
        parent.find('.project_img').remove();
        parent.append(img);
        adjust_buttons();
        $('.img_counter').text((index+1)+'/'+project_images.length);
    };
    img.src = newSrc;
}

/* ======================================================================
    load_img - project pages - grabs the images for the active project
====================================================================== */

function load_img(id) {
    var baseurl = window.location.origin+"/personal/bdh_new/";

    $.ajax({
        type: "POST",
        url: "../api/",
        data: {
            project_id: id
        },
        dataType: 'JSON'
    }).done(function(images) {
      project_images = images;
      index = 0;
  });
}

/* ======================================================================
    home_slideshow - home page - mobile slideshow
====================================================================== */

s_index = 0;

function home_slideshow(images) {
    var img = images[s_index];

    $('.center img').fadeOut(500, function() {
      $('.center img').attr("src", img);
      $('.center img').fadeIn(500);
    });

    s_index++;
    if(s_index >= images.length) {
      s_index = 0;
    }
}

if($(window).width() < 765 && window.location.pathname == "/"){
    var baseurl = window.location.origin+"/";
    $.ajax({
          type: "POST",
          url: "../api/",
          data: {
              slideshow: true
          },
          dataType: 'JSON'
    }).done(function(images) {
        var slideshow_images = images;
        var loop = setInterval(function(){ home_slideshow(slideshow_images) }, 8000);
    });
}else{
    if (typeof timer !== 'undefined') {
        clearInterval(timer);
    }
}

/* ==================================================================
    scroll_to_anchor - bureau page - scrolls to the clicked anchor
================================================================== */

function scroll_to_anchor(aid){
  var target = $("span[id='"+ aid +"']");
  $('.bureau_box').animate({scrollTop: $('.bureau_box').scrollTop() - $('.bureau_box').offset().top + target.offset().top},1000);
}
$('body').on('click', '.subnav a', function(e) {
    e.preventDefault();
    var anchor = $(this).attr('href').slice(1);
    scroll_to_anchor(anchor);
});

/* ==================================================================
    adjust_buttons - project page - adjust the buttons under the img
    after a click, page move, page load, etc..
================================================================== */

function adjust_buttons(){
    var img_width = $('.project_img').width();
    $('.button_container').width(img_width);
}

/* ==================================================================
    initial image load - fetches the images when going directly 
    to a project page
================================================================== */

var initial_target = $('.sceneElement').data('viewport');
adjust_buttons();
load_img(initial_target);
});