function getClient() {
	var clinet = [];
	//分辨率
	clinet['resolution'] = window.screen.width + '*' + window.screen.height;
	//浏览器
	var userAgent = navigator.userAgent.toLowerCase();
	(s = userAgent.match(/msie ([\d.]+)/)) ? (clinet['browser'] = 'IE ' + s[1]) :
	(s = userAgent.match(/rv:([\d.]+)\) like/)) ? (clinet['browser'] = 'IE ' + s[1]) :
	(s = userAgent.match(/firefox\/([\d.]+)/)) ? (clinet['browser'] = 'Firefox ' + s[1]) :
	(s = userAgent.match(/chrome\/([\d.]+)/)) ? (clinet['browser'] = 'Chrome ' + s[1]) :
	(s = userAgent.match(/opera\/.*version\/([\d.]+)/)) ? (clinet['browser'] = 'Opera ' + s[1]) :
	(s = userAgent.match(/version\/([\d.]+).*safari/)) ? (clinet['browser'] = 'Safari ' + s[1]) :
	(s = userAgent.match(/silk\/([\d.]+).*safari/)) ? (clinet['browser'] = 'Safari ' + s[1]) :
	(s = userAgent.match(/webkit\/([\d.]+)/)) ? (clinet['browser'] = 'Webkit ' + s[1]) : (clinet['browser'] = 'Unknow');
	//操作系统
	var info  = "";
	if(userAgent.indexOf("win") > -1) { //windows系统判断
		if(userAgent.indexOf("windows nt 5.0") > -1) {
			clinet['os'] = "Win2000";
		} else if(userAgent.indexOf("windows nt 5.1") > -1){
			clinet['os'] = "XP";
		} else if(userAgent.indexOf("windows nt 5.2") > -1){
			clinet['os'] = "Win2003";
		} else if(userAgent.indexOf("windows nt 6.0") > -1){
			clinet['os'] = "Vista";
		} else if(userAgent.indexOf("windows nt 6.1") > -1 || userAgent.indexOf("windows 7") > -1){
			clinet['os'] = "Win7";
		} else if(userAgent.indexOf("windows 8") > -1){
			clinet['os'] = "Win8";
		} else if(userAgent.indexOf("windows phone") > -1) {
			s = userAgent.match(/windows phone ([\d.]+);/);
			clinet['os'] = 'WinPhone ' + s[1];
		} else{
			clinet['os'] = "OtherWin";
		}
	} else if(userAgent.indexOf("android") > -1) { //安卓系统判断
		s = userAgent.match(/android ([\d.]+);/);
		clinet['os'] = 'Android ' + s[1];
	} else if(userAgent.indexOf("iphone") > -1) { //iphone系统判断
		s = userAgent.match(/iphone os ([\d_]+)/);
		clinet['os'] = 'iPhone OS ' + s[1].replace(/_/g, '.');
	} else if(userAgent.indexOf("mac") > -1) { //苹果系统判断
		s = userAgent.match(/mac os x\s*([\d_]*)/);
		clinet['os'] = "Mac OS X " + s[1].replace(/_/g, '.');
	} else if(userAgent.indexOf("symbianos") > -1) { //塞班系统判断
		s = userAgent.match(/symbianos\/([\d.]+)/);
		clinet['os'] = "Symbian OS " + s[1];
	} else if(userAgent.indexOf("linux") > -1) { //linux
		clinet['os'] = "Linux";
	} else if(userAgent.indexOf("x11") > -1) { //unix
		clinet['os'] = "Unix";
	} else{
		clinet['os'] = "Other";
	}
	if(userAgent.indexOf("win64")>=0 || userAgent.indexOf("wow64")>=0 || userAgent.indexOf('x86_64')>=0)
		clinet['os'] += '(64)';
	return clinet;
}