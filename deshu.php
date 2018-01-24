<!doctype html>
<html lang="ja"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=320px">
<style>
  *{-webkit-touch-callout:none;-webkit-user-select:none;user-select:none;margin:0;padding:0;text-align:center;}
  table{font-family: 'Cormorant Garamond', serif;border-collapse:collapse;margin:auto;}
  td{height:44px;text-align:center;color:black;font-weight:bolder;}
  table,th,td{border:solid 3px #dedede;}
  th,td{width:38px;}
  .dryday{background:url('./images/dry.png');}
  .drinkday{background:url('./images/beer.png');}
  .lowlight{color:lightgray;}
  #tableheader,#tablelabel{height:1.2em;}
  #today{background:url('./images/check.png');}
  #nav{display:flex;justify-content:space-around;align-items:center;}
  #nav a{text-decoration:none;}
</style>
<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
</head><body>
<h1>DE酒🍻のぉと</h1>
<?php
date_default_timezone_set('Asia/Tokyo');
$currDatetime = new Datetime();
$dispDatetime = clone $currDatetime;
$year = $_GET["year"];
$month = $_GET["month"];
if ($year > 1900 and ($month > 0 and $month < 13)) {
  $dispDatetime->setDate($year,$month,1);
}
$prevDatetime = clone $dispDatetime;
$nextDatetime = clone $dispDatetime;
$prevDatetime->modify('-1 months');
$nextDatetime->modify('1 months');
$dispMonth = (int)$dispDatetime->format('n');
echo "<div id='nav'><p><a href='?year=".$prevDatetime->format('Y')."&month=".$prevDatetime->format('n')."'>&#9664;</a></p>";
echo "<p><a href='?year=".$currDatetime->format('Y')."&month=".$currDatetime->format('n')."'>'DEcreasing inSHU' NOTE</a></p>";
echo "<p><a href='?year=".$nextDatetime->format('Y')."&month=".$nextDatetime->format('n')."'>&#9654;</a></p></div>";
echo "<p>".$dispDatetime->format('F')." ".(int)$dispDatetime->format('Y')."</p>";
echo "<table><tr id='tablelabel'><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>";
$adjustdate = 1 - (int)$dispDatetime->format('j');
$dispDatetime->modify($adjustdate.' days');
$adjustdate = 0 - (int)$dispDatetime->format('w');
$dispDatetime->modify($adjustdate.' days');
for ($row = 0;$row < 6;$row++) {
  $tablerow[$row] = "<tr>";
  for ($col = 0;$col < 7;$col++) {
    if ($dispDatetime->format('n') != $dispMonth) {
      $tablerow[$row] = $tablerow[$row]."<td class='lowlight'>".$dispDatetime->format('j')."</td>";
    } else {
      if ($dispDatetime > $currDatetime) {
        $tablerow[$row] = $tablerow[$row]."<td>".$dispDatetime->format('j')."</td>";
      } else if ($dispDatetime == $currDatetime) {
        $tablerow[$row] = $tablerow[$row]."<td id='today'>".$dispDatetime->format('j')."</td>";
      } else {
        if ($dispDatetime->format('j') == 6 or $dispDatetime->format('j') == 17) {
          $tablerow[$row] = $tablerow[$row]."<td class='dryday'>".$dispDatetime->format('j')."</td>";
        } else {
          $tablerow[$row] = $tablerow[$row]."<td class='drinkday'>".$dispDatetime->format('j')."</td>";
        }
      }
    }
    $dispDatetime->modify('1 days');
  }
  $tablerow[$row] = $tablerow[$row]."</tr>";
  echo $tablerow[$row];
}
echo "</table>";
?>
<p>&copy;Takeru-chan,2018</p>
</body></html>
