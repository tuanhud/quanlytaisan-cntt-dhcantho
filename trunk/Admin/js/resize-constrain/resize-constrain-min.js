/*
YUI 3.6.0pr1 (build 5195)
Copyright 2012 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("resize-constrain",function(a){var J=a.Lang,s=J.isBoolean,I=J.isNumber,g=J.isString,q=a.Resize.capitalize,e=function(K){return(K instanceof a.Node);},E=function(K){return parseFloat(K)||0;},b="borderBottomWidth",y="borderLeftWidth",A="borderRightWidth",f="borderTopWidth",C="border",r="bottom",t="con",j="constrain",n="host",o="left",m="maxHeight",h="maxWidth",c="minHeight",F="minWidth",H="node",x="offsetHeight",z="offsetWidth",B="preserveRatio",p="region",D="resizeConstrained",G="right",k="tickX",i="tickY",u="top",d="width",l="view",w="viewportRegion";function v(){v.superclass.constructor.apply(this,arguments);}a.mix(v,{NAME:D,NS:t,ATTRS:{constrain:{setter:function(K){if(K&&(e(K)||g(K)||K.nodeType)){K=a.one(K);}return K;}},minHeight:{value:15,validator:I},minWidth:{value:15,validator:I},maxHeight:{value:Infinity,validator:I},maxWidth:{value:Infinity,validator:I},preserveRatio:{value:false,validator:s},tickX:{value:false},tickY:{value:false}}});a.extend(v,a.Plugin.Base,{constrainSurrounding:null,initializer:function(){var K=this,L=K.get(n);L.delegate.dd.plug(a.Plugin.DDConstrained,{tickX:K.get(k),tickY:K.get(i)});L.after("resize:align",a.bind(K._handleResizeAlignEvent,K));L.on("resize:start",a.bind(K._handleResizeStartEvent,K));},_checkConstrain:function(M,V,N){var S=this,R,O,P,U,T=S.get(n),K=T.info,L=S.constrainSurrounding.border,Q=S._getConstrainRegion();if(Q){R=K[M]+K[N];O=Q[V]-E(L[q(C,V,d)]);if(R>=O){K[N]-=(R-O);}P=K[M];U=Q[M]+E(L[q(C,M,d)]);if(P<=U){K[M]+=(U-P);K[N]-=(U-P);}}},_checkHeight:function(){var K=this,M=K.get(n),O=M.info,L=(K.get(m)+M.totalVSurrounding),N=(K.get(c)+M.totalVSurrounding);K._checkConstrain(u,r,x);if(O.offsetHeight>L){M._checkSize(x,L);}if(O.offsetHeight<N){M._checkSize(x,N);}},_checkRatio:function(){var Y=this,R=Y.get(n),X=R.info,N=R.originalInfo,Q=N.offsetWidth,Z=N.offsetHeight,P=N.top,aa=N.left,T=N.bottom,W=N.right,M=function(){return(X.offsetWidth/Q);},O=function(){return(X.offsetHeight/Z);},S=R.changeHeightHandles,K,ab,U,V,L,ac;if(Y.get(j)&&R.changeHeightHandles&&R.changeWidthHandles){U=Y._getConstrainRegion();ab=Y.constrainSurrounding.border;K=(U.bottom-E(ab[b]))-T;V=aa-(U.left+E(ab[y]));L=(U.right-E(ab[A]))-W;ac=P-(U.top+E(ab[f]));if(R.changeLeftHandles&&R.changeTopHandles){S=(ac<V);}else{if(R.changeLeftHandles){S=(K<V);}else{if(R.changeTopHandles){S=(ac<L);}else{S=(K<L);}}}}if(S){X.offsetWidth=Q*O();Y._checkWidth();X.offsetHeight=Z*M();}else{X.offsetHeight=Z*M();Y._checkHeight();X.offsetWidth=Q*O();}if(R.changeTopHandles){X.top=P+(Z-X.offsetHeight);}if(R.changeLeftHandles){X.left=aa+(Q-X.offsetWidth);}a.each(X,function(ae,ad){if(I(ae)){X[ad]=Math.round(ae);}});},_checkRegion:function(){var K=this,L=K.get(n),M=K._getConstrainRegion();return a.DOM.inRegion(null,M,true,L.info);},_checkWidth:function(){var K=this,N=K.get(n),O=N.info,M=(K.get(h)+N.totalHSurrounding),L=(K.get(F)+N.totalHSurrounding);K._checkConstrain(o,G,z);if(O.offsetWidth<L){N._checkSize(z,L);}if(O.offsetWidth>M){N._checkSize(z,M);}},_getConstrainRegion:function(){var K=this,M=K.get(n),L=M.get(H),O=K.get(j),N=null;if(O){if(O==l){N=L.get(w);}else{if(e(O)){N=O.get(p);}else{N=O;}}}return N;},_handleResizeAlignEvent:function(M){var K=this,L=K.get(n);K._checkHeight();K._checkWidth();if(K.get(B)){K._checkRatio();}if(K.get(j)&&!K._checkRegion()){L.info=L.lastInfo;}},_handleResizeStartEvent:function(M){var K=this,N=K.get(j),L=K.get(n);K.constrainSurrounding=L._getBoxSurroundingInfo(N);}});a.namespace("Plugin");a.Plugin.ResizeConstrained=v;},"3.6.0pr1",{requires:["resize-base","plugin"],skinnable:false});