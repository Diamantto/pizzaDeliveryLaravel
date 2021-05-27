<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\IngModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class FillController extends Controller
{
    public function fill()
    {
        ProductModel::query()->truncate();

        $pizza_name = ['Ортолана', 'Такіно Барбекю', 'Монтімаре',
            'Сірена', 'Квадро Стаджоні', 'Папероні Меланжане',
            'Карбонара', 'Маргарита', 'Квадро Формаджі',
            'Баварія', 'Марагрита', 'Кото бене',
            'Квадро Формаджі Роса', 'Пепероні', 'Мілано',
            'Сільвія', 'Маскераре', 'Панчета',
            'Емілія Романья', 'Американа', 'Неапотлітана'];
        $pizza_desc = ['Тісто з цільнозернового борошна, хумус із зеленого горошку, цукіні, броколі, солодкий перець, шпинат та артишоки. Алергени: злаки, кунжут, соєві боби.', 'Тісто з цільнозернового борошна, моцарела, соус барбекю, індичка, солодкий перець та червона цибуля. Алергени: лактоза, кунжут, соєві боби, риба, злаки.', 'Тісто з цільнозернового борошна, моцарела, вершки, слабосолений лосось, крем-сир, фенхель та рукола. Алергени: лактоза, риба, злаки.',
            'Тісто з цільнозернового борошна, моцарела, креветки, цукіні, часник. Алергени: злаки, лактоза, ракоподібні.', 'Перетерті томати, моцарела, прошуто кото, артишоки, свіжі печериці, салямі Мілано. Алергени: злаки, лактоза.', 'Перетерті томати, моцарела, пікантні баклажани, мариновані за домашнім італійським рецептом, салямі пепероні та пармезан. Алергени: злаки, лактоза.',
            'Тісто з цільнозернового борошна, моцарела, панчета, яйце, пармезан. Алергени: злаки, лактоза, яйце.', 'Перетерті томати, моцарела, базилік. Алергени: злаки, лактоза.', 'Моцарела, горгонзола, пармезан, проволоне. Алергени: злаки, лактоза.',
            'Перетерті томати, моцарела мисливські та мюнхенські ковбаски, гірчиця, свіжі печериці. Алергени: злаки, лактоза, гірчиця.', 'Томати, моцарела, пармезан, базилік, соус песто. Алергени: злаки, лактоза, горіхи.', 'Тісто з цільнозернового борошна, перетерті томати, моцарела, рікота, прошуто кото, орегано, базилік та мигдальні пластівці. Алергени: злаки, лактоза, горіхи.',
            'Тісто з цільнозернового борошна з перетертими томатами та сирами моцарела, горгонзола, пармезан та рікотта. Алергени: злаки, лактоза.', 'Перетерті томати, моцарела, салямі пікантна пепероні. Алергени: злаки, лактоза.', 'Перетерті томати, моцарела, салямі Мілано. Алергени: злаки, лактоза.',
            "Тісто з цільнозернового борошна, перетерті томати, моцарела, пармська шинка, в'ялені томати, рікота та базилік. Алергени: злаки, лактоза.", 'Перетерті томати, моцарела, бекон, мисливські ковбаски, шпинат, рукола та листя салату, салямі. Алергени: злаки, лактоза.', "Перетерті томати, моцарела, панчетта, свіжі печериці, в'ялені томати та базилік. Алергени: злаки, лактоза.",
            'Перетерті томати, моцарела, пармська шинка, рукола, пармезан. Алергени: злаки, лактоза.', 'Перетерті томати, моцарела, кукурудза, ковбаски, картопля фрі. Алергени: злаки, лактоза.', 'Перетерті томати, моцарела, прошуто котто, свіжі печериці, базилік, оливкова олія. Алергени: злаки, лактоза.'];
        $pizza_weight = [440, 490, 480, 400, 530, 580,
            400, 340, 340, 520, 380, 480,
            440, 420, 420, 530, 450, 490,
            410, 580, 430];
        $pizza_price = [175, 205, 245, 250, 230, 220,
            205, 153, 225, 225, 180, 240,
            225, 242, 232, 265, 225, 240,
            265, 222, 220];

        for ($i = 0; $i < 21; $i++) {
            ProductModel::insert([
                'type' => 'pizza',
                'name' => $pizza_name[$i],
                'desc' => $pizza_desc[$i],
                'weight' => $pizza_weight[$i],
                'price' => $pizza_price[$i],
                'src' => 'pizza/' . ($i + 1)
            ]);
        }

        $snack_name = ['Капоната з хумусом ыз зеленого горошку', 'Тріо Брускетта', 'Брускети з анчоусами',
            'Сирні кульки', 'Курячі нагеси', ' Карпачо з телятини',
            'Карпачо зі свіжого лосося', 'Картопля фрі', 'Картопля смажена',
            'Фокача кон пармеджано', 'Фокача кон песто', 'Фокача',
            'Майонез', 'Кетчуп', 'Гірчиця',
            'Соус часниковий', 'Соус цезар',
            'Соус гірчично-медовий', 'Соус вершковий', 'Соус кунжутний',
            'Гострий соус з перцю', 'Фісташки'];
        $snack_desc = ['Капоната з баклажанів, печериць, оливок каламата, каперсів та часнику. Подається з хумусом із зеленого горошку та хрусткою чіабатою. На ваш вибір - гостра або ні. Алергени: кунжут, злаки.', 'Традиційна італійська закуска із томатів, свіжих трав, фети, пармезану і пармскої шинки, подається на хрусткій чіабаті', 'Хрусткі брускети з анчоусами та конкасе з міні томатів, болгарського перцю та базиліка. Алергени: злаки, риба.',
            'Хрусткі шматочки моцарели, подаються з часниковим соусом.Алергени: злаки, лактоза, яйця.', 'Курячі нагетси в хрусткій паніровці. Подаються з кетчупом та прикрашаються міні томатами. Алергени: злаки, яйця.', 'Подається з пармезаном, каперсами, листям руколи, томатами і лимоном під оливковим соусом. Алергени: лактоза.',
            'Подається з пармезаном, каперсами, листям руколи, томатами конкасе і лимоном під оливковим соусом. Алергени: риба, лактоза.', '', '',
            'Тісто з цільнозернового борошна, оливкова олія, пармезан', 'Оливкова олія, соус песто, пармезан', 'Оливкова олія, орегано, часник',
            '', '', '',
            '', 'Майонез, пармезан, гірчиця, анчоуси, часник, сік лимонний, сіль, перець. Алергени: лактоза, риба,гірчиця, яйца.', 'Оливкова олія, фреш апельсина, гірчиця, мед. Алергени: гірчиця, мед.',
            'Вершки, пармезан. Алергени: лактоза.', 'Соус унаги, олія оливкова, оцет винний, кунжут, фреш лимона, цедра апельсина. Алергени: кунжут, риба.', '', ''];
        $snack_weight = [285, 130, 130, 230, 145, 135,
            135, 150, 150, 180, 190, 49,
            30, 30, 30, 30, 30, 30,
            30, 30, 40, 1337];
        $snack_price = [99, 95, 99, 99, 89, 179,
            189, 62, 62, 59, 69, 49,
            17, 17, 17, 17, 17, 17,
            17, 17, 49, 228];

        for ($i = 0; $i < 22; $i++) {
            ProductModel::insert([
                'type' => 'snack',
                'name' => $snack_name[$i],
                'desc' => $snack_desc[$i],
                'weight' => $snack_weight[$i],
                'price' => $snack_price[$i],
                'src' => 'snack/' . ($i + 1)
            ]);
        }

        $salad_name = ['Салат з лососем і моцарелою', 'Салат нісуаз', 'Салат "Цезар" з куркою',
            'Салат "Цезар" з лососем', 'Салат "Цезар" без курки', 'Салат "Грецький"',
            'Зелений салат з креветками', 'Зелений салат', ' Салат авокадо кон тофу'
        ];
        $salad_desc = ['Мікс салату з запеченим лососем, моцарелою, міні томатами, авокадо, перепелиними яйцями, міксом салату та гірчично-медовим соусом. Алергени: риба, лактоза, селера, гірчиця, мед, яйца.', 'Мікс салатів, тунець консервований, перепелине яйце, артишоки, міні томати, оливки каламата, каперси, червона цибуля під гірчично-медовим соусом. Алергени: яйця, гірчиця, риба, мед.', 'Листя салату айсберг, огірки, міні томати, пармезан, часникові сухарики під соусом «Цезар». Подається з куркою-гриль. Алергени: лактоза, гірчиця, яйця, риба.',
            'Листя салату айсберг, огірки, міні томати, пармезан, часникові сухарики під соусом «Цезар». Подається з запеченим лососем. Алергени: лактоза, гірчиця, яйця, риба, соєві боби, злаки.', 'Листя салату айсберг, огірки, міні чері, пармезан, часникові сухарики під соусом «Цезар».Алергени: лактоза, гірчиця, яйця, риба.', 'Легкий овочевий салат з сиром фета та оливками каламата. Подається з хрусткою чіабатою. Алергени: злаки, яйця, лактоза, соєві боби.',
            'Мікс салатів з міні томатами, креветками, авокадо, сиром пармезан, кедровими горішками та оливково-бальзамічним соусом. Алергени: горіхи, лактоза, ракоподібні, мед.', 'Мікс салатів з міні томатами, авокадо, сиром пармезан, кедровими горішками та оливково-бальзамічним соусом. Алергени: горіхи, лактоза, мед.', 'Салат з міксу квасолі, кіноа, нуту, кус-кусу та зеленого горошку з цибулею, петрушкою та кінзою під кунжутним соусом. Подається зі смаженим сиром тофу та слайсами авокадо. Алергени: соєві боби, злаки, кунжут, риба.'];
        $salad_weight = [220, 250, 320,
            270, 220, 300,
            190, 170, 260];
        $salad_price = [175, 149, 155,
            165, 96, 109,
            170, 120, 135];

        for ($i = 0; $i < 9; $i++) {
            ProductModel::insert([
                'type' => 'salad',
                'name' => $salad_name[$i],
                'desc' => $salad_desc[$i],
                'weight' => $salad_weight[$i],
                'price' => $salad_price[$i],
                'src' => 'salad/' . ($i + 1)
            ]);
        }

        $main_name = ['Ніжка кролика зі шпинатом', 'Спагеті з морепродуктами', 'Різото з білими грибами',
            'Равіоли з тофу та шпинатом', 'Куряча грудка з баклажанами', 'Лосось під сальсою з манго',
            'Паста з індичкою та пармезаном', 'Лазаньяз телятиною', 'Равіолі з лососем',
            'Равіолі тенері', 'Папарделле з білими грибами', 'Спагеті карбонара'];
        $main_desc = ['Ніжний кролик у вершковому соусі зі шпинатом та пармезаном. Алергени: лактоза.', 'Спагеті у соусі з перетертих томатів з креветками, морськими гребінцями, ракушками мідій, кальмаром та восьминогом, з додаванням часнику. На ваш вибір - гостра або ні.', 'Різото з білими грибами, вівсяними вершками та трюфельною олією.',
            'Равіолі з твердих сортів пшениці з тофу та шпинатом. Подається з печерицями та солодким перцем. Алергени: кунжут, соєві боби, злаки.', 'Соковита куряча грудка, маринована в травах зі спеціями та обсмажена на грилі. Подається на баклажанах фрі зі свіжими томатами та зеленню. Заправляється цитрусово-кунжутним соусом. Алергени: злаки, кунжут, соєві боби.', 'Ніжне філе запеченого лосося з пікантною сальсою із томатів, солодкого перцю та червоної цибулі. Прикрашається соусом манго-чилі. Алергени: соєві боби, риба, злаки.',
            'Паста з твердих сортів пшениці з додаванням спіруліни, з запеченим філе індички та пармезаном під вершковим соусом. Алергени: злаки, лактоза, яйця, соєві боби, молюски.', "Традиційна італійська страва в томатно-м'ясному соусі болоньєзе з печерицями. Запікається під сиром моцарела та прикрашаеться петрушкою. Алергени: злаки, лактоза, яйця, селера.", 'Равіолі з твердих сортів пшениці з лососем та вершковим соусом із пармезану. Алергени: злаки, лактоза, яйця, риба.',
            'Равіолі з твердих сортів пшениці з м’ясом індички в ніжному вершковому соусі з каперсами. Прикрашаються пармезаном та листком базиліку. Алергени: злаки, лактоза, яйця.', 'Паста з твердих сортів пшениці з ароматними італійськими травами та білими грибами у вершковому соусі. Прикрашається пармезаном і базиліком. Алергени: злаки, лактоза, яйца, соєві боби.', 'Спагеті з беконом під вершковим соусом. Прикрашається пармезаном і базиліком. Алергени: злаки, лактоза, яйця.'];
        $main_weight = [260, 390, 220,
            195, 250, 200,
            280, 350, 200,
            210, 200, 260];
        $main_price = [249, 249, 185,
            115, 169, 259,
            149, 145, 165,
            145, 169, 125];

        for ($i = 0; $i < 12; $i++) {
            ProductModel::insert([
                'type' => 'main',
                'name' => $main_name[$i],
                'desc' => $main_desc[$i],
                'weight' => $main_weight[$i],
                'price' => $main_price[$i],
                'src' => 'main/' . ($i + 1)
            ]);
        }

        $dessert_name = ['Шоколадний пісний фондан', 'Вафельний торт', 'Сирники з родзинками',
            'Тирамісу', 'Шоколадний фонтан', 'Лимонна кустарда',
            'Лимонна кустарда', 'Вафельний торт', 'Морозиво "Кокос"',
            'Морозиво "Малина"', 'Морозиво "Манго"', 'Морозиво "Ваніль класична"'];
        $dessert_desc = ['Пісне шоколадне тістечко. Подається з малиновим кюлі. Алерген: злаки', 'Тістечко зі згущеним молоком та фундуком. Алергени: лактоза, злаки, горіхи.', 'Ніжні домашні сирники, подаються зі сметаною, малиновим кюлі, цукровою пудрою та базиліком. Алергени: злаки, лактоза, яйця.',
            'Традиційний італійський десерт. Алергени: лактоза, злаки, яйця.', 'Тістечко з теплим шоколадом всередині. Алергени: злаки, лактоза, яйця.', 'Ніжний лимонний десерт з малиновим соусом. Алергени: злаки, лактоза, горіхи.',
            'Ніжний лимонний десерт з малиновим соусом. Алергени: злаки, лактоза, горіхи.', 'Тістечко зі згущеним молоком та фундуком. Алергени: лактоза, злаки, горіхи', '',
            '', '', ''];
        $dessert_weight = [170, 95, 280,
            170, 100, 110,
            1200, 750, 330,
            330, 330, 330];
        $dessert_price = [89, 85, 105,
            135, 105, 79,
            625, 499, 99,
            99, 99, 99];

        for ($i = 0; $i < 12; $i++) {
            ProductModel::insert([
                'type' => 'dessert',
                'name' => $dessert_name[$i],
                'desc' => $dessert_desc[$i],
                'weight' => $dessert_weight[$i],
                'price' => $dessert_price[$i],
                'src' => 'dessert/' . ($i + 1)
            ]);
        }

        $drink_name = ['КРОНЕНБУРГ 1664 БЛАНК 0,33 Л', 'КАРЛСБЕРГ МУЛЬТІПАК 3+1', 'КАРЛСБЕРГ 0,5 Л',
            'ВАРШТАЙНЕР ПРЕМІУМ ВЕРУМ 0,33 Л', 'ГІННЕСС ОРІДЖИНАЛ 0,33 Л', 'ГРІМБЕРГЕН ДАБЛ-АМБРІ 0,33 Л',
            'КАРЛСБЕРГ Б/А 0,45 Л', 'СИДР СОМЕРСБІ 0,5 Л', "LAMBRUSCO DELL 'EMILIA BIANCO, CHIARLI",
            'PROSECCO FRIZZANTE, CANTI', 'PINOT GRIGIO VENETO ROSE, CANTI', 'PINOT GRIGIO, CESARI',
            'КОКА-КОЛА 1 Л', 'СПРАЙТ 0,25 Л', 'ШВЕПС БІТТЕР ЛЕМОН 0,25 Л',
            'ШВЕПС ІНДІАН ТОНІК 0,25 Л', 'RICH АПЕЛЬСИН 1 Л', 'RICH ЯБЛУКО 1 Л',
            'RICH ПЕРСИК 1 Л', 'RICH ВИШНЯ 1 Л', 'МОРШИНСЬКА ПРЕМІУМ, Н/Г 0,33 Л',
            'МОРШИНСЬКА ПРЕМІУМ, Н/Г 0,75 Л', 'МОРШИНСЬКА ПРЕМІУМ, СЛ/Г 0,33 Л', 'МОРШИНСЬКА ПРЕМІУМ, СЛ/Г 0,75 Л',
            'БОРЖОМІ СКЛО 0,33 Л', 'БОНАКВА НЕГАЗОВАНА 0,33 Л', 'БОНАКВА СИЛЬНОГАЗОВАНА 0,33 Л'];
        $drink_desc = ['Cвітле нефільтроване пиво', '1 банка в подарунок! Cвітле фільтроване пиво', 'Cвітле фільтроване пиво',
            'Cвітле фільтроване пиво', 'Темне фільтроване пиво', 'Напівтемне фільтроване пиво',
            '', 'Сидр Сомерсбі', 'Ігристе сухе вино',
            'Ігристе біле сухе вино', 'Напівсухе рожеве вино', 'Біле сухе вино',
            '', '', '',
            '', '', '',
            '', '', '',
            '', '', '',
            '', '', ''];
        $drink_weight = [0.33, 2.0, 0.5,
            0.33, 0.33, 0.33,
            0.45, 0.5, 0.75,
            0.75, 0.75, 0.75,
            1, 0.25, 0.25,
            0.25, 1.0, 1.0,
            1.0, 1.0, 0.33,
            0.75, 0.33, 0.75,
            0.33, 0.33, 0.33];
        $drink_price = [40, 120, 40,
            59, 65, 49,
            40, 44, 195,
            365, 259, 225,
            45, 27, 27,
            27, 59, 59,
            59, 59, 27,
            44, 27, 44,
            48, 27, 27];

        for ($i = 0; $i < 27; $i++) {
            ProductModel::insert([
                'type' => 'drink',
                'name' => $drink_name[$i],
                'desc' => $drink_desc[$i],
                'weight' => $drink_weight[$i],
                'price' => $drink_price[$i],
                'src' => 'drink/' . ($i + 1)
            ]);
        }

        return redirect()->action([FillController::class, 'fillIng']);
    }

    public function fillIng()
    {
        IngModel::query()->truncate();

        $ing_name = ['Моцарела', 'Філе курки', 'Філе копченої курки', 'Панчета',
            'Салямі мілано', 'Пікантна салямі перероні', 'Пармська шинка', 'Прошутто котто',
            'Бекон', 'Мисливські ковбаски', 'Мюнхенські ковбаски', 'Пармезан',
            'Сир горгонзола', 'Фета', 'Рікота', 'Рукола',
            'Томати чері', 'Томати', "В'ялені томати", 'Печериці',
            'Білі гриби', 'Кукурудза', 'Оливки каламата', 'Цибуля',
            'Лосось'
        ];
        $ing_weight = [90, 100, 80, 60,
            60, 60, 50, 50,
            60, 60, 60, 30,
            30, 50, 80, 15,
            80, 60, 30, 50,
            60, 30, 20, 30,
            50
        ];
        $ing_price = [49, 50, 50, 46,
            79, 89, 80, 50,
            36, 36, 36, 47,
            66, 24, 50, 28,
            46, 19, 40, 26,
            76, 26, 30, 8,
            76
        ];

        for ($i = 0; $i < count($ing_name); $i++) {
            IngModel::insert([
                'name' => $ing_name[$i],
                'weight' => $ing_weight[$i],
                'price' => $ing_price[$i],
                'src' => 'ing/' . ($i + 1)
            ]);
        }

        return redirect()->action([FillController::class, 'fillAdd']);
    }

    public function fillAdd()
    {
        $address = ['вул. Салютна, 2, корпус 3, ЖК Файна Таун',
            'вул. Золотоворітська, 15',
            'пр-т Перемоги, 26, ТРЦ «Smart Plaza»',
            'вул. Набережно-Хрещатицька, 41, БЦ "Астарта" (блок С)',
            'вул. Берковецька, 6Д, ТРЦ "Lavina Mall"',
            'пр-т Академіка Палладіна, 16, ТЦ «Academ City»',
            'пр-т Генерала Ватутіна, 2T, ТРЦ "Sky Mall"',
            'м. Вишневе, вул. Першотравнева, 26 (ТЦ NOVUS)',
            'вул. Архітектора Вербицького, 1, ТРЦ New Way',
            'вул. Антоновича, 176, ТРЦ  Ocean Plaza',
            'вул. Гната Хоткевича, 1В, ТРК «Проспект»',
            'вул. Вишгородська, 45, ЖК «Паркове місто»',
            'пр-т Оболонський, 1Б, ТРЦ Dream Town',
            'вул. Володимирська, 40/2',
            'пр-т Голосіївський, 58А, ЖК Park Avenue',
            'Пр-т Перемоги, 45',
            'вул. Дніпровська набережна, 19',
            'вул. Саксаганського, 120',
            'вул. Московська, 17'];

        for ($i = 0; $i < count($address); $i++) {
            AddressModel::insert([
                'addr' => $address[$i],
                'src' => $i + 1
            ]);
        }

        return redirect()->action([MainController::class, 'landing']);

    }
}