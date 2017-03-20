document.write("<br> Title: " + document.title + "<br>");
document.write("Location: " + document.location + "<br>");
document.write("bgColor: " + document.bgColor + "<br>");
document.write("fgColor: " + document.fgColor + "<br>");
document.write("Last modified: " + document.lastModified + "<br>");
var time = new Date();
document.write("Pristup stranici: " + time.getHours()+ " sata "+ time.getMinutes()+ " minuta "+time.getSeconds()+ " sekunde");