<?php
include('header.php');
if (!isset($_GET['product'])) {
	?>
	<div class="main">
		<h1><?= $DICT['cata']?></h1>
		<h4 class="grey"><?= $DICT['cata_sub']?></h4>
	</div>
	<?php
}

$result = $DB->query("SELECT id, ". $DB->real_escape_string('prices_'.$LANG) ." AS prices, sizes, image,". $DB->real_escape_string('title_'.$LANG) ." AS title,".$DB->real_escape_string('howtopoints_'.$LANG) ." AS howtopoints,". $DB->real_escape_string('subtitle_'.$LANG) ." AS subtitle,".$DB->real_escape_string('maintext_'.$LANG) ." AS maintext,". $DB->real_escape_string('points_'.$LANG) ." AS points FROM `products` 
".($PRODUCT ? "WHERE id = {$PRODUCT}" : "")." ORDER BY priority LIMIT " . ($PRODUCT !== false ? 1 : $LIMIT ));

// // id
// // title_en
// // subtitle_en
// // points_en
// maintext_en
// howto_en
// faq_en
// sizes
// howtopoints_en
// howtotext_en
// faqpoints_en
// howtotips_en
// msds_en
// msdspoints_en

while ($row = $result->fetch_assoc()) {
	?>
	<div class="cat_wrap <?php echo ($row['id'] % 2) === 0 ? 'left' : 'right'; ?>">
		<div class="product_header">
			<h1><?= $row['title']?></h1>
			<h2><?= $row['subtitle']?></h2>
		</div>

		<div class="product_icons">
			<h4>100% NATURAL ● NO SILICONE ● NO CHEMICALS ● NONTOXIC ● PAINTSHOP SAFE ● RECOMMENDED BY PROFESSIONALS</h4>
		</div>

		<div class="catdiv" <?= $PRODUCT ? '' : 
						'onclick="document.location=\'?product=' . $row['id'] . '\'"' ?>>
			<div class="prod_img_buy <?= $PRODUCT ? 'product' : '' ?>">
				<img class="product_eng" src="<?=$row['image']?>" alt="Forberz Ride Effect 120 gr" />
				<?php if ($PRODUCT) { ?>
					<div class="buy_title"><?=$DICT['pack_size']?></div>
					
					<select class="sel" onchange="setPrice(this.value, <?=$row['id']?>)">
					<?php
						$prices = explode(',', $row['prices']);
						$sizes = explode(',', $row['sizes']);

						foreach($prices as $k => $p) {
							echo '<option value="'.$p.'">'.$sizes[$k].'</option>';
						}
					?>
					</select>
					
					<h4><b id="item_show_price_<?=$row['id']?>"><?=$prices[0]?></b> ש"ח</h4>

					<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="sales@forberz.com">
						<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
						<input type="hidden" name="cpp_payflow_color" value="000039">
						<input type="hidden" name="charset" value="utf-8">
						<input type="hidden" name="currency_code" value="ILS">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" value="Forberz™ Ride Effect 120gr - משחת שחזור, חידוש וטיפוח לפלסטיק וגומי">
						<input type="hidden" name="item_number" value="9">
						<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
						<input type="hidden" name="no_shipping" value="1">
						<input type="hidden" name="amount" id="item_price_<?=$row['id']?>" value="150.00">
						<input type="hidden" name="shipping" value="0">
						<span>כמות</span>
						<input type="number" name="quantity" value="1" id="item_quantity_<?=$row['id']?>" min="1" pattern="[0-9]*" onchange="showPrice(<?=$row['id']?>)">
						<input type="hidden" name="return" value="http://www.forberz.com/#thank-you">
						<!-- <input type="hidden" name="notify_url" value="https://homzit.com/order/paypal"> -->
						<input type="hidden" name="cancel_return" value="http://www.forberz.com/">
						<input type="submit" value="קנה עכשיו">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" id="buynow">
						<span class="buy_info">המחיר כולל משלוח תוך 6 ימי עסקים בדואר רשום באמצעות דואר ישראל ובאחריותם. ניתן לשלם בכל כרטיסי האשראי הקיימים כולל דיירקט וכרטיסים נטענים, באמצעות PayPal מערכת התשלומים הגדולה והבטוחה בעולם.</span>
					</form>
				<?php } else { ?>
					<a href="?product=<?=$row['id']?>" class="cat_nav">More Info</a>
				<?php } ?>
			</div>

			<div class="text_box">
				<ul class="prod_point">
					<?php
						$points = explode(' @@ ', $row['howtopoints']);

						foreach ($points as $p) {
							echo '<li>'.$p.'</li>';
						}
					?>
				</ul>
			
				<?=$row['maintext']?>
			</div>
		</div>
	</div>
	
	<?php
}

if (isset($_GET['product'])) {
	include('product_page_bottom.php');
}

include('footer.php');
?>