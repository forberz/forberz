var storeApp = angular.module('storeApp', ['ngSanitize']);
var main_scope;
var mobileReg = new RegExp("Android|iPhone", "i");
var isMobile = mobileReg.test(navigator.userAgent);

storeApp.controller(
	'StoreCtrl',
	[
		'$scope', '$sce', '$http', '$timeout', '$interval',
		function($scope, $sce, $http, $timeout, $interval) {

			main_scope = $scope;

			$scope.loading = false;

			$scope.getGET = function($name, $default) {
				var reg = new RegExp("(^.*(\\?|&)"+$name+"=)|(((\\?|&).*$)|(#.*$))",'g');
				return document.location.href.indexOf('&'+$name+'=') > -1 || document.location.href.indexOf('?'+$name+'=') > -1
					? document.location.href.replace(reg, '')
					: $default
			};

			$scope.conf = {
				myCustID: null,
				page_type: $scope.getGET('page_type', 'items'),
				isAdmin: $scope.getGET('admin', '') != '',
				isDev: $scope.getGET('dev', '') != '',
				itemID: $scope.getGET('itemID', -1),
				custID: $scope.getGET('custID', ''),
				catID: $scope.getGET('catID', '1'),
				end: false,
				item_title: "",
				item_description: "",
				lang: $scope.getGET('lang', 'en'),
				isMobile: isMobile,
				shipping_price: 19
			};

			$scope.cart = {
				minDeliveryDiscountPrice: 59,
				deliveryPrice: 19,
				sum: 0,
				quantity: 0,
				items: []
			};

			$scope.links = {
				local: $sce.trustAsResourceUrl(document.location.origin+'/'),
				fb: $sce.trustAsResourceUrl('https://facebook.com/')
			};

			$scope.loc_options = null;
			$scope.loc_details = '';

			if ($scope.conf.page_type == 'ThankYou' && !($scope.conf.isAdmin)) {
				$timeout(
					function() {
						document.location = $scope.links.local;
					},
					30000
				);
			}

			$scope.loadCart = function() {
				if (localStorage.getItem('cart')) {
					$scope.cart = JSON.parse(localStorage.getItem('cart'));
					$scope.$apply();
				}
			};

			$scope.init = function() {
				$scope.loadCart();
			};

			$scope.ppl_quantity_change = function(way) {
				if (way == 1) {
					$scope.items[0].q < 999 ? $scope.items[0].q++ : 999;
				} else {
					$scope.items[0].q > 1 ? $scope.items[0].q-- : 1;
				}

				return $scope.items[0].q;
			};

			$scope.ppl_change_delivery = function() {
				return ($scope.items[0].sd = 1-$scope.items[0].sd);
			};

			$scope.cart_quantity_change = function(way, idx) {
				if (way == 1) {
					$scope.cart.items[idx].q < 999 ? $scope.cart.items[idx].q++ : 999;
				} else {
					$scope.cart.items[idx].q > 1 ? $scope.cart.items[idx].q-- : 1;
				}

				$scope.calc_cart_sum();

				localStorage.setItem('cart', JSON.stringify($scope.cart));
			};

			$scope.openCart = function(e) {
                if (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                }

				angular.element(document.getElementsByTagName('body')[0]).append('<div id="blackend"></div>')/*.css({overflow: 'hidden'})*/;
				angular.element(document.getElementById('blackend')).css({'height': getDocHeight() + 'px'});
				angular.element(document.getElementById('cartModal')).removeClass("hidden")
					.css({
						left: ((angular.element(window)[0].innerWidth - angular.element(document.getElementById('cartModal'))[0].offsetWidth)/2 |0)+'px',
						top: ((angular.element(window)[0].innerHeight - angular.element(document.getElementById('cartModal'))[0].offsetHeight)/2 |0)+'px'
					});
				scrollTo(document.getElementsByTagName('body')[0], 0, 250);
				return true;
			};

			$scope.closeCart = function() {
				angular.element(document.getElementById('blackend')).remove();
				angular.element(document.getElementById('cartModal')).addClass("hidden");
		//		angular.element(document.getElementsByTagName('body')[0]).css('overflow', 'auto');
				return true;
			};

			$scope.calc_cart_sum = function() {
				$scope.cart.sum = 0;
				$scope.cart.quantity = 0;
				for (var i in $scope.cart.items) {
					$scope.cart.sum += $scope.cart.items[i].p * $scope.cart.items[i].q;
					$scope.cart.quantity += $scope.cart.items[i].q;
				}

				//if ($scope.cart.sum < $scope.cart.minDeliveryDiscountPrice && $scope.cart.sum > 0) {
					$scope.cart.sum += $scope.cart.deliveryPrice;
				//}
			};

			$scope.add_to_cart = function(item) {
                var i = -1;
                if ($scope.cart.items.filter(function(v, k) { return (v.id == item.id) && (i = k) >= 0; }).length) {
                    $scope.cart.items[i].q += item.q;
                } else {
                    $scope.cart.items.push({id:item.id, p:item.p, q:item.q, t:item.ct});
                }
				$scope.calc_cart_sum();

				localStorage.setItem('cart', JSON.stringify($scope.cart));

				$scope.openCart();
			};

			$scope.remove_from_cart = function(idx) {
				$scope.cart.items.splice(idx, 1);
				$scope.calc_cart_sum();

				localStorage.setItem('cart', JSON.stringify($scope.cart));
			};
		}
	]
);

function scrollTo(element, to, duration) {
	if (duration < 0) return;
	var difference = to - element.scrollTop;
	var perTick = difference / duration * 10;

	setTimeout(function() {
		element.scrollTop = element.scrollTop + perTick;
		if (element.scrollTop == to) return;
		scrollTo(element, to, duration - 10);
	}, 10);
}