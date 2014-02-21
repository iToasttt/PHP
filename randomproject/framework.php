<?php
class framework {
  public static function require_all($path, &$count = 0){
    $dir = dir($path."/");
    $dirs = array();
  while(false !== ($file = $dir->read())){
  if($file !== "." and $file !== ".."){
   if(!is_dir($path.$file) and strtolower(substr($file, -3)) === "php"){
    require_once($path.$file);
      ++$count;
  }elseif(is_dir($path.$file)){
    $dirs[] = $path.$file."/";
    }
  }
}
  foreach($dirs as $dir){
    framework::require_all($dir, $count);
    }
  }
}
?>
