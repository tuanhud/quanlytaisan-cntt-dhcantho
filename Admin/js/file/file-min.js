/*
YUI 3.6.0pr1 (build 5195)
Copyright 2012 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
YUI.add("file",function(b){var a=b.config.win;if(a&&a.File&&a.FormData&&a.XMLHttpRequest){b.File=b.FileHTML5;}else{b.File=b.FileFlash;}},"3.6.0pr1",{requires:["file-flash","file-html5"]});