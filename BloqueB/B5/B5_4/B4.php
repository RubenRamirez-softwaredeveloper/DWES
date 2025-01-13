<?php
// Texto con caracteres en varios idiomas
$text = 'Total: £444, 数字: 四百四十四, 合計: 四四四, 合計: よんひゃくよんじゅうよん';
?>
<?php include 'includes/header.php'; ?>

<p>
  <b>Texto original:</b> <?= $text ?><br><br>

  <b>Character count using <code>strlen()</code>:</b>
  <?= strlen($text) ?><br>
  <b>Character count using <code>mb_strlen()</code>:</b>
  <?= mb_strlen($text) ?><br>
  <b>First match of "四四四" using <code>strpos()</code>:</b>
  <?= strpos($text, '四四四') ?><br>
  <b>First match of "四四四" using <code>mb_strpos()</code>:</b>
  <?= mb_strpos($text, '四四四') ?><br>
</p>

<?php include 'includes/footer.php'; ?>
