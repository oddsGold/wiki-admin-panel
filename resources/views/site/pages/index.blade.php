@extends('site/base')

@section('title', 'СОТА СRS від Linkos Group: для формування та подачі звітності у форматі CRS')
@section('description', 'Description - СОТА CRS — надійне програмне рішення для звітності без зайвих проблем. Автоматизуйте формування та подання вашої звітності CRS за допомогою рішення від компанії Linkos Group, розробника програми M.E.Doc. Нове програмне рішення СОТА CRS підійде фінансовим установам, які обслуговують рахунки іноземних клієнтів і мають подавати CRS-звітність.')


@section('style')

@endsection

@section('content')

    <main class="index-page">
        <header class="header">
            @include('site.components.header')
        </header>

        <section class="without-problem">
            <div class="container">
                <div class="without-problem-row">
                    <div class="without-problem-item without-problem-item__border">
                        <p class="h1">
                            <span class="cf">
                                <img src="{{ Vite::image('Сота_срс@3x_1.png') }}" class="icon d-none d-lg-block" alt="Logo"><span class="dash d-none d-lg-block"> -</span><span class="text-format d-block d-lg-none">COTA CRS -</span>
                            </span>
                            <span>звітність без проблем</span>
                        </p>
                        <h1 class="visually-hidden">cota crs</h1>
                        <p>
                            Автоматизуйте формування та подання вашої звітності CRS за допомогою рішення від Linkos Group, розробника програми M.E.Doc.
                        </p>
                        <div class="without-problem-btn">
                            <a class="btn btn-base" href="#" data-bs-toggle="modal" data-bs-target="#get-presentation">Завантажити презентацію</a>
                        </div>
                    </div>
                    <div class="without-problem-item">
                        <div class="item-img">
                            <picture>
                                <source media="(min-width: 992px)" srcset="{{ Vite::image('image-without-problem.png') }}">
                                <source media="(min-width: 768px)" srcset="{{ Vite::image('image-without-problem_tablet.png') }}">
                                <source media="(max-width: 767px)" srcset="{{ Vite::image('image-without-problem_mobile.png') }}">
                                <img class="without-problem-image" src="{{ Vite::image('image-without-problem.png') }}" alt="Main image desktop">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="crs-important" id="crs-important">
            <div class="container">
                <div class="title">
                    <h2>
                        <span>CRS</span> звітність: Важливо знати!
                    </h2>
                </div>
                <div class="crs-important-row">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="row-item row-item__border">
                                <p>
                                    <span class="crs">CRS</span> (Common Reporting Standard) — це міжнародний стандарт автоматичного обміну інформацією про фінансові рахунки нерезидентів.
                                </p>
                                <img src="{{ Vite::image('important-block-1.png') }}" alt="Img" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="row-item">
                                <p class="row-item__border row-item__bg mb-16">
                                    З 1 липня 2023 року українські фінансові установи зобов'язані щорічно звітувати про фінансові рахунки своїх іноземних клієнтів.
                                </p>
                                <p class="row-item__border">
                                    Перший звітний період — це друге півріччя 2023 року. Звіт за цей період потрібно подати до 1 липня 2024 року.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4">
                            <div class="row-item row-item__border">
                                <p>
                                    Невиконання вимог щодо подання звітності <span class="crs">CRS</span> може призвести до нарахування серйозних штрафних санкцій.
                                </p>
                                <img src="{{ Vite::image('important-block-2.png') }}" alt="Img" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="consultation">
            <div class="container">
                <div class="consultation-title">
                    <h3>
                        <span>Отримайте безкоштовну консультацію по</span>
                        роботі з <img src="{{ Vite::image('Сота_срс@3x_1.png') }}" alt="Logo"> вже сьогодні
                    </h3>
                </div>
                <a class="btn btn-base" href="#contacts">Отримати консультацію</a>
            </div>
        </section>

        <section class="whom" id="whom">
            <div class="container">
                <div class="title">
                    <h2>
                        Кому потрібно подавати <span>CRS</span> звітність?
                    </h2>
                </div>
                <div class="whom-row">
                    <div class="row">
                        <div class="col-auto block">Банки</div>
                        <div class="col block">Компанії з управління активами</div>
                        <div class="w-100 d-block d-lg-none"></div>
                        <div class="col-auto block">Кредиті спілки</div>

                        <div class="w-100 d-none d-lg-block"></div>

                        <div class="col-auto block block__width">Недержавні пенсійні фонди</div>
                        <div class="w-100 d-block d-lg-none"></div>
                        <div class="col block">Страхові компанії</div>
                        <div class="col block">Інвестиційні фірми</div>
                    </div>
                    <div class="row b-row">
                        <div class="col-auto block without-border block-img">
                            <img src="{{ Vite::image('icon-1.png') }}" alt="Icon">
                        </div>
                        <div class="col block without-border">CRS звітність мають подавати фінансові установи, які обслуговують рахунки іноземних клієнтів.</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="advantages">
            <div class="container">
                <div class="title">
                    <h2>
                        Переваги впровадження <span>CRS</span> звітності
                    </h2>
                </div>
                <div class="advantages-row">
                    <span>01</span>
                    <p class="row-title">Прозорість</p>
                    <p>Сприяє прозорості та боротьбі з ухиленням від сплати податків.</p>
                </div>
                <div class="advantages-row">
                    <span>02</span>
                    <p class="row-title">Справедливість</p>
                    <p>Гарантує, що всі платники податків, незалежно від їх місця проживання, сплачують справедливу частку податків.</p>
                </div>
                <div class="advantages-row">
                    <span>03</span>
                    <p class="row-title">Економічний розвиток</p>
                    <p>Сприяє економічному зростанню та розвитку шляхом створення рівних умов для всіх платників податків.</p>
                </div>
            </div>
        </section>

        <section class="exchange" id="exchange">
            <div class="container">
                <div class="title">
                    <h2>
                        Як працює автоматичний обмін <span>CRS</span> звітністю?
                    </h2>
                </div>
                <div class="exchange-scheme">
                    <img src="{{ Vite::image('exchange-scheme.png') }}" alt="exchange-scheme">
                </div>
                <div class="row b-row">
                    <div class="col-auto block block-image">
                        <img src="{{ Vite::image('icon-2.png') }}" alt="Icon">
                    </div>
                    <div class="col block block-text">З 1 липня 2023 року Підзвітні Фінансові Установи зобов’язані здійснювати комплексну перевірку рахунків, для виявлення таких, що підпадають під загальний стандарт звітності CRS. Після чого вони повинні подавати звіти про ці рахунки до Державної податкової служби України щороку до 1 липня.</div>
                </div>
            </div>
        </section>

        <section class="automation" id="automation">
            <div class="container">
                <div class="title">
                    <h2>
                        Рішення для автоматизації <span>CRS</span> звітності
                    </h2>
                </div>
                <div class="automation-container">
                    <div class="automation-description">
                        <div class="block block-1">
                            <p>
                                Linkos Group створено нові продукти <span class="crs">«СОТА CRS»</span> та <span class="crs">«СОТА API CRS»</span>, за допомогою яких підзвітні фінансові установи зможуть подавати звіт про підзвітні рахунки (звіт CRS) до ДПС.
                            </p>
                        </div>
                        <div class="block block-2">
                            <p>
                                <span class="crs">СОТА CRS</span> — Зручний вебсервіс для створення, перевірки, підписання та відправки звітів CRS до податкової служби.
                            </p>
                        </div>
                        <div class="block block-3">
                            <p>
                                <span class="crs">СОТА API CRS</span> — Рішення, що складається з кабінету користувача та вбудованого REST API для підключення до ваших облікових систем. Встановлюється у вашій інфраструктурі. Робота здійснюється через браузер
                            </p>
                        </div>
                    </div>
                    <div class="automation-table">
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <span class="crs">СОТА CRS</span>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <span class="crs">СОТА API CRS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Тип рішення</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <p>Вебсервіс</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <p>Вебсервіс + REST API</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Розміщення</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <p>Хмарний сервер</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <p>Локальний сервер</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Імпорт даних</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <p>Формат Excel</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <p>Дані в форматі JSON і XML + формат Excel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Створення всіх типів звіту про підзвітні рахунки</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Автоматична перевірка звітів</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Інформування користувача про виявлені помилки</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Формування коригуючих звітів</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Підписання та відправка звіту до ДПС</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Отримання квитанцій від контролюючого органа</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Експорт звітів у формат XML</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <img src="{{ Vite::image('check.png') }}" alt="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Вартість ліцензії для ПФУ</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border automation-table-item__color text-center">
                                        <p>6 000 грн*<span> 12000грн</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__color text-center">
                                        <p>60 000 грн*<span> 120000грн</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Вартість ліцензії для КУА (як ПФУ)</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border automation-table-item__color text-center">
                                        <p>2 400 грн*<span> 6000грн</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__color text-center">
                                        <p>-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Робота з підзвітними установами </b>
                                        </p>
                                        <p>
                                            *лише в парі з ліцензією для КУА
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border automation-table-item__color text-center">
                                        <p>3 000 грн*<span> 5280грн</span></p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__color text-center">
                                        <p>-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="automation-table-row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="automation-table-item">
                                        <p>
                                            <b>Термін дії</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item automation-table-item__border text-center">
                                        <p>12 місяців</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <div class="automation-table-item text-center">
                                        <p>12 місяців</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="automation-btn">
                    <a class="btn btn-base" href="#" data-bs-toggle="modal" data-bs-target="#buy">Придбати</a>
                    <p><span>*</span> Ціна вказана з урахуванням ПДВ</p>
                </div>
            </div>
        </section>

        <section class="more consultation">
            <div class="container">
                <div class="more-title consultation-title">
                    <h3 class="d-none d-md-block">
                        <span>Дізнайтеся більше про подання звітності</span>
                        з <img src="{{ Vite::image('Сота_срс@3x_1.png') }}" alt="Logo"> у наших менеджерів!
                    </h3>
                    <h3 class="d-sm-none d-md-none">
                        <span>Дізнайтеся більше про <br> подання звітності</span>
                        з <img src="{{ Vite::image('Сота_срс@3x_1.png') }}" alt="Logo"> у наших менеджерів!
                    </h3>
                </div>
                <a class="btn btn-base" href="#contacts">Отримати консультацію</a>
            </div>
        </section>

        <section class="decision">
            <div class="container">
                <div class="title">
                    <h2>
                        <span>СОТА CRS</span> — рішення, яке забезпечить легкий процес формування та подачі <span class="color">CRS</span> звітів
                    </h2>
                </div>
                <div class="decision-row">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe.png') }}" alt="Icon">
                                <p>
                                    Робота через браузер
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe-2.png') }}" alt="Icon">
                                <p>
                                    Два рішення, для масштабування задач
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe-3.png') }}" alt="Icon">
                                <p>
                                    Зручна навігація по звіту CRS
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe-4.png') }}" alt="Icon">
                                <p>
                                    Швидке опрацювання великих об’ємів даних
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe-5.png') }}" alt="Icon">
                                <p>
                                    Автоматична перевірка звіту
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="decision-item">
                                <img src="{{ Vite::image('globe-6.png') }}" alt="Icon">
                                <p>
                                    Збереження конфіденційності
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(count($videos) > 0)
            <section class="video" id="video">
                <div class="container">
                    <div class="title">
                        <h2>
                            Відео інструкції
                        </h2>
                    </div>

                    <div class="slider-container">
                        <div class="popular">
                            @foreach($videos as $video)
                                <div>
                                    <a href="{{ $video->url }}" target="_blank" class="slide-link">
                                        <img src="{{ $video->preview->path }}/{{ $video->preview->name }}" alt="Logo">
                                        <div class="slide-overlay"></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="video-btn">
                        @foreach ($userMemoTypes as $key => $userMemoType)
                            @if($lastUserMemo = $userMemoType->getLastUserMemo())
                                <a class="btn btn-base" href="{{ route('downloadFile',$lastUserMemo->id) }}">
                                    <span>{{ $userMemoType->title }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if(count($news) > 0)
            <section class="more video">
                <div class="container">
                    <div class="title">
                        <h2>
                            Більше про <span class="color">CRS</span> звітність
                        </h2>
                    </div>
                    <div class="slider-container">
                        <div class="popular">
                            @foreach($news as $item)
                                <div>
                                    <div class="slide-link">
                                        <div class="slide-link-title">
                                            {{ $item->title }}
                                        </div>
                                        <div class="slide-link-description">
                                            {{ $item->description }}
                                        </div>
                                        <a href="{{ $item->url }}" class="btn btn-base">Читати</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="faq" id="faq"></section>

        <section class="contacts" id="contacts">
            <div class="container">
                <div class="title">
                    <h2>
                        Контакти
                    </h2>
                </div>
                <div class="contacts-container">
                    <div class="contacts-call">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="contacts-call-item">
                                    <p>
                                        Відділ продажу та впровадження
                                    </p>
                                    <div>
                                        <a href="">+38 044 206 72 25</a>
                                        <a href="">+38 073 206 72 25</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-4 mt-md-0">
                                <div class="contacts-call-item">
                                    <p class="d-md-none">
                                        Технічна підтримка
                                    </p>
                                    <p class="d-none d-md-block">
                                        Технічна <br> підтримка
                                    </p>
                                    <div>
                                        <a href="">+38 044 206 72 25</a>
                                        <a href="">+38 073 206 72 25</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contacts-form">
                        <div id="feedback-root"></div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="buy" tabindex="-1" aria-labelledby="buy" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="buy-form"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade get-presentation" id="get-presentation" tabindex="-1" aria-labelledby="get-presentation" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            <div class="message">
                                Для завантаження презентації залиште,<br>
                                будь ласка, ваші контактні дані.
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12">
                            <div id="presentation-modal-form-root" data-v-app="">
                                <div class="presentation-form" id="presentation-root"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="personal-data">
                                Надсилаючи цю форму, ви даєте <a href="https://sota-buh.com.ua/page/zhoda-na-obrobku-personalnykh-danykh" target="_blank">згоду на зберігання й обробку ваших особистих даних</a> компанією ТОВ "Економічні програми" та надаєте згоду на отримання рекламних матеріалів.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script-body')

@endsection
