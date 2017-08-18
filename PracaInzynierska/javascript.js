// javascript.js

function O(i) { return typeof i == 'object' ? i : document.getElementById(i); }
function S(i) { return O(i).style;                                            }
function C(i) { return document.getElementsByClassName(i);                    }
pokazmenu=0;

pokaz();
pokazDol();
potrzasnijBledem();


function pokaz(){     
    $('#wszystko' ).show( "fade", 2000 );
};

function pokazDol()
{
    $('#dol').show("fade",500);
}
function initMap() {
        var uluru = {lat: 52.069167, lng: 19.480556};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        
      };
      
function potrzasnijBledem()
{
    $("blad").effect("pulsate");
}
    
$( function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  } );
$(function(){
    $("body").niceScroll();
}