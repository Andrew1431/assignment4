function getTime(){
    if (!document.all&&!document.getElementById)
        return
    c = document.getElementById? document.getElementById("cstmClock"): document.all.tick2
    var Digital=new Date()
    var hours=Digital.getHours()
    var minutes=Digital.getMinutes()
    var seconds=Digital.getSeconds()
    var dn="PM"
    if (hours<12)
        dn="AM"
    if (hours>12)
        hours=hours-12
    if (hours==0)
        hours=12
    if (minutes<=9)
        minutes="0"+minutes
    if (seconds<=9)
        seconds="0"+seconds
    var ctime=hours+":"+minutes+dn;
    c.innerHTML="<a href=\"#\">"+ctime+"</a>"
    setTimeout("getTime()",10000)
    }
window.onload=getTime;