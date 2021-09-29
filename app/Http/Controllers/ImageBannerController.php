<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Image;

class ImageBannerController extends Controller
{   
    public function imageUploadPost($imgOpt, $fileName)
    {
        $imageSizes = array(0=> array('w' => 172, 'h' => 32, 'f' => 172),
                                array('w' => 1350, 'h' => 250, 'f' => 1350)
            );

        foreach ($imageSizes as $key){
            $w = $key['w'];
            $h = $key['h'];
            $f = $key['f'];

            $mode = 'fit';
            if ($w <= 1 || $w >= 1500) $w = 100;
            if ($h <= 1 || $h >= 1500) $h = 100;

            $name = $imgOpt['image']["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $filename = pathinfo($imgOpt['image']['name'], PATHINFO_FILENAME);
            if (isset($imgOpt['image'])){   
                if($ext=='png'){
                    $src = imagecreatefrompng($imgOpt['image']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/home/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else if($ext=='jpg' || $ext=='jpeg'){
                    $src = imagecreatefromjpeg($imgOpt['image']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/home/$f/$fileName";
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file,90);
                }else if($ext=='gif'){
                    $src = imagecreatefromgif($imgOpt['image']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/home/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else{
                    echo 'unknown format';
                }
            }
        }
    }

    public function scale_image($src_image, $dst_image, $op = 'fit')
    {
        $src_width = imagesx($src_image);
        $src_height = imagesy($src_image);
        $dst_width = imagesx($dst_image);
        $dst_height = imagesy($dst_image);
        $new_width = $dst_width;
        $new_height = round($new_width*($src_height/$src_width));
        $new_x = 0;
        $new_y = round(($dst_height-$new_height)/2);

        if ($op =='fill')
            $next = $new_height < $dst_height;
        else
            $next = $new_height > $dst_height;

        if ($next) {
            $new_height = $dst_height;
            $new_width = round($new_height*($src_width/$src_height));
            $new_x = round(($dst_width - $new_width)/2);
            $new_y = 0;
        }
        imagecopyresampled($dst_image, $src_image , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
    }
}
