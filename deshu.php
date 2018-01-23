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
  .dryday{background:url('./dry.png');}
  .lowlight{color:lightgray;}
  #tableheader,#tablelabel{height:1.2em;}
  #today{background:lightgreen;}
</style>
<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">
</head><body>
<h1>DE酒🍻のぉと</h1>
<p>"DEcreasing inSHU" NOTE, 2018</p>
<?php
date_default_timezone_set('Asia/Tokyo');
$datetime = new DateTime();
$month = (int)$datetime->format('n');
$day = (int)$datetime->format('j');
$title = "<table><tr id='tableheader'><th colspan=7>".$datetime->format('F')." ".(int)$datetime->format('Y')."</th></tr>";
echo $title;
echo "<tr id='tablelabel'><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>";
$adjustdate = 1 - (int)$datetime->format('j');
$datetime->modify($adjustdate.' days');
$adjustdate = 0 - (int)$datetime->format('w');
$datetime->modify($adjustdate.' days');
$tablerow = array();
for ($row=0;$row<6;$row++) {
  $tablerow[$row] = "<tr>";
  for ($col=0;$col<7;$col++) {
    if ($datetime->format('n') != $month) {
      $tablerow[$row] = $tablerow[$row]."<td class='lowlight'>".$datetime->format('j')."</td>";
    } else if ($datetime->format('j') == 6 or $datetime->format('j') == 17) {
      $tablerow[$row] = $tablerow[$row]."<td class='dryday'>".$datetime->format('j')."</td>";
    } else if ($datetime->format('j') == $day) {
      $tablerow[$row] = $tablerow[$row]."<td id='today'>".$datetime->format('j')."</td>";
    } else {
      $tablerow[$row] = $tablerow[$row]."<td>".$datetime->format('j')."</td>";
    }
    $datetime->modify('1 days');
  }
  $tablerow[$row] = $tablerow[$row]."</tr>";
echo $tablerow[$row];
}
echo "</table>";
?>
<p>&copy;Takeru-chan,2018</p>
</body></html>
