<?php
   function extractKeyword($target, $mother) {
       global $configVal;
       requireComponent('Textcube.Function.Setting');
       $data = setting::fetchConfigVal( $configVal);
	   
	   if(is_null($data)){
		   return $target."API 키를 입력해주세요";
	   }else{
		   $apikey=$data['apikey'];
	   }
	   $request="http://apis.daum.net/suggest/keyword?apikey=".$apikey."&q='".$target."'";
	   $response = file_get_contents($request);
	   $obj = simplexml_load_string($response);      

	   $daum=$obj->daum;
	   $printer="";
	   foreach($daum->item as $value){
		   $printer.=" ".$value->keyword;
	   }
	   
       $target=$target."<div class='listbox'><h3>Extracted Keywords</h3><div>$printer</div></div>";
	/* Flex Component will be inserted here */

       return $target;
   }
   function keywordDataSet($DATA){
       requireComponent('Textcube.Function.Setting');
       $cfg = setting::fetchConfigVal( $DATA );
       return true;
   }
   ?>