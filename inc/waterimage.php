<?php
function imageWaterMark($groundImage,$waterPos=0,$waterImage="",$waterText="qibosoft",$textFont=5,$textColor="#FF0000",$w_alpha="") 
{
	global $webdb;
	$w_alpha || $w_alpha=$webdb[waterAlpha];

	PWImgWaterMark($groundImage,$waterPos,$waterImage,$waterText,$textFont,$textColor,$w_alpha,$w_quality=100,$dstsrc = null);
	return ;

    $isWaterImage = FALSE; 
    $formatMsg = "�ݲ�֧�ָ��ļ���ʽ������ͼƬ���������ͼƬת��ΪGIF��JPG��PNG��ʽ��"; 

    //��ȡˮӡ�ļ� 
    if(!empty($waterImage) && file_exists($waterImage)) 
    { 
        $isWaterImage = TRUE; 
        $water_info = getimagesize($waterImage); 
        $water_w    = $water_info[0];//ȡ��ˮӡͼƬ�Ŀ� 
        $water_h    = $water_info[1];//ȡ��ˮӡͼƬ�ĸ� 

        switch($water_info[2])//ȡ��ˮӡͼƬ�ĸ�ʽ 
        { 
            case 1:$water_im = imagecreatefromgif($waterImage);break; 
            case 2:$water_im = imagecreatefromjpeg($waterImage);break; 
            case 3:$water_im = imagecreatefrompng($waterImage);break; 
            default:die($formatMsg); 
        } 
    } 

    //��ȡ����ͼƬ 
    if(!empty($groundImage) && file_exists($groundImage)) 
    { 
        $ground_info = getimagesize($groundImage); 
        $ground_w    = $ground_info[0];//ȡ�ñ���ͼƬ�Ŀ� 
        $ground_h    = $ground_info[1];//ȡ�ñ���ͼƬ�ĸ� 

        switch($ground_info[2])//ȡ�ñ���ͼƬ�ĸ�ʽ 
        { 
            case 1:$ground_im = imagecreatefromgif($groundImage);break; 
            case 2:$ground_im = imagecreatefromjpeg($groundImage);break; 
            case 3:$ground_im = imagecreatefrompng($groundImage);break; 
            default:die($formatMsg); 
        } 
    } 
    else 
    { 
        die("��Ҫ��ˮӡ��ͼƬ�����ڣ�"); 
    } 

    //ˮӡλ�� 
    if($isWaterImage)//ͼƬˮӡ 
    { 
        $w = $water_w; 
        $h = $water_h; 
        $label = "ͼƬ��"; 
    } 
    else//����ˮӡ 
    { 
        $temp = imagettfbbox(ceil($textFont*2.5),0,"./cour.ttf",$waterText);//ȡ��ʹ�� TrueType ������ı��ķ�Χ 
        $w = $temp[2] - $temp[6]; 
        $h = $temp[3] - $temp[7]; 
        unset($temp); 
        $label = "��������"; 
    } 
    if( ($ground_w<$w) || ($ground_h<$h) ) 
    { 
        //echo "��Ҫ��ˮӡ��ͼƬ�ĳ��Ȼ��ȱ�ˮӡ".$label."��С���޷�����ˮӡ��"; 
        return; 
    } 
    switch($waterPos) 
    { 
        case 0://��� 
            $posX = rand(0,($ground_w - $w)); 
            $posY = rand(0,($ground_h - $h)); 
            break; 
        case 1://1Ϊ���˾��� 
            $posX = 0; 
            $posY = 0; 
            break; 
        case 2://2Ϊ���˾��� 
            $posX = ($ground_w - $w) / 2; 
            $posY = 0; 
            break; 
        case 3://3Ϊ���˾��� 
            $posX = $ground_w - $w; 
            $posY = 0; 
            break; 
        case 4://4Ϊ�в����� 
            $posX = 0; 
            $posY = ($ground_h - $h) / 2; 
            break; 
        case 5://5Ϊ�в����� 
            $posX = ($ground_w - $w) / 2; 
            $posY = ($ground_h - $h) / 2; 
            break; 
        case 6://6Ϊ�в����� 
            $posX = $ground_w - $w; 
            $posY = ($ground_h - $h) / 2; 
            break; 
        case 7://7Ϊ�׶˾��� 
            $posX = 0; 
            $posY = $ground_h - $h; 
            break; 
        case 8://8Ϊ�׶˾��� 
            $posX = ($ground_w - $w) / 2; 
            $posY = $ground_h - $h; 
            break; 
        case 9://9Ϊ�׶˾��� 
            $posX = $ground_w - $w; 
            $posY = $ground_h - $h; 
            break; 
        default://��� 
            $posX = rand(0,($ground_w - $w)); 
            $posY = rand(0,($ground_h - $h)); 
            break;     
    } 

    //�趨ͼ��Ļ�ɫģʽ 
    imagealphablending($ground_im, true); 

    if($isWaterImage)//ͼƬˮӡ 
    {
		
		if(!$w_alpha)
		{
			global $webdb;
			$w_alpha=$webdb[waterAlpha];
		}
		$w_alpha>0 || $w_alpha=100;
        imagecopymerge($ground_im, $water_im, $posX, $posY, 0, 0, $water_w,$water_h,$w_alpha);
    } 
    else//����ˮӡ 
    { 
        if( !empty($textColor) && (strlen($textColor)==7) ) 
        { 
            $R = hexdec(substr($textColor,1,2)); 
            $G = hexdec(substr($textColor,3,2)); 
            $B = hexdec(substr($textColor,5)); 
        } 
        else 
        { 
            die("ˮӡ������ɫ��ʽ����ȷ��"); 
        } 
        imagestring ( $ground_im, $textFont, $posX, $posY, $waterText, imagecolorallocate($ground_im, $R, $G, $B));         
    } 

    //����ˮӡ���ͼƬ //
    @unlink($groundImage); 
	
	if(function_exists("Imagegif")){

		switch($ground_info[2])//ȡ�ñ���ͼƬ�ĸ�ʽ 
		{ 
			case 1:imagegif($ground_im,$groundImage);break; 
			case 2:imagejpeg($ground_im,$groundImage);break; 
			case 3:imagepng($ground_im,$groundImage);break; 
			default:die($errorMsg); 
		} 

	}elseif(function_exists("imagejpeg")){
		imagejpeg($ground_im,$groundImage);
	}else{
		imagepng($ground_im,$groundImage);
	}

    //�ͷ��ڴ� 
    if(isset($water_info)) unset($water_info); 
    if(isset($water_im)) imagedestroy($water_im); 
    unset($ground_info); 
    imagedestroy($ground_im); 
} 

