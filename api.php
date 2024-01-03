<?php
    error_reporting(E_ERROR | E_PARSE);
    $emoji=$_REQUEST['emoji'];
    $style=$_REQUEST['style'];

    $CSV=file_get_contents('./emojis.csv');
    $lines=explode("\n",$CSV);
    
    if($_REQUEST['action']=='all'){
        header("Content-Type:application/json");
        echo "{\"result\":[";
            $i=0;
            foreach ($lines as $line) {
                $emojiCode=explode(";",$line)[0];
                echo"{\"normalCode\":" ."\"".$emojiCode ."\"}";
                if(($i+1)<sizeof($lines)){
                    echo ",";
                }
                $i++;
            }
            echo"]}";
    }else{
        foreach ($lines as $line) {
            $currentEmoji=explode(";",$line)[0];
            if($currentEmoji==$emoji){
                $styleInFolder="";
                switch($style){
                    case "3d":
                        $styleInFolder="3D";
                        break;
                    case "color":
                        $styleInFolder="Color";
                        break;
                    case "flat":
                        $styleInFolder="Flat";
                        break;
                    case "hc":
                        $styleInFolder="High Contrast";
                        break;
                }
                $location = './assets/' .trim(explode(';',$line)[1]).'/'.$styleInFolder;
                $files = scandir($location);
                foreach($files as $file) {
                    if($file == '.' || $file == '..') continue;
                    header("Pragma: public");
                    header("Expires: 0");
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header("Cache-Control: public");
                    header("Content-Description: File Transfer");
                    header("Content-Type: image/" .explode('.',$file)[1]);        
                    header("Content-Disposition: attachment; filename=\"".$file."\"");
                    header("Content-Transfer-Encoding: binary");
                    header("Accept-Ranges: bytes");
                    $file = @fopen($location ."/" .$file,"rb");
                    if ($file) {
                    while(!feof($file)) {
                        print(fread($file, 1024*8));
                        flush();
                        if (connection_status()!=0) {
                            @fclose($file);
                            die();
                        }
                    }
                    @fclose($file);
                    }
                    break;
                }
            }
        }
    }
?>
