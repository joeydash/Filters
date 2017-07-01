function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function preload() {
  result = loadStrings(getCookie('num')+'.csv');
  var temp1=[];

}
var datarray=[];
var intdataarray=[];
var pos=0;
var maxdata=0;
vartemp2=[];
function setup() {
for (var i = 0; i < result.length - 1;  i++) {
  	temp1 = split(result[i], ",");
  	datarray.push(temp1);
  }
for (var i = 0; i < datarray.length; i++) {
 	temp2 =[parseInt(datarray[i][0]),parseInt(datarray[i][1])];
 	if (abs(datarray[i][1])>maxdata) {
    maxdata=datarray[i][1];
  }
  intdataarray.push(temp2);
 }
  createCanvas(datarray.length,600);
  textSize(32);
}
function draw(){
  background('#1BA1E2');
  if (pos==0) {text("No filter", 10, 30);drawgraph(intdataarray,maxdata);}
  if (pos==1) {text("Savitsky Golay filter", 10, 30);drawgraph(sgolays(intdataarray),maxdata);}
  if (pos==2) {text("Averaging filter", 10, 30);drawgraph(average(intdataarray),maxdata);}
}
function mouseWheel(event) {
  if(event.delta>0){
    pos += 1;
  }
  if(event.delta<0){
    pos -= 1;
  }
  pos=pos%3;
}