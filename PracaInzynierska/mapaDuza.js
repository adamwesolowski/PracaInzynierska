if(typeof navigator.geolocation == 'undefined')
    alert("Funkcja geolokacji nie jest obsługiwana w twojej przeglądarce");
    navigator.geolocation.getCurrentPosition(granted, danied);

function granted(position)
{
    O('status').innerHTML = 'Pozwolenie przyznane';
    S('mapa').border = '1px solid black';
    S('mapa').width = '100%';
    S('mapa').height = '320px';
    
    
    var lat=52.173931692568;
    var lng=18.8525390625;
    var gmap = O('map');
    var gopts = 
            {
                center: new google.maps.LatLng(lat, long),zoom: 9, mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(gmap, gopts);
}

function danied(error)
{
    var wiadomosc
    
    switch(error.code)
    {
            case 1: wiadomosc = 'Brak pozwolenia'; break;
            case 2: wiadomosc = 'Położenie niedostępne'; break;
            case 3: wiadomosc = 'Przekroczony czas operacji'; break;
            case 4: wiadomosc = 'Nieznany błąd'; break;
    }
    O('status').innerHTML = wiadomosc;
}