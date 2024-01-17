'use strict'

IniciarMap();

function IniciarMap(){
    let map = L.map('map').setView([17.9901533,-92.9475673],6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.control.scale().addTo(map);
    L.marker([41.66, -4.71],{draggable: true}).addTo(map);
}

    

