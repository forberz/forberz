<div class="footer_main">
			<div class="footer_flex">
				<div class="footer_info">
					<img class="footer_logo" src="/img/forberz.png" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes">
				</div>
				<div class="footer_contact">
					<table class="foot_cont_rtl">
						<tr>
							<th><h2><?= $DICT['forberz']?></h2></th>
						</tr>
						<tr>
							<td><h4 class="grey"><?= $DICT['adress']?></h4></td>
							<td colspan="2"><h4><?= $DICT['adresss']?></h4></td>
						</tr>
						<tr>
							<td><h4 class="grey"><?= $DICT['phone']?></h4></td>
							<td class="mobile"><h4><a href="tel:072-2482228" target="_blank"><?= $DICT['phones']?></a></h4></td>
							<td class="pc"><h4><?= $DICT['phones']?></h4></td>
						</tr>
						<tr>
							<td><h4 class="grey"><?= $DICT['mail']?></h4></td>
							<td colspan="2"><h4><a href="mailto:sales@forberz.com?subject=Forberz+Online+Contact+-+No.+5<?php 
								echo str_pad((string)rand(12323, 99997), 5, "0"). strtoupper($LANG); 
							?>" target="_blank">sales@forberz.com</a></h4></td>
						</tr>
					</table>
					
				</div>
				<ul class="footer_menu">
					<li class="foot_li"><a href="/"><?= $DICT['main']?></a></li>
					<li><a href="/site/about_forberz.php"><?= $DICT['about_forberz']?></a></li>
					<li><a href="/site/shops.php"><?= $DICT['wherebuy']?></a></li>
					<li><a href="/site/affiliate.php"><?= $DICT['affiliate']?></a></li>
					<li><a href="/site/jobs.php"><?= $DICT['jobs']?></a></li>
					<li><a href="/site/contact.php"><?= $DICT['contact']?></a></li>
				</ul>
				<ul class="footer_menu">
					<li class="foot_li"><a href="/site/guide.php"><?= $DICT['guide']?></a></li>	
					<?php
						$result = $DB->query("SELECT id, footer_{$LANG} AS title
							FROM `guide` ORDER BY id LIMIT 5");

						while ($row = $result->fetch_assoc()) {
							echo '<li><a href="/site/guide.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
						}
					?>
				</ul>
				<ul class="footer_menu">
					<li class="foot_li"><a href="/site/catalogue.php?limit=5"><?= $DICT['cata']?></a></li>
					<?php
						$result = $DB->query("SELECT id, footer_{$LANG} AS title
							FROM `products` ORDER BY id LIMIT 5");

						while ($row = $result->fetch_assoc()) {
							echo '<li><a href="/site/catalogue.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
		<div class="footer_bottom_back">
		<div class="footer_bottom">
			<p>&copy; <?= $DICT['rights']?> Forberz&trade; <?=date("Y")?></p>
			<p>design by mdnt</p>
		</div>
		</div>
	</body>
</html>