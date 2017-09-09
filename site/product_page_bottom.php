
<div class="page_menu">
  <div><a class="page_nav" href="#howto"><?= $DICT['how_to_use']?></a></div>
  <div><a class="page_nav" href="#gallery"><?= $DICT['gallery']?></a></div>
  <div><a class="page_nav" href="#faq"><?= $DICT['freq']?></a></div>
  <div><a class="page_nav" href="#msds"><?= $DICT['msds']?></a></div>
  <div><a class="madeinisrael"><?= $DICT['madeinisrael']?></a></div>
  <div><a class="natural"><?= $DICT['100natural']?></a></div>
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
    } ?>
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
  <h2><?= $DICT['msds']?></h2>
    <ul class="other_point">
      <?php
        $points = explode(' @@ ', $row['msdspoints']);

        foreach ($points as $p) {
          echo '<li>'.$p.'</li>';
        }
      ?>
    </ul>

  <?=$row['msdstext']?>
</div>