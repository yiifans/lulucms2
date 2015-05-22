
function getFilePath(obj) {
	//var obj = document.getElementById(id);
	
	if (obj) 
	{
		if (window.navigator.userAgent.indexOf("MSIE") >= 1) 
		{
			obj.select();
			return document.selection.createRange().text;
		} 
		else if (window.navigator.userAgent.indexOf("Firefox") >= 1) 
		{
			if (obj.files) 
			{
				return obj.files.item(0).getAsDataURL();
			}
			return obj.value;
		}
		return obj.value;
	}
}