/**
*��ͼƬ��С
**/
function ResizeImage($oldpic,$newpic,$maxwidth=800,$maxheight=600){
	if( eregi('.jpg',$oldpic) ){
		 $im = imagecreatefromjpeg($oldpic);
	}elseif( eregi('.png',$oldpic) ){
		 $im = imagecreatefrompng($oldpic);
	}elseif( eregi('.gif',$oldpic) ){
		$im = imagecreatefromgif($oldpic);
	}else{
		die("ͼƬ��ʽ����$oldpic");
	}
    $width = imagesx($im);
    $height = imagesy($im);
    if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
        if($maxwidth && $width > $maxwidth){
            $widthratio = $maxwidth/$width;
            $RESIZEWIDTH=true;
        }
        if($maxheight && $height > $maxheight){
            $heightratio = $maxheight/$height;
            $RESIZEHEIGHT=true;
        }
        if($RESIZEWIDTH && $RESIZEHEIGHT){
            if($widthratio < $heightratio){
                $ratio = $widthratio;
            }else{
                $ratio = $heightratio;
            }
        }elseif($RESIZEWIDTH){
            $ratio = $widthratio;
        }elseif($RESIZEHEIGHT){
            $ratio = $heightratio;
        }
        $newwidth = $width * $ratio;
        $newheight = $height * $ratio;
        if(function_exists("imagecopyresampled")){
              $newim = imagecreatetruecolor($newwidth, $newheight);
              imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        }else{
            $newim = imagecreate($newwidth, $newheight);
			//imagepstext($newim,'tryr','10','12','000000','000000',0,0,5,5,1,1);
			imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        }
        ImageJpeg ($newim,$newpic);
        ImageDestroy ($newim);
    }else{
        ImageJpeg ($im,$newpic);
    }
	ImageDestroy ($im);
}
//ԭͼ,�������ͼ,����ԭ��X,����ԭ��Y,����ͼ��,����ͼ��,ĩ����X,ĩ����Y,ԭͼ�������,�Ƿ��Զ�ȡֵ
function cutimg($srcimgurl,$endimgurl,$x,$y,$endimg_w,$endimg_h,$border_w,$border_h,$scale=100,$fix=0){
	$path = dirname ($endimgurl);
	if (!is_dir($path)) {
		if(!@mkdir ($path, 0777)){
			showerr("{$path} ��Ŀ¼���ܴ���,�ļ�����ʧ��");
		}
	}
	$ground_info = getimagesize($srcimgurl);
	switch($ground_info[2]){ 
		case 1:$im = imagecreatefromgif($srcimgurl);break; 
		case 2:$im = imagecreatefromjpeg($srcimgurl);break; 
		case 3:$im = imagecreatefrompng($srcimgurl);break; 
		default:die("ͼƬ��ʽ������$srcimgurl"); 
    }
	if($fix){//�����ȡͷ���һ����
		if($ground_info[0]<$ground_info[1]){
			$border_w=$ground_info[0];
			$border_h=$endimg_h*$ground_info[0]/$endimg_w;
		}elseif($ground_info[0]>$ground_info[1]){
			$border_h=$ground_info[1];
			$border_w=$endimg_w*$ground_info[1]/$endimg_h;
		}else{
			$border_w=$ground_info[0];
			$border_h=$ground_info[1];
		}
	}
	$newim = imagecreatetruecolor($endimg_w, $endimg_h);
	$x=($x*100)/$scale;
	$y=($y*100)/$scale;
	$border_width=($border_w*100)/$scale;
	$border_height=($border_h*100)/$scale;
	imagecopyresampled($newim, $im, 0,0, $x,$y, $endimg_w, $endimg_h, $border_width, $border_height );
	if(function_exists("Imagegif")){
		switch($ground_info[2]){ 
			case 1:imagegif($newim,$endimgurl);break;
			case 2:imagejpeg($newim,$endimgurl);break;
			case 3:imagepng($newim,$endimgurl);break;
			default:die("errorMsg"); 
		}
	}elseif(function_exists("imagejpeg")){
		imagejpeg($newim,$endimgurl);
	}else{
		imagepng($newim,$endimgurl);
	}
	ImageDestroy ($newim);
	ImageDestroy ($im);
}

