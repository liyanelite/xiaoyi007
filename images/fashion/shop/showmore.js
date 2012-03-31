var begin1=0;
var begin2=0;
var begin3=0;
var list1=4;
var list2=4;
var list3=4;
var obj1=document.getElementById("ShowList1").getElementsByTagName("li");
var obj2=document.getElementById("ShowList2").getElementsByTagName("li");
var obj3=document.getElementById("ShowList3").getElementsByTagName("li");/**/
function showstyle(num){
	if(num==1){		
		for(var i=0;i<obj1.length;i++){
			if(i<begin1 || i>=list1){
				obj1[i].style.display='none';	
			}else{
				obj1[i].style.display='';
			}
		}
	}else if(num==2){		
		for(var i=0;i<obj2.length;i++){
			if(i<begin2 || i>=list2){
				obj2[i].style.display='none';	
			}else{
				obj2[i].style.display='';
			}
		}
	}else if(num==3){		
		for(var i=0;i<obj3.length;i++){
			if(i<begin3 || i>=list3){
				obj3[i].style.display='none';	
			}else{
				obj3[i].style.display='';
			}
		}		
	}/**/
}
function showdown(num){
	if(num==1){
		var last1 = obj1.length-list1;
		if(last1>0){
			begin1+=1;
			list1+=1;
			showstyle(1);
		}
	}else if(num==2){
		var last2 = obj2.length-list2;
		if(last2>0){
			begin2+=1;
			list2+=1;
			showstyle(2);
		}
	}else if(num==3){
		var last3 = obj3.length-list3;
		if(last3>0){
			begin3+=1;
			list3+=1;
			showstyle(3);
		}
	}
}
function showup(num){
	if(num==1){
		if(begin1>0){
			begin1-=1;
			list1-=1;
			showstyle(1);
		}
	}else if(num==2){
		if(begin2>0){
			begin2-=1;
			list2-=1;
			showstyle(2);
		}
	}else if(num==3){
		if(begin3>0){
			begin3-=1;
			list3-=1;
			showstyle(3);
		}
	}
}/**/
showstyle(1);
showstyle(2);
showstyle(3);