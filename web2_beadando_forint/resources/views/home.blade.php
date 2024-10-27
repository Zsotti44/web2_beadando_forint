@extends('layouts.app')

@section('content')
    <div class="container content my-5 ">
        <h3 class="text-center">Fedezze fel a Magyar Pénzérmék Különleges Fémösszetételét!</h3>
        <p>
            A magyar pénzérmék nem csupán a mindennapi tranzakciók eszközei; egyben a hazánk gazdasági örökségének fontos részét képezik.
            Ezek a fémes csodák az érték és a minőség szimbólumai, melyek a legmodernebb technológiával és precíziós tervezéssel készültek.
            Ismerje meg, mitől különlegesek a magyar pénzérmék fémösszetevői!
        </p>

        <h5>Kiváló Minőség, Kiválasztott Anyagok</h5>
        <p>
            A forgalomban lévő magyar pénzérmék, mint például az 1, 2, 5, 10, 20, 50, 100 és 200 forintos érmék,
            különböző fémekből készülnek, amelyek garantálják a tartósságot és a hosszú élettartamot.
            Az érmék legfőbb összetevői a réz, a nikkel és az alumínium, amelyek egyedi ötvözetei biztosítják a pénzérmék magas ellenállóságát a kopással és a korrózióval szemben.
        </p>

        <h5>Tartósság és Esztétikai Élmény</h5>
        <p>
            A fémösszetétel nem csupán a pénzérmék tartósságát garantálja, hanem esztétikai élményét is.
            A különböző fémekből készült érmék csillogása és színe játékos vizuális hatást nyújt,
            amely örömet okoz a használóknak. A különböző forint érmék mintázatai és a fémes felületek egyedülálló kombinációja
            nem csupán a használat során, hanem a gyűjtők számára is vonzóvá teszi őket.
        </p>

        <h5>Fenntarthatóság és Újrahasznosítás</h5>
        <p>
            A magyar pénzérmék fémösszetétele nemcsak a tartósságra, hanem a fenntarthatóságra is hangsúlyt fektet.
            Az érmék gyártása során alkalmazott fémek könnyen újrahasznosíthatók, így hozzájárulnak a környezetvédelemhez és a fenntartható gazdasághoz.
        </p>

        <h5>Válassza a Biztonságos és Megbízható Pénzérméket!</h5>
        <p>
            A magyar pénzérmék fémösszetétele a minőség és a megbízhatóság garanciája.
            Legyen szó napi vásárlásokról vagy gyűjtésről, a magyar pénzérmék mindig a legjobb választás!
            Fedezze fel a hazai pénzérmék szépségét és értékét, és tapasztalja meg, hogy mit jelent a valódi magyar pénz!
        </p>
    </div>
    <div class="container my-5">
        @livewire('ermek')

    </div>
    <div class="container my-5">
        <h2 class="text-center mb-4">Jelenleg forgalomban lévő bankjegyek és pénzérmék</h2>
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <h3 class="mb-3">Bankjegyek</h3>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/500_forint_elolap.png" class="img-fluid rounded-top w-100" alt="500 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">500 forintos bankjegy</a>
                                <p class="mb-4">A legkisebb címletű bankjegy, előlapján II. Rákóczi Ferenc portréja látható, míg a hátlapon a sárospataki Rákóczi-vár szerepel.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>
                    <!-- Kártya 2 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/HUF_1000_2018_obverse.png" class="img-fluid rounded-top w-100" alt="1000 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">1000 forintos bankjegy</a>
                                <p class="mb-4">Az előlapon Szent István, Magyarország első királya látható, míg a hátlapon az Esztergomi vár szerepel.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 3 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/58/2000_HUF_2017_ob.jpg" class="img-fluid rounded-top w-100" alt="2000 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">2000 forintos bankjegy</a>
                                <p class="mb-4">Az előoldalon Bethlen Gábor fejedelem portréja látható, a hátoldalon a gyulafehérvári vár képe jelenik meg.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 4 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/73/5000_HUF_2017_ob.jpg" class="img-fluid rounded-top w-100" alt="5000 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">5000 forintos bankjegy</a>
                                <p class="mb-4">A bankjegy előlapi portréján Széchenyi István, a "legnagyobb magyar" látható, a hátoldalon pedig a Magyar Tudományos Akadémia épülete.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 5 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/10000_HUF_2014_ob.jpg" class="img-fluid rounded-top w-100" alt="10 000 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">10 000 forintos bankjegy</a>
                                <p class="mb-4">Az előlapon Hunyadi Mátyás király portréja szerepel, a hátoldalon a visegrádi reneszánsz palota látható.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 6 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/20000_HUF_2015_ob.png/800px-20000_HUF_2015_ob.png" class="img-fluid rounded-top w-100" alt="20 000 forintos bankjegy">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">20 000 forintos bankjegy</a>
                                <p class="mb-4">A legnagyobb címletű bankjegyen Deák Ferenc portréja látható, míg a hátlapon az Eszterházy-kastély képe szerepel.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 py-4">
                    <h3 class="mb-3">Érmék</h3>
                    <!-- Kártya 1 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/5_Forint-el%C5%91lap.jpg" class="img-fluid rounded-top w-100" alt="5 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">5 forintos érme</a>
                                <p class="mb-4">A legkisebb címletű érme, amelyen egy gólya látható, jelképezve Magyarország faunáját. Főként apró vásárlásokra használják.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 2 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/2020_e.jpg" class="img-fluid rounded-top w-100" alt="10 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">10 forintos érme</a>
                                <p class="mb-4">A 10 forintos érme magyar motívumokat ábrázol, és mindennapi vásárlások során használatos. Az érmén egy fa levele látható.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 3 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/2020_e20.jpg" class="img-fluid rounded-top w-100" alt="20 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">20 forintos érme</a>
                                <p class="mb-4">A 20 forintos érme az egyik leggyakoribb, magyar nemzeti jelkép, a Kossuth-címer látható rajta. Széleskörűen használatos az üzletekben.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 4 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/50_Forint_Comemmorative_Ambulance_Front.jpg" class="img-fluid rounded-top w-100" alt="50 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">50 forintos érme</a>
                                <p class="mb-4">Az 50 forintos érme közepén egy vitorlázó sas látható. Ez az érme szintén széles körben használatos, nagyobb értékű készpénzes vásárlásoknál.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 5 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/100_Forint_Comemmorative_Army_Front.jpg" class="img-fluid rounded-top w-100" alt="100 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">100 forintos érme</a>
                                <p class="mb-4">A kéttónusú érme Kossuth Lajos portréját ábrázolja, és az egyik legfontosabb érme a magyar készpénzes forgalomban.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kártya 6 -->
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/200_Forint_Pet%C5%91fi_Comemmorative.jpg" class="img-fluid rounded-top w-100" alt="200 forintos érme">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">200 forintos érme</a>
                                <p class="mb-4">A legnagyobb értékű érme a magyar forintban. Ezüst és sárgaréz kombinációban készül, és a Lánchíd képe díszíti.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Tudjon meg többet!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Figyelemfelhívó rész -->
    <div class="alert alert-warning text-center">
        <strong>Figyelem! Csalások és átverések elkerülése:</strong> Vigyázzunk a nem létező bankjegyekkel kapcsolatos átverésekre, mint például az "54000 forintos bankjegy". Csak hivatalos forrásokból származó információkra alapozzunk, és mindig legyünk körültekintők!
    </div>
@endsection
