<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- 正しいはずなのにうまくcssが読み込まれない…なぜ？ -->

    <!-- これで行けるらしい -->
    <!-- assets()はLaravelのへルパ関数で、publicフォルダを参照する -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>

<h1>AreaIndex画面</h1>


<!-- ulとliで表を作る。 -->


<ul>
@foreach($regionareas as $regionarea)
<li>

    <h2><a href="#">{{ $regionarea->name }}</a></h2>

    <ul>
    <!-- Collectionが2重になっているなら、下のように書けば値を出すこと
    ができる。 -->
    @foreach($regionarea->areadetails as $areadetail)

    <li>
        <a href="#" class="area" 
            data-map-latitude="{{ $areadetail->latitude }}"
            data-map-longitude="{{ $areadetail->longitude }}"
            data-show-url="{{ route('install3dmodelsite.showarea', ['id' => $areadetail->id]) }}">
                {{ $areadetail->name }}
        </a>
    </li>

    @endforeach
    </ul>

</li>
@endforeach
</ul>


<div id="map"></div>


<!-- このやり方は、inportLibrary()を使う最近のやり方らしい -->
<!-- ややこしいけど非同期処理を使用し、レスポンスが早くなる -->
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "AIzaSyCsS56ycqiDYUNnHOdMmdjWEhp26VrVrX0", v: "weekly"});
</script>

<script src="{{ asset('js/map_setting.js') }}"></script>

</body>
</html>