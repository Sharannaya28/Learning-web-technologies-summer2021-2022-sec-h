<?php
function search($arr ,$x){
	for($i=0; $i < sizeof($arr); $i++){
		if($arr[$i] == $x) return $i;
	}
	return -1;
}
$arr = array(6,2,7,8,9,35,18,3);
echo "the following element is in index:",search($arr,18)
?>