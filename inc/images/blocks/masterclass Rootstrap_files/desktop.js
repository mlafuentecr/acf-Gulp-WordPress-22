function minimizeCardPathmonk(widgetStatus,P_widget_card_frame_holder,P_widget_card_iframe_container){if(widgetStatus!=0){widgetStatus=0;var widgetHolder=document.getElementById(P_widget_card_frame_holder);widgetHolder.style.height=45+"px";widgetHolder.style.width=45+"px";var iFrame=document.getElementById(P_widget_card_iframe_container);var event=8;var params=true}return widgetStatus}function menuItemCardPathmonk(widgetStatus,P_widget_card_frame_holder,P_widget_card_iframe_container){if(widgetStatus!=4){widgetStatus=4;var widgetHolder=document.getElementById(P_widget_card_frame_holder);widgetHolder.style.height="265px";widgetHolder.style.width="70px";var iFrame=document.getElementById(P_widget_card_iframe_container);var event=8;var params=true}return widgetStatus}function resetHeightPlugin_2(widgetStatus){}function smallCardPathmonk(widgetStatus,P_widget_card_frame_holder,P_widget_card_iframe_container){if(widgetStatus!=1){widgetStatus=1;var widgetHolder=document.getElementById(P_widget_card_frame_holder);widgetHolder.style.right="-450px";var desktopBar=document.getElementById("pathmonkBarDesktop");desktopBar.style.width="45px";setTimeout(function(widgetHolder){widgetHolder.style.width="45px";widgetHolder.style.top="calc(50% - 110px)";resetHeightPlugin_2(widgetStatus);setTimeout(function(widgetHolder){widgetHolder.style.right="0px";widgetHolder.style.height=220+"px"},250,widgetHolder)},250,widgetHolder);var iFrame=document.getElementById(P_widget_card_iframe_container);var event=8;var params=true}return widgetStatus}function mediumCardPathmonk(widgetStatus,P_widget_card_frame_holder,P_widget_card_iframe_container){if(widgetStatus!=2){widgetStatus=2;var widgetHolder=document.getElementById(P_widget_card_frame_holder);if(widgetHolder.style.width=="420px"){widgetHolder.style.height=305+"px"}else{var desktopBar=document.getElementById("pathmonkBarDesktop");desktopBar.style.width="0px";widgetHolder.style.right="-425px";setTimeout(function(widgetHolder){widgetHolder.style.top="100px";widgetHolder.style.height=305+"px";widgetHolder.style.width="420px";widgetHolder.style.right="0px"},450,widgetHolder)}var iFrame=document.getElementById(P_widget_card_iframe_container);var event=8;var params=true}return widgetStatus}function largeCardPathmonk(widgetStatus,P_widget_card_frame_holder,P_widget_card_iframe_container){if(widgetStatus!=3){widgetStatus=3;var widgetHolder=document.getElementById(P_widget_card_frame_holder);if(widgetHolder.style.width=="480px"){widgetHolder.style.height=565+"px"}else{var desktopBar=document.getElementById("pathmonkBarDesktop");desktopBar.style.width="0px";widgetHolder.style.right="-425px";setTimeout(function(widgetHolder){widgetHolder.style.top="100px";widgetHolder.style.height=565+"px";widgetHolder.style.width="480px";widgetHolder.style.right="0px"},450,widgetHolder)}var iFrame=document.getElementById(P_widget_card_iframe_container);var event=8;var params=true}return widgetStatus}function scrollMiniPForce(widgetHolder){var desktopBar=document.getElementById("pathmonkBarDesktop");desktopBar.style.width="45px";setTimeout(function(){widgetHolder.style.width="80px";widgetHolder.style.height=220+"px"},250)}function menuDissapearForced(widgetHolder){widgetHolder.style.width="0px";var desktopBar=document.getElementById("pathmonkBarDesktop");desktopBar.style.width="0px"}function deviceCustomSetupMessage(setup,titleTxt){var elem=document.createElement("div");elem.id="pathmonkBoxMessageActions";var img="";var divTxt='<div id="pathmonkBoxMessageActionsHolder" style="box-shadow: '+setup.shadow+" 0px -2px 10px 0px;border-radius: 7px;background-color: "+setup.bg+';margin-top: 9px;margin-left: 15px;height: 55px;text-align: left;box-sizing: content-box;-webkit-transition: background-color 200ms linear;-moz-transition: background-color 200ms linear;-ms-transition: background-color 200ms linear;-o-transition: background-color 200ms linear;transition: background-color 200ms linear;" >';var txt='<div id="pathmonkBoxMessageActionsText"  style="padding-top: 8px;padding-bottom: 7px;padding-right: 3px;padding-left: 20px;border-radius: 7px;width: 301px;max-width: calc(100% - 23px);display: inline-block;background-color: white;border-right: 1px solid #bdbdbd;height: 40px !important;box-sizing: content-box;" class="pathmonk-message-box-items-message" ><div style="color: '+setup.font+';line-height: 15px;font-size: 14px">'+titleTxt+'</div><div id="pathmonkBoxMessageActionsTextChar" style="color: '+setup.font+';line-height: 28px;font-weight: 600"></div></div>';var action='<div id="pathmonkBoxMessageActionsButton"  style="width: 50px;text-align: center;border-left: grey;color: white;height: 40px;font-size: 14px;cursor: pointer;display: none;position: absolute;line-height:28px; padding-top: 12px;right: 10px;box-sizing: content-box;"></div>';divTxt+=txt+action+"</div>";elem.innerHTML=img+divTxt;elem.style.cssText="z-index: 2147483647;width: 340px;max-width: 340px;height: 75px;position: fixed; background-color: transparent;box-sizing: content-box;top:100px;";elem.className="pathmonk-message-box";return elem}