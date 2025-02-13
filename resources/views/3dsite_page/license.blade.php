<x-app-layout>

<h1>License</h1>

<!-- ライセンス確認画面 -->

<form action="{{ route('install3dmodelsite.areaindex') }}" method="get">
    @csrf
    <button type="submit">Confirm License</button>
</form>
    
</x-app-layout>