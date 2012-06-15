/*
jQWidgets v2.2.0 (2012-May-25)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxCheckBox","",{});a.extend(a.jqx._jqxCheckBox.prototype,{defineInstance:function(){this.animationShowDelay=300,this.animationHideDelay=300,this.width=null;this.height=null;this.boxSize="13px";this.checked=false;this.hasThreeStates=false;this.disabled=false;this.enableContainerClick=true;this.locked=false;this.groupName="";this.keyboardCheck=true;this.events=["checked","unchecked","indeterminate","change"]},createInstance:function(b){var d=this;this.setSize();this.propertyChangeMap.width=function(e,g,f,h){d.setSize()};this.propertyChangeMap.height=function(e,g,f,h){d.setSize()};this.checkbox=a("<div><div><span></span></div></div>");this.host.attr("tabIndex",0);this.host.prepend(this.checkbox);this.checkMark=a(this.checkbox).find("span");this.box=a(this.checkbox).find("div");this.box.addClass(this.toThemeProperty("jqx-checkbox-default"));this.box.addClass(this.toThemeProperty("jqx-fill-state-normal"));this.box.addClass(this.toThemeProperty("jqx-rc-all"));if(this.disabled){this.box.addClass(this.toThemeProperty("jqx-checkbox-disabled"))}this.host.addClass(this.toThemeProperty("jqx-widget"));this.host.addClass(this.toThemeProperty("jqx-checkbox"));if(this.locked){this.host.css("cursor","auto")}var c=this.element.getAttribute("checked");if(c=="checked"||c=="true"||c==true){this.checked=true}this._render();this._addHandlers()},refresh:function(b){if(!b){this.setSize();this._render()}},setSize:function(){if(this.width!=null&&this.width.toString().indexOf("px")!=-1){this.host.width(this.width)}else{if(this.width!=undefined&&!isNaN(this.width)){this.host.width(this.width)}}if(this.height!=null&&this.height.toString().indexOf("px")!=-1){this.host.height(this.height)}else{if(this.height!=undefined&&!isNaN(this.height)){this.host.height(this.height)}}},_addHandlers:function(){var b=this;this.addHandler(this.box,"click",function(c){if(!b.disabled&&!b.enableContainerClick&&!b.locked){b.toggle();if(b.updated){c.owner=b;b.updated(c,b.checked)}c.preventDefault();return false}});this.addHandler(this.host,"keydown",function(c){if(!b.disabled&&!b.locked&&b.keyboardCheck){if(c.keyCode==32){b.toggle();c.preventDefault();return false}}});this.addHandler(this.host,"click",function(c){if(!b.disabled&&b.enableContainerClick&&!b.locked){b.toggle();c.preventDefault();return false}});this.addHandler(this.host,"selectstart",function(c){if(!b.disabled&&b.enableContainerClick){c.preventDefault();return false}});this.addHandler(this.host,"mouseup",function(c){if(!b.disabled&&b.enableContainerClick){c.preventDefault();return false}});this.addHandler(this.host,"focus",function(c){if(!b.disabled&&!b.locked){b.box.addClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.addClass(b.toThemeProperty("jqx-fill-state-focus"));c.preventDefault();b.hovered=true;return false}});this.addHandler(this.host,"blur",function(c){if(!b.disabled&&!b.locked){b.box.removeClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.removeClass(b.toThemeProperty("jqx-fill-state-focus"));c.preventDefault();b.hovered=false;return false}});this.addHandler(this.host,"mouseenter",function(c){if(b.locked){b.host.css("cursor","arrow")}if(!b.disabled&&b.enableContainerClick&&!b.locked){b.box.addClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.addClass(b.toThemeProperty("jqx-fill-state-hover"));c.preventDefault();b.hovered=true;return false}});this.addHandler(this.host,"mouseleave",function(c){if(!b.disabled&&b.enableContainerClick&&!b.locked){b.box.removeClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.removeClass(b.toThemeProperty("jqx-fill-state-hover"));c.preventDefault();b.hovered=false;return false}});this.addHandler(this.box,"mouseenter",function(){if(b.locked){return}if(!b.disabled&&!b.enableContainerClick){b.box.addClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.addClass(b.toThemeProperty("jqx-fill-state-hover"))}});this.addHandler(this.box,"mouseleave",function(){if(!b.disabled&&!b.enableContainerClick){b.box.removeClass(b.toThemeProperty("jqx-checkbox-hover"));b.box.removeClass(b.toThemeProperty("jqx-fill-state-hover"))}})},_removeHandlers:function(){this.removeHandler(this.box,"click");this.removeHandler(this.box,"mouseenter");this.removeHandler(this.box,"mouseleave");this.removeHandler(this.host,"click");this.removeHandler(this.host,"mouseup");this.removeHandler(this.host,"selectstart");this.removeHandler(this.host,"mouseenter");this.removeHandler(this.host,"mouseleave");this.removeHandler(this.host,"keydown");this.removeHandler(this.host,"blur");this.removeHandler(this.host,"focus")},_render:function(){if(this.boxSize==null){this.boxSize=13}this.box.width(this.boxSize);this.box.height(this.boxSize);this.checkMark.width(this.boxSize);this.checkMark.height(this.boxSize);if(!this.disabled){if(this.enableContainerClick){this.host.css("cursor","pointer")}else{this.host.css("cursor","auto")}}else{this.box.addClass(this.toThemeProperty("jqx-checkbox-disabled-box"));this.host.addClass(this.toThemeProperty("jqx-checkbox-disabled"));this.host.addClass(this.toThemeProperty("jqx-fill-state-disabled"))}this.updateStates()},check:function(){this.checked=true;var b=this;this.checkMark.removeClass();if(a.browser.msie){this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-checked"))}else{this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-checked"));this.checkMark.css("opacity",0);this.checkMark.stop().animate({opacity:1},this.animationShowDelay,function(){})}var c=a.find(this.toThemeProperty(".jqx-checkbox",true));if(this.groupName!=null&&this.groupName.length>0){a.each(c,function(){var d=a(this).jqxCheckBox("groupName");if(d==b.groupName&&this!=b.element){a(this).jqxCheckBox("uncheck")}})}this._raiseEvent("0",true);this._raiseEvent("3",{checked:true})},uncheck:function(){this.checked=false;var b=this;if(a.browser.msie){b.checkMark.removeClass()}else{this.checkMark.css("opacity",1);this.checkMark.stop().animate({opacity:0},this.animationHideDelay,function(){b.checkMark.removeClass()})}this._raiseEvent("1");this._raiseEvent("3",{checked:false})},indeterminate:function(){this.checked=null;this.checkMark.removeClass();if(a.browser.msie){this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-indeterminate"))}else{this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-indeterminate"));this.checkMark.css("opacity",0);this.checkMark.stop().animate({opacity:1},this.animationShowDelay,function(){})}this._raiseEvent("2");this._raiseEvent("3",{checked:null})},toggle:function(){if(this.disabled){return}if(this.locked){return}if(this.groupName!=null&&this.groupName.length>0){if(this.checked!=true){this.checked=true;this.updateStates()}return}if(this.checked==true){this.checked=this.hasThreeStates?null:false}else{this.checked=this.checked!=null}this.updateStates()},updateStates:function(){if(this.checked){this.check()}else{if(this.checked==false){this.uncheck()}else{if(this.checked==null){this.indeterminate()}}}},disable:function(){this.checkMark.removeClass();this.disabled=true;if(this.checked==true){this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-disabled"))}else{if(this.checked==null){this.checkMark.addClass(this.toThemeProperty("jqx-checkbox-check-indeterminate-disabled"))}}},enable:function(){this.checkMark.removeClass();this.disabled=false},destroy:function(){this._removeHandlers();this.host.removeClass();this.host.remove()},_raiseEvent:function(g,e){var c=this.events[g];var f=new jQuery.Event(c);f.owner=this;f.args=e;try{var b=this.host.trigger(f)}catch(d){}return b},propertyChangedHandler:function(b,c,e,d){if(this.isInitialized==undefined||this.isInitialized==false){return}if(c==b.enableContainerClick&&!b.disabled&&!b.locked){if(d){b.host.css("cursor","pointer")}else{b.host.css("cursor","auto")}}if(c=="theme"){a.jqx.utilities.setTheme(e,d,b.host)}if(c=="checked"){if(d!=e){switch(d){case true:b.check();break;case false:b.uncheck();break;case null:b.indeterminate();break}}}if(c=="disable"){if(d){b.disable()}else{b.enable()}}}})})(jQuery);