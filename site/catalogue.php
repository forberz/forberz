<?php
include('header.php');
if (!isset($_GET['id'])) {
	?>
	<div class="main">
		<h1><?= $DICT['cata']?></h1>
		<h4 class="grey"><?= $DICT['cata_sub']?></h4>
		<br>
	</div>
	<?php
}

$DB->query("SET SESSION group_concat_max_len=16000;");

$query = "SELECT 
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
		GROUP_CONCAT(G.img SEPARATOR ',') AS images,
		GROUP_CONCAT(G.title_{$LANG} SEPARATOR '^^^') AS images_titles,
		GROUP_CONCAT(G.subtitle_{$LANG} SEPARATOR '^^^') AS images_subtitles,
		GROUP_CONCAT(G.video SEPARATOR ',') AS images_videos
	FROM `products` AS P 
		LEFT JOIN `gallery` AS G ON (P.id = G.prod_id)
	WHERE active = 1 ".($ID ? " AND P.id = {$ID}" : "")."
	GROUP BY P.id
	ORDER BY priority 
	LIMIT " . ($ID !== false ? 1 : ($LIMIT ? $LIMIT : 100) );

// var_dump($query);

$result = $DB->query($query);

while ($row = $result->fetch_assoc()) {
	?>
	<div class="cat_wrap <?php echo ($row['id'] % 2) === 0 ? 'left' : 'right'; ?> <?= $ID ? 'insider' : '' ?>">
		<div class="product_header">
			<h1><?= $row['title']?></h1>
		</div>
		<div class="product_icons">
			<h4><?=$row['icons']?></h4>
		</div>

		<div class="catdiv" <?= $ID ? '' : 'onclick="document.location=\'catalogue/' . $row['id'] . '\'"' ?>>
			<div class="prod_img_buy <?= $ID ? 'product' : '' ?>">
				<img class="product_eng" src="<?=$row['image']?>" alt="<?=$row['img_alt']?>" />
								
					<form class="payment_btn" id="rideeffect" name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<?php if ($ID) { ?>
				<table class="buy">
					<tr valign="bottom">
						<td>
							<div class="buy_title"><?=$DICT['size']?></div>
						</td>
						<td>
							<select class="sel" onchange="setPrice(this.value, <?=$row['id']?>)">
							<?php
							$prices = explode(',', $row['prices']);
							$sizes = explode(',', $row['sizes']);

							foreach($prices as $k => $p) {
							echo '<option value="'.$p.'">'.$sizes[$k].'</option>';
							}
							?>
							</select>
						</td>
						<td>
							<h1 class="price"><b id="item_show_price_<?=$row['id']?>"><?=$prices[0]?></b></h1><h5 class="curr"><?=$DICT['currency']?></h5>
						</td>
					</tr>
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="sales@forberz.com">
						<input type="hidden" name="cpp_header_image" value="https://i.imgur.com/LYmEIWe.png">
						<input type="hidden" name="cpp_payflow_color" value="000039">
						<input type="hidden" name="charset" value="utf-8">
						<input type="hidden" name="currency_code" value="<?= $LANG === 'he' ? 'ILS' : 'USD' ?>">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" id="item_name_<?=$row['id']?>" 
							value="<?=htmlentities(strip_tags($row['title']).' - '.strip_tags($row['subtitle']))?>">
						<input type="hidden" name="item_number" value="9">
						<!-- <input type="hidden" name="invoice" value="5906270250f"> -->
						<input type="hidden" name="amount" id="item_price_<?=$row['id']?>" value="<?=$prices[0]?>">
						<input type="hidden" name="shipping" value="0">
					<tr>
						<td>	
							<span><?= isset($DICT['ammount']) ? $DICT['ammount'] : $row['ammount'] ?></span>
						</td>
						<td>
							<input type="number" name="quantity" value="1" id="item_quantity_<?=$row['id']?>" min="1" pattern="[0-9]*" 
							onchange="showPrice(<?=$row['id']?>)" oninput="showPrice(<?=$row['id']?>)">
						</td>
						<td></td>
					</tr>
							<input type="hidden" name="return" value="https://www.forberz.com/#thank-you">
							<!-- <input type="hidden" name="notify_url" value="https://homzit.com/order/paypal"> -->
							<input type="hidden" name="cancel_return" value="https://www.forberz.com/">
							<div id="coupon_wrapper">
					<tr>
						<!-- <td></td> -->
						<td colspan="2">
							<input type="text" name="coupon" id="coupon" placeholder="<?= $DICT['coupon']?>" maxlength="8">
						</td>
						<td>
							<div id="coupon_button" onclick="handle_coupon(event, '<?=$row['id']?>')">OK</div>
						</td>
					</tr>
						</div>
						</table>
						<input type="submit" value="<?= $DICT['buybtn']?>">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" border="0" name="submit" 
							alt="PayPal - The safer, easier way to pay online!" id="buynow">

						<span class="buy_info"><?= $DICT['buyshortterm']?></span>
						
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
					</form>
				<?php } ?>
			</div>

			<div class="prod_text_box">
				<h2><?= $row['subtitle']?></h2>
				<ul class="prod_point">
					<?php
						$points = explode(' @@ ', $row['points']);

						foreach ($points as $p) {
							echo '<li>'.$p.'</li>';
						}
					?>
				</ul>

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

					<div class="main" id="faq">
					  <h2><?= $DICT['freq']?></h2>
						<ul class="other_point">
						  <?php
							$points = explode("\n--", $row['faqpoints']);

							foreach ($points as $p) {
							  $qANDa = preg_split("/\r?\n\r?\n/", $p);
							  if (count($qANDa) > 1) {
								echo '<li><b>'.$qANDa[0].'</b><br><i>'.$qANDa[1].'</i></li>';
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

						<br>
						<?= $row['msdstext'] ?>
					</div>
					<br><br>
				<?php 
					} else { 
						echo mb_substr(strip_tags($row['maintext']), 0, 300, 'utf-8') . '...';
						?>
							<div class="buttons_before_prod">
								<a href="catalogue/<?=$row['id']?>" class="cat_nav"><?= $DICT['moreinfo']?></a>
								<a href="catalogue/<?=$row['id']?>" class="cat_nav"><?= $DICT['buybtn']?></a>
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

include('footer.php');
?>
