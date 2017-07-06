<div class="buy_rideeffect">
	<h2><?php echo $item['title'] ?></h2>
	<h3><?php echo $item['subtitle'] ?></h3>
	<img class="black_img" src="/img/forberz_ride_effect_120_front.jpg" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" width="250px">
	<p></br><b>- לטיפול בנזקי שמש וסימני פוליש.
	</br>- מראה אחיד ומקורי לאורך זמן.
	</br>- ללא סיליקונים, ללא שומן מן החי, טרפנטין או כימיקלים.
	</br>- יישום קל בעזרת מטלית או מברשת רכה ושליטה מושלמת בכמות החומר.</b>
	</br></br>לשימוש פנים וחוץ. מעולה לשחזור וחידוש תכונות החומר המקוריות כגון צבע, גמישות ורכות. 
	פלסטיקה של רכבים, ג'יפים, טרקטורונים, קטנועים ואופנועים, טמבונים, בתי מראות, פסי קישוט, מדרכות צד, דשבורד ועוד. איננו שומני ואינו מחליק, חודר אל תוך המשטח המטופל ומזין את החומר בלחות. ניתן להסיר בקלות מזכוכית. אינו פוגע או משאיר סימנים בצבע הרכב.
	מומלץ ליישם גם על משטחים חדשים לטיפוח והארכת חיי החומר. 
	</br></br><b>100% טבעי, אינו רעיל, ללא סיליקון, ללא רכיבים מן החי, בטוח לשימוש בחדרי צביעה ומוסכי פחחות.</b></p>
	
	<?php if ($item['price'] > 0) { ?>
	<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="sales@forberz.com">
		<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
		<input type="hidden" name="cpp_payflow_color" value="000039">
		<input type="hidden" name="charset" value="utf-8">
		<input type="hidden" name="currency_code" value="ILS">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="item_name" value="<?php echo $item['title'] ?>">
		<input type="hidden" name="item_number" value="<?php echo $item['product'] ?>">
		<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
		<input type="hidden" name="no_shipping" value="1">
		<input type="hidden" name="amount" value="<?php echo $item['price'] ?>.00">
		<input type="hidden" name="shipping" value="0">
		<span><b><?php echo $item['price'] ?> ש"ח</b></span>
		<input type="submit" value="קנה עכשיו">
		<span>כמות</span>
		<input type="number" name="quantity" value="1" id="quantity" min="1" pattern="[0-9]*">
		<input type="hidden" name="return" value="http://www.forberz.com/#thank-you">
		<!-- <input type="hidden" name="notify_url" value="https://homzit.com/order/paypal"> -->
		<input type="hidden" name="cancel_return" value="http://www.forberz.com/">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" id="buynow">
	</form>
	<?php } else { echo '<div>No val</div>' . $item['title']; } ?>
</div>