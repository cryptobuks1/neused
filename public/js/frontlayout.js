"use strict";

function categoryfilter(cid,sid,chid,first,last){

var conversion_rate = crate;
var start = first * conversion_rate;
start = start.toFixed(2);
var end = last * conversion_rate;
end = end.toFixed(2);

var url = new URL(exist);

var query_string = url.search;

var search_params = new URLSearchParams(query_string); 

search_params.set('category', cid);

if(sid == ''){
  
}else{
  search_params.set('sid', sid);
}
if(chid == ''){
 
}else{
  search_params.set('sid', sid);
  search_params.set('chid', chid);
}

search_params.set('start', start);
search_params.set('end', end);
search_params.set('page', 1);


  url.search = search_params.toString();

  var new_url = url.toString();


  window.history.pushState('page2', 'Title', new_url);

  var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
      }
  }; 
  var tag = getUrlParameter('tag');

         
        $.ajax({
          url : setstart,
          data : { start: first, end: last },
          success : function(data){
            console.log(data);
          } 
        });

        location.href=new_url;
}

function catPage(url){

    $("#dropdown ul").hide();  

    window.location.href=url;
}