# laterate
Killer slug generation &amp; transliteration for Laravel 5.

composer require postfriday\latterate

Install

Add to config/app.php

'providers' section

Postfriday\Latterate\LatterateServiceProvider::class,

'Aliases' section:

'Latterate' => Postfriday\Latterate\Facades\Latterate::class,

Use

use Latterate;

$slug = Latterate::transform($title);
