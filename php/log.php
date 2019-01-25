<?php
class writelog{
	/**
	 * 写日志
	 * @param $prefix 文件名前缀
	 * @param $param 数据
	 * @param $type 0不追加 1 追加
	 * @param $path 日志目录
	 * @return void
	 */
    public function write($prefix,$param,$type=1,$path='log')
	{
		if(!is_dir($path)){
			mkdir($path,0755,true);
		}
		if(is_array($param)){
			$data= date('H:i:s')."\n  ".json_encode($param,JSON_UNESCAPED_UNICODE);
		}else{
			$data= date('H:i:s')."\n  ".$param;
		}		
		unset($param);
		$file=$path.'/'.$prefix.'_'.date('Ymd').".txt";
		try { 
			if($type){
				file_put_contents($file, $data.PHP_EOL, FILE_APPEND);
			}else{
				file_put_contents($file, $data);
			}
		} catch(Exception $e) {
			echo $e->getMessage();  
		}
		unset($data);
	}
}