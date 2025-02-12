<x-app-layout>


<div class="w-32 h-dvh bg-neutral-800 absolute top-0 left-10">
<h1 class="text-white font-serif text-4xl font-bold vertical-writing">
    {{ $area->name }}
</h1>
</div>

<div class="p-4 bg-neutral-500 flex flex-row gap-4 absolute bottom-10 right-10">
    <div class="w-80 p-2 bg-neutral-800 h-48 overflow-y-scroll">
        <div class="grid grid-rows-2 gap-1 justify-items-stretch">
            @foreach($objectmodels as $objectmodel)

            <div class="flex justify-between items-center py-2 px-2 bg-neutral-700">
                <div class="text-white">
                    {{ $objectmodel->name }}
                </div>
                <!-- Laravelは波括弧(書くとエラー起きるので文字)のネストをすることができない。
                なので下のように書き換える。 -->
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




<!-- <div class="w-64 h-5/6 bg-neutral-400 p-6 absolute bottom-0 right-10">
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet aspernatur temporibus dolore autem, nisi esse harum. Exercitationem est provident vitae ratione eos aspernatur, sapiente nulla minus similique accusamus? Illum, deleniti.
    Laboriosam nemo facere quas nihil vel impedit et animi perferendis, vitae at officiis quasi, architecto fugit laudantium ad nesciunt non ducimus mollitia nobis, magni dolorem. Officiis fugiat nulla blanditiis reiciendis.
    Excepturi possimus autem ipsam veritatis tempore, unde fuga sed magnam alias similique hic eveniet omnis cupiditate doloribus inventore mollitia optio adipisci. Earum doloremque culpa modi dolorum sequi fugit ea architecto.
    Sequi, officiis quam. Architecto, dolorem aspernatur expedita excepturi tempora obcaecati, repellat doloribus natus labore cumque praesentium amet? Quisquam totam velit sed earum at, dicta rerum voluptate, placeat neque suscipit nam.
    Nam provident in esse, sint eum soluta, nisi minus odio delectus harum quas voluptatum quo temporibus, exercitationem id. Quam dolor inventore sapiente laboriosam mollitia voluptatum cupiditate ullam, laborum perspiciatis doloremque!
</div> -->


<div 
id="three-container" 
data-model-url="/storage/show_3dmodel/boombox_2k.gltf/boombox_2k.gltf"
class="static"
></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modelContainer = document.getElementById("three-container");
        // data属性の際は必ずgetAttributeなどで属性の値を取り出す
        const modelUrl = modelContainer.getAttribute("data-model-url");
        gltfModel(modelUrl);
    });
</script>






</x-app-layout>