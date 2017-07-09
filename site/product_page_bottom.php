
<div class="page_menu">
  <a class="page_nav" href="#howto"><?= $DICT['how_to_use']?></a>
  <a class="page_nav" href="#gallery"><?= $DICT['gallery']?></a>
  <a class="page_nav" href="#faq"><?= $DICT['freq']?></a>
  <a class="page_nav" href="#msds"><?= $DICT['msds']?></a>
  <a class="madeinisrael"><?= $DICT['madeinisrael']?></a>
  <a class="natural"><?= $DICT['100natural']?></a>
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
    $titles = explode(',', $row['images_titles']);
    $subtitles = explode(',', $row['images_subtitles']);
    foreach ($images as $k => $img) {
      if ($img) { ?>
        <div class="gallery-img" style="background-image: url('<?=$img?>')" onclick="choosePic('<?=$img?>', '<?=str_replace("'", "\\'", $titles[$k])?>', '<?=str_replace("'", "\\'", $subtitles[$k])?>')">
          <div class="fader"><b><?=$titles[$k]?></b><br><?=$subtitles[$k]?></div>
        </div>
      <?php
      }
    } ?>
</div>

<div id="blackend">
  <div class="close" onclick="closePic()">&times;</div>
  <img id="the-pic" />
  <div id="the-pic-title"></div>
  <div id="the-pic-subtitle"></div>
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