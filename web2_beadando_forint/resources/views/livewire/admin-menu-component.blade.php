<!-- resources/views/livewire/menu-component.blade.php -->
<div class="container my-5">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <button wire:click="create" class="btn btn-primary">Új Menü</button>

    @if($isOpen)
        @include('livewire.create-menu')
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>Menü Neve</th>
            <th>View</th>
            <th>Menü Cím</th>
            <th>Szerepkör</th>
            <th>Szülő</th>
            <th>Menü Sorrend</th>
            <th>Aktív</th>
            <th>Műveletek</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->menu_nev }}</td>
                <td>{{ $menu->view }}</td>
                <td>{{ $menu->menu_title }}</td>
                <td>{{ $menu->role }}</td>
                <td>{{ $menu->parent }}</td>
                <td>{{ $menu->menu_order }}</td>
                <td>{{ $menu->active ? 'Igen' : 'Nem' }}</td>
                <td>
                    <button wire:click="edit({{ $menu->menuid }})" class="btn btn-primary">Szerkesztés</button>
                    <button wire:click="delete({{ $menu->menuid }})" class="btn btn-danger">Törlés</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
