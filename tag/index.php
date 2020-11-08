<?php

use ItStep\PHP\Tag;

require_once "autoload.php";

$div = Tag::div();

(new Tag('a'))
    ->appendBody('Google')
    ->href('//google.com')
    ->target('_blank')
    ->appendTo($div);
echo $div
    ->addClass('content')
    ->addClass('container');
