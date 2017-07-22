
var showPrice = function(i) {
	document.getElementById('item_show_price_' + i).innerHTML = 
		parseInt(document.getElementById('item_price_' + i).value) 
		* parseInt(document.getElementById('item_quantity_' + i).value);
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
ga('send', 'pageview');
