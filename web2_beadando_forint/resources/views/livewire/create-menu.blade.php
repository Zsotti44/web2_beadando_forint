<div class="modal d-block" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $menuid ? 'Menüpont szerkesztése' : 'Új menüpont létrehozása' }}</h5>
                <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Menü neve -->
                    <div class="form-group">
                        <label>Menü Neve</label>
                        <input type="text" wire:model="menu_nev" class="form-control">
                        @error('menu_nev') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Nézet -->
                    <div class="form-group">
                        <label>Nézet</label>
                        <input type="text" wire:model="view" class="form-control">
                        @error('view') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Menü cím -->
                    <div class="form-group">
                        <label>Menü Cím</label>
                        <input type="text" wire:model="menu_title" class="form-control">
                        @error('menu_title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Szerepkör</label>
                        <select wire:role="parent" class="form-control">
                            <option value="admin">none</option>
                            <option value="admin">user</option>
                            <option value="admin">admin</option>
                        </select>

                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Szülő Menü</label>
                        <select wire:model="parent" class="form-control">
                            <option value="0">Nincs szülő</option>
                            @foreach($availableParents as $parentOption)
                                <option value="{{ $parentOption->id }}">{{ $parentOption->menu_nev }}</option>
                            @endforeach
                        </select>
                        @error('parent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Menü sorrend -->
                    <div class="form-group">
                        <label>Menü Sorrend</label>
                        <input type="number" wire:model="menu_order" class="form-control">
                        @error('menu_order') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Aktív -->
                    <div class="form-group form-check">
                        <input type="checkbox" wire:model="active" class="form-check-input" id="active">
                        <label class="form-check-label" for="active">Aktív</label>
                        @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="closeModal" class="btn btn-secondary">Bezárás</button>
                <button wire:click="store" class="btn btn-primary">Mentés</button>
            </div>
        </div>
    </div>
</div>
