/*! For license information please see app.js.LICENSE.txt */
(()=>{var e,o={80:(e,o,t)=>{window.Cookies=t(301),t(343),t(372)},301:(e,o,t)=>{var n,r;function i(e){return(i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(s){var c=!1;if(void 0===(r="function"==typeof(n=s)?n.call(o,t,o,e):n)||(e.exports=r),c=!0,"object"===i(o)&&(e.exports=s(),c=!0),!c){var a=window.Cookies,f=window.Cookies=s();f.noConflict=function(){return window.Cookies=a,f}}}((function(){function e(){for(var e=0,o={};e<arguments.length;e++){var t=arguments[e];for(var n in t)o[n]=t[n]}return o}return function o(t){function n(o,r,i){var s;if("undefined"!=typeof document){if(arguments.length>1){if("number"==typeof(i=e({path:"/"},n.defaults,i)).expires){var c=new Date;c.setMilliseconds(c.getMilliseconds()+864e5*i.expires),i.expires=c}i.expires=i.expires?i.expires.toUTCString():"";try{s=JSON.stringify(r),/^[\{\[]/.test(s)&&(r=s)}catch(e){}r=t.write?t.write(r,o):encodeURIComponent(String(r)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),o=(o=(o=encodeURIComponent(String(o))).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent)).replace(/[\(\)]/g,escape);var a="";for(var f in i)i[f]&&(a+="; "+f,!0!==i[f]&&(a+="="+i[f]));return document.cookie=o+"="+r+a}o||(s={});for(var l=document.cookie?document.cookie.split("; "):[],u=/(%[0-9A-Z]{2})+/g,p=0;p<l.length;p++){var v=l[p].split("="),d=v.slice(1).join("=");this.json||'"'!==d.charAt(0)||(d=d.slice(1,-1));try{var h=v[0].replace(u,decodeURIComponent);if(d=t.read?t.read(d,h):t(d,h)||d.replace(u,decodeURIComponent),this.json)try{d=JSON.parse(d)}catch(e){}if(o===h){s=d;break}o||(s[h]=d)}catch(e){}}return s}}return n.set=n,n.get=function(e){return n.call(n,e)},n.getJSON=function(){return n.apply({json:!0},[].slice.call(arguments))},n.defaults={},n.remove=function(o,t){n(o,"",e(t,{expires:-1}))},n.withConverter=o,n}((function(){}))}))},343:()=>{$((function(){Over18Consent.initNotice()})),Over18Consent=function(){},Over18Consent.initNotice=function(){var e=Cookies.getJSON("over_18_accept"),o=$("#modal_over_18_consent");e||o.foundation("open"),o.find("#btn_over_18_consent").on("click.over_18_accept",(function(){o.foundation("close"),Cookies.set("over_18_accept",!0,{expires:365})}))}},372:()=>{UserPageStrem=function(){},UserPageStrem.goPrivate=function(){var e=$("#btn_user_go_private"),o=$("#btn_user_leave_private_show");confirm("Do you wish to join the private show for X tokens for 10 minutes?")&&e.closest("li").fadeOut(500,(function(){$(this).addClass("hide"),o.closest("li").fadeIn("500").removeClass("hide")}))},UserPageStrem.leavePrivate=function(){var e=$("#btn_user_go_private");$("#btn_user_leave_private_show").closest("li").fadeOut(500,(function(){$(this).addClass("hide"),e.closest("li").fadeIn("500").removeClass("hide")}))}},241:()=>{},542:()=>{}},t={};function n(e){var r=t[e];if(void 0!==r)return r.exports;var i=t[e]={exports:{}};return o[e](i,i.exports,n),i.exports}n.m=o,e=[],n.O=(o,t,r,i)=>{if(!t){var s=1/0;for(l=0;l<e.length;l++){for(var[t,r,i]=e[l],c=!0,a=0;a<t.length;a++)(!1&i||s>=i)&&Object.keys(n.O).every((e=>n.O[e](t[a])))?t.splice(a--,1):(c=!1,i<s&&(s=i));if(c){e.splice(l--,1);var f=r();void 0!==f&&(o=f)}}return o}i=i||0;for(var l=e.length;l>0&&e[l-1][2]>i;l--)e[l]=e[l-1];e[l]=[t,r,i]},n.o=(e,o)=>Object.prototype.hasOwnProperty.call(e,o),(()=>{var e={177:0,879:0,977:0};n.O.j=o=>0===e[o];var o=(o,t)=>{var r,i,[s,c,a]=t,f=0;if(s.some((o=>0!==e[o]))){for(r in c)n.o(c,r)&&(n.m[r]=c[r]);if(a)var l=a(n)}for(o&&o(t);f<s.length;f++)i=s[f],n.o(e,i)&&e[i]&&e[i][0](),e[s[f]]=0;return n.O(l)},t=self.webpackChunk=self.webpackChunk||[];t.forEach(o.bind(null,0)),t.push=o.bind(null,t.push.bind(t))})(),n.O(void 0,[879,977],(()=>n(80))),n.O(void 0,[879,977],(()=>n(241)));var r=n.O(void 0,[879,977],(()=>n(542)));r=n.O(r)})();