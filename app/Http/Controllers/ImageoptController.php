<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Image;

class ImageoptController extends Controller
{   
    public function imageUploadPost($imgOpt, $fileName)
    {
        $imageSizes = array(0=> array('w' => 32, 'h' => 32, 'f' => 32),
                                array('w' => 80, 'h' => 80, 'f' => 80),
                                array('w' => 100, 'h' => 100, 'f' => 100),
                                array('w' => 125, 'h' => 50, 'f' => 125),
                                array('w' => 220, 'h' => 88, 'f' => 220)
            );

        foreach ($imageSizes as $key){
            $w = $key['w'];
            $h = $key['h'];
            $f = $key['f'];

            $mode = 'fit';
            if ($w <= 1 || $w >= 1000) $w = 100;
            if ($h <= 1 || $h >= 1000) $h = 100;

            $name = $imgOpt['image_url']["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $filename = pathinfo($imgOpt['image_url']['name'], PATHINFO_FILENAME);
            if (isset($imgOpt['image_url'])){   
                if($ext=='png'){
                    $src = imagecreatefrompng($imgOpt['image_url']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else if($ext=='jpg' || $ext=='jpeg'){
                    $src = imagecreatefromjpeg($imgOpt['image_url']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName";
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file,90);
                }else if($ext=='gif'){
                    $src = imagecreatefromgif($imgOpt['image_url']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else{
                    echo 'unknown format';
                }
            }
        }
    }

    public function imageUploadPostBanner($imgOpt, $fileName)
    {
        $imageSizes = array(0=> array('w' => 1350, 'h' => 250, 'f' => 1350));

        foreach ($imageSizes as $key){
            $w = $key['w'];
            $h = $key['h'];
            $f = $key['f'];

            $mode = 'fit';
            if ($w <= 1 || $w >= 1400) $w = 100;
            if ($h <= 1 || $h >= 1000) $h = 100;

            $name = $imgOpt['banner']["name"];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $filename = pathinfo($imgOpt['banner']['name'], PATHINFO_FILENAME);
            if (isset($imgOpt['banner'])){   
                if($ext=='png'){
                    $src = imagecreatefrompng($imgOpt['banner']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else if($ext=='jpg' || $ext=='jpeg'){
                    $src = imagecreatefromjpeg($imgOpt['banner']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName";
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file,90);
                }else if($ext=='gif'){
                    $src = imagecreatefromgif($imgOpt['banner']["tmp_name"]);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName"; 
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


    public function imageUploadPostBulk($imgN, $fileName)
    {
        $imageSizes = array(0=> array('w' => 32, 'h' => 32, 'f' => 32),
                                array('w' => 80, 'h' => 80, 'f' => 80),
                                array('w' => 100, 'h' => 100, 'f' => 100),
                                array('w' => 125, 'h' => 50, 'f' => 125),
                                array('w' => 220, 'h' => 88, 'f' => 220)
            );

        foreach ($imageSizes as $key){
            $w = $key['w'];
            $h = $key['h'];
            $f = $key['f'];

            $mode = 'fit';
            if ($w <= 1 || $w >= 1000) $w = 100;
            if ($h <= 1 || $h >= 1000) $h = 100;

            $name = '/home/karthik/Documents/karthik/May0317/download/imgs/'.$imgN;
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $filename = pathinfo('/home/karthik/Documents/karthik/May0317/download/imgs/'.$imgN, PATHINFO_FILENAME);
            if (isset($name)){   
                if($ext=='png'){
                    $src = imagecreatefrompng('/home/karthik/Documents/karthik/May0317/download/imgs/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else if($ext=='jpg' || $ext=='jpeg'){
                    $src = imagecreatefromjpeg('/home/karthik/Documents/karthik/May0317/download/imgs/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName";
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file,90);
                }else if($ext=='gif'){
                    $src = imagecreatefromgif('/home/karthik/Documents/karthik/May0317/download/imgs/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else{
                    echo 'unknown format';
                }
            }
        }
    }


    public function imageUploadPostBulkBanner($imgN, $fileName)
    {
        $imageSizes = array(0=> array('w' => 1350, 'h' => 250, 'f' => 1350));

        foreach ($imageSizes as $key){
            $w = $key['w'];
            $h = $key['h'];
            $f = $key['f'];

            $mode = 'fit';

            if ($w <= 1 || $w >= 1400) $w = 100;
            if ($h <= 1 || $h >= 1000) $h = 100;

            $name = '/home/karthik/Documents/karthik/May1717/download/banners/'.$imgN;
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $filename = pathinfo('/home/karthik/Documents/karthik/May1717/download/banners/'.$imgN, PATHINFO_FILENAME);
            if (isset($name)){   
                if($ext=='png'){
                    $src = imagecreatefrompng('/home/karthik/Documents/karthik/May1717/download/banners/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else if($ext=='jpg' || $ext=='jpeg'){
                    $src = imagecreatefromjpeg('/home/karthik/Documents/karthik/May1717/download/banners/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName";
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file,90);
                }else if($ext=='gif'){
                    $src = imagecreatefromgif('/home/karthik/Documents/karthik/May1717/download/banners/'.$imgN);
                    $dst = imagecreatetruecolor($w, $h);
                    imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
                    $this->scale_image($src, $dst, $mode);
                    $image = $filename.'.jpg';
                    $output_file = "images/banner/store/$f/$fileName"; 
                    Header('Content-Type: image/jpg');
                    imagejpeg($dst,$output_file);
                }else{
                    echo 'unknown format';
                }
            }
        }
    }
}
