<?php

const COUNT_OF_PICKS= 5;

function getRandLinks(): array
{
    $images = glob('img/*');
    $arr = [];

    for($i = 0; $i<COUNT_OF_PICKS; $i++) {
        $imgPath = $images[rand(0, count($images) - 1)];

        $arr[$i] = 'http://arxemond.ru/server_for_android/' . $imgPath;
//        $arr[$i] = "5.jpg";
    }

    return $arr;
}

function getRandImg(): String
{
    $images = glob('img/*');
    $str = "";

    for($i = 0; $i<COUNT_OF_PICKS; $i++) {
        $img = 'http://arxemond.ru/server_for_android/' . $images[rand(0, count($images) - 1)];

        $str .= "<img src='{$img}' width='90' height='100'>";
    }

    return $str;
}

$target_dir = "img/";
$uploadfile = $target_dir . basename($_FILES['image']['name']);

file_put_contents("test.txt", json_encode($_FILES), FILE_APPEND);
file_put_contents("test.txt", "\n", FILE_APPEND);
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    $data = ['status' => 'success'];
    $data['result'] = json_encode(getRandLinks());
//    $data['result'] = getRandImg();
    file_put_contents("test.txt","success\n", FILE_APPEND);
} else {
    $data = ['status' => 'failed'];
    file_put_contents("test.txt","failed\n", FILE_APPEND);

}

header('Content-Type: application/json');
header('HTTP/1.1 201 Created');
echo json_encode($data);