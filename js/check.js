//----------------------------------------------------------
// Cookie取得
//----------------------------------------------------------
function getCookie(key,  tmp1, tmp2, xx1, xx2, xx3) {
	tmp1 = " " + document.cookie + ";";
	xx1 = xx2 = 0;
	var len = tmp1.length;
	while (xx1 < len) {
		xx2 = tmp1.indexOf(";", xx1);
		tmp2 = tmp1.substring(xx1 + 1, xx2);
		xx3 = tmp2.indexOf("=");
		if (tmp2.substring(0, xx3) == key) {
			return(unescape(tmp2.substring(xx3 + 1, xx2 - xx1 - 1)));
		}
		xx1 = xx2 + 1;
	}
	return("");
}



//----------------------------------------------------------
// Cookie設定
//----------------------------------------------------------
function setCookie(key, val, tmp) {
	
	//時刻データを取得して変数Jikanに格納する
	var Jikan= new Date();
	
	//現在時間に 7日 足したものをDateオブジェクト Jikan に設定する。(JavaScriptの時間単位は1/1000秒)
	Jikan.setTime(Jikan.getTime()+1000*60*60*24*7);
	
	//標準形式に変換する必要があるのでtoGMTstring()を用いている。
	expiredate = Jikan.toGMTString();
	
	tmp = key + "=" + val + "; ";
	tmp += "path=/; ";
	tmp += "expires="+expiredate;
	
	if( val == "-1"){
		//現在時間に 1日 足したものをDateオブジェクト Jikan に設定する。
		Jikan.setTime(Jikan.getTime()+1000*60*60*24*1);
		
		//標準形式に変換する必要があるのでtoGMTstring()を用いている。
		expiredate = Jikan.toGMTString();
		
		tmp = key+"=;";
			tmp += "expires="+expiredate;
	}
	document.cookie = tmp;
}



//----------------------------------------------------------
// Cookie設定
//----------------------------------------------------------
function setCode(Number){
	var NumBuff = getCookie("INQUIRY");
	
	if(NumBuff.match(Number)){
		;
	}
	else {
		NumBuff += Number + ",";
		setCookie("INQUIRY",NumBuff);
	}
	
	document.getElementById(Number).innerHTML
		= "<a href='javascript:onClick=clearCookie(\"" + Number + "\");'>"
		+ "<img src='/images/check_on.gif' title='リストから解除する' /></a>";
}

//////////
function setFormCode(Number){
	var NumBuff = getCookie("INQUIRY");
		if(NumBuff.match(Number)){
			;
		} else {
			NumBuff += Number + ",";
			setCookie("INQUIRY",NumBuff);
		}
	document.getElementById(Number).innerHTML  = "<a href='javascript:onClick=clearCookie(\"" + Number + "\");'>"+
	"<img src='/images/check_on.gif' title='解除する'></a>";
}



//----------------------------------------------------------
// Cookie設定
//----------------------------------------------------------
function clearCookie(Number) {
	var NumBuff = getCookie("INQUIRY");
	var Clear_Num = Number + ",";
	
	NumBuff = NumBuff.replace(Clear_Num,"");
	setCookie("INQUIRY", "", "", "/", -1);
	setCookie("INQUIRY",NumBuff);
	
	document.getElementById(Number).innerHTML
		= "<a href='javascript:void(0);' onclick='setCode(\"" + Number + "\");'>"
		+ "<img src='/images/check_off.gif' title='リストに登録する' /></a>";
}



//----------------------------------------------------------
// 初回設定
//----------------------------------------------------------
function checkCode(Number){
	code_array = new Array();
	var i;
	
	P_flag = 1;
	i=0;
	NumBuff = getCookie("INQUIRY");
	
	//既にCookieに書かれているか確認
		if(NumBuff.match(Number)){
			document.getElementById(Number).innerHTML
				= "<a href='javascript:void(0);' onclick='clearCookie(\"" + Number + "\");'>"
				+ "<img src='/images/check_on.gif' title='リストから解除する' /></a>";
			P_flag = 0;
		}
		if(P_flag){
			document.getElementById(Number).innerHTML
				= "<a href='javascript:onClick=setCode(\"" + Number + "\");'>"
				+ "<img src='/images/check_off.gif' title='リストに登録する' /></a>";
		}
}



//----------------------------------------------------------
// 
//----------------------------------------------------------
function allClear(){
	//新規・更新時にCookieを削除する。
	setCookie("INQUIRY", "", "", "/", -1);
	location.reload();
}
