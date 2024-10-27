<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;

class AdminMenuComponent extends Component
{
    public $menus, $menuid, $menu_nev, $view, $menu_title, $role, $parent, $menu_order, $active;
    public $isOpen = 0;
    public $availableParents;

    public function render()
    {
        $this->menus = Menu::all();
        return view('livewire.admin-menu-component');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->menu_nev = '';
        $this->view = '';
        $this->menu_title = '';
        $this->role = '';
        $this->parent = '';
        $this->menu_order = '';
        $this->active = '';
    }

    public function store()
    {
        $this->validate([
            'menu_nev' => 'required',
            'view' => 'required',
            'menu_title' => 'required',
            'role' => 'required',
            'parent' => 'integer',
            'menu_order' => 'required|integer',
            'active' => 'required|boolean'
        ]);

        Menu::updateOrCreate(['menuid' => $this->menuid], [
            'menu_nev' => $this->menu_nev,
            'view' => $this->view,
            'menu_title' => $this->menu_title,
            'role' => $this->role,
            'parent' => $this->parent,
            'menu_order' => $this->menu_order,
            'active' => $this->active
        ]);

        session()->flash('message', $this->menuid ? 'Menü sikeresen frissítve.' : 'Menü sikeresen létrehozva.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuid = $id;
        $this->menu_nev = $menu->menu_nev;
        $this->view = $menu->view;
        $this->menu_title = $menu->menu_title;
        $this->role = $menu->role;
        $this->parent = $menu->parent;
        $this->menu_order = $menu->menu_order;
        $this->active = $menu->active;

        $this->openModal();
    }
    public function mount()
    {
        $this->availableParents = Menu::all();
    }
    public function delete($id)
    {
        Menu::find($id)->delete();
        session()->flash('message', 'Menü sikeresen törölve.');
    }
}
