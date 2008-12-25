<?php
/* KeywordUI for Textcube 1.76
   ----------------------------------
   Version 1.5
   제주대학교 컴퓨터공학과.

   Creator          : 정효원 & 김성규
   Maintainer       : 정효원 & 김성규

   Created at       : 2006.10.3
   Last modified at : 2007.8.15
 
 This plugin enables keyword / keylog feature in Textcube.
 For the detail, visit http://forum.tattersite.com/ko


 General Public License
 http://www.gnu.org/licenses/gpl.html

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

*/
//http://openapi.naver.com/search?key=6484ff3113728f5c49e7d921205d61a1&target=krdic&query=%EC%98%81%EC%96%B4&start=1&display=10

//$apiurl = "http://openapi.naver.com/search";
//$apikey = "6484ff3113728f5c49e7d921205d61a1";


function KeywordLink_bindKeyword($target,$mother) { //팝업 띄우면서 넘겨주는 부분
	global $blogURL;
	global $configVal;

//	$apikey = "6484ff3113728f5c49e7d921205d61a1";

	requireComponent('Textcube.Function.misc');
	$data = setting::fetchConfigVal( $configVal);
	
	$apikey=$data['apikey'];
	
	echo $blogURL.' => '.$apikey;

/*
	if(is_null($data)){
		return $target." API 키를 입력하세요 ";
	}
	else{
		$apikey=$data['apikey'];
	}
*/
//	$target = "<a href=\"#\" class=\"key1\" onclick=\"openKeyword('$blogURL/keylog/" . rawurlencode($target) . "'); return false\">{$target}</a>";
/*
<table>
  <tr>
    <td align='center' onmouseover="menulayer_bgroup1.style.display='';" onmouseout="menulayer_bgroup1.style.display='none';" >

      <table border='0' cellspacing='0' cellpadding='0'  width='100%' bgcolor="#cccccc">
        <tr>
	      <td  align='center'>
      		<a href='javascript://' class='top_menu'>키워드</a>
	      </td>
		</tr>
		<tr>
		  <td align='center'>
            <div id='menulayer_bgroup1' style='margin-top:-2px; margin-left:-30px; display:none; position:absolute;'>
        		<table width='60' border='0' cellspacing='0' cellpadding='0' onmouseover=menulayer_bgroup1.style.display='';  onmouseout=menulayer_bgroup1.style.display='none'; >
			       <tr>
				      <td style='padding-top:5px;'>검색리스트</td>
		          </tr>
	            </table>
		    </div>
    	  </td>
	    </tr>
	  </table>
      
	</td>
  </tr>
</table>
*/

	$target = "
<table>
	<tr>
		<td align='center' onmouseover=\"menulayer_bgroup1.style.display='';\" onmouseout=\"menulayer_bgroup1.style.display='none';\" >
			<table border='0' cellspacing='0' cellpadding='0'  width='100%' bgcolor=\"#cccccc\">
				<tr>
					<td  align='center'>
						<a href=\"http://openapi.naver.com/search?key=".$apikey."&target=krdic&start=1&display=10&query=". rawurlencode($target) ."\" class= \" key1 \"  return false\">{$target}</a></td>
</td>
		</tr>
		<tr>
		  <td align='center'>
            <div id='menulayer_bgroup1' style='margin-top:-2px; margin-left:-30px; display:none; position:absolute;'>
        		<table width='60' border='0' cellspacing='0' cellpadding='0' onmouseover=menulayer_bgroup1.style.display='';  onmouseout=menulayer_bgroup1.style.display='none'; >
			       <tr>
				      <td style='padding-top:5px;'>검색리스트<? include 'config.php'; ?></td>
		          </tr>
	            </table>
		    </div>
    	  </td>
	    </tr>
	  </table>
      
	</td>
  </tr>
</table>
	";


/*
	$target = "
	<table>
		<tr>
			<td align='center' onmouseover="menulayer_bgroup1.style.display='';" onmouseout="menulayer_bgroup1.style.display='none';" >
<a href=\"http://openapi.naver.com/search?key=".$apikey."&target=krdic&start=1&display=10&query=". rawurlencode($target) ."\" class= \" key1 \"  return false\">{$target}</a></td>
		</tr>
		<tr>
			<td>
				<div>
				</div>
			</td>	
		</tr>
	</table>

	";
*/

	return $target;
}

function KeywordLink_insertJS(){
	echo "";

}


function KeywordLink_setSkin($target,$mother) {
	global $pluginPath;
	return $pluginPath."/keylogSkin.html";
}


function KeywordLink_setConfig($data){
       requireComponent('Textcube.Function.Setting');
       $cfg = setting::fetchConfigVal( $DATA );
       return true;
}

?> 