<div class="main" id="gallery">
<?php
	$images = explode(',', $row['images']);
	$titles = explode('^^^', $row['images_titles']);
	$subtitles = explode('^^^', $row['images_subtitles']);
	$videos = explode(',', $row['images_videos']);
	foreach ($images as $k => $img) {
	  if ($img) { ?>
		<div class="gallery-img prodgal" style="background-image: url('<?=$img?>')" onclick="choosePic('<?=trim($img)?>', <?=isset($titles[$k]) ? "'".trim(str_replace("'", "\\'", $titles[$k]))."'" : 'null' ?>, <?=isset($subtitles[$k]) ? "'".trim(str_replace("'", "\\'", $subtitles[$k]))."'" : 'null' ?>, <?=isset($videos[$k]) ? "'".trim($videos[$k])."'" : 'null' ?>)">
		  <div class="fader"><b><?=isset($titles[$k]) ? $titles[$k] : '' ?></b><br><?=isset($subtitles[$k]) ? $subtitles[$k] :'' ?></div>
		  <?php if (isset($videos[$k])) { ?><div class="videomark">VIDEO</div><?php } ?>
		</div>
	  <?php
	  }
	}
	include('disqus.php');
?>
</div>

<div id="blackend">
  <div class="close" onclick="closePic()">&times;</div>
  <img id="the-pic" class="hidden" />
  <iframe id="the-video" width="560" height="315" frameborder="0" allowfullscreen class="hidden"></iframe>
  <div id="the-pic-description">
	<div id="the-pic-title"></div>
	<div id="the-pic-subtitle"></div>
  </div>
</div>

