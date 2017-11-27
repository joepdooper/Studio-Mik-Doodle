<?php
$data = $_POST['data'];
$data = substr($data,strpos($data,",")+1);
$data = base64_decode($data);
$xml = simplexml_load_file("studiomik_doodle.xml");
$sxe = new SimpleXMLElement($xml->asXML());
foreach ($xml as $afbeeldingen) {
  $count = $afbeeldingen->count();
}
$fp = $count.".png";
file_put_contents($fp, $data);
$image = imagecreatefrompng("postit.png");
$overlay = imagecreatefrompng($fp);
imagealphablending($image, true);
imagesavealpha($image, true);
imagealphablending($overlay, true);
imagesavealpha($overlay, true);
imagecopy($image, $overlay, 20, 20, 0, 0, 438, 438);
imagedestroy($overlay);
imagepng($image, $fp);
$itemsNode = $sxe->doodles[0];
$itemsNode->addChild("afbeelding", $fp);
$sxe->asXML("studiomik_doodle.xml");
echo($count);
?>
