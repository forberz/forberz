
var price_timeout = null;
var showPrice = function(id) {
	
	if (price_timeout) {
		clearTimeout(price_timeout);
	}
	
	price_timeout = setTimeout(function() {
		if (document.getElementById('item_quantity_' + id).value < parseInt(document.getElementById('item_quantity_' + id).getAttribute('min'))) {
			if (document.getElementById('item_quantity_' + id).value < 0) {
				document.getElementById('item_quantity_' + id).value = 0;
			} else {
				document.getElementById('item_quantity_' + id).value = parseInt(document.getElementById('item_quantity_' + id).getAttribute('min'));
			}
		}
		
		if (document.getElementById('item_total_show_price')) {
			document.getElementById('item_total_price_' + id).value = parseInt(document.getElementById('item_price_' + id).value);
			document.getElementById('item_total_quantity_' + id).value = parseInt(document.getElementById('item_quantity_' + id).value);
			
			var total = 0;
			
			for (var j = document.querySelectorAll('[data-total-name]').length; j>0; j--) {
				total += parseInt(document.getElementsByName('amount_' + j)[0].value) * parseInt(document.getElementsByName('quantity_' + j)[0].value);
			}
			
			document.getElementById('item_total_show_price').innerHTML = total;
		}
		
		document.getElementById('item_show_price_' + id).innerHTML = 
			parseInt(document.getElementById('item_price_' + id).value) * parseInt(document.getElementById('item_quantity_' + id).value);
	}, 800);
};

var setPrice = function(e, val, id) {
	e.preventDefault();
	document.getElementById('item_price_' + id).value = val;
	showPrice(id);
};

var choosePic = function(src, title, subtitle, video) {
	if (video) {
		document.getElementById('the-video').src = video;
		document.getElementById('the-video').removeAttribute('class');
	} else {
		document.getElementById('the-pic').src = '/watermark.php?src=' + src;
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

/** CART */

var CART = JSON.parse(localStorage.getItem('cart') || '{}');

var removeItem = function(id) {
	var el = document.getElementById('cart_item_' + id),
		form_item_name = document.getElementById('item_total_name_' + id),
		form_item_price = document.getElementById('item_total_price_' + id),
		form_item_quantity = document.getElementById('item_total_quantity_' + id),
		idx = parseInt(form_item_name.getAttribute('data-total-name')),
		indeces = document.querySelectorAll('[data-total-name]').length,
		tmp;
	
	console.log(idx, indeces);
	
	el.parentNode.removeChild(el);
	form_item_name.parentNode.removeChild(form_item_name);
	form_item_price.parentNode.removeChild(form_item_price);
	form_item_quantity.parentNode.removeChild(form_item_quantity);
	
	for (var i=idx; i<indeces; ++i) {
		document.getElementsByName('item_name_' + (i+1))[0].setAttribute('data-total-name', i);
		document.getElementsByName('item_name_' + (i+1))[0].setAttribute('name', 'item_name_' + i);
		document.getElementsByName('amount_' + (i+1))[0].setAttribute('name', 'amount_' + i);
		document.getElementsByName('quantity_' + (i+1))[0].setAttribute('name', 'quantity_' + i);
	}
	
	var items = document.getElementsByName('item_name_1');
	
	if (items.length) {
		remove_from_cart(id);
		showPrice(id);
	} else {
		el = document.getElementById('rideeffect');
		el.parentNode.removeChild(el);
	}
};

var save_cart = function() {
	localStorage.setItem('cart', JSON.stringify(CART));
};

var add_to_cart = function(e, id) {
	e.preventDefault();
	
	// if ()
	CART[id] = {
		'id': parseInt(document.querySelector('[data-item-id]').getAttribute('data-item-id')),
		'quantity': parseInt(document.getElementById('item_quantity_' + id).value),
		'size': parseInt(document.querySelectorAll('.sel option')[document.querySelector('.sel').selectedIndex].innerText),
		'price': parseInt(document.querySelector('.sel').value)
	};
	
	var cart_details = [];
	
	for (var i in CART) {
		cart_details.push(CART[i].id + ',' + CART[i].quantity + ',' + CART[i].size + ';');
	}
	
	console.log('>>> ', cart_details);
	
	save_cart();
	
	setTimeout(function() {
		document.location = 'site/cart.php?ids=' + cart_details.join('');
		// document.location = 'cart/' + cart_details.join(';');
	}, 500);
};

var remove_from_cart = function(id) {
	if (!confirm(document.getElementById('yousure').innerText)) {
		return false;
	}
	
	if (CART[id]) {
		delete CART[id];
	}
	
	save_cart();
};

var set_cart_item = function(id, quantity, size, price) {
	
};
