var llhelper=[];llhelper.generateUUIDAndSaveInLocalStorage=function(){var t=(new Date).getTime(),n=performance&&performance.now&&1e3*performance.now()||0,e="lsxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var l=16*Math.random();return 0<t?(l=(t+l)%16|0,t=Math.floor(t/16)):(l=(n+l)%16|0,n=Math.floor(n/16)),("x"===e?l:3&l|8).toString(16)});return window.localStorage.setItem("trackalyzer",e),e},llhelper.uuid=window.localStorage.getItem("trackalyzer")||llhelper.generateUUIDAndSaveInLocalStorage(),llhelper.cl=void 0!==window.llcookieless&&!0===llcookieless?1:0,llhelper.ll_track=function(e,l){var t={_llid:34132,_fd:function(e){for(var l=btoa(e).split(""),t=[],n=0;n<l.length;n++)t.push(l[n].charCodeAt(0)+1);return String.fromCharCode.apply(null,t)}(e),_llreferer:l,_lluuid:llhelper.uuid,_cl:llhelper.cl,_v:"3"};(new Image).src="https://lltrck.com/api/tracking?"+function(e){var l=[];for(var t in e)e.hasOwnProperty(t)&&l.push(encodeURIComponent(t)+"="+encodeURIComponent(e[t]));return l.join("&")}(t)};var ll_track=function(){setTimeout(llhelper.ll_track,75,window.parent.location.href,window.parent.document.referrer)};ll_track();var ll_formalyze="undefined"!=typeof formalyze&&formalyze?formalyze.track=function(){var a=[],i={},e="undefined"==typeof formalyze||!1!==formalyze.auto;lloverrideUrl=void 0!==formalyze.url&&"string"==typeof formalyze.url&&""!==formalyze.url&&formalyze.url,llinit="undefined"!=typeof formalyze&&"function"==typeof formalyze.init,lldebug="function"==typeof URLSearchParams&&"34132"===new URLSearchParams(window.parent.location.search).get("lldebug"),a.llselectors={LLN:{FIRSTNAME:"[name*='first_name' i],[name*=fname],[name='firstname']",LASTNAME:"[name*='last_name' i],[name='lastname']",FULLNAME:"[name*='full_name' i]"},LLM:"[name*='email' i],[name='email']",LLPH:"[name*='phone' i],[name='phone']",LLCO:"[name*='company' i]",LLT:""},lldebug&&(console.log("---Debug start---"),console.log("accountId = 34132 \nformalyze.auto = "+e+"\nformalyze.url = "+lloverrideUrl+"\nformalyze.init = "+llinit)),i.validateEmail=function(e){return/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(e).toLowerCase())},i.llfindEmail=function(){for(var e=0;e<this.length;e++)if(this[e]&&this[e].value&&validateEmail(this[e].value))return this[e].value;return!1},i.llcollectInputValues=function(){var e,l=[];for(var t in a.llselectors)if(a.llselectors.hasOwnProperty(t)){l[t]="";try{if("object"==typeof a.llselectors[t]){for(var n in a.llselectors[t])if(a.llselectors[t].hasOwnProperty(n)&&a.llselectors[t][n]){var o=this.querySelectorAll(a.llselectors[t][n]);for(var r in o)if(o.hasOwnProperty(r)&&o[r].value){l[t]=l[t]?l[t]+" "+o[r].value:o[r].value;break}}}else if("string"==typeof a.llselectors[t]&&a.llselectors[t]){o=this.querySelectorAll(a.llselectors[t]);for(var r in o)if(o.hasOwnProperty(r)&&o[r].value){l[t]=o[r].value;break}}"LLM"!==t||""!==l.LLM||(e=i.llfindEmail.call(this))&&(l.LLM=e)}catch(e){}}return l},i.llcollectData=function(){try{lldebug&&console.log("Collecting data start.");var e=[],l="",t=lloverrideUrl?formalyze.url:window.parent.location.protocol+"//"+window.parent.location.host+window.parent.location.pathname,e=i.llcollectInputValues.call(this);for(var n in e)e.hasOwnProperty(n)&&(l+=n+"="+e[n]+"&");return lldebug&&console.log("clientUrl = "+t+"\nquery = "+l),t+"?"+l}catch(e){lldebug&&console.log("An error occured while collecting data."+e)}},i.llsendTrack=function(e){lldebug&&console.log("Submit event has been fired.");var l=e instanceof Element||e instanceof HTMLDocument?e:this,t=i.llcollectData.call(l);try{lldebug&&console.log("Sending track start."),llhelper.ll_track(t,"form"),lldebug&&console.log("Track has been send."),lldebug&&console.log("---Debug finish---")}catch(e){lldebug&&console.log("An error occured while sending track."+e)}},i.llbindSubmitEvent=function(e){try{if(void 0!==window.parent.document){for(var l=0;l<window.parent.document.forms.length;l++)window.parent.document.forms[l].addEventListener?(lldebug&&console.log("Add submit event to the form element. ID: "+window.parent.document.forms[l].id),window.parent.document.forms[l].addEventListener("submit",i.llsendTrack,!1)):window.parent.document.forms[l].attachEvent&&(lldebug&&console.log("Add submit event to the form element. ID: "+window.parent.document.forms[l].id),window.parent.document.forms[l].attachEvent("onsubmit",i.llsendTrack));for(l=0;l<window.parent.document.getElementsByTagName("iframe").length;l++)void 0!==window.parent.document.getElementsByTagName("iframe")[l].contentDocument&&null!==window.parent.document.getElementsByTagName("iframe")[l].contentDocument&&void 0!==window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body&&null!==window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body&&(window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body.addEventListener?(lldebug&&console.log("Add submit event to the iframe element. ID: "+window.parent.document.getElementsByTagName("iframe")[l].id),window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body.addEventListener("submit",i.llsendTrack,!1)):window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body.attachEvent&&(lldebug&&console.log("Add submit event to the iframe element. ID: "+window.parent.document.getElementsByTagName("iframe")[l].id),window.parent.document.getElementsByTagName("iframe")[l].contentDocument.body.attachEvent("onsubmit",i.llsendTrack)));e++<4&&setTimeout(i.llbindSubmitEvent.bind(null,e),500)}}catch(e){lldebug&&console.log("An error occured while adding submit event."+e)}};try{window.addEventListener&&e?(lldebug&&console.log("Add load event."),window.addEventListener("load",i.llbindSubmitEvent(1),!1)):window.attachEvent&&e&&(lldebug&&console.log("Add load event."),window.parent.document.forms[llformlooper].attachEvent("onload",i.llbindSubmitEvent(1)))}catch(e){lldebug&&console.log("An error occured while adding load event."+e)}if(llinit)try{lldebug&&console.log("Execut formalyze.init"),formalyze.init(a)}catch(e){lldebug&&console.log("An error occured while executed client formalyze.init method. "+e)}return i.llsendTrack}():void 0;