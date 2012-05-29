/*
YUI 3.5.0pr2 (build 4560)
Copyright 2011 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("node-base",function(e){var d=["hasClass","addClass","removeClass","replaceClass","toggleClass"];e.Node.importMethod(e.DOM,d);e.NodeList.importMethod(e.Node.prototype,d);var c=e.Node,b=e.DOM;c.create=function(f,g){if(g&&g._node){g=g._node;}return e.one(b.create(f,g));};e.mix(c.prototype,{create:c.create,insert:function(g,f){this._insert(g,f);return this;},_insert:function(i,g){var h=this._node,f=null;if(typeof g=="number"){g=this._node.childNodes[g];}else{if(g&&g._node){g=g._node;}}if(i&&typeof i!="string"){i=i._node||i._nodes||i;}f=b.addHTML(h,i,g);return f;},prepend:function(f){return this.insert(f,0);},append:function(f){return this.insert(f,null);},appendChild:function(f){return c.scrubVal(this._insert(f));},insertBefore:function(g,f){return e.Node.scrubVal(this._insert(g,f));},appendTo:function(f){e.one(f).append(this);return this;},setContent:function(f){this._insert(f,"replace");return this;},getContent:function(f){return this.get("innerHTML");}});e.Node.prototype.setHTML=e.Node.prototype.setContent;e.Node.prototype.getHTML=e.Node.prototype.getContent;e.NodeList.importMethod(e.Node.prototype,["append","insert","appendChild","insertBefore","prepend","setContent","getContent"]);var c=e.Node,b=e.DOM;c.ATTRS={text:{getter:function(){return b.getText(this._node);},setter:function(f){b.setText(this._node,f);return f;}},"for":{getter:function(){return b.getAttribute(this._node,"for");},setter:function(f){b.setAttribute(this._node,"for",f);return f;}},"options":{getter:function(){return this._node.getElementsByTagName("option");}},"children":{getter:function(){var j=this._node,h=j.children,k,g,f;if(!h){k=j.childNodes;h=[];for(g=0,f=k.length;g<f;++g){if(k[g].tagName){h[h.length]=k[g];}}}return e.all(h);}},value:{getter:function(){return b.getValue(this._node);},setter:function(f){b.setValue(this._node,f);return f;}}};e.Node.importMethod(e.DOM,["setAttribute","getAttribute"]);var c=e.Node;var a=e.NodeList;c.DOM_EVENTS={abort:1,beforeunload:1,blur:1,change:1,click:1,close:1,command:1,contextmenu:1,dblclick:1,DOMMouseScroll:1,drag:1,dragstart:1,dragenter:1,dragover:1,dragleave:1,dragend:1,drop:1,error:1,focus:1,key:1,keydown:1,keypress:1,keyup:1,load:1,message:1,mousedown:1,mouseenter:1,mouseleave:1,mousemove:1,mousemultiwheel:1,mouseout:1,mouseover:1,mouseup:1,mousewheel:1,orientationchange:1,reset:1,resize:1,select:1,selectstart:1,submit:1,scroll:1,textInput:1,unload:1};e.mix(c.DOM_EVENTS,e.Env.evt.plugins);e.augment(c,e.EventTarget);e.mix(c.prototype,{purge:function(g,f){e.Event.purgeElement(this._node,g,f);return this;}});e.mix(e.NodeList.prototype,{_prepEvtArgs:function(i,h,g){var f=e.Array(arguments,0,true);if(f.length<2){f[2]=this._nodes;}else{f.splice(2,0,this._nodes);}f[3]=g||this;return f;},on:function(h,g,f){return e.on.apply(e,this._prepEvtArgs.apply(this,arguments));},once:function(h,g,f){return e.once.apply(e,this._prepEvtArgs.apply(this,arguments));},after:function(h,g,f){return e.after.apply(e,this._prepEvtArgs.apply(this,arguments));},onceAfter:function(h,g,f){return e.onceAfter.apply(e,this._prepEvtArgs.apply(this,arguments));}});a.importMethod(e.Node.prototype,["detach","detachAll"]);e.mix(e.Node.ATTRS,{offsetHeight:{setter:function(f){e.DOM.setHeight(this._node,f);return f;},getter:function(){return this._node.offsetHeight;}},offsetWidth:{setter:function(f){e.DOM.setWidth(this._node,f);return f;},getter:function(){return this._node.offsetWidth;}}});e.mix(e.Node.prototype,{sizeTo:function(f,g){var i;if(arguments.length<2){i=e.one(f);f=i.get("offsetWidth");g=i.get("offsetHeight");}this.setAttrs({offsetWidth:f,offsetHeight:g});}});var c=e.Node;e.mix(c.prototype,{show:function(f){f=arguments[arguments.length-1];this.toggleView(true,f);return this;},_show:function(){this.setStyle("display","");},_isHidden:function(){return e.DOM.getStyle(this._node,"display")==="none";},toggleView:function(f,g){this._toggleView.apply(this,arguments);},_toggleView:function(f,g){g=arguments[arguments.length-1];if(typeof f!="boolean"){f=(this._isHidden())?1:0;}if(f){this._show();}else{this._hide();}if(typeof g=="function"){g.call(this);}return this;},hide:function(f){f=arguments[arguments.length-1];this.toggleView(false,f);return this;},_hide:function(){this.setStyle("display","none");}});e.NodeList.importMethod(e.Node.prototype,["show","hide","toggleView"]);if(!e.config.doc.documentElement.hasAttribute){e.Node.prototype.hasAttribute=function(f){if(f==="value"){if(this.get("value")!==""){return true;}}return !!(this._node.attributes[f]&&this._node.attributes[f].specified);};}e.Node.prototype.focus=function(){try{this._node.focus();}catch(f){}return this;};e.Node.ATTRS.type={setter:function(g){if(g==="hidden"){try{this._node.type="hidden";}catch(f){this.setStyle("display","none");this._inputType="hidden";}}else{try{this._node.type=g;}catch(f){}}return g;},getter:function(){return this._inputType||this._node.type;},_bypassProxy:true};if(e.config.doc.createElement("form").elements.nodeType){e.Node.ATTRS.elements={getter:function(){return this.all("input, textarea, button, select");}};}},"3.5.0pr2",{requires:["dom-base","node-core","event-base"]});