!function(){for(var e,t=document.location.search.slice(1).split("&"),r=t.length,c=document.getElementsByTagName("script"),s=c[c.length-1].src,i=0,n="1.9.0",o="http://code.jquery.com/jquery-git.js";i<r;i++)if("jquery"===(e=t[i].split("="))[0]){n=e[1];break}"git"!=n&&(o=s.replace(/jquery\.js$/,"jquery-"+n+".js")),document.write("<script src='"+o+"'><\/script>")}();