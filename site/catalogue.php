<?php
include('header.php');
/*if (empty($_GET['id'])) {
	?>
	<div class="main">
		<h1><?= $DICT['cata']?></h1>
		<h4 class="grey"><?= $DICT['cata_sub']?></h4>
		<br>
	</div>
	<?php
}*/

$DB->query("SET SESSION group_concat_max_len=16000;");

$query = "SELECT 
		P.id, 
		P.linktxt_{$LANG} AS linktxt,
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
		GROUP_CONCAT(G.img SEPARATOR ',') AS images,
		GROUP_CONCAT(G.title_{$LANG} SEPARATOR '^^^') AS images_titles,
		GROUP_CONCAT(G.subtitle_{$LANG} SEPARATOR '^^^') AS images_subtitles,
		GROUP_CONCAT(G.video SEPARATOR ',') AS images_videos
	FROM `products` AS P 
		LEFT JOIN `gallery` AS G ON (P.id = G.prod_id)
	WHERE active = 1 ". (isset($CART_ITEMS)
		? 'AND P.id IN (' . implode(',', array_keys($CART_ITEMS)) . ')' 
		: ($ID ? " AND \"" . $DB->escape_string($ID) . "\" IN (P.linktxt_en, P.linktxt_he, P.linktxt_ru)" : "")) . "
	GROUP BY P.id
	ORDER BY priority 
	LIMIT " . ($ID !== false ? 1 : ($LIMIT ? $LIMIT : 100) );

// var_dump($query);

$result = $DB->query($query);
$sider = ($LANG === 'he') - 1;

$total_price = 0;

