<x-app-layout>

<!-- 地域の動植物の3Dモデルを表示 -->

<div class="w-32 h-dvh bg-neutral-800 absolute top-0 left-10">
<h1 class="text-white font-serif text-4xl font-bold vertical-writing">
    {{ $area->name }}
</h1>
</div>

<div class="p-4 bg-neutral-500 flex flex-row gap-4 absolute bottom-10 right-10">
    <div class="w-80 p-2 bg-neutral-800 h-48 overflow-y-scroll">
        <div class="grid grid-rows-2 gap-1 justify-items-stretch">
            @foreach($objectmodels as $objectmodel)

            <!-- 3Dモデルのインストール -->

            <div class="flex justify-between items-center py-2 px-2 bg-neutral-700">
                <div class="text-white">
                    {{ $objectmodel->name }}
                </div>
                <form action="{{ route('install3dmodelsite.download', [ 'filename' => $objectmodel->modelname ] ) }}" method="get" class="size-6">
                    @csrf
                    <button type="submit"
                    class="size-6 bg-green-600 border-0 focus:outline-none hover:bg-green-800 rounded text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"
                        class="fill-white">
                            <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/>
                        </svg>
                    </button>
                </form>
            </div>

            @endforeach
        </div>
    </div>
    <div class="w-80 p-4 bg-neutral-400 h-48">
    </div>
</div>


<!-- ここに3Dモデルを表示 -->
<!-- data-model-url属性は後にデータベースからURIを取得 -->

<div 
id="three-container" 
data-model-url="/storage/show_3dmodel/icelandic_rock_plates_skxfs_gltf_mid/Icelandic_Rock_Plates_skxfS_Mid.gltf"
class="static"
></div>

<!-- 表示する3Dモデルの変更(Three.jsの関数を取得し使用) -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modelContainer = document.getElementById("three-container");
        const modelUrl = modelContainer.getAttribute("data-model-url");
        gltfModel(modelUrl);
    });
</script>






</x-app-layout>