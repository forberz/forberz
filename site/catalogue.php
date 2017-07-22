<?php
include('header.php');
if (!isset($_GET['id'])) {
	?>
	<div class="main">
		<h1><?= $DICT['cata']?></h1>
		<h4 class="grey"><?= $DICT['cata_sub']?></h4>
	</div>
	<?php
}

$result = $DB->query("SELECT 
						P.id, 
						P.title_{$LANG} AS title,
						P.subtitle_{$LANG} AS subtitle,
						P.icons_{$LANG} AS icons,
						P.points_{$LANG} AS points,
						P.maintext_{$LANG} AS maintext,
						P.prices_{$LANG} AS prices,
						P.sizes, image,
						P.img_alt_{$LANG} AS img_alt,
						P.howtopoints_{$LANG} AS howtopoints,
						P.howtotext_{$LANG} AS howtotext,
						P.howtotips_{$LANG} AS howtotips,
						P.faqpoints_{$LANG} AS faqpoints,
						P.msdspoints_{$LANG} AS msdspoints,
						P.msdstext_{$LANG} AS msdstext,
						GROUP_CONCAT(G.img, ',') AS images,
						GROUP_CONCAT(G.title_{$LANG}, ',') AS images_titles,
						GROUP_CONCAT(G.subtitle_{$LANG}, ',') AS images_subtitles,
						GROUP_CONCAT(G.video, ',') AS images_videos
					FROM `products` AS P 
						LEFT JOIN `gallery` AS G ON (P.id = G.prod_id)
					".($ID ? "WHERE P.id = {$ID}" : "")."
					GROUP BY P.id
					ORDER BY priority 
					LIMIT " . ($ID !== false ? 1 : ($LIMIT ? $LIMIT : 100) ));

while ($row = $result->fetch_assoc()) {
	?>
	<div class="cat_wrap <?php echo ($row['id'] % 2) === 0 ? 'left' : 'right'; ?>">
		<div class="product_header">
			<h1><?= $row['title']?></h1>
			<h2><?= $row['subtitle']?></h2>
		</div>

		<div class="product_icons">
			<h4><?=$row['icons']?></h4>
		</div>

		<div class="catdiv" <?= $ID ? '' : 
						'onclick="document.location=\'?id=' . $row['id'] . '\'"' ?>>
			<div class="prod_img_buy <?= $ID ? 'product' : '' ?>">
				<img class="product_eng" src="<?=$row['image']?>" alt="<?=$row['img_alt']?>" />
				<?php if ($ID) { ?>
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
					
					<h4><b id="item_show_price_<?=$row['id']?>"><?=$prices[0]?></b> <?=$DICT['currency']?></h4>

					<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="sales@forberz.com">
						<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
						<input type="hidden" name="cpp_payflow_color" value="000039">
						<input type="hidden" name="charset" value="utf-8">
						<input type="hidden" name="currency_code" value="<?= $LANG === 'he' ? 'ILS' : 'USD' ?>">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" value="<?=htmlentities($row['title'].' - '.$row['subtitle'])?>">
						<input type="hidden" name="item_number" value="9">
						<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
						<input type="hidden" name="no_shipping" value="1">
						<input type="hidden" name="amount" id="item_price_<?=$row['id']?>" value="<?=$prices[0]?>">
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
					<a href="?id=<?=$row['id']?>" class="cat_nav"><?= $DICT['moreinfo']?></a>
				<?php } ?>
			</div>

			<div class="prod_text_box">
				<ul class="prod_point">
					<?php
						$points = explode(' @@ ', $row['points']);

						foreach ($points as $p) {
							echo '<li>'.$p.'</li>';
						}
					?>
				</ul>
			
				<?= $ID ? $row['maintext'] : mb_substr(strip_tags($row['maintext']), 0, 300) . '...'?>
			</div>
		</div>
	</div>
	
	<?php
	if (isset($_GET['id'])) {
		include('product_page_bottom.php');
	}
}

include('footer.php');
?>