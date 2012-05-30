/*
YUI 3.6.0pr1 (build 5195)
Copyright 2012 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("button-base",function(f){function d(g){if(g){return f.ClassNameManager.getClassName(a.NAME,g);}else{return f.ClassNameManager.getClassName(a.NAME);}}function a(g){this.initializer(g);}a.prototype={TEMPLATE:"<button/>",constructor:a,enable:function(){this.set("disabled",false);},disable:function(){this.set("disabled",true);},_initAttributes:function(g){g.label=g.label||g.host.getContent();f.AttributeCore.call(this,a.ATTRS,g);},_initNode:function(g){if(g.srcNode){this._host=f.one(g.srcNode);}else{this._host=f.Node.create(this.TEMPLATE);}},_uiSetLabel:function(i){var h=this._host,g=(h.get("tagName").toLowerCase()==="input")?"value":"text";h.set(g,i);return i;},_uiSetDisabled:function(h){var g=this.getNode();g.getDOMNode().disabled=h;g.toggleClass(a.CLASS_NAMES.DISABLED,h);return h;},_uiGetLabel:function(){var h=this._host,g=(h.get("tagName").toLowerCase()==="input")?"value":"text",i;i=h.get(g);return i;},getNode:function(){return this._host;},initializer:function(g){this._initNode(g);this._initAttributes(g);this.renderUI(g);},renderUI:function(g){var h=this._host;h.addClass(a.CLASS_NAMES.BUTTON);h.set("role","button");}};a.ATTRS={label:{setter:"_uiSetLabel",getter:"_uiGetLabel",lazyAdd:false},disabled:{value:false,setter:"_uiSetDisabled",lazyAdd:false}};a.NAME="button";a.CLASS_NAMES={BUTTON:d(),DISABLED:d("disabled")};f.mix(a.prototype,f.AttributeCore.prototype);f.ButtonBase=a;function b(g){if(!this._initNode){return b.factory(g);}b.superclass.constructor.apply(this,arguments);}f.extend(b,f.ButtonBase,{_afterNodeGet:function(h){var g=this.constructor.ATTRS,i=g[h]&&g[h].getter&&this[g[h].getter];if(i){return new f.Do.AlterReturn("get "+h,i.call(this));}},_afterNodeSet:function(h,j){var g=this.constructor.ATTRS,i=g[h]&&g[h].setter&&this[g[h].setter];if(i){i.call(this,j);}},_initNode:function(g){var h=g.host;this._host=h;f.Do.after(this._afterNodeGet,h,"get",this);f.Do.after(this._afterNodeSet,h,"set",this);},destroy:function(){}},{ATTRS:f.merge(f.ButtonBase.ATTRS),NAME:"buttonPlugin",NS:"button"});b.factory=function(h,g){if(h&&!g){if(!(h.nodeType||h.getDOMNode||typeof h=="string")){g=h;h=g.srcNode;}}h=h||g&&g.srcNode||f.DOM.create(f.Plugin.Button.prototype.TEMPLATE);return f.one(h).plug(f.Plugin.Button,g);};f.Plugin.Button=b;function c(g){c.superclass.constructor.apply(this,arguments);}f.extend(c,f.Widget,{initializer:function(g){this._host=this.get("boundingBox");},BOUNDING_TEMPLATE:f.ButtonBase.prototype.TEMPLATE,CONTENT_TEMPLATE:null,bindUI:function(){var g=this;this.after("labelChange",this._afterLabelChange);this.after("disabledChange",this._afterDisabledChange);this.after("selectedChange",this._afterSelectedChange);},_uiSetSelected:function(g){this.get("contentBox").toggleClass("yui3-button-selected",g).set("aria-pressed",g);},_afterLabelChange:function(g){this._uiSetLabel(g.newVal);},_afterDisabledChange:function(g){this._uiSetDisabled(g.newVal);},_afterSelectedChange:function(g){this._uiSetSelected(g.newVal);},syncUI:function(){this._uiSetLabel(this.get("label"));this._uiSetDisabled(this.get("disabled"));this._uiSetSelected(this.get("selected"));},},{NAME:"button",});c.ATTRS={label:{value:f.ButtonBase.ATTRS.label.value},disabled:{value:false},selected:{value:false}};c.HTML_PARSER={label:function(g){this._host=g;return this._uiGetLabel();},disabled:function(g){return g.getDOMNode().disabled;},selected:function(g){return g.hasClass("yui3-button-selected");}};f.mix(c.prototype,f.ButtonBase.prototype);f.Button=c;function e(g){c.superclass.constructor.apply(this,arguments);}f.extend(e,f.Button,{trigger:"click",select:function(){this.set("selected",true);},unselect:function(){this.set("selected",false);},toggle:function(){var g=this;g.set("selected",!g.get("selected"));},bindUI:function(){var g=this;e.superclass.bindUI.call(g);g.get("contentBox").set("role","toggle");g.get("contentBox").on(g.trigger,g.toggle,g);}},{NAME:"toggleButton"});f.ToggleButton=e;},"3.6.0pr1",{requires:["widget","classnamemanager","node"]});