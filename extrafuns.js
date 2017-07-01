function drawgraph(dots,maxdata) {
	strokeWeight(2);
  	stroke('#FF0097');
  	var temp3;
	for (var i = 0;i < dots.length-1; i++) {
		ellipse(dots[i][0],map(dots[i][1], 0,maxdata, 0, 300)+300,2,2);
		/*line(dots[i][0],dots[i][1]+300,dots[(i+1)][0],dots[(i+1)][1]+300);*/
	}
	ellipse(dots[dots.length-1][0], dots[dots.length-1][1]+300,1,1);
}
function sgolays(dots) {
	var result=[];
	var suma=0;
	if (dots.length>11) {  
		for (var i = 5;i < dots.length-6; i++) {
		 	suma=(dots[i-5][1]*-36)+(dots[i-4][1]*9)+(dots[i-3][1]*44)+(dots[i-2][1]*69)+(dots[i-1][1]*84)+(dots[i][1]*89)+(dots[i+1][1]*84)+(dots[i+2][1]*69)+(dots[i+3][1])*44+(dots[i+4][1]*9)+(dots[i+5][1]*-36);
			suma=suma/429;
			result.push([dots[i][0],suma]);
		}
	}
	return result;
}
function average(dots) {
	var result=[];
	var suma=0;
	if (dots.length>11) {  
		for (var i = 5;i < dots.length-6; i++) {
		 	suma=(dots[i-5][1])+(dots[i-4][1])+(dots[i-3][1])+(dots[i-2][1])+(dots[i-1][1])+(dots[i][1])+(dots[i+1][1])+(dots[i+2][1])+(dots[i+3][1])+(dots[i+4][1])+(dots[i+5][1]);
			suma=suma/11;
			result.push([dots[i][0],suma]);
		}
	}
	return result;
}