while ($row = $result->fetch_assoc()) {

	$prices = explode(',', $row['prices']);
	$sizes = explode(',', $row['sizes']);
	
	$price_size = array();
	foreach ($sizes as $key => $size) {
		$price_size[preg_replace('/[^0-9]/', '', $size)] = $prices[$key];
	}
	
	if (isset($CART_ITEMS)) {
		$cart_item_id = strval($row['id']);
		
		if (!isset($price_size[$CART_ITEMS[$cart_item_id]['size']])) {
			unset($CART_ITEMS[$cart_item_id]);
			continue;
		}
		
		$CART_ITEMS[$cart_item_id]['name'] = $row['linktxt'];
		$CART_ITEMS[$cart_item_id]['price'] = $price_size[$CART_ITEMS[$cart_item_id]['size']];
		
		$cur_price = intval($CART_ITEMS[$cart_item_id]['price']) * intval($CART_ITEMS[$cart_item_id]['amount']);
		$total_price += $cur_price;
	}
	
	++$sider;
	?>
	<div class="cat_wrap <?php echo ($sider % 2) === 0 ? 'left' : 'right'; ?> <?= $ID ? 'insider' : '' ?>" id="cart_item_<?=$row['linktxt']?>" data-item-id="<?=$row['id']?>">
		<!-- <div class="product_icons">
			<h4><?=$row['icons']?></h4>
		</div> -->
		<?php if (isset($CART_ITEMS)) { ?>
		<div class="catdiv cart">
			<table class="buy cart" style="float: right;">
				<tr valign="top">
					<td colspan="3" align="right" onclick="removeItem('<?=$row['linktxt']?>')">&times;</td>
				</tr>
				<tr valign="bottom">
					<td>
						<div class="buy_title"><?=$DICT['size']?></div>
					</td>
					<td>
						<select class="sel" onchange="setPrice(event, this.value, '<?=$row['linktxt']?>')">
						<?php
							foreach($prices as $k => $p) {
								echo '<option value="'.$p.'"' . (preg_replace('/[^0-9]/', '', $sizes[$k]) == $CART_ITEMS[$cart_item_id]['size'] ? 'SELECTED' : '') . '>'.
									$sizes[$k].
								'</option>';
							}
						?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">
						<h1 class="price">
							<b id="item_show_price_<?=$row['linktxt']?>"><?=$cur_price?></b>
						</h1>
						<h5 class="curr"><?=$DICT['currency']?></h5>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<span><?= isset($DICT['ammount']) ? $DICT['ammount'] : $row['ammount'] ?></span>
					</td>
					<td>
						<input type="number" name="quantity" value="<?=$CART_ITEMS[$cart_item_id]['amount']?>" id="item_quantity_<?=$row['linktxt']?>" min="1" pattern="[0-9]*" 
						onchange="showPrice('<?=$row['linktxt']?>')" oninput="showPrice('<?=$row['linktxt']?>')">
						<input type="hidden" name="amount" id="item_price_<?=$row['linktxt']?>" value="<?=$CART_ITEMS[$cart_item_id]['price']?>">
					</td>
					<td></td>
				</tr>
			</table>
			<?php } ?>
			<div class="prod_img_buy <?= $ID ? 'product' : '' ?>">
				<img class="product_eng" src="<?=$row['image']?>" alt="<?=$row['img_alt']?>" />
								
				<?php if ($ID) { ?>
				<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<table class="buy">
						<tr valign="bottom">
							<td>
								<div class="buy_title"><?=$DICT['size']?></div>
							</td>
							<td>
								<select class="sel" onchange="setPrice(event, this.value, '<?=$row['linktxt']?>')">
								<?php
									foreach($prices as $k => $p) {
										echo '<option value="'.$p.'">'.$sizes[$k].'</option>';
									}
								?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">
								<h1 class="price">
									<b id="item_show_price_<?=$row['linktxt']?>"><?=$prices[0]?></b>
								</h1>
								<h5 class="curr"><?=$DICT['currency']?></h5>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<span><?= isset($DICT['ammount']) ? $DICT['ammount'] : $row['ammount'] ?></span>
							</td>
							<td>
								<input type="number" name="quantity" value="1" id="item_quantity_<?=$row['linktxt']?>" min="1" pattern="[0-9]*" 
								onchange="showPrice('<?=$row['linktxt']?>')" oninput="showPrice('<?=$row['linktxt']?>')">
							</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="text" name="coupon" id="coupon" placeholder="<?= $DICT['coupon']?>" maxlength="8">
							</td>
							<td>
								<div id="coupon_button" onclick="handle_coupon(event, '<?=$row['linktxt']?>')">OK</div>
							</td>
						</tr>
					</table>
					
					<input type="hidden" name="return" value="https://www.forberz.com/#thank-you">
					<!-- <input type="hidden" name="notify_url" value="https://homzit.com/order/paypal"> -->
					<input type="hidden" name="cancel_return" value="https://www.forberz.com/">
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="sales@forberz.com">
					<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
					<input type="hidden" name="cpp_payflow_color" value="000039">
					<input type="hidden" name="charset" value="utf-8">
					<input type="hidden" name="currency_code" value="<?= $LANG === 'he' ? 'ILS' : 'USD' ?>">
					<input type="hidden" name="lc" value="US">
					<input type="hidden" name="item_name" id="item_name_<?=$row['linktxt']?>" 
						value="<?=htmlentities(strip_tags($row['title']).' - '.strip_tags($row['subtitle']))?>">
					<input type="hidden" name="item_number" value="9">
					<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
					<input type="hidden" name="amount" id="item_price_<?=$row['linktxt']?>" value="<?=$prices[0]?>">
					<input type="hidden" name="shipping" value="0">
					<input type="submit" value="<?= $DICT['buybtn']?>">
					<button type="button" onclick="add_to_cart(event, '<?=$row['linktxt']?>')">
						<?= isset($DICT['addtocart']) ? $DICT['addtocart'] : 'Add to cart' ?>
					</button>
					<input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" 
						alt="PayPal - The safer, easier way to pay online!" id="buynow">

					<span class="buy_info"><?= $DICT['buyshortterm']?></span>
					
				</form>
				<?php } ?>
			</div>

			<div class="prod_text_box">
				<h1 class="product"><?= $row['title']?></h1>
				<h2 class="product"><?= $row['subtitle']?></h2>
				<br>
				<!-- <ul class="prod_point">
					<?php
						$points = explode(' @@ ', $row['points']);

						foreach ($points as $p) {
							echo '<li>'.$p.'</li>';
						}
					?>
				</ul> -->

				<?php if ($ID) { ?>
					<div class="product_description">
						<?=$row['maintext']?>
					</div>
					<div class="main" id="howto">
						<h2><?= $DICT['how_to_use']?></h2>
						<ul class="other_point">
						<?php
							$points = explode(' @@ ', $row['howtopoints']);

							foreach ($points as $p) {
								echo '<li>'.$p.'</li>';
							}
						?>
						</ul>

						<?=$row['howtotext']?>
					</div>
					<div class="main">
							<h2><?= $DICT['tips']?></h2>
							<ul class="other_point">
							<?php
								$points = explode(" @@ ", $row['howtotips']);
								
								foreach ($points as $p) {
									echo '<li>'.$p.'</li>';
								}
							?>
							</ul>
						</div>
					<div class="main" id="faq">
					  <h2><?= $DICT['freq']?></h2>
						<ul class="other_point">
						  <?php
							$points = explode("--", $row['faqpoints']);

							foreach ($points as $p) {
							  $qANDa = preg_split("/\r?\n\r?\n/", $p);
							  if (count($qANDa) > 1) {
								echo '<li><b>'.$qANDa[0].'</b><br>'.$qANDa[1].'</li>';
							  } else {
								echo "<li>$p</li>";
							  }
							}
						  ?>
						</ul>
					</div>

					<div class="main" id="msds">
						<h2><?= $DICT['msds'] ?></h2>
						<ul class="other_point">
						<?php
							$points = explode(' @@ ', $row['msdspoints']);

							foreach ($points as $p) {
								echo '<li>'.$p.'</li>';
							}
						?>
						</ul>

						<?= $row['msdstext'] ?>
					</div>
					<br><br>
				<?php 
					} else { 
						echo mb_substr(strip_tags($row['maintext']), 0, 200, 'utf-8') . '...';
						?>
							<div class="buttons_before_prod">
								<br><br>
								<a href="catalogue/<?=$row['linktxt']?>" class="cat_nav"><?= $DICT['moreinfo']?></a>
								<!-- <a href="catalogue/<?=$row['linktxt']?>" class="cat_nav"><?= $DICT['buybtn']?></a> -->
							</div>
						<?php
					} 
				?>
			</div>
		</div>
	</div>
	
	<?php
	if ($ID) {
		include('product_page_bottom.php');
	}
}