function gdfillcolor($srcFile,$dstFile,$dstW,$dstH){ 
	@ImageAlphaBlending($srcFile, true);
	$picdata = GetImageSize($srcFile); 
	switch ($picdata[2]) { 
		case 1: 
			$im = @ImageCreateFromGIF($srcFile); 
			break; 
		case 2: 
			$im = @imageCreateFromJpeg($srcFile);
			break; 
		case 3: 
			$im = @ImageCreateFromPNG($srcFile); 
			break;
		case 6:
			$im = @ImageCreateFromWbmp($srcFile);
			break;
	}
	$srcW=ImageSX($im); 
	$srcH=ImageSY($im); 
	$dstX=0; 
	$dstY=0; 
	if ($srcW*$dstH>$srcH*$dstW) { 
		$fdstH=round($srcH*$dstW/$srcW);
		$dstY=floor(($dstH-$fdstH)/2);
		$fdstW=$dstW;
	}else{
		$fdstW=round($srcW*$dstH/$srcH);
		$dstX=floor(($dstW-$fdstW)/2);
		$fdstH=$dstH;
	}
	$dstX=($dstX<0)?0:$dstX; 
	$dstY=($dstX<0)?0:$dstY; 
	$dstX=($dstX>($dstW/2))?floor($dstW/2):$dstX; 
	$dstY=($dstY>($dstH/2))?floor($dstH/s):$dstY;


	$ni=imagecreatetruecolor($dstW,$dstH);
	$black = ImageColorAllocate($ni, 255,255,255);
	$white = ImageColorAllocate($ni, 255,255,255);
	imagefilledrectangle($ni,0,0,$dstW,$dstH,$black);// ���ʣ�౳��ɫ
	if(function_exists("imagecopyresampled")){// �ı�ͼƬ��С
		imagecopyresampled($ni,$im,$dstX,$dstY,0,0,$fdstW,$fdstH,$srcW,$srcH);
	}else{
		imagecopyresized($ni, $im, $dstX, $dstY, 0, 0, $fdstW, $fdstH, $srcW, $srcH);
	}
	if(function_exists("Imagegif")){
		Imagegif($ni,$dstFile); // ������ļ�
	}else{
		 ImageJpeg ($ni,$dstFile);
	}
	imagedestroy($im);// �����ڴ�
	imagedestroy($ni);
}
//��֤��
function yzImg($nmsg){
	if (function_exists('imagecreatetruecolor')){
		$imstr[0]["s"]=$nmsg[0];
		$imstr[1]["s"]=$nmsg[1];
		$imstr[2]["s"]=$nmsg[2];
		$imstr[3]["s"]=$nmsg[3];
		$imstr[4]["s"]=$nmsg[4];
		//�ļ�ͷ... 
		header("Content-type: image/png"); 
		//�������ɫ��ֽ 
		$im = @imagecreatetruecolor(65, 20) or die("����ͼ��ʧ��");		//����ͼƬ���
		//��ȡ������ɫ 
		$background_color = imagecolorallocate($im, 255, 255, 255); 
		//��䱳����ɫ(�������������Ͱ) 
		imagefill($im,0,0,$background_color); 
		//��ȡ�߿���ɫ 
		$border_color = imagecolorallocate($im,200,200,200); 
		//�����Σ��߿���ɫ200,200,200 
		imagerectangle($im,0,0,64,19,$border_color); //����ͼƬ���
		//������ҫ������ȫ����1��0 
		for($i=2;$i<28;$i++){ 
		//��ȡ�����ɫ 
		$line_color = imagecolorallocate($im,rand(180,255),rand(180,255),rand(180,255)); 
		//���� 
		imageline($im,2,$i,62,$i,$line_color); //����ͼƬ���
		} 
		//���������С 
		$font_size=12; 
		//����ӡ��ȥ������ 
		$Str[0] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		$Str[1] = "abcdefghijklmnopqrstuvwxyz"; 
		$Str[2] = "01234567891234567890123456"; 
		//��ȡ��1��������� 
		//$imstr[0]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[0]["x"] = rand(2,5); 
		$imstr[0]["y"] = rand(1,4); 
		//��ȡ��2��������� 
		//$imstr[1]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[1]["x"] = $imstr[0]["x"]+$font_size-1+rand(0,1); 
		$imstr[1]["y"] = rand(1,3); 
		//��ȡ��3��������� 
		//$imstr[2]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[2]["x"] = $imstr[1]["x"]+$font_size-1+rand(0,1); 
		$imstr[2]["y"] = rand(1,4); 
		//��ȡ��4��������� 
		//$imstr[3]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[3]["x"] = $imstr[2]["x"]+$font_size-1+rand(0,1); 
		$imstr[3]["y"] = rand(1,3); 
		$imstr[4]["x"] = $imstr[3]["x"]+$font_size-1+rand(0,1); 
		$imstr[4]["y"] = rand(1,3); 
		//д������ִ� 
		for($i=0;$i<strlen($nmsg);$i++){ 
			//��ȡ���������ɫ 
			$text_color = imagecolorallocate($im,rand(80,180),rand(80,180),rand(80,180)); 
			//������ 
			imagechar($im,$font_size,$imstr[$i]["x"],$imstr[$i]["y"],$imstr[$i]["s"],$text_color); 
		} 
		//��ʾͼƬ 
		imagepng($im); 
		//����ͼƬ 
		imagedestroy($im);
		exit;
	} else {
		header("Pragma:no-cache");
		header("Cache-control:no-cache");
		header("ContentType: Image/BMP");

		$Color[0] = chr(0).chr(0).chr(0);
		$Color[1] = chr(255).chr(255).chr(255);
		$_Num[0]  = "1110000111110111101111011110111101001011110100101111010010111101001011110111101111011110111110000111";
		$_Num[1]  = "1111011111110001111111110111111111011111111101111111110111111111011111111101111111110111111100000111";
		$_Num[2]  = "1110000111110111101111011110111111111011111111011111111011111111011111111011111111011110111100000011";
		$_Num[3]  = "1110000111110111101111011110111111110111111100111111111101111111111011110111101111011110111110000111";
		$_Num[4]  = "1111101111111110111111110011111110101111110110111111011011111100000011111110111111111011111111000011";
		$_Num[5]  = "1100000011110111111111011111111101000111110011101111111110111111111011110111101111011110111110000111";
		$_Num[6]  = "1111000111111011101111011111111101111111110100011111001110111101111011110111101111011110111110000111";
		$_Num[7]  = "1100000011110111011111011101111111101111111110111111110111111111011111111101111111110111111111011111";
		$_Num[8]  = "1110000111110111101111011110111101111011111000011111101101111101111011110111101111011110111110000111";
		$_Num[9]  = "1110001111110111011111011110111101111011110111001111100010111111111011111111101111011101111110001111";

		echo chr(66).chr(77).chr(230).chr(4).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(54).chr(0).chr(0).chr(0).chr(40).chr(0).chr(0).chr(0).chr(40).chr(0).chr(0).chr(0).chr(10).chr(0).chr(0).chr(0).chr(1).chr(0);
		echo chr(24).chr(0).chr(0).chr(0).chr(0).chr(0).chr(176).chr(4).chr(0).chr(0).chr(18).chr(11).chr(0).chr(0).chr(18).chr(11).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0);

		for ($i=9;$i>=0;$i--){
				for ($j=0;$j<=3;$j++){
						for ($k=1;$k<=10;$k++){
								echo $Color[substr($_Num[$nmsg[$j]], $i * 10 + $k, 1)];
						}
				}
		}
		exit;
	}
}

