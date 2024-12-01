<div class="container my-4 ">
    <div class="row">
        <h2 class="mb-4">Érme adatok kezelése</h2>
        <form wire:submit="update">
            <div wire:loading>
                Betöltés...
            </div>
        </form>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Címlet</th>
                        <th>Tömeg (g)</th>
                        <th>Darabszám</th>
                        <th>Kiadás Dátuma</th>
                        <th>Bevonás Dátuma</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ermek as $erme)
                        <tr 
                                wire:click="selectErme({{ json_encode($erme) }})"
                                style="cursor: pointer;" 
                                ondblclick="selectRow(this)"
                        >
                            @foreach($erme as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Adatok módosítása</h3>
            @if (session('success'))
                <div class="alert alert-success"><h6>{{ session('success') }}</h6></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><h6>{{ session('error') }}</h6></div>
            @endif
            <!-- Tabok a három művelethez -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link @if($action == 'modosit') active @endif" 
                       wire:click="$set('action', 'modosit')"
                       style="cursor: pointer;">
                       Módosítás
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($action == 'torles') active @endif" 
                       wire:click="$set('action', 'torles')"
                       style="cursor: pointer;">
                       Törlés
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($action == 'rogzites') active @endif" 
                       wire:click="setAction('rogzites')"
                       style="cursor: pointer;">
                       Rögzítés
                    </a>
                </li>
            </ul>

            <!-- Módosító Form -->
            <form 
                @if ($action === 'rogzites') 
                    wire:submit.prevent="createErme" 
                @elseif ($action === 'modosit') 
                    wire:submit.prevent="updateErme" 
                @elseif ($action === 'torles') 
                    wire:submit.prevent="deleteErme" 
                @endif
            >
                <!-- Azonosító (id) -->
                @if($action != 'rogzites')
                <div class="form-group">
                    <label for="id">Azonosító</label>
                    <input class="form-control" type="text" id="id" wire:model="selectedErme.ermeid" disabled>
                </div>
                @endif

                @if($action != 'torles')
                    <!-- Cimlet -->
                    <div class="form-group">
                        <label for="cimlet">Címlet</label>
                        <input class="form-control" type="number" id="cimlet" wire:model="selectedErme.cimlet" @if($action == 'rogzites') @endif>
                    </div>

                    <!-- Tomeg -->
                    <div class="form-group">
                        <label for="tomeg">Tömeg</label>
                        <input class="form-control" type="number" step="0.01" id="tomeg" wire:model="selectedErme.tomeg" @if($action == 'rogzites') @endif>
                    </div>

                    <!-- Darab -->
                    <div class="form-group">
                        <label for="darab">Darab</label>
                        <input class="form-control" type="number" id="darab" wire:model="selectedErme.darab" @if($action == 'rogzites') @endif>
                    </div>

                    <!-- Kiadas -->
                    <div class="form-group">
                        <label for="kiadas">Kiadás dátuma</label>
                        <input class="form-control" type="date" id="kiadas" wire:model="selectedErme.kiadas" @if($action == 'rogzites') @endif>
                    </div>

                    <!-- Bevonas -->
                    <div class="form-group">
                        <label for="bevonas">Bevona dátuma</label>
                        <input class="form-control" type="date" id="bevonas" wire:model="selectedErme.bevonas" @if($action == 'rogzites') @endif>
                    </div>
                @endif

                <div class="form-group">
                    <br>
                @if($action == 'modosit')
                    <button type="submit" class="btn btn-primary" wire:click="updateErme">Módosítás</button>
                @endif
                @if($action == 'torles')                
                    <button type="submit" class="btn btn-danger" wire:click="deleteErme">Törlés</button>
                @endif                
                @if($action == 'rogzites')                
                    <button type="submit" class="btn btn-success" wire:click="createErme">Rögzítés</button>
                @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function selectRow(row) {
        // Távolítsd el a kiemelést minden másik sortól
        document.querySelectorAll('tr').forEach(tr => tr.style.backgroundColor = '');
        // Emeld ki a kiválasztott sort
        row.style.backgroundColor = '#f2f2f2';
    }
</script>