if (isset($CART_ITEMS)) {
?>

<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<table class="buy" style="display: table; margin: 0 auto;">
		<tr>
			<td colspan="2" align="center">
				<h1 class="price">
					<b id="item_total_show_price"><?=$total_price?></b>
				</h1>
				<h5 class="curr"><?=$DICT['currency']?></h5>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="text" name="coupon" id="coupon" placeholder="<?= $DICT['coupon']?>" maxlength="8">
			</td>
			<td align="center">
				<div id="coupon_button" onclick="handle_coupon(event, 'total')">OK</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" value="<?= $DICT['buybtn']?>">
			</td>
		</tr>
	</table>
	
	<?php 
	$i = 0;
	foreach ($CART_ITEMS as $cart_item_id => $cart_item) { 
		++$i;
		?>
		<input type="hidden" name="item_name_<?=$i?>" id="item_total_name_<?=$cart_item['name']?>" value="<?=$cart_item['name']?>" data-total-name="<?=$i?>">
		<input type="hidden" name="amount_<?=$i?>" id="item_total_price_<?=$cart_item['name']?>" value="<?=$cart_item['price']?>">
		<input type="hidden" name="quantity_<?=$i?>" id="item_total_quantity_<?=$cart_item['name']?>" value="<?=$cart_item['amount']?>">
	<?php } ?>
	
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="sales@forberz.com">
	<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
	<input type="hidden" name="cpp_payflow_color" value="000039">
	<input type="hidden" name="charset" value="utf-8">
	<input type="hidden" name="currency_code" value="<?= $LANG === 'he' ? 'ILS' : 'USD' ?>">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="item_name" id="item_name_total" 
		value="<?=htmlentities(strip_tags($row['title']).' - '.strip_tags($row['subtitle']))?>">
	<input type="hidden" name="item_number" value="9">
	<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
	<input type="hidden" name="amount" id="item_price_total" value="<?=$prices[0]?>">
	<input type="hidden" name="shipping" value="0">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" 
		alt="PayPal - The safer, easier way to pay online!" id="buynow">
	<input type="hidden" name="return" value="https://www.forberz.com/#thank-you">
	<!-- <input type="hidden" name="notify_url" value="https://homzit.com/order/paypal"> -->
	<input type="hidden" name="cancel_return" value="https://www.forberz.com/">

	<span class="buy_info"><?= $DICT['buyshortterm']?></span>
	
</form>

<div id="yousure" style="display: none"><?=isset($DICT['yousure']) ? $DICT['yousure'] : 'Are you sure ?'?></div>

<?php
}

include('footer.php');
?>
