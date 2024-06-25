<?php
require '../../../../vendor/autoload.php';
include ('../../connect/connect2db.php');

use ImageKit\ImageKit;

$successFlag = true;

$public_key = "public_/wdBxu3ySG+beAlaniG0PvVJSBQ=";
$private_key = "private_n6ny/gV+4q2XrJxh9zY7+T3BUrI=";
$url_end_point = "https://ik.imagekit.io/5c2ivhy36";

$imageKit = new ImageKit(
    $public_key,
    $private_key,
    $url_end_point
);

function uploadToImageKit($fileName, $fileURL, $imageKit)
{
    $base64Img = base64_encode(file_get_contents($fileURL));
    $uploadResponse = $imageKit->upload([
        "file" => $base64Img,
        "fileName" => $fileName,
    ]);

    if ($uploadResponse->error) {
        return null;
    }
    return $uploadResponse->result->url;
}

if (!empty($_POST['photos'])) {
    foreach ($_POST['photos'] as $index => $photoJSON) {
        $photoObject = json_decode($photoJSON);

        $fileName = $photoObject->fileName;
        $fileURL = $photoObject->fileURL;
        $origurl = $photoObject->origurl;

        $uploadedFileURL = uploadToImageKit($fileName, $origurl, $imageKit);

        if ($uploadedFileURL !== null) {
            $sql = "INSERT INTO cover_photos (CPhoto_Name, CPhoto_Date) VALUES ('$uploadedFileURL', NOW())";
            if ($connect2db->query($sql)) {
            } else {
                $successFlag = false;
                echo 'Error: ' . $connect2db->error;
            }
        }
    }
    if ($successFlag) {
        echo 'Photos added successfully!';
    } else {
        echo 'Error uploading photos.';
    }
} else {
    echo 'Error: No files received!';
}
?>