function yz2img($ck){
	$im = imagecreate(79,30);
	imagecolorallocate($im,mt_rand(192,255),mt_rand(192,255),mt_rand(192,255));
	$icol = imagecolorallocate($im,mt_rand(0,98),mt_rand(0,98),mt_rand(0,98));
	$scol = imagecolorallocate($im,mt_rand(99,193),mt_rand(99,193),mt_rand(99,193));
	for($i=0; $i < 2; $i++) {
	$linecolor = imagecolorallocate($im, 17, 158, 20);
	$lefty = rand(1, 30-1);
	$righty = rand(1, 30-1);
		imageline($im, 0, $lefty, imagesx($im), $righty, $linecolor);
	}
	for($i=0;$i<strlen($ck);$i++)
		intval($ck{$i}) ? imagettftext($im,16, mt_rand(-10, 10), $i*16, mt_rand(15, 30),$icol, dirname(__FILE__).'/lsansdi.ttf', $ck{$i}) : imagettftext($im,16, mt_rand(-10, 10), $i*16, mt_rand(15, 30),$scol, dirname(__FILE__).'/lsansdi.ttf', $ck{$i}); 
	//imagettftext($im, 16, -5, 12, 22, $scol, 'comic.ttf', $ck);



	for($i=0;$i<78;$i++) imagesetpixel($im,mt_rand(0,65),mt_rand(0,30),imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255)));

	header("Content-type: image/jpeg");
	header("Expires: -1");
	header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0");
	header("Pragma: no-cache");
	imagejpeg($im);
	imagedestroy($im);

}



