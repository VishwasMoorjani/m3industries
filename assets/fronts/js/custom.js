

// rang slider
function getVals(){
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "₹" + slide1 + " - ₹" + slide2;
}

window.onload = function(){
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}


// wishlist pop

$(".wishlist-pop").click(function(){
  $("#myalert").show();
  setTimeout(function(){  document.getElementById('myalert').style.display = "none"; },3000);
});


$(".cart-pop").click(function(){
  $("#myalerta").show();
  setTimeout(function(){  document.getElementById('myalerta').style.display = "none"; },3000);
});


// Quantity Input

var QtyInput = (function () {
	var $qtyInputs = $(".qty-input");

	if (!$qtyInputs.length) {
		return;
	}

	var $inputs = $qtyInputs.find(".product-qty");
	var $countBtn = $qtyInputs.find(".qty-count");
	var qtyMin = parseInt($inputs.attr("min"));
	var qtyMax = parseInt($inputs.attr("max"));

	$inputs.change(function () {
		var $this = $(this);
		var $minusBtn = $this.siblings(".qty-count--minus");
		var $addBtn = $this.siblings(".qty-count--add");
		var qty = parseInt($this.val());

		if (isNaN(qty) || qty <= qtyMin) {
			$this.val(qtyMin);
			$minusBtn.attr("disabled", true);
		} else {
			$minusBtn.attr("disabled", false);
			
			if(qty >= qtyMax){
				$this.val(qtyMax);
				$addBtn.attr('disabled', true);
			} else {
				$this.val(qty);
				$addBtn.attr('disabled', false);
			}
		}
	});

	$countBtn.click(function () {
		var operator = this.dataset.action;
		var $this = $(this);
		var $input = $this.siblings(".product-qty");
		var qty = parseInt($input.val());

		if (operator == "add") {
			qty += 1;
			if (qty >= qtyMin + 1) {
				$this.siblings(".qty-count--minus").attr("disabled", false);
			}

			if (qty >= qtyMax) {
				$this.attr("disabled", true);
			}
		} else {
			qty = qty <= qtyMin ? qtyMin : (qty -= 1);
			
			if (qty == qtyMin) {
				$this.attr("disabled", true);
			}

			if (qty < qtyMax) {
				$this.siblings(".qty-count--add").attr("disabled", false);
			}
		}

		$input.val(qty);
	});
})();



// category

$('#category').click(function(){
  $('.ul').toggleClass('active');
});


$('#category').click(function(){
  $('.fa-chevron-down').toggleClass('solid');
});




// search kapopup ki

$(function() {
	$('#search-menu').removeClass('toggled');

	$('#search-icon').click(function(e) {
		e.stopPropagation();
		$('#search-menu').toggleClass('toggled');
		$("#popup-search").focus();
	});
	
	$('#search-menu input').click(function(e) {
		e.stopPropagation();
	});

	$('#search-menu, body').click(function() {
		$('#search-menu').removeClass('toggled');
	});
});


// counter

function inVisible(element) {
    var WindowTop = $(window).scrollTop();
    var WindowBottom = WindowTop + $(window).height();
    var ElementTop = element.offset().top;
    var ElementBottom = ElementTop + element.height();
    if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
      animate(element);
  }
  function animate(element) {
    if (!element.hasClass('ms-animated')) {
      var maxval = element.data('max');
      var html = element.html();
      element.addClass("ms-animated");
      $({
        countNum: element.html()
      }).animate({
        countNum: maxval
      }, {
        duration: 5000,
        easing: 'linear',
        step: function() {
          element.html(Math.floor(this.countNum) + html);
        },
        complete: function() {
          element.html(this.countNum + html);
        }
      });
    }
  
  }
  $(function() {
    $(window).scroll(function() {
      $("h2[data-max]").each(function() {
        inVisible($(this));
      });
    })
  });





// clientslider

$('.slider').owlCarousel({
    loop:'true',
    margin:5,
    smartSpeed:2000,
    // animateOut: 'fadeOut',
    autoplay:'true',
    autoplayTimeout:4000,
    responsiveClass:'true',
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:false,
            loop:true
        }
    }
})

 
  
  // quentety close

// productslider
$('.productslider').owlCarousel({
  loop:'true',
  margin:30,
  smartSpeed:2000,
  autoplay:'true',
  autoplayTimeout:4000,
  responsiveClass:'true',
  responsive:{
      0:{
          items:2,
          nav:false
      },
      600:{
          items:3,
          nav:false
      },
      1000:{
          items:4,
          nav:false,
          loop:true
      }
  }
})



// keepslider
$('.keepslider').owlCarousel({
  loop:'true',
  margin:30,
  smartSpeed:2000,
  autoplay:'true',
  autoplayTimeout:4000,
  responsiveClass:'true',
  responsive:{
      0:{
          items:1,
          nav:false
      },
      600:{
          items:2,
          nav:false
      },
      1000:{
          items:2,
          nav:false,
          loop:true
      }
  }
})

  function plating($name)
  {
      document.getElementById('platings').innerHTML = $name;
      document.getElementById('lastplating').value = $name;
  }

 // quentety
 const plus = document.querySelector(".plus"),
 minus = document.querySelector(".minus"),
 num = document.querySelector(".num");
 
 window.addEventListener("load", ()=> {
 if (localStorage["num"]) {
     num.innerText = localStorage.getItem("num");
 } else {
     let a = "01";
     num.innerText = a;
 }
 });
 
 plus.addEventListener("click", ()=> {
 a = num.innerText;
 a++;
 a = (a < 10) ? "0" + a : a;
 // localStorage.setItem("num", a);
 num.innerText = a;
 // num.innerText = localStorage.getItem("num");
 document.getElementById('hiddenqnt').value = a;
 });
 
 minus.addEventListener("click", ()=> {
 a = num.innerText;
 if (a > 1) {
     a--;
     a = (a < 10) ? "0" + a : a;
     // localStorage.setItem("num", a);
     num.innerText = a;
     document.getElementById('hiddenqnt').value = a;
 }
 });
 
  function incquantity(t = null) {
    var e = parseInt(document.getElementById(t).value);
    (e = isNaN(e) ? 0 : e),
      e++,
      null != t &&
        $.get("./home/updateItemQty", { rowid: t, qty: e }, function (t) {
          "ok" == t
            ? (window.location.href = "./cart")
            : alert("Cart update failed, please try again.");
        });
  }
  function decquantity(t = null) {
    var e = parseInt(document.getElementById(t).value);
    !((e = isNaN(e) ? 0 : e) <= 1) && e--,
      null != t &&
        $.get("./home/updateItemQty", { rowid: t, qty: e }, function (t) {
          "ok" == t
            ? (window.location.href = "./cart")
            : alert("Cart update failed, please try again.");
        });
  }