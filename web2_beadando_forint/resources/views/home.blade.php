@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid homejumbo text-center">
        <div class="container-fluid jumbotext">
            <h1 class="display-1 jumboh1color">Magyar forint</h1>
            <div class="container">
                <h4 class="py-3">A magyar forint (HUF) Magyarország hivatalos fizetőeszköze, amelyet 1946. augusztus 1-jén vezettek be a pengő helyett, egy nagy inflációt követően.</h4>
                <h4 class="py-3">A forint érméi és bankjegyei különböző címletekben kerültek forgalomba. Az érmék jelenleg <b>5, 10, 20, 50, 100 és 200</b> forintos címletekben érhetők el, míg a bankjegyek <b>500,1000,2000,5000,10000,20000</b>. A bankjegyeket a Magyar Nemzeti Bank bocsátja ki, és rendszeresen újítják meg a biztonsági elemeket a hamisítás elleni védelem érdekében.</h4>
                <table class="table table-bordered text-center transparent-table">
                    <thead>
                    <tr>
                        <th>Valuta</th>
                        <th>1 Egység Árfolyama (HUF)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Amerikai Dollár (USD)</td>
                        <td>365,50 HUF</td>
                    </tr>
                    <tr>
                        <td>Euró (EUR)</td>
                        <td>385,00 HUF</td>
                    </tr>
                    <tr>
                        <td>Angol Font (GBP)</td>
                        <td>445,70 HUF</td>
                    </tr>
                    <tr>
                        <td>Svájci Frank (CHF)</td>
                        <td>397,90 HUF</td>
                    </tr>
                    <tr>
                        <td>Japán Jen (JPY)</td>
                        <td>2,75 HUF</td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Magyar Bankjegyek és Pénzérmék</h2>

        <!-- Bankjegyek bemutatása -->
        <div class="row">
            <h3 class="mb-3">Bankjegyek</h3>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/500_forint_elolap.png" class="card-img-top" alt="500 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">500 forintos bankjegy</h5>
                        <p class="card-text">A legkisebb címletű bankjegy, előlapján II. Rákóczi Ferenc portréja látható, míg a hátlapon a sárospataki Rákóczi-vár szerepel.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/HUF_1000_2018_obverse.png" class="card-img-top" alt="1000 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">1000 forintos bankjegy</h5>
                        <p class="card-text">Az előlapon Szent István, Magyarország első királya látható, míg a hátlapon az Esztergomi vár szerepel. Az egyik legelterjedtebb bankjegy.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/58/2000_HUF_2017_ob.jpg" class="card-img-top" alt="2000 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">2000 forintos bankjegy</h5>
                        <p class="card-text">Az előoldalon Bethlen Gábor fejedelem portréja látható, a hátoldalon a gyulafehérvári vár képe jelenik meg. Közepes címletű bankjegy.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/73/5000_HUF_2017_ob.jpg" class="card-img-top" alt="5000 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">5000 forintos bankjegy</h5>
                        <p class="card-text">A bankjegy előlapi portréján Széchenyi István, a "legnagyobb magyar" látható, a hátoldalon pedig a Magyar Tudományos Akadémia épülete.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/10000_HUF_2014_ob.jpg" class="card-img-top" alt="10 000 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">10 000 forintos bankjegy</h5>
                        <p class="card-text">Az előlapon Hunyadi Mátyás király portréja szerepel, a hátoldalon a visegrádi reneszánsz palota látható. Az egyik legmagasabb címletű bankjegy.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/20000_HUF_2015_ob.png/800px-20000_HUF_2015_ob.png" class="card-img-top" alt="20 000 forintos bankjegy">
                    <div class="card-body">
                        <h5 class="card-title">20 000 forintos bankjegy</h5>
                        <p class="card-text">A legnagyobb címletű bankjegyen Deák Ferenc portréja látható, míg a hátlapon az Eszterházy-kastély képe szerepel. Ez a legértékesebb magyar bankjegy.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Érmék bemutatása -->
        <div class="row mt-5">
            <h3 class="mb-3">Érmék</h3>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/5_Forint-el%C5%91lap.jpg" class="card-img-top" alt="5 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">5 forintos érme</h5>
                        <p class="card-text">A legkisebb címletű érme, amelyen egy gólya látható, jelképezve Magyarország faunáját. Főként apró vásárlásokra használják.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/2020_e.jpg" class="card-img-top" alt="10 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">10 forintos érme</h5>
                        <p class="card-text">A 10 forintos érme magyar motívumokat ábrázol, és mindennapi vásárlások során használatos. Az érmén egy fa levele látható.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/2020_e20.jpg" class="card-img-top" alt="20 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">20 forintos érme</h5>
                        <p class="card-text">A 20 forintos érme az egyik leggyakoribb, magyar nemzeti jelkép, a Kossuth-címer látható rajta. Széleskörűen használatos az üzletekben.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/50_Forint_Comemmorative_Ambulance_Front.jpg" class="card-img-top" alt="50 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">50 forintos érme</h5>
                        <p class="card-text">Az 50 forintos érme közepén egy vitorlázó sas látható. Ez az érme szintén széles körben használatos, nagyobb értékű készpénzes vásárlásoknál.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/100_Forint_Comemmorative_Army_Front.jpg" class="card-img-top" alt="100 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">100 forintos érme</h5>
                        <p class="card-text">A kéttónusú érme Kossuth Lajos portréját ábrázolja, és az egyik legfontosabb érme a magyar készpénzes forgalomban.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/200_Forint_Pet%C5%91fi_Comemmorative.jpg" class="card-img-top" alt="200 forintos érme">
                    <div class="card-body">
                        <h5 class="card-title">200 forintos érme</h5>
                        <p class="card-text">A legnagyobb értékű érme a magyar forintban. Ezüst és sárgaréz kombinációban készül, és a Lánchíd képe díszíti.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Figyelemfelhívó rész -->
        <div class="alert alert-warning text-center">
            <strong>Figyelem! Csalások és átverések elkerülése:</strong> Vigyázzunk a nem létező bankjegyekkel kapcsolatos átverésekre, mint például az "54000 forintos bankjegy". Csak hivatalos forrásokból származó információkra alapozzunk, és mindig legyünk körültekintők!
        </div>

    </div>
@endsection
