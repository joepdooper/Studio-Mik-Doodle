# Studio Mik Doodle

Draw online on a post-it and share your drawings on social media with Studio Mik Doodle! Works _out-of-the-box_.

[Download](https://github.com/joepdooper/Studio-Mik-Doodle/archive/master.zip) or `git clone http://github.com/joepdooper/Studio-Mik-Doodle.git`

#### Example

* http://www.studiomik.nl/index.php?mik=doodle
* http://www.studiomik.nl/doodle.php?afb=4

## Built With

* [Sketch.js](http://www.jqueryscript.net/demo/Canvas-Based-Drawing-Plugin-with-jQuery-Sketch/) - Canvas Based Drawing Plugin with jQuery.

## How it works

#### Share the image
Pressing a button to share your HTML5 `<canvas>` drawing will trigger the function [saveViaAJAX](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/script.php). The function shares a link with social media and activates [doodle/CanvasSave.php](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle/CanvasSave.php).
```javascript
function saveViaAJAX(clicked_id) {…}
```

#### Save the image
In [doodle/CanvasSave.php](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle/CanvasSave.php) the data from the HTML5 `<canvas>` is named/numbered according to [doodle/studiomik_doodle.xml](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle/studiomik_doodle.xml) …
```php
$xml = simplexml_load_file("studiomik_doodle.xml");
$sxe = new SimpleXMLElement($xml->asXML());
foreach ($xml as $afbeeldingen) {
  $count = $afbeeldingen->count();
}
$fp = $count.".png";
```
```php
file_put_contents($fp, $data);
```

… while the illustrated data is merged with [doodle/postit.png](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle/postit.png) – to make it look like it is drawn on a post-it – and saved as one image …
```php
$image = imagecreatefrompng("postit.png");
$overlay = imagecreatefrompng($fp);
imagealphablending($image, true);
imagesavealpha($image, true);
imagealphablending($overlay, true);
imagesavealpha($overlay, true);
imagecopy($image, $overlay, 20, 20, 0, 0, 438, 438);
imagedestroy($overlay);
imagepng($image, $fp);
```

… and [doodle/studiomik_doodle.xml](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle/studiomik_doodle.xml) gets updated.
```php
$itemsNode = $sxe->doodles[0];
$itemsNode->addChild("afbeelding", $fp);
$sxe->asXML("studiomik_doodle.xml");
```

#### Show the image
[doodle.php](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/doodle.php) is the page that shows your saved image and it includes [variable.php](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/variable.php).

The URL created with the function [saveViaAJAX](https://github.com/joepdooper/Studio-Mik-Doodle/blob/master/script.php) contains parameter `afb`. For instance [doodle.php?afb=4](http://www.studiomik.nl/doodle.php?afb=4).

```php
$nodenum = isset($_GET["afb"]) ? $_GET["afb"] : '';
$nodenum = intval($nodenum);
$xml = simplexml_load_file("doodle/studiomik_doodle.xml");
$value = (string) $xml->doodles->afbeelding[$nodenum];
```
```html
<img class="doodle" src="doodle/<?php echo $value ?>" alt="Studio MIK Doodle" style="display:<?php echo $display ?>;" />
```

## Authors

* **Joep Dooper** - [Joep](https://github.com/joepdooper)

## License

All images are copyright of Maikel Verkoelen at [Studio Mik](http://www.studiomik.nl).
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgements

Coming up…