//power by pw
function PWImgWaterMark($source, $w_pos = 0, $w_img = '', $w_text = '', $w_font = 12, $w_color = '#FF0000', $w_pct, $w_quality, $dstsrc = null) {
	$imgdir=$db_waterfonts='';
	$db_watermark = 1;	//1ͼƬˮӡ,2Ϊ����ˮӡ
	$sourcedb = $waterdb = array();
	if (!($sourcedb = PWGetImgInfo($source))) {
		return false;
	}
	if ($db_watermark == 1 && PWGetImgInfo("$w_img")) {
		$waterdb = PWGetImgInfo("$w_img");
	} elseif ($db_watermark == 2 && $w_text) {
		empty($db_waterfonts) && $db_waterfonts = 'en/PilsenPlakat';
		empty($w_font) && $w_font = 12;
		$fontsfile = "$imgdir/fonts/$db_waterfonts.ttf";
		$temp = imagettfbbox($w_font, 0, $fontsfile, $w_text); //ȡ��ʹ�� TrueType ������ı��ķ�Χ
		$waterdb['width'] = $temp[2] - $temp[6];
		$waterdb['height'] = $temp[3] - $temp[7];
		unset($temp);
	} else {
		return false;
	}
	if ($w_pos == 0) {
		$wX = rand(0, ($sourcedb['width'] - $waterdb['width']));
		$wY = $db_watermark == 1 ? rand(0, ($sourcedb['height'] - $waterdb['height'])) : rand($waterdb['height'], $sourcedb['height']);
	} elseif ($w_pos == 1) {
		$wX = 5;
		$wY = $db_watermark == 1 ? 5 : $waterdb['height'];
	} elseif ($w_pos == 2) {
		$wX = ($sourcedb['width'] - $waterdb['width']) / 2;
		$wY = $db_watermark == 1 ? 5 : $waterdb['height'];
	} elseif ($w_pos == 3) {
		$wX = $sourcedb['width'] - $waterdb['width'] - 5;
		$wY = $db_watermark == 1 ? 5 : $waterdb['height'];
	} elseif ($w_pos == 7) {
		$wX = 5;
		$wY = $db_watermark == 1 ? $sourcedb['height'] - $waterdb['height'] - 5 : $sourcedb['height'] - 5;
	} elseif ($w_pos == 8) {
		$wX = ($sourcedb['width'] - $waterdb['width']) / 2;
		$wY = $db_watermark == 1 ? $sourcedb['height'] - $waterdb['height'] - 5 : $sourcedb['height'] - 5;
	} elseif ($w_pos == 9) {
		$wX = $sourcedb['width'] - $waterdb['width'] - 5;
		$wY = $db_watermark == 1 ? $sourcedb['height'] - $waterdb['height'] - 5 : $sourcedb['height'] - 5;
	}elseif($w_pos == 4) {
		$wX = 5;
		$wY = $db_watermark == 1 ? ($sourcedb['height'] - $waterdb['height']) / 2 : ($sourcedb['height'] + $waterdb['height']) / 2;
	}elseif($w_pos == 6) {
		$wX = $sourcedb['width'] - $waterdb['width'] - 5;
		$wY = $db_watermark == 1 ? ($sourcedb['height'] - $waterdb['height']) / 2 : ($sourcedb['height'] + $waterdb['height']) / 2;
	} else {
		$wX = ($sourcedb['width'] - $waterdb['width']) / 2;
		$wY = $db_watermark == 1 ? ($sourcedb['height'] - $waterdb['height']) / 2 : ($sourcedb['height'] + $waterdb['height']) / 2;
	}
	imagealphablending($sourcedb['source'], true);
	if ($db_watermark == 1) {
		if ($waterdb['type'] == 'png') {
			$tmp = imagecreatetruecolor($sourcedb['width'], $sourcedb['height']);
			imagecopy($tmp, $sourcedb['source'], 0, 0, 0, 0, $sourcedb['width'], $sourcedb['height']);
			imagecopy($tmp, $waterdb['source'], $wX, $wY, 0, 0, $waterdb['width'], $waterdb['height']);
			$sourcedb['source'] = $tmp;
			//imagecopy($sourcedb['source'], $waterdb['source'], $wX, $wY, 0, 0, $waterdb['width'], $waterdb['height']);
		} else {
			imagecopymerge($sourcedb['source'], $waterdb['source'], $wX, $wY, 0, 0, $waterdb['width'], $waterdb['height'], $w_pct);
		}
	} else {
		if (strlen($w_color) != 7) return false;
		$R = hexdec(substr($w_color, 1, 2));
		$G = hexdec(substr($w_color, 3, 2));
		$B = hexdec(substr($w_color, 5));
		//imagestring($sourcedb['source'],$w_font,$wX,$wY,$w_text,imagecolorallocate($sourcedb['source'],$R,$G,$B));
		if (strpos($db_waterfonts, 'ch/') !== false && strtoupper($GLOBALS['db_charset']) != 'UTF-8') {
			$w_text = pwConvert($w_text, 'UTF-8', $GLOBALS['db_charset']);
		}
		imagettftext($sourcedb['source'], $w_font, 0, $wX, $wY, imagecolorallocate($sourcedb['source'], $R, $G, $B), $fontsfile, $w_text);
	}
	//	P_unlink($source);
	$dstsrc && $source = $dstsrc;
	PWMakeImage($sourcedb['type'], $sourcedb['source'], $source, $w_quality);
	isset($waterdb['source']) && imagedestroy($waterdb['source']);
	imagedestroy($sourcedb['source']);
	return true;
}
function PWMakeImage($type, $image, $filename, $quality = '75') {
	$makeimage = 'image' . $type;
	if (!function_exists($makeimage)) {
		return false;
	}
	if ($type == 'jpeg') {
		$makeimage($image, $filename, $quality);
	} else {
		$makeimage($image, $filename);
	}
	return true;
}
function PWGetImgSize($srcFile, $srcExt = null) {
	empty($srcExt) && $srcExt = strtolower(substr(strrchr($srcFile, '.'), 1));
	$srcdata = array();
	if (function_exists('read_exif_data') && in_array($srcExt, array(
		'jpg',
		'jpeg',
		'jpe',
		'jfif'
	))) {
		$datatemp = @read_exif_data($srcFile);
		$srcdata['width'] = $datatemp['COMPUTED']['Width'];
		$srcdata['height'] = $datatemp['COMPUTED']['Height'];
		$srcdata['type'] = 2;
		unset($datatemp);
	}
	!$srcdata['width'] && list($srcdata['width'], $srcdata['height'], $srcdata['type']) = @getimagesize($srcFile);
	if (!$srcdata['type'] || ($srcdata['type'] == 1 && in_array($srcExt, array(
		'jpg',
		'jpeg',
		'jpe',
		'jfif'
	)))) { //noizy fix
		return false;
	}
	return $srcdata;
}
function PWGetImgInfo($srcFile) {
	$imgdata = (array) PWGetImgSize($srcFile);
	if ($imgdata['type'] == 1) {
		$imgdata['type'] = 'gif';
	} elseif ($imgdata['type'] == 2) {
		$imgdata['type'] = 'jpeg';
	} elseif ($imgdata['type'] == 3) {
		$imgdata['type'] = 'png';
	} elseif ($imgdata['type'] == 6) {
		$imgdata['type'] = 'bmp';
	} else {
		return false;
	}
	if (empty($imgdata) || !function_exists('imagecreatefrom' . $imgdata['type'])) {
		return false;
	}
	$imagecreatefromtype = 'imagecreatefrom' . $imgdata['type'];
	$imgdata['source'] = $imagecreatefromtype($srcFile);
	!$imgdata['width'] && $imgdata['width'] = imagesx($imgdata['source']);
	!$imgdata['height'] && $imgdata['height'] = imagesy($imgdata['source']);
	return $imgdata;
}


