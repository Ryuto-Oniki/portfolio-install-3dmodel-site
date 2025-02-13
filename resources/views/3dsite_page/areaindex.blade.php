<x-app-layout>

<h1>AreaIndex画面</h1>

<!-- GoogleMapAPIを使用し地域を検索 -->

<ul>
@foreach($regionareas as $regionarea)
<li>

    <h2><a href="#">{{ $regionarea->name }}</a></h2>

    <ul>
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


<!-- GoogleMapAPIを設定 -->
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "APIキー", v: "weekly"});
</script>

<script src="{{ asset('js/map_setting.js') }}"></script>

</x-app-layout>
