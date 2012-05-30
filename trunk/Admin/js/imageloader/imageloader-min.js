/*
YUI 3.6.0pr1 (build 5195)
Copyright 2012 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("imageloader",function(b){b.ImgLoadGroup=function(){this._init();b.ImgLoadGroup.superclass.constructor.apply(this,arguments);};b.ImgLoadGroup.NAME="imgLoadGroup";b.ImgLoadGroup.ATTRS={name:{value:""},timeLimit:{value:null},foldDistance:{validator:b.Lang.isNumber,setter:function(d){this._setFoldTriggers();return d;},lazyAdd:false},className:{value:null,setter:function(d){this._className=d;return d;},lazyAdd:false},classNameAction:{value:"default"}};var c={_init:function(){this._triggers=[];this._imgObjs={};this._timeout=null;this._classImageEls=null;this._className=null;this._areFoldTriggersSet=false;this._maxKnownHLimit=0;b.on("domready",this._onloadTasks,this);},addTrigger:function(f,e){if(!f||!e){return this;}var d=function(){this.fetch();};this._triggers.push(b.on(e,d,f,this));return this;},addCustomTrigger:function(d,f){if(!d){return this;}var e=function(){this.fetch();};if(b.Lang.isUndefined(f)){this._triggers.push(b.on(d,e,this));}else{this._triggers.push(f.on(d,e,this));}return this;},_setFoldTriggers:function(){if(this._areFoldTriggersSet){return;}var d=function(){this._foldCheck();};this._triggers.push(b.on("scroll",d,window,this));this._triggers.push(b.on("resize",d,window,this));this._areFoldTriggersSet=true;},_onloadTasks:function(){var d=this.get("timeLimit");if(d&&d>0){this._timeout=setTimeout(this._getFetchTimeout(),d*1000);}if(!b.Lang.isUndefined(this.get("foldDistance"))){this._foldCheck();}},_getFetchTimeout:function(){var d=this;return function(){d.fetch();};},registerImage:function(){var d=arguments[0].domId;if(!d){return null;}this._imgObjs[d]=new b.ImgLoadImgObj(arguments[0]);return this._imgObjs[d];},fetch:function(){this._clearTriggers();this._fetchByClass();for(var d in this._imgObjs){if(this._imgObjs.hasOwnProperty(d)){this._imgObjs[d].fetch();}}},_clearTriggers:function(){clearTimeout(this._timeout);for(var e=0,d=this._triggers.length;e<d;e++){this._triggers[e].detach();}},_foldCheck:function(){var j=true,k=b.DOM.viewportRegion(),h=k.bottom+this.get("foldDistance"),l,e,g,f,d;if(h<=this._maxKnownHLimit){return;}this._maxKnownHLimit=h;for(l in this._imgObjs){if(this._imgObjs.hasOwnProperty(l)){e=this._imgObjs[l].fetch(h);j=j&&e;}}if(this._className){if(this._classImageEls===null){this._classImageEls=[];g=b.all("."+this._className);g.each(function(i){this._classImageEls.push({el:i,y:i.getY(),fetched:false});},this);}g=this._classImageEls;for(f=0,d=g.length;f<d;f++){if(g[f].fetched){continue;}if(g[f].y&&g[f].y<=h){this._updateNodeClassName(g[f].el);g[f].fetched=true;}else{j=false;}}}if(j){this._clearTriggers();}},_updateNodeClassName:function(e){var d;if(this.get("classNameAction")=="enhanced"){if(e.get("tagName").toLowerCase()=="img"){d=e.getStyle("backgroundImage");/url\(["']?(.*?)["']?\)/.test(d);d=RegExp.$1;e.set("src",d);e.setStyle("backgroundImage","");}}e.removeClass(this._className);},_fetchByClass:function(){if(!this._className){return;}b.all("."+this._className).each(b.bind(this._updateNodeClassName,this));}};b.extend(b.ImgLoadGroup,b.Base,c);b.ImgLoadImgObj=function(){b.ImgLoadImgObj.superclass.constructor.apply(this,arguments);this._init();};b.ImgLoadImgObj.NAME="imgLoadImgObj";b.ImgLoadImgObj.ATTRS={domId:{value:null,writeOnce:true},bgUrl:{value:null},srcUrl:{value:null},width:{value:null},height:{value:null},setVisible:{value:false},isPng:{value:false},sizingMethod:{value:"scale"},enabled:{value:"true"}};var a={_init:function(){this._fetched=false;this._imgEl=null;this._yPos=null;},fetch:function(f){if(this._fetched){return true;}var d=this._getImgEl(),e;if(!d){return false;}if(f){e=this._getYPos();if(!e||e>f){return false;}}if(this.get("bgUrl")!==null){if(this.get("isPng")&&b.UA.ie&&b.UA.ie<=6){d.setStyle("filter",'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="'+this.get("bgUrl")+'", sizingMethod="'+this.get("sizingMethod")+'", enabled="'+this.get("enabled")+'")');}else{d.setStyle("backgroundImage","url('"+this.get("bgUrl")+"')");}}else{if(this.get("srcUrl")!==null){d.setAttribute("src",this.get("srcUrl"));}}if(this.get("setVisible")){d.setStyle("visibility","visible");}if(this.get("width")){d.setAttribute("width",this.get("width"));}if(this.get("height")){d.setAttribute("height",this.get("height"));}this._fetched=true;return true;},_getImgEl:function(){if(this._imgEl===null){this._imgEl=b.one("#"+this.get("domId"));}return this._imgEl;},_getYPos:function(){if(this._yPos===null){this._yPos=this._getImgEl().getY();}return this._yPos;}};b.extend(b.ImgLoadImgObj,b.Base,a);},"3.6.0pr1",{requires:["base-base","node-style","node-screen"]});