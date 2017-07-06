<?php
include('header.php');
$result = $DB->query("SELECT ". $DB->real_escape_string('area_'.$LANG) ." AS area,". $DB->real_escape_string('city_'.$LANG) ." AS city,". $DB->real_escape_string('name_'.$LANG) ." AS store,". $DB->real_escape_string('adress_'.$LANG) ." AS adress,phone FROM `stores` 
WHERE area_he != 'תת_לא פעיל' AND area_he != 'תת_לא_פעיל' ORDER BY priority");
$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['wherebuy']?></h1>
		<h4 class="grey"><?= $DICT['wherebuy_sub']?></h4>
	</div>
	<div class="main">
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
			?>
			<tr>
				<td><?php if ($prev_area !== $row['area']) {
					$prev_area = $row['area'];
					echo $row['area'];
				} ?></td>
				<td><?php echo $row['city']; ?></td>
				<td><?php echo $row['store']; ?></td>
				<td class="pc"><?php echo $row['adress']; ?></td>
				<td class="pc"><?php echo $row['phone']; ?></td>
				<td class="mobile"><a href="waze://?q=<?php echo $row['adress']; ?>" target="_blank" rel="nofollow"><?php echo $row['adress']; ?></a></td>
				<td class="mobile"><a href="tel:<?php echo $row['phone']; ?>" target="_blank" rel="nofollow"><?php echo $row['phone']; ?></a></td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>

<?php 
include('footer.php');
?>