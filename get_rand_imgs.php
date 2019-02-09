<?php


function getRandImg(): String
{
    $images = glob('img/*');
    $str = "";

    for($i = 0; $i<10; $i++) {
        $img = $images[rand(0, count($images) - 1)];

        $str .= "<img src='{$img}' width='90' height='100'>";
    }

    return $str;
}

echo getRandImg();



