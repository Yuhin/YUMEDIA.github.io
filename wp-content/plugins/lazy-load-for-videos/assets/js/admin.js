!function(t){var n={};function e(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,e),r.l=!0,r.exports}e.m=t,e.c=n,e.d=function(t,n,o){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:o})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(e.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var r in t)e.d(o,r,function(n){return t[n]}.bind(null,r));return o},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=9)}({6:function(t,n,e){},8:function(t,n,e){},9:function(t,n,e){"use strict";e(8),e(6),function(t,n){n(document).ready(function(){e()});var e=function(){o(),c(),u()},o=function(){n("#tabs").tabs(),r(),i()},r=function(){n("#tabs").on("tabsactivate",function(t,n){var e=n.newTab.children("li a").first().attr("href");history.pushState(null,null,e),history.pushState?history.pushState(null,null,e):location.hash=e})},i=function(){setTimeout(function(){location.hash&&n("html, body").animate({scrollTop:0},1e3)},1)},u=function(){n(".toggle").on("click",function(t){n(t.target).siblings(".toggle-me").toggle()})},c=function(){n(".ll_picker_player_colour").wpColorPicker()}}(window.incom=window.incom||{},jQuery)}});
//# sourceMappingURL=admin.js.map