//������֤��
function chinese_yzimg($str){
	$fnt = ROOT_PATH."inc/font.ttf";
	if(WEB_LANG=='gb2312'){
		$str = gbk2utf8($str);
	}	
	$c='red';
	$x=0;
	$y=0;
	$size=11;
	$image=ROOT_PATH.'images/default/chinese_yzimg.jpg';
	if(!is_file($image)){
		die('����ͼƬ������');
	}
	$img_array=getimagesize($image);

	$font_array = ImageTTFBBox($size, 0, $fnt, $str);
	$font_wight=intval($font_array[2]-$font_array[0]);
	$font_height=intval($font_array[3]-$font_array[5]);

	$x || $x=intval(($img_array[0]-$font_wight)/2);
	$y || $y=intval($img_array[1]/2+$font_height/2);

	$im = imagecreatefromjpeg($image);

	if($c=='blue'){
		$color = imagecolorclosestalpha($im,000,000,255,20);
		$color2 = imagecolorclosestalpha($im,000,000,000,98);
		imagettftext ($im, $size, 0, $x+2, $y+2, $color2, $fnt, $str);
	}elseif($c=='white'){
		$color = imagecolorclosestalpha($im,255,255,255,20);
		$color2 = imagecolorclosestalpha($im,000,000,000,99);
		imagettftext ($im, $size, 0, $x+2, $y+2, $color2, $fnt, $str);
	}elseif($c=='red'){
		$color = imagecolorclosestalpha($im,255,000,000,20);
		$color2 = imagecolorclosestalpha($im,255,255,255,20);
		imagettftext ($im, $size, 0, $x+2, $y+2, $color2, $fnt, $str);
	}else{
		$color = imagecolorclosestalpha($im,000,000,000,20);
		$color2 = imagecolorclosestalpha($im,255,255,255,40);
		imagettftext ($im, $size, 0, $x+2, $y+2, $color2, $fnt, $str);
	}

	imagettftext ($im, $size, 0, $x, $y, $color, $fnt, $str);

	ImageJPEG($im);
	ImageDestroy($im);
}

?>