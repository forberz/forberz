<?php
include('header.php');
$result = $DB->query("SELECT 
						area_{$LANG} AS area,
						city_{$LANG} AS city,
						name_{$LANG} AS store,
						adress_{$LANG} AS adress,phone 
					FROM `stores` 
					WHERE area_he != 'תת_לא פעיל' AND area_he != 'תת_לא_פעיל' 
					ORDER BY priority");
$prev_area = '';
?>
	<div class="blackback">
	<div class="main">
		<h1><?= $DICT['wherebuy']?></h1>
		<h4 class="grey"><?= $DICT['wherebuy_sub']?></h4>
	</div>
	</div>
	<div class="shops">
		<table class="shops">
			<tr>
				<th><?= $DICT['area']?></th>
				<th><?= $DICT['city']?></th>
				<th><?= $DICT['store_name']?></th>
				<th class="pc"><?= $DICT['adress']?></th>
				<th class="pc"><?= $DICT['phone']?></th>
				<th class="mobile"><?= $DICT['adress']?></th>
				<th class="mobile"><?= $DICT['phone']?></th>
			</tr>
			<?php 
				while ($row = $result->fetch_assoc()) {
					if ($prev_area && $prev_area !== $row['area']) {
						echo '<tr><td bgcolor="black" colspan="5">&nbsp;</td></tr>';
					}
			?>

			<tr>
				<td><?php if ($prev_area !== $row['area']) {
					$prev_area = $row['area'];
					echo $row['area'];
				} ?></td>
				<td><?= $row['city']; ?></td>
				<td><?= $row['store']; ?></td>
				<td class="pc"><?= $row['adress']; ?></td>
				<td class="pc"><?= $row['phone']; ?></td>
				<td class="mobile"><a href="waze://?q=<?= $row['adress'].', '.$row['city']; ?>" target="_blank" rel="nofollow"><?= $row['adress']; ?></a></td>
				<td class="mobile"><a href="tel:<?= $row['phone']; ?>" target="_blank" rel="nofollow"><?= $row['phone']; ?></a></td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
<?php 
include('protreat.php');
include('footer.php');
?>