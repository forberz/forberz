
var price_timeout = null;
var showPrice = function(i) {
	
	if (price_timeout) {
		clearTimeout(price_timeout);
	}
	
	price_timeout = setTimeout(function() {
		if (document.getElementById('item_quantity_' + i).value < parseInt(document.getElementById('item_quantity_' + i).getAttribute('min'))) {
			document.getElementById('item_quantity_' + i).value = parseInt(document.getElementById('item_quantity_' + i).getAttribute('min'));
		}
		
		document.getElementById('item_show_price_' + i).innerHTML = 
			parseInt(document.getElementById('item_price_' + i).value) * parseInt(document.getElementById('item_quantity_' + i).value);
	}, 800);
};

var setPrice = function(val, i) {
	document.getElementById('item_price_' + i).value = val;
	showPrice(i);
};

var choosePic = function(src, title, subtitle, video) {
	if (video) {
		document.getElementById('the-video').src = video;
		document.getElementById('the-video').removeAttribute('class');
	} else {
		document.getElementById('the-pic').src = src;
		document.getElementById('the-pic').removeAttribute('class');

	}
	document.getElementById('the-pic-title').innerHTML = title;
	document.getElementById('the-pic-subtitle').innerHTML = subtitle;
	document.getElementById('blackend').setAttribute('class', 'open');
};

var closePic = function() {
	document.getElementById('blackend').removeAttribute('class');
	document.getElementById('the-video').removeAttribute('src');
	document.getElementById('the-pic').removeAttribute('src');
	document.getElementById('the-video').setAttribute('class', 'hidden');
	document.getElementById('the-pic').setAttribute('class', 'hidden');
};

var slideToItem = function(e) {
	e.preventDefault();
	var top = 0,
		t = $(e.target.getAttribute('href'));

	while ((t = t.prev()) && ~['A', 'DIV', 'UL', 'HEADER'].indexOf(t[0].tagName)) {
		top += t.height();
		if (t[0].tagName === 'HEADER') {
			break;
		}
	}

	$('body').animate({'scrollTop': top}, 800);
};

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-64555452-1', 'auto');
ga('require', 'displayfeatures');
ga('send', 'pageview');


var coupon_timeout = null;
var handle_coupon = function(e, id) {
	e.preventDefault();
	
	var coupon = document.getElementById('coupon').value.trim();
	
	if (coupon_timeout) {
		clearTimeout(coupon_timeout);
		coupon_timeout = null;
	}
	
	$('#special_K').remove();
	$('.sel').removeAttr('disabled');
	 document.getElementById('item_quantity_' + id).setAttribute('min', 1);
	 document.getElementById('item_name_' + id).value = document.getElementById('item_name_' + id).value.replace(/^.{8} \* /, '');
	
	if (coupon.length !== 8) {
		return alert('Error, try again.');
	}
	
	coupon_timeout = setTimeout(function() {
		$.ajax({
			method: 'POST',
			url: 'ajax/get_coupon.php',
			data: { 
				prod_id: id,
				coupon: coupon,
				lang: $('html').attr('lang')
			},
			success: function(response) {
				response = JSON.parse(response);
				if (response && !response.error) {
					console.log(response.price, response.min_quantity);
					
					document.getElementById('item_name_' + id).value = coupon + ' * ' + document.getElementById('item_name_' + id).value;
					document.getElementById('item_price_' + id).value = response.price;
					document.getElementById('item_show_price_' + id).innerHTML = response.price * response.min_quantity;
					
					var item_quantity = document.getElementById('item_quantity_' + id);
					if (parseInt(item_quantity.value) != response.min_quantity) {
						item_quantity.value = response.min_quantity;
						item_quantity.setAttribute('min', response.min_quantity);
					}
					
					$('.sel')
						.prepend('<option value="' + response.price + '" id="special_K">' + response.size + '</option>')
						.val(response.price)
						.attr('disabled', 'disabled');
				} else {
					alert('Wrong code, try again.');
				}
			}
		});
	}, 300);
};

/*var handle_coupon_typing = function(e, id) {
	e.preventDefault();
	
	var coupon = e.target.value.trim();
	
	if (coupon.length === 8) {
		return true;
	}
	
	if ($('#special_K').length) {
		$('#special_K').remove();
		$('.sel').removeAttr('disabled');
		
		var price = $('.sel').val();
		
		document.getElementById('item_price_' + id).value = price;
		document.getElementById('item_show_price_' + id).innerHTML = price;
		document.getElementById('item_quantity_' + id).value = 1;
	}
}*/