<?php
class tools
{
	/** 
	 * 多个一维数组合并为二维数组
	 * @param $keys  健 
	 * @param $arrs 一维数组集合
	 */
	function array_merge_more($keys,$arrs)
	{
		// 检查参数是否正确
		if(!$keys || !is_array($keys) || !$arrs || !is_array($arrs) || count($keys)!=count($arrs)){
			return array();
		}
		// 一维数组中最大长度
		$max_len = 0;
		// 整理数据，把所有一维数组转重新索引
		for($i=0,$len=count($arrs); $i<$len; $i++){
			$arrs[$i] = array_values($arrs[$i]);
			if(count($arrs[$i])>$max_len){
				$max_len = count($arrs[$i]);
			}
		}
		// 合拼数据
		$result = array();
		for($i=0; $i<$max_len; $i++){
			$tmp = array();
			foreach($keys as $k=>$v){
				if(isset($arrs[$k][$i])){
					$tmp[$v] = $arrs[$k][$i];
				}
			}
			$result[] = $tmp;
		}
		return $result;
	}
	
}


$keys=['flightNumber','depAirport','stopCities'];
$flightNumber=['KN5202','MF8326'];
$depAirport=['ACX','CAN'];
$arrAirport=['NAY','FOC'];
$arrs=[$flightNumber,$depAirport,$arrAirport];
$tools=new tools();
print_r($tools->array_merge_more($keys,$arrs));
/* 
Array
(
    [0] => Array
        (
            [flightNumber] => KN5202
            [depAirport] => ACX
            [stopCities] => NAY
        )

    [1] => Array
        (
            [flightNumber] => MF8326
            [depAirport] => CAN
            [stopCities] => FOC
        )

)
 */