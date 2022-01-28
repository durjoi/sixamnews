


let elements = document.getElementsByClassName('featured_banner_sidebar_item');

const myFunction = function() {
    data = this.getAttribute('data');

    let siblings = document.querySelectorAll('.featured_banner_sidebar_item');

    siblings.forEach(function(e) {
        e.classList.remove('feature_sidebar_active');
    })
    this.classList.add('feature_sidebar_active');

    let item = document.getElementById('featured_banner_item-'+data);
    let children = document.querySelectorAll('.featured_banner_content');
    
    children.forEach(function(e) {
        e.classList.remove('show');
    });
    item.classList.add('show');
};

document.querySelector('.featured_banner_content').classList.add('show');
document.querySelector('.featured_banner_sidebar_item').classList.add('feature_sidebar_active');

// Add carousel first item active
document.querySelector('.carousel-item').classList.add('active');

for(let i = 0; i < elements.length; i++) {
    elements[i].addEventListener("click", myFunction);
}

// Filter products based on categories
(function($) {
	$('#category_filter').on('change', function() {
        $.ajax({
          type: 'POST',
          url: '/wp-admin/admin-ajax.php',
          dataType: 'html',
          data: {
            action: 'filter_projects',
            category: this.value,
          },
          success: function(res) {
            $('#ajax-posts').html(res);
          }
        })
      });


      var pageNumber = 0;

      function load_posts(ppp){
        pageNumber++;
        var cat = $('#category_filter').val();
        // 
        var str ='&cat=' + cat +  '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $("#ajax-posts").append($data);
                    $("#more_posts").attr("disabled",false);
                } else{
                    $("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
    
        });
        return false;
    }

    load_posts(9);

    
    
    $("#more_posts").on("click",function(){ // When btn is pressed.
        $("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts(9);
    });

    
    // News Carousle 
    
    var multipleCardCarousel = document.querySelector(
        "#carouselExampleControls"
      );
      if (window.matchMedia("(min-width: 500px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
          interval: 0,
        });
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;
        $(".carousel-control-right").on("click", function () {
          if (scrollPosition < carouselWidth - cardWidth * 2) {
            scrollPosition += cardWidth;
            $("#carouselExampleControls .carousel-inner").animate(
              { scrollLeft: scrollPosition },
              600
            );
          }
        });
        $(".carousel-control-left").on("click", function () {
          if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#carouselExampleControls .carousel-inner").animate(
              { scrollLeft: scrollPosition },
              600
            );
          }
        });
      } else {
        $(multipleCardCarousel).addClass("slide");
      }

      $("#carouselExampleControls").swipe({
        swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
            if (direction == 'left') {
              if (scrollPosition < carouselWidth - cardWidth * 2) {
                scrollPosition += cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                  { scrollLeft: scrollPosition },
                  600
                );
              }
            }
            if (direction == 'right') {
              if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                $("#carouselExampleControls .carousel-inner").animate(
                  { scrollLeft: scrollPosition },
                  600
                );
              }
            }
        },
        allowPageScroll: "vertical" 
    });


    // Submit Newsletter form 
    
    
})(jQuery );

function submitNewsletter(e) {
  e.preventDefault();
  let data = document.querySelector('.subscriber-email').value;
  postNewsletter(data);
}

function footerSignup(e) {
  e.preventDefault();
  let data = document.querySelector('.subscriber-email-footer').value;
  console.log(data);
  postNewsletter(data);

}

function postNewsletter(data) {
  if(!jQuery('.success-newsletter-msg').length && data) {
    jQuery.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'industrydive_email_subscription_fn',
        industrydive_submit_subscription: true,
        subscriber_email: data,
      },
      success: function(res) {
        let responseText = document.createElement('p');
        responseText.classList.add('success-newsletter-msg');
        
        responseText.innerText = res;
        jQuery('.newsletter').append(responseText);
      }
    })
  }
  
}


