const map = L.map('map').setView([50.09359475866585, 19.407093465642], 18);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([50.09359475866585, 19.407093465642]).addTo(map)
    .bindPopup('MASH TYNK')
    .openPopup();