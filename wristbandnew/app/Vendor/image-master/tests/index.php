<?php

// include composer autoload
require '../vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'gd'));

// to finally create image instances
$image = $manager->make('images/test.jpg')->resize(500, 200);

echo $image;

?>