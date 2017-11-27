<?php
$background_colors = array('#1499bd', '#f7ab19', '#ba0c4a');
$rand_background = $background_colors[array_rand($background_colors)];

$shouts = array('Yes! I doodled it myself at ', 'Look at my doodle! Made it at ', 'Made me a doodle at ');
$rand_shouts = $shouts[array_rand($shouts)];

$nodenum = isset($_GET["afb"]) ? $_GET["afb"] : '';
$nodenum = intval($nodenum);
$xml = simplexml_load_file("doodle/studiomik_doodle.xml");
foreach ($xml as $afbeeldingen) {
    $count = $afbeeldingen->count();
}
$value = (string) $xml->doodles->afbeelding[$nodenum];
if ( $nodenum >= $count ) { $display = "none"; } else { $display = "block"; }
if ($nodenum < 1) { $displayprev = "none"; } else { $displayprev = "block"; }
if ($nodenum == ($count-1)) { $displaynext = "none";} else { $displaynext = "block"; }
$pagenumprev = $nodenum - 1;
$pagenumnext = $nodenum + 1;
$inspiratie = $count-1;
$actual_protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$actual_domain = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$actual_url = $actual_protocol . $actual_domain;
?>
