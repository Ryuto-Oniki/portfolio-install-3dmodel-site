<x-app-layout>

<h1>HP</h1>

<!-- ホームページ -->

<form action="{{ route('install3dmodelsite.license') }}" method="get">
    @csrf
    <button type="submit">start</button>
</form>
    
</x-app-layout>