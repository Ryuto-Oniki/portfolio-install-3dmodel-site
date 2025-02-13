
document.querySelectorAll(".area").forEach(function(element) {
    element.addEventListener("dblclick", function() {
        window.location.href = element.getAttribute("data-show-url");
    });
});


// GoogleMapAPIの設定

let map;
let firstLatitude = 36.0000;
let firstLongitude = 138.8043;

async function initMap() {
const { Map } = await google.maps.importLibrary("maps");

map = new Map(document.getElementById("map"), {
    center: { lat: 36.0000, lng: 138.8043 },
    zoom: 8,
    mapTypeId: "hybrid",
});
}

initMap();


// ボタンを押した際の動きを設定

// AからBへ動く地図のアニメーション

let atLatitude = firstLatitude;
let atLongitude = firstLongitude;

let button = document.querySelectorAll(".area");

button.forEach(element => {
    element.addEventListener("click", function() {

        let latitude = parseFloat(element.getAttribute("data-map-latitude"));
        let longitude = parseFloat(element.getAttribute("data-map-longitude"));

        console.log(latitude, longitude);
        console.log(atLatitude, atLongitude);

        // 同じ地域をクリックした際、アニメーションの停止
        if (!(atLatitude === latitude && atLongitude === longitude)) {

            map.setZoom(8);
            setTimeout(() => {
                map.panTo({ lat: latitude, lng: longitude });
            },600);
            setTimeout(() => {
                map.setZoom(10);
            },1200);

        };

        [atLatitude, atLongitude] = [latitude, longitude];

    });
});