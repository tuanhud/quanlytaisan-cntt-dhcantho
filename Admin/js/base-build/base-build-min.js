/*
YUI 3.5.0pr2 (build 4560)
Copyright 2011 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("base-build",function(f){var c=f.Base,a=f.Lang,b="initializer",d="destructor",e;c._build=function(B,p,z,s,t,o){var u=c._build,x=u._ctor(p,o),q=u._cfg(p,o),h=u._mixCust,m=q.aggregates,g=q.custom,k=x._yuibuild.dynamic,w,v,A,j,n,y,r;if(k&&m){for(w=0,v=m.length;w<v;++w){A=m[w];if(p.hasOwnProperty(A)){x[A]=a.isArray(p[A])?[]:{};}}}for(w=0,v=z.length;w<v;w++){j=z[w];n=j.prototype;y=n[b];r=n[d];delete n[b];delete n[d];f.mix(x,j,true,null,1);h(x,j,m,g);if(y){n[b]=y;}if(r){n[d]=r;}x._yuibuild.exts.push(j);}if(s){f.mix(x.prototype,s,true);}if(t){f.mix(x,u._clean(t,m,g),true);h(x,t,m,g);}x.prototype.hasImpl=u._impl;if(k){x.NAME=B;x.prototype.constructor=x;}return x;};e=c._build;f.mix(e,{_mixCust:function(i,h,l,k){if(l){f.aggregate(i,h,true,l);}if(k){for(var g in k){if(k.hasOwnProperty(g)){k[g](g,i,h);}}}},_tmpl:function(g){function h(){h.superclass.constructor.apply(this,arguments);}f.extend(h,g);return h;},_impl:function(m){var p=this._getClasses(),o,h,g,n,q,k;for(o=0,h=p.length;o<h;o++){g=p[o];if(g._yuibuild){n=g._yuibuild.exts;q=n.length;for(k=0;k<q;k++){if(n[k]===m){return true;}}}}return false;},_ctor:function(g,h){var j=(h&&false===h.dynamic)?false:true,k=(j)?e._tmpl(g):g,i=k._yuibuild;if(!i){i=k._yuibuild={};}i.id=i.id||null;i.exts=i.exts||[];i.dynamic=j;return k;},_cfg:function(g,h){var i=[],l={},k,j=(h&&h.aggregates),n=(h&&h.custom),m=g;while(m&&m.prototype){k=m._buildCfg;if(k){if(k.aggregates){i=i.concat(k.aggregates);}if(k.custom){f.mix(l,k.custom,true);}}m=m.superclass?m.superclass.constructor:null;}if(j){i=i.concat(j);}if(n){f.mix(l,h.cfgBuild,true);}return{aggregates:i,custom:l};},_clean:function(o,n,j){var m,h,g,k=f.merge(o);for(m in j){if(k.hasOwnProperty(m)){delete k[m];}}for(h=0,g=n.length;h<g;h++){m=n[h];if(k.hasOwnProperty(m)){delete k[m];}}return k;}});c.build=function(i,g,j,h){return e(i,g,j,null,null,h);};c.create=function(g,j,i,h,k){return e(g,j,i,h,k);};c.mix=function(g,h){return e(null,g,h,null,null,{dynamic:false});};c._buildCfg={custom:{ATTRS:function(l,j,h){j.ATTRS=j.ATTRS||{};if(h.ATTRS){var i=h.ATTRS,k=j.ATTRS,g;for(g in i){if(i.hasOwnProperty(g)){k[g]=k[g]||{};f.mix(k[g],i[g],true);}}}}},aggregates:["_PLUG","_UNPLUG"]};},"3.5.0pr2",{requires:["base-base"]});