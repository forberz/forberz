
<div class="page_menu">
<a class="page_nav" href="#howto"><?= $DICT['how_to_use']?></a>
<a class="page_nav" href="#howto"><?= $DICT['gallery']?></a>
<a class="page_nav" href="#howto"><?= $DICT['freq']?></a>
<a class="page_nav" href="#howto"><?= $DICT['msds']?></a>
<a class="madeinisrael" href="#howto"><?= $DICT['madeinisrael']?></a>
<a class="natural" href="#howto"><?= $DICT['100natural']?></a>
</div>

<div class="main">
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

    <div class="main">
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