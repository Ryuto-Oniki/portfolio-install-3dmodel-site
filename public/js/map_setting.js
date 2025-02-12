// 復)名前はキャメルケースかスネークケース


// ここでなぜforEach?
// ...それは、Classなどの全体にaddEventListener()は使用できない。
// なので、forEach()で回してそれぞれに関数を適用させている
// そしてそれぞれのClassの値の要素が「element」の中に入っている

// で「data-url」とは？
// Javascriptでhtml要素に追加の情報を入れ、簡単にJSで操作できるもの
// 「data-」で始まる。
// 「url」の箇所はなんでもOK!!
// getAttribute("")などで取得(属性を取得するメソッド)

// 「window.location.href」とは？
// 現在のページのURIを取得/新しいページにリダイレクトする際に使用
// window.location.href = "~"でその指定ページにいくことができる。
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

let atLatitude = firstLatitude;
let atLongitude = firstLongitude;

let button = document.querySelectorAll(".area");

button.forEach(element => {
    element.addEventListener("click", function() {

        // DBから撮ってきた値は基本的にstring型。
        // ...なので数値に変更する必要がある。
        // parseFloat()...parseInt()と違い、小数点を保持する
        let latitude = parseFloat(element.getAttribute("data-map-latitude"));
        let longitude = parseFloat(element.getAttribute("data-map-longitude"));

        console.log(latitude, longitude);
        console.log(atLatitude, atLongitude);

        // もし同じ地域をクリックした場合、処理をしないように設定する。
        if (!(atLatitude === latitude && atLongitude === longitude)) {

            // もう少し滑らかにアニメーションしたい…。
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