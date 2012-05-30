/*
YUI 3.6.0pr1 (build 5195)
Copyright 2012 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("event-simulate",function(a){(function(){var k=a.Lang,j=a.Array,f=k.isFunction,d=k.isString,g=k.isBoolean,o=k.isObject,n=k.isNumber,m=a.config.doc,p={click:1,dblclick:1,mouseover:1,mouseout:1,mousedown:1,mouseup:1,mousemove:1,contextmenu:1},l={keydown:1,keyup:1,keypress:1},c={blur:1,change:1,focus:1,resize:1,scroll:1,select:1},e={scroll:1,resize:1,reset:1,submit:1,change:1,select:1,error:1,abort:1};a.mix(e,p);a.mix(e,l);function i(v,z,u,s,B,r,q,A,x,D,C){if(!v){a.error("simulateKeyEvent(): Invalid target.");}if(d(z)){z=z.toLowerCase();switch(z){case"textevent":z="keypress";break;case"keyup":case"keydown":case"keypress":break;default:a.error("simulateKeyEvent(): Event type '"+z+"' not supported.");}}else{a.error("simulateKeyEvent(): Event type must be a string.");}if(!g(u)){u=true;}if(!g(s)){s=true;}if(!o(B)){B=a.config.win;}if(!g(r)){r=false;}if(!g(q)){q=false;}if(!g(A)){A=false;}if(!g(x)){x=false;}if(!n(D)){D=0;}if(!n(C)){C=0;}var y=null;if(f(m.createEvent)){try{y=m.createEvent("KeyEvents");y.initKeyEvent(z,u,s,B,r,q,A,x,D,C);}catch(w){try{y=m.createEvent("Events");}catch(t){y=m.createEvent("UIEvents");}finally{y.initEvent(z,u,s);y.view=B;y.altKey=q;y.ctrlKey=r;y.shiftKey=A;y.metaKey=x;y.keyCode=D;y.charCode=C;}}v.dispatchEvent(y);}else{if(o(m.createEventObject)){y=m.createEventObject();y.bubbles=u;y.cancelable=s;y.view=B;y.ctrlKey=r;y.altKey=q;y.shiftKey=A;y.metaKey=x;y.keyCode=(C>0)?C:D;v.fireEvent("on"+z,y);}else{a.error("simulateKeyEvent(): No event simulation framework present.");}}}function b(A,F,x,u,G,z,w,v,t,r,s,q,E,C,y,B){if(!A){a.error("simulateMouseEvent(): Invalid target.");}if(d(F)){F=F.toLowerCase();if(!p[F]){a.error("simulateMouseEvent(): Event type '"+F+"' not supported.");}}else{a.error("simulateMouseEvent(): Event type must be a string.");}if(!g(x)){x=true;}if(!g(u)){u=(F!="mousemove");}if(!o(G)){G=a.config.win;}if(!n(z)){z=1;}if(!n(w)){w=0;}if(!n(v)){v=0;}if(!n(t)){t=0;}if(!n(r)){r=0;}if(!g(s)){s=false;}if(!g(q)){q=false;}if(!g(E)){E=false;}if(!g(C)){C=false;}if(!n(y)){y=0;}B=B||null;var D=null;if(f(m.createEvent)){D=m.createEvent("MouseEvents");if(D.initMouseEvent){D.initMouseEvent(F,x,u,G,z,w,v,t,r,s,q,E,C,y,B);}else{D=m.createEvent("UIEvents");D.initEvent(F,x,u);D.view=G;D.detail=z;D.screenX=w;D.screenY=v;D.clientX=t;D.clientY=r;D.ctrlKey=s;D.altKey=q;D.metaKey=C;D.shiftKey=E;D.button=y;D.relatedTarget=B;}if(B&&!D.relatedTarget){if(F=="mouseout"){D.toElement=B;}else{if(F=="mouseover"){D.fromElement=B;}}}A.dispatchEvent(D);}else{if(o(m.createEventObject)){D=m.createEventObject();D.bubbles=x;D.cancelable=u;D.view=G;D.detail=z;D.screenX=w;D.screenY=v;D.clientX=t;D.clientY=r;D.ctrlKey=s;D.altKey=q;D.metaKey=C;D.shiftKey=E;switch(y){case 0:D.button=1;break;case 1:D.button=4;break;case 2:break;default:D.button=0;}D.relatedTarget=B;A.fireEvent("on"+F,D);}else{a.error("simulateMouseEvent(): No event simulation framework present.");}}}function h(w,v,s,r,q,u){if(!w){a.error("simulateUIEvent(): Invalid target.");}if(d(v)){v=v.toLowerCase();if(!c[v]){a.error("simulateUIEvent(): Event type '"+v+"' not supported.");}}else{a.error("simulateUIEvent(): Event type must be a string.");}var t=null;if(!g(s)){s=(v in e);}if(!g(r)){r=(v=="submit");}if(!o(q)){q=a.config.win;}if(!n(u)){u=1;}if(f(m.createEvent)){t=m.createEvent("UIEvents");t.initUIEvent(v,s,r,q,u);w.dispatchEvent(t);}else{if(o(m.createEventObject)){t=m.createEventObject();t.bubbles=s;t.cancelable=r;t.view=q;t.detail=u;w.fireEvent("on"+v,t);}else{a.error("simulateUIEvent(): No event simulation framework present.");}}}a.Event.simulate=function(s,r,q){q=q||{};if(p[r]){b(s,r,q.bubbles,q.cancelable,q.view,q.detail,q.screenX,q.screenY,q.clientX,q.clientY,q.ctrlKey,q.altKey,q.shiftKey,q.metaKey,q.button,q.relatedTarget);}else{if(l[r]){i(s,r,q.bubbles,q.cancelable,q.view,q.ctrlKey,q.altKey,q.shiftKey,q.metaKey,q.keyCode,q.charCode);}else{if(c[r]){h(s,r,q.bubbles,q.cancelable,q.view,q.detail);}else{a.error("simulate(): Event '"+r+"' can't be simulated.");}}}};})();},"3.6.0pr1",{requires:["event-base"]});