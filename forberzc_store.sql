-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 10:41 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forberzc_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `dict`
--

CREATE TABLE `dict` (
  `id` int(11) NOT NULL,
  `lang_key` varchar(255) NOT NULL,
  `lang_he` text NOT NULL,
  `lang_en` text NOT NULL,
  `lang_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dict`
--

INSERT INTO `dict` (`id`, `lang_key`, `lang_he`, `lang_en`, `lang_ru`) VALUES
(1, 'product_title', 'פורברז™ רייד אפקט™', 'Forberz™ Ride Effect™ - Get the right effect!', '\nФорберз™ Райд Эфект™'),
(2, 'pack_size', 'גודל אריזה', 'Package size', 'Упаковка'),
(3, 'main_h1', 'ברוכים הבאים לעולם של דיטיילינג בחומרים טבעיים בלבד!', 'Welcome to the world of natural detailing!', 'Добро пожаловать в мир натурального дитэйлинга!'),
(4, 'main_h2', 'האתר של "פורברז" עובר שדרוגים ושינויים על מנת להעניק לכם את חוויית הדיטיילינג הטובה ביותר.', 'The Forberz website is curently under reconstruction to give you the best detailing experience, ever.', 'Форберз'),
(5, 'main_p', 'מוצרי דיטיילינג טבעיים\n(טיפוח רכב ודו-גלגלי).\nמוצרי שחזור, שימור וחידוש לפלסטיק, עור, גומי, ויניל, צבע ועוד.\nתכשירי ניקוי עור, בד, פלסטיק, ויניל ועוד.', 'We are sorry for the inconvenience and doing our best to get everything to work properly.', 'Извините, страница не закончена.'),
(6, 'social_on', 'פורברז גם ב:', 'Forberz on:', 'Форберз на:'),
(7, 'cata', 'מוצרים', 'Products', 'Каталог'),
(8, 'wherebuy', 'איפה קונים?', 'Where to buy?', 'Где купить?'),
(9, 'protreat', 'מטפלים מקצועיים', 'Pro-Treatment', 'Про-Сервис'),
(10, 'guide', 'הדרכה ויעוץ', 'Guides', 'Школа Дитэйлинга'),
(11, 'gallery', 'גלרייה', 'Gallery', 'Галерея'),
(12, 'about_forberz', 'מה זה פורברז?', 'What\'s Forberz?', 'Что такое Форберз?'),
(13, 'about_detailing', 'מה זה דיטיילינג?', 'What\'s Detailing?', 'Что такое Дитэйлинг?'),
(14, 'forberz', 'פורברז', 'Forberz', 'Форберз'),
(15, 'adress', 'כתובת', 'Address', 'Адресс'),
(16, 'phone', 'טלפון', 'Phone', 'Телефон'),
(17, 'mail', 'מייל', 'Mail', 'Мэйл'),
(18, 'adresss', 'ת.ד. 5051, ערד, ישראל', 'POB 5051, Arad, Israel', 'ПЯ 5051, Арад, Израиль'),
(19, 'phones', '072-2482228', '+972-72-2482228', '+972-72-2482228'),
(20, 'product_subtitle', 'משחת שחזור, חידוש וטיפוח לפלסטיק וגומי.', 'High quality detailing, restore and care compound for motor vehicles.', 'Восстановитель пластика и резины.'),
(21, 'how_to_use', 'הוראות שימוש', 'HOW TO USE', 'ИНСТРУКЦИЯ'),
(22, 'freq', 'שאלות נפוצות', 'FREQUENT QUESTIONS', 'ЧАСТЫЕ ВОПРОСЫ'),
(23, 'msds', 'מידע בטיחות', 'TECHNICAL & SAFETY DATA', 'ЧАСТЫЕ ВОПРОСЫ'),
(24, 'madeinisrael', 'מיוצר בישראל', 'MADE IN ISRAEL', 'Сделано в Израиле'),
(25, '100natural', '100% טבעי', '100% Natural', '100% Натуральный'),
(26, 'wherebuy_sub', 'רשימת חנויות בהן ניתן להשיג את מוצרי פורברז.', 'A list of Forberz products distributors.', 'Список магазинов в которых можно купить Форберз.'),
(27, 'protreat_sub', 'רשימת מומחים המעניקים טיפול מקצועי במוצרי פורברז.', 'A list of top professionals that will treat your ride with Forberz products.', 'Список профессиональных салонов работающих с Форберз.'),
(28, 'guide_sub', 'הדרכות והסברים שונים לשימוש נכון ויעיל במוצרי פורברז ומוצרים משלימים נוספים.', 'Guides and articles to help you get the most out Forberz products and keep your ride shiny.', 'Форберз'),
(29, 'gallery_sub', 'גלריית תמונות ווידאו מארועים שונים, הדגמות מעניינות ותמונות מימי העבודה וההדכרות שלנו.', 'Our video and photo gallery of different events, demonstrations and interesting things we saw on the way.', 'Видео и фото галерея Форберз.'),
(30, 'about_detailing_sub', 'מה אומרת המילה הקסומה הזאת ומה המשמעות שלה ברמה המקצועית.', 'What does it mean to detail something and how is it percieved proffessionaly.', 'Форберз'),
(31, 'about_forberz_sub', 'מאיפה ולמה התחלנו ולאן אנחנו רוצים להגיע.', 'Why and where did we start from and where are we planning to get.', 'Как и откуда мы начали и куда стремимся.'),
(32, 'about_forberz_text', 'חברת ״פורברז״ (Forberz) הוקמה מתוך אהבה למכוניות מיוחדות, דו-גלגלי ותחביבים שונים כגון עבודות עץ טבעי וטיפוח פריטי אספנות.\n \nהדחיפה העיקרית להתחיל הכל היה היאוש ממוצרי הטיפוח השונים שנתנו פתרון חלקי לכל היותר.\nגם במקרים המעטים בהם השעות שבוזבזו על תהליך היישום השתלמו במראה נהדר, התוצאה נעלמה כלא הייתה תוך ימים ספורים. לפעמים התוצאות של החומרים השונים היו כה הרסניות שהיה צורך בפתרון חלופי של כיסוי מלוא המשטח.\n\nב״פורברז״ אנו מאמינים שעדיף לטפל ולשחזר את המשטח ולשמור על תכונותיו המקוריות כגון רכות, צבע וגמישות לאורך שנים מאשר ליישם שכבת צבע או מגן שתסתיר את הנזקים ורוב הסיכויים תתקלף עם הזמן בצורה מאוד לא אחידה.\n \nהפתרון של מוצרי ״פורברז״ הוא פשוט, חומרים טבעיים לחלוטין לנקיון, שחזור ושימור, לא רעילים ולא מזיקים לסביבה או למשטח המטופל, . מוצרי ״פורברז״ תוכננו לשימוש נוח ויעיל גם בסביבה ביתית וללא שטח עבודה נפרד, כמו גם לשימוש מסחרי בכמויות גדולות ולתוצאות מעולות פעם אחר פעם.\n \nשחזור ושימור של המשטחים השונים והירידה לפרטים הקטנים והחשובים באמת כמו החריצים של הדשבורד, התפרים של המושבים והכפתורים הקטנים ביותר ברדיו עתיק היא המהות של ההשקעה והשמירה לאורך שנים של האוצרות הקטנים והגדולים שלכם.\n \nכל מוצרינו מיוצרים בישראל, מחומרי גלם הנרכשים בישראל ונארזים באריזות המודפסות בישראל.', '<b><i>Forberz</i></b> was created from true love for special cars, bikes and hobbies like woodworking and restoring antiques.<br>The main reason to start it all was the desperation from the different care products that gave a partial solution and were based on harsh chemicals as fillers. Even in the rare cases when the many hours spent on applying the different products paid off with a great looking result, the whole thing was gone after a few days. Sometimes the results were so damaging that there was a need for covering up the whole surface.<br> <img src="/img/crazydash.jpg" style="width: 100%; margin-top: 1rem" title="Ford Escort dash after a lot of damage from car care products that got just covered up with stickers."><br>At <b><i>Forberz</i></b> we believe that it\'s better to treat and restore the surface and preserve it\'s original properties, like the color, elasticity and softness for years on, than to apply a coat of paint or some protection layer that will cover up the damage and most of the times will peel off very unevenly.<br>The <b><i>Forberz</i></b> solution is simple, all natural, eco-friendly, non-toxic ingredients for cleaning, restoring and preserving different materials that will not harm the environment nor the treated surface. <br><br>All of <b><i>Forberz</i></b> products were made with easy and quick application in mind and suit great for working at home without a special working area as well as for commercial high volume applications and for great results time after time. The restoration and preservation of the different surfaces and going down to the smallest and the most important details like the joints of the dashboard, the stitches of the seats and the smallest buttons on an antique radio is the whole being of the personal investment in the preservation of your smallest and biggest treasures for many years to come. All of <b><i>Forberz</i></b> products are Made in Israel, from the ingredients to the label.', 'Компания "Форберз" была создана из любви к особым машинам, двух-колёсным и различным хобби как работа с деревом и восстановление антиквариатов.\r\n \r\nГлавным мотиватором начать всё было отчаинье от различных материалов по уходу которые давали лиш частичное решение. Даже в тех единичных случаях когда часы потраченые на чистку и наношение различных материалов оплачивались велеколепным результатом, этот результат исчезал за считаные дни. Иногда результаты использывания различных препаратов оказывались на столько вредящими что приходилось придумывать как покрывать всю поверхность различными материалами.\r\n\r\nВ "Форберз" мы верим в то что восстановление и уход за различными поверхностями и поддерживание оригинальных свойств  различных материалов как цвет, мягкость и эластичность  намного лучше чем покрывать поверхности краской или каким то покрытием которое в какомто моменте начнёт очень не ровно отходить. \r\n \r\nРешения от "Форберз" просты, полностью натуральные и не ядовитые компоненты, не вредящие среде и поверхностям на которые они наносятса. Препараты "Форберз" продуманы для лёгкого и эфективного использывания даже в домашней обстановке, без специального рабочего места и так же для массового использывания в комерчских целях и в промышленности и для получения велеколепных результатов каждый раз.\r\n \r\nВосстановление и сохранение различных поверхностей и внимание к самым маленьким деталям как щели в торпеде, швы сидений и маленькие кнопочки на старинном радио, все эти и есть тот велекий вклад в сохранение ваших маленьких и больших сокровищ на долгие года.\r\n \r\nВся наша продукция сделана в Израиле, из ингредиентов купленных в Израиле и упакована в упаковки напечатаные в Израиле.'),
(33, 'about_detailing_text', 'עמוד בבנייה, עמכם הסליחה', 'Sorry, page is under construction.', 'Извините, страница не доступна.'),
(34, 'rights', 'כל הזכויות שמורות', 'All rights reserved', 'Все права защищены'),
(35, 'cata_sub', 'כל המוצרים הזמינים כעת בחברה.', 'All of "Forberz" products avaliable at the moment at all the categories.', 'Вся продукция Форберз'),
(36, 'main', 'עמוד ראשי', 'HOME PAGE', 'Домашнея страница'),
(37, 'affiliate', 'הצטרף כמפיץ', 'Become a Distributor', 'Стать Дистрибютором'),
(38, 'jobs', 'דרושים', 'Jobs', 'Вакансии'),
(39, 'contact', 'צרו קשר', 'Contact Us', 'Свяжитесь с нами'),
(40, 'area', 'אזור', '', ''),
(41, 'city', 'עיר', 'City', 'Город'),
(42, 'store_name', 'שם החנות', 'Store name', 'Магазин'),
(43, 'mii_text', 'מוצרי פורברז מיוצרים בישראל בעיר ערד ומתאימים לתנאי האקלים הקשים בארץ.\r\nמוצרינו נבחנים מדי יום בידי עשרות אלפי לקוחות מרוצים במגזר העסקי והפרטי. \r\nהידע והנסיון הנצברים מאפשרים לנו לשפר את מוצרינו באופן מתמיד ולהביא אליכם את מוצרי הטיפוח, חידוש, שחזור ושימור הטובים ביותר עבור הרכב, האופנוע או הקטנוע האהובים עליכם. \r\nכל מוצרי פורברז מתאימים ובטוחים לשימוש ביתי ומקצועי, מתאימים לשימור רכב אספנות ולטיפוח מכוניות חדשות כאחד וידידותיים לשימוש, לסביבה ולמשתמש.', 'Forberz products are made in Israel in Arad and they are designed to withstand the exreme weather conditions and the harsh Israeli heat. Our products are tested daily by thousands of proffessional customers. The feedbacks and the experience help us constantly improve our products and bring you the best care, restore and preservation products for your car, bike, truck or atv.  All of Forberz products are suited for proffessional and DIY applications, great for keeping your classic or antique ride looking and feeling brand new and as well for keeping your new car or bike looking and feeling new for years.', ''),
(44, 'mii_title', 'מיוצר בישראל<br>\r\nמתאים לאקלים', 'Made in Israel<br>\r\nHot climate safe', 'Сделано в Израиле<br>Не боитса климата'),
(46, 'natural_title', '100% טבעי<br>\r\nאינו רעיל', '100% Natural<br>Nontoxic', '100% Натурально<br>Не ядовито'),
(47, 'natural_text', 'כל מוצרי פורברז הינם 100% טבעיים, אינם מכילים סיליקונים, חומצות חזקות, אלכוהול, אמוניה או חומרים כימיים אחרים. \r\nמוצרי פורברז מיוצרים מחומרי גלם אורגניים ואשר לא מעובדים בצורה תעשייתית. \r\nאנו שומרים בכך את התכונות המקוריות של חומרי הגלם וממצים אותן בצורה מיטבית. \r\nהחומרים אינם רעילים, ידידותיים לסביבה ולמשתמש ואינם מזיקים למשטח המטופל.', 'All Forberz products are 100% Natural, do not contain silicones, strong acids, alcohol, amonia or other chemicals. Forberz products are made of organic ingredients without industrial processing procedures. By that we can keep the original material properties and maximize their potential. All of Forberz products are nontoxic, environmentaly friendly and user friendly.', ''),
(48, 'nosilicone_title', 'ללא סיליקון<br>\r\nללא כימיקלים', 'No Silicones<br>No Chemicals', 'Без Силикона<br>Без Химии'),
(49, 'nosilicone_text', 'במוצרי פורברז התמקדנו בבחירת תרכובות לחומרים שאינן מכילות כל חומר אשר עלול להסב נזק לרכב האספנות היקר או האופנוע הנדיר.\r\nמוצרינו מיועדים לשיקום ושחזור משטחים שונים ובכך כימיקלים פשוט לא עוזרים.\r\nיתרה מכך, עם הזמן וכמות הניסויים גילינו שהחומרים הטבעיים עושים עבודה הרבה יותר טובה ומעניקים תוצאות מעולות לאורך טווחי זמן ארוכים יותר.', 'Our main goal at Forberz is to bring back the faith in the possibity to take care of your ride without damaging it with harsh chemicals. All of the ingredients we use in our products are harmless to your classic or antique car or bike and as well for new vehicles. With time and experience we found out that the natural nontoxic ingredients are much more effective than the different strong chemicals that will actually harm your car and you at the bit of wrong use. Our products restore most chemical damages as well by the way.', ''),
(50, 'easyuse_title', 'קלות שימוש<br>\r\nיעילות גבוהה', 'Ease of use<br>Great usability', ''),
(51, 'easyuse_text', 'מוצרי פורברז מיועדים לשימוש. שימוש פשוט נוח וקל, בלי הכנות מיוחדות ובלי הצורך בלאטום לחלוטין את סביבת העבודה. \r\nניתן ליישם את החומרים במגוון דרכים נוחות והריכוז הגבוה של החומרים הפעילים מצריך כמות מזערית של החומר על מנת לבצע את המשימה ביעילות מירבית.\r\nמוצרינו מיועדים לאנשי מקצוע ולאנשים פרטיים כאחד לשימוש נוח ויעיל בכל מצב. ', 'Forberz products are made to be used. Ease of use and application without special work area preparations is important to you, so we made our products easy to use anywhere and anytime you need them. Application is easy and because of the high concentration of active ingredients in Forberz products all you need is a tiny bit to get the mission done as best as possible. Forberz products are for everyone, whether you are a paint proffessional and not allowed any chemicals and waxes in your shop or you just wanna keep your private loved ride looking great.', ''),
(52, 'clients', 'בין לקוחותינו', 'Our clients', 'Наши клиенты'),
(53, 'reviews', 'לקוחות מספרים', 'Customer Reviews', 'Отзывы покупателей'),
(54, 'review_text', '"חומר פשוט מדהים!!! שנים משתמש בחומרים כמו סקאיי, סיליקון, שמנים וכל הדברים האלה אבל החומר שלכם פשוט רמה מטורפת, לא שומני וסיליקוני, החייה את הפלסטיקה כמו חדשה והכי חשוב נשאר לתמיד ולא נעלם אחרי מגע הכי קטן עם מים וסבון, חומר פשוט מטורף, שווה כל גרוש." <br><i>עומר מרציני</i>\n<br><br>\n"נקיון מושלם ובלי הנזקים של כל החומרים האחרים. הדשבורד שלי פשוט קיבל חיים חדשים אחרי טיפול יסודי עם הדיטייל אייצ\' די  והרייד אפקט של פורברז." <br><i>זוהר וייסמן</i>\n<br><br>\n"חומרים פשוט טובים ותוצאות יוצאות מגדר הרגיל." <br><i>אנטון סטוליארצ\'וק</i>\n<br><br>\n"הצלחתי לשחזר את העור בכסא, אחרי שהשארתי עליו סלסלה מפלסטיק לבן שנדבק לעור השחור ולא משנה איזה חומר ניסיתי, כלום לא עזר עד שניסיתי את הפורברז לדר טריט." <br><i>גרמן מישייב</i>\n<br><br>\n"מרחתי מעט על הסוזוקי גרנד ויטרה והפלסטיק והצבע פשוט קיבלו חיים חדשים. אני מרגיש כאילו יש לי אוטו חדש עכשיו, באמת." <br>גיא<i> זאפה</i>\n<br><br>\n"האוטו שלי פשוט יקר לי מדי בשביל לשים עליו כימיקלים זולים שיפגעו בו."\n<br><i>טום כחלון</i>\n<br><br>\n"לאנשים שפשוט נמאס מכל הספריים והסיליקונים למיניהם לחידוש פלסטיקה ושבא להם לראות את האופנוע נראה אותו דבר גם אחרי שבוע." <br><i>אדר אביבי</i>\n<br><br>\n"אחד המוצרים היותר טובים שהשתמשתי!" <br>אביב מרקוזון<i></i>\n<br><br>\n"התקרה של הרכב הייתה שחורה מכל הפיח ועשן הסיגריות שעברו על האוטו בחייו. אני לא מאמין לקלות ולמהירות שבה היא חזרה לעצמה וגם ניקיתי בלי לשים כפפות ובלי לפחד." <br><i>יבגני קוליעקב</i>', '"An amazing product!!! I\'ve been using all the silicone and oil based sprays and dressings for years but the Forberz Ride Effect is just on another level of results, not greasy or siliconey, restores the plastic back to it\'s "brand-new" state and most importantly stays almost forever instead of diappering with the lightest touch of water and soap. Deffinetly a mindblowing product, worth every penny,"<br><b><i>Omer Marzini</i></b><br><br>  "My Suzuki Vitara got a new life after applying this stuff on the plastic and paint, litterally new life."<br><b><i>Guyos Zappi</i></b><br><br> "Best plastic and rubber restore compound on the market."<br><b><i>Moto Team 95</i></b><br><br> "The best product for people that got tired of all those sprays and dressings and just want their bike to look the same a week after."<br><b><i>Adar Avivi</i></b><br><br> "I had white plastic traces on my car\'s back black leather seats. I\'ve tried all the products on the market and Forberz Ride Effect was the only thing that made it just disappear."<br><b><i>Eyal German Mishayev</i></b>', ''),
(55, 'moreinfo', 'מידע נוסף', 'More Info', 'Подробная Информация'),
(56, 'currency', 'ש"ח', '$', '$');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `meta` text NOT NULL,
  `title_en` text NOT NULL,
  `title_he` text NOT NULL,
  `title_ru` text NOT NULL,
  `subtitle_en` text NOT NULL,
  `subtitle_he` text NOT NULL,
  `subtitle_ru` text NOT NULL,
  `thumb` text NOT NULL,
  `img` text NOT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `prod_id`, `meta`, `title_en`, `title_he`, `title_ru`, `subtitle_en`, `subtitle_he`, `subtitle_ru`, `thumb`, `img`, `video`) VALUES
(1, 0, 'ride_effect_1', 'Ride Effect get the right effect', 'רייד אפקט בדיקה', 'Ride Effect get the right effect', 'Ride Effect get the right effect', 'רייד אפקט בדיקה\n', 'Ride Effect get the right effect', '/gi/gi11.png', '/gi/gi12.png', NULL),
(2, 0, 'ride_effect_2', 'Ride Effect get the right', 'רייד אפקט בדיקה', 'Рвлытвьььфьтрид', 'fsvadaddas', 'רייד אפקט בדיקה\n', 'ыамфысывсвсвф', '/gi/gi11.png', '/gi/gi11.png', NULL),
(3, 0, 'detail_hd_1', 'Ride Effect get the right', 'רייד אפקט בדיקה', 'Рвлытвьььфьтрид', 'fsvadaddas', 'דיטייל בדיקה\n', 'ыамфысывсвсвф', '/gi/gi12.png', '/gi/gi11.png', NULL),
(5, 0, 'logo1', 'Trade Mobile Leasing', 'טרייד מוביל ליסינג', '', '', '', '', '/gallery/logo1.png', '/gallery/logo1.png', NULL),
(6, 0, 'logo2', 'Toyota Select', 'טויוטה סלקט כמו חדש', '', '', '', '', '/gallery/logo2.png', '/gallery/logo2.png', NULL),
(7, 0, 'logo3', 'Chevrolet', 'שברולט', '', '', '', '', '/gallery/logo3.jpg', '/gallery/logo3.jpg', NULL),
(8, 0, 'logo4', 'Land Rover', 'לנד רובר', '', '', '', '', '/gallery/logo4.png', '/gallery/logo4.png', NULL),
(9, 0, 'logo5', 'Ford', 'פורד', '', '', '', '', '/gallery/logo5.jpg', '/gallery/logo5.jpg', NULL),
(10, 0, 'logo6', 'Ducati', 'דוקאטי', '', '', '', '', '/gallery/logo6.jpg', '/gallery/logo6.jpg', NULL),
(11, 0, 'logo7', 'Opel', 'אופל', '', '', '', '', '/gallery/logo7.jpg', '/gallery/logo7.jpg', NULL),
(12, 0, 'logo8', 'California Auto Spa', 'קליפורניה אוטו ספא', '', '', '', '', '/gallery/logo8.jpg', '/gallery/logo8.jpg', NULL),
(13, 0, 'logo9', 'Lease4u', 'ליס4יו', '', '', '', '', '/gallery/logo9.jpg', '/gallery/logo9.jpg', NULL),
(50, 0, 'strip1', '', '', '', '', '', '', '/gallery/strip1.jpg', '/gallery/strip1.jpg', NULL),
(51, 0, 'strip2', '', '', '', '', '', '', '/gallery/strip2.jpg', '/gallery/strip2.jpg', NULL),
(53, 0, 'strip3', '', '', '', '', '', '', '/gallery/strip3.jpg', '/gallery/strip3.jpg', NULL),
(54, 0, 'strip4', '', '', '', '', '', '', '/gallery/strip4.jpg', '/gallery/strip4.jpg', NULL),
(55, 1, 'ride_effect_1', 'Ride Effect get the right effect', 'רייד אפקט בדיקה', 'Ride Effect get the right effect', 'Ride Effect get the right effect', 'רייד אפקט בדיקה\n', 'Ride Effect get the right effect', '/gi/gi11.png', '/gi/gi12.png', NULL),
(56, 1, 'ride_effect_video', 'video', 'video', 'video', 'oy video', 'oy video', 'oy video', 'https://i.ytimg.com/vi/cmwOtn0bFSI/hqdefault.jpg?sqp=-oaymwEXCNACELwBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLAwOykCz2HbflFprTubC9x45cMUPg', 'https://i.ytimg.com/vi/cmwOtn0bFSI/hqdefault.jpg?sqp=-oaymwEXCNACELwBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLAwOykCz2HbflFprTubC9x45cMUPg', 'https://www.youtube.com/embed/cmwOtn0bFSI');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `guide_key` varchar(255) DEFAULT NULL,
  `title_en` text,
  `title_he` text,
  `title_ru` text,
  `subtitle_en` text,
  `subtitle_he` text,
  `subtitle_ru` text,
  `footer_en` text,
  `footer_he` text,
  `footer_ru` text,
  `author_he` text,
  `author_en` text,
  `author_ru` text,
  `text_en` text,
  `text_he` text,
  `text_ru` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_alt_en` text NOT NULL,
  `img_alt_he` text NOT NULL,
  `img_alt_ru` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `guide_key`, `title_en`, `title_he`, `title_ru`, `subtitle_en`, `subtitle_he`, `subtitle_ru`, `footer_en`, `footer_he`, `footer_ru`, `author_he`, `author_en`, `author_ru`, `text_en`, `text_he`, `text_ru`, `img`, `img_alt_en`, `img_alt_he`, `img_alt_ru`) VALUES
(1, NULL, 'Title', 'הדרכה: איך מטפלים בשריטות בצבע הרכב, אופנוע או קטנוע?', 'Форберз', 'Subtitle', 'טיפול בשריטות נע בין אשליה אופטית לפחחות רכב, יש שריטות שניתן לטשטש בקלות, יש כאלו שעברו את הצבע ויש כאלה שניתן להסיר בעזרת פוליש. </br> איך יודעים מה אפשר ועד כמה אפשר לטפל בשריטה?', 'תת כותרת רוסית', 'Car Paint Scratches', 'טיפול בשריטות בצבע הרכב או האפנוע', NULL, 'קיריל איבנוב', 'Kirill', 'Ловлаы', 'TEZT', '<img class="guide_img_left" src="/gi/gi11.png" alt="Car paint scratch touch up science"> \n<b>העקרון בטיפול בשריטות הוא שיוף הצבע עד לתחתית השריטה ועל ידי כך מתקבל משטח אחיד וחלק.</b>\nהשריטות בהן ניתן לטפל בקלות הן הקטנות והשטחיות מבין כולן, הבדיקה הטובה ביותר היא ציפורן, אם מרגישים שהציפורן נעצרת בשריטה יש סיכוי שהשריטה עמוקה מדי לטיפול. שיטות הטיפול משתנות על פי עומק השריטה ומתחילות בטשטוש שריטות קלות בעזרת ווקס או חומר דומה המתאים לשימוש על צבע הרכב ומיועד לטשטוש שריטות. בשריטות עמוקות יותר יש לטפל בעזרת פוליש או אף נייר שיוף מיוחד ועל כן זהו טיפול שמומלץ להשאיר לאנשי המקצוע וכמובן ישנן השריטות העמוקות ביותר שהגיעו לרמת הצבע ואין דרך לשחזר.\n<img class="guide_img_right" src="/gi/gi12.png" alt="Car paint scratch touch up science">\n</br></br>\nבאיור הנ"ל מופיעות מספר שריטות שונות בעומקים שונים. השכבה האפורה היא שכבת הצבע או הלכה והשכבה המנוקדת היא שכבת הבסיס שמתחת, פח הרכב, צבע הבסיס או שכבות הצבע השונות. הטיפול תמיד יתבצע בשכבה העליונה בלבד על מנת לשמור על אחידות במראה הצבע. </br></br>\n<b>השריטה הראשונה</b> הינה שטחית, לרוב בולטת ובצבע לבן, ניתן לטשטש אותה בעזרת ווקס מתאים או חומר שחזור כגון הForberz Ride Effect, החומר יחזיר את השקיפות של הלכה והצבע והשריטה תהיה בלתי נראית ממרחק של יותר מ-20 ס"מ מהמשטח הצבוע. הפתרון אמנם זמני אך חוסך טיפול פוליש ואת עובי הצבע. אם בכל זאת תבחרו לטפל בשריטות הקטנות בעזרת פוליש, צפויה לכם הצלחה בלי הרבה מאמץ. \n</br></br>\n<b>השריטה השנייה</b> כבר עמוקה יותר ומגיעה לכמחצית מהשכבה אותה יש לשייף, העלמת שריטה כזאת תדרוש שיוף של הצבע בעזרת פוליש או אף נייר שיוף בדרגות שונות. בדרך כלל זה יהיה פוליש אמצע החיים לצבע. יש סיכוי כי חלק מהשריטות לא יעלמו לחלוטין. \n</br></br>\n<b>השריטה השלישית</b> עמוקה מאוד ועוברת כמעט את כל השכבה העליונה, לרוב לא מומלץ לנסות לטפל בשריטות כאלו, שיוף רוב השכבה העליונה של הצבע יביא להתקלפות הצבע ולצורך בצביעה מחודשת של הרכב. \n</br></br>\n<b>השריטה הרביעית</b> עוברת לחלוטין את השכבה העליונה ומגיעה לשכבה מתחת, הפתרון היחיד במקרה הזה הוא צביעה, קיימים מכחולים ועטים שונים המכילים צבע על פי מספר יצרן, פתרון זה הוא זמני בלבד למניעת חלודה עד לצביעה מקצועית. יש לציין כי בתיקוני צבע יש צורך בהתאמה מקצועית של גוון הצבע עקב דהיית הצבע מהשפעות מזג האויר, במוסכי פחחות מקצועיים משתמשים ב"מצלמת צבע" מיוחדת אשר מנטרת באופן מושלם את גוון הצבע של החלק המיועד לצביעה והחלקים מסביב ומחשבת את גוון הצבע הדרוש לצביעת החלק על מנת לקבל מראה אחיד.\n </br>\n </br>\nדוגמא של טשטוש שריטות קלות בעזרת פורברז רייד אפקט.', 'טקסט רוסית', '/gi/gi11.png', '', '', ''),
(2, NULL, 'Title', 'מה ההבדל בין ווקס לפוליש? ומה זה למען השם פלסטלינה לצבע הרכב?', 'Форберз', 'Subtitle', 'פוליש ווקס שני החומרים הכי מפורסמים בעולם טיפולי הטיפוח לרכב ושני השמות הללו בכלל התערבבו בארצינו הקטנטונת למילה אחת. אז מה ההבדל? האמת זה הרבה יותר פשוט ממה שזה נשמע.', 'תת כותרת רוסית', 'פוליש, ווקס או פלסטלינה?', 'פוטר', 'Футер', 'קיריל איבנוב', 'Kirill', 'Ловлаы', 'TEZT', 'טיפול בצבע הרכב לרוב נועד לטשטוש והסרת שריטות והחייאת צבע הרכב או האופנוע, ניתן לבצע את הטיפול לבד ליד הבית או לשלם בין מאות לעשרות אלפי שקלים לאנשי מקצוע שיבצעו את הטיפולים עבורכם.\r\nטיפול בצבע הרכב או האופנוע דורש מיומנות מקצועית ובחוסר זהירות ואי הבנה אפשר לגרום לנזקים קשים ובלתי הפיכים לצבע בקלות ובמהירות.\r\nהתהליך מתחיל בשטיפה יסודית של הרכב מבחוץ, על מנת להסיר כל לכלוך שיפריע להמשך העבודה.\r\nלאחר מכן העקרון הוא לנקות את הצבע בצורה יסודית בעזרת פלסטלינה, להוריד שכבה מהצבע בעזרת פוליש ברמה הנדרשת לטשטוש מירבי של השריטות ובסוף התהליך לאטום את הצבע בעזרת ווקס. לאחר מכן הטיפול התקופתי כולל שטיפה ויישום של ווקס לשמירה על הצבע.<br><b>\r\n‎פלסטלינה</b><br>\r\nהפלסטלינה הינה גוש של חומר גמיש המכיל תוסף אברזיבי בריכוזים שונים וקיבלה את שמה עקב צורתה הראשונית והאופן בוא ניתן היה ללוש אותה בעזרת הידיים. הרעיון שלה הוא להוציא מתוך הצבע את כל הנקודות הקטנות, טיפות הצבע ולכלוך שונה הנתפס על הצבע, לאחר הטיפול בפלסטלינה תוכלו להרגיש שהצבע חלק ומושלם. המטרה היא לנקות את הצבע ולהכין את הצבע לפוליש יעיל ומהיר. הפלסטלינה היא שלב חובה בהכנת הצבע לפוליש ואין לדלג עליה, ללא טיפול בפלסטלינה הפוליש יבוזבז על גירוד הלכלוך מהצבע.<br>\r\n<b>פוליש</b><br>\r\nפוליש הינו משחה אברזיבית המגיעה ברמות חיתוך שונות, המיועדת להורדת שכבה מצבע הרכב או האופנוע על מנת להחליק את הצבע ולהעניק לו מראה חדש ונוצץ כמו ביום בו הוא יצא מתנור הצביעה. הורדת השכבה מתבצעת ברמת המיקרונים ונמדדת על ידי מכשיר מיוחד למדידת עובי הצבע כך שהוא בהחלט לא משהו שעושים כל שבוע. יש להתאים בצורה מיטבית את סוג הפוליש לסוג הצבע והלכה ולעומק החיתוך הנדרש. זהו תהליך אותו מומלץ להשאיר למקצוענים על מנת לקבל תוצאה שגם אתם לא תאמינו לה.<br>\r\n \r\n<b>ווקס</b><br>\r\nהווקס מגיע במגוון גרסאות ממוצק לנוזלי בהתאם לרמת הדילול ומיועד לאיטום ושימור הצבע לאחר טיפול, הווקס ממלא את החריצים המזעריים שנשארו בצבע אחרי הטיפול, יוצר ציפוי הגנה, מעניק ברק ו"פותח" את הצבע. חשוב לבדוק את החומרים עליהם הווקס מבוסס, בהרבה ווקסים משתמשים בטרפנטין, נפט ואלכוהול לדילול החומרים הפעילים והשימוש בהם עלול לפגוע בחלקי הרכב השונים ואף בצבע הרכב עצמו. לעומת זאת ווקס על בסיס טבעי יעזור בשמירה על הרכב ובטוח לשימוש על כל חלקי הרכב וניתן להסרה בקלות מהזכוכית. ווקסים קשים לרוב הרבה יותר נוחים לשימוש, עמידים מן הווקסים הנוזליים ומעניקים הגנה טובה יותר לאורך זמן.\r\n‏ <br>\r\n \r\nמגוון החומרים וההצהרות השונות אכן יצר בלבול עם הזמן ואני מקווה שהצלחתי להסביר את הרעיון בגדול, ישנן מגוון צורות וגרסאות לפלסטלינה, הפוליש והווקס בטווחי מחירים שונים ובאיכויות שונות, יש תמיד לזכור להתאים את המוצרים לסוג הצבע המסוים. לדוגמא צבע לבן פשוט כמו זה שמשתמשים בו עד היום ברוב הרכבים המסחריים אינו דורש טיפול מסובך ופוליש משחה לבן, פשוט וזול יעשה את העבודה בצורה הטובה ביותר, גם בבית ביישום ידני ניתן להגיע לתוצאה מדהימה. עם זאת כאשר מדובר בצבע מטאלי כהה בציפוי לכה עם שריטות שונות, יש צורך בטיפול יסודי הכולל שיוף בעזרת נייר מים במספרים שונים ו3-4 רמות שונות של פוליש בעזרת מכונה יעודית לפוליש על מנת להחליק ולאזן את כל צבע הרכב או האופנוע לכדי מראה אחיד.\r\n', 'טקסט רוסית', '/gi/gi11.png', '', '', ''),
(3, NULL, 'What is car detailing? Detailing vs. Cleaning', 'ניקיון או דיטיילינג? שוטפים נכון את הרכב ומה זה בכלל דיטיילינג', '', NULL, 'דבר ראשון, לשטוף את האוטו זה תמיד טוב, גם אם זה סתם להשפריץ עליו מים. תמיד טוב להוריד את האבק והבוץ מכל חלקי הרכב. אגב אם כבר אז מומלץ לשטוף היטב את המרכב התחתון, בו מתאספים רוב הבוץ והנזילות למיניהן. הצטברויות של בוץ, אבק ולכלוך הן הגורם מספר אחת לחלודה במרכב ולפגיעות בצבע.', NULL, NULL, NULL, NULL, 'Kirill Ivanov', 'קיריל איבנוב', 'Кирилл Иванов', 'So you bought a car, new or second hand, the color you like and you want to pamper it up.\r\nAfter all the mechanical procedures finished you want to clean it and keep it nice.\r\nCleaning your car is a pretty easy task, just throw out all that garbage,\r\nwash the exterior with soap and it\'s shining.\r\nNow let\'s let it dry and look at all those little scratches, sun or chemical damaged plastic trim,\r\nlook at your dashboard closely, look at the seats and tell me if it\'s perfect.\r\nProbably you do not really care about that prestine look if that\'s your work car or\r\nif it\'s just a beater for the next few months.\r\nBut what if that\'s a top notch sports car or a 67\' chrome covered beast?\r\nWhat if that\'s your childhood dream standing in front of you?\r\n\r\nWe are going to very lightly discuss the meaning of detailing and how it differs from\r\nregular garbage-out soap-on procedure.\r\nSo first of all to explain the term we will just look at the word it self.\r\nDetailing means going down to details, even the smallest and unnoticeable.\r\nThe professional detailing goes to rediculous details, like cleaning\r\nthe inside of the cigarette lighter or the dirt between the letters on the car emblems.\r\nProfessional detailing is about getting the car way cleaner than it left the factory brand new.\r\nThere are many different products, aimed at aiding the detailing process of every\r\npossible kind of dirt or stain and to even the treted surface as much as possible by restoring\r\nthe surface and it\'s natural properties.\r\n \r\nThe main part of detailing is off-course cleaning you car, you start by cleaning the car thoroughly with soap, in a shaded environment after the car had cooled down.\r\nContinue by wiping the car dry, with a good wuality cloth that doesn\'t leave any traces\r\nlike threads and such, microfibre cloths suit well.\r\nAfter that you look at all the spots and scratches on the paint, no detailing or as seen on tv product will repair big scratches and dents caused by daily or agressive use,\r\nThe maximum scratch depth that can be removed or at least touched-up without the use of a paint shop assistance is about 10 microns.\r\nThat is about 0.00039 of an inch or 0.01 milimeters.\r\nTo emphasise, those are the scratches that you can barely feel with the tip of your fingernail.\r\nAny scratch dipper that the clearcoat it self will require a professional body shop if you want the car to look even and without any color mismatch.\r\nFor example, everyday use scratches like those pictured can be easily hidden by using a good preserving and restoring compound like the Forberz RideEffect it will touch up those scratches\r\nwithout the need for polishing althought not permanently.\r\nFor a permanent result you will need to polish the car and smooth out the scratch by cutting of a miroscopic layer of clearcoat.\r\nSurface preparation for polishing is required and usualy done by "Car Clay" or\r\nsurface preparation clay depending on the brand.\r\nThe main idea behind it is removing all the polution and environmental particles that are stuck to your car paint and can be removed only by claying or chemical dissolving.\r\nBy removing those particles you are clearing and smoothing out the surface to the point that it\'s clean and smooth as glass and by the way you can do it on your glass too!\r\nAfter that you can lightly polish the paint or seal it right away with a sealing wax\r\nor a good compound like the Forberz RideEffect, that way the paint will stay clean and\r\nwill retain it\'s smoothness and will be much easier to clean the next time. \r\n The second part is offcourse treating all the plastic and rubber trim that is most of the time faded and damaged by sun, uncareful paint polishing, wax, silicone and other chemicals used in cheap car care products.\r\nThe best solution is to clean the trim thoroughly with a good and non-harming cleaning agent like the Forberz DetailHD and then restoring the surface and original properties like elasticity and color with a good restore and renew compound like the Forberz RideEffect which will penetrate inside the treated surface and after a few treatments will restore some of the original glory of the treated surface, \r\nThe interior is treated the same way.\r\nYou clean everything as meticulously as possible with a good non-toxic cleaning solution like theForberz DetailHD, using a wide variety of brushes and clothes going down to rediculous levels of perfection and restore and renew different surfaces in the best possible way.\r\nBasicaly you want no atom of dirt on any surface wherever, either in plain sight or inside the dashboard connections or even inside the engine bay.\r\nOn a professionaly detailed car wherever you look everything is perfectly shining and stands out by all means.\r\nThe paint must be perfect, the seams between the panels and the texture of different surfaces.\r\nAll must be clean and treated.\r\nThe best preservation for plastic, rubber, leather and faux leather surfaces is the Forberz Ride Effect which will penetrate the surface and seal it from liquids in a purely natural and eco-friendly way.\r\n \r\nFor example the steering wheel will always collect most of the dirt inside your car\'s interior\r\n \r\n \r\n \r\nThis steering wheel was thoroughly cleaned using a toothbrush and the Forberz DetailHD cleaning solution and then  the horn emblems and the rough surface on the sides were smoothed out using sand paper to get a "cleaner" look.\r\n \r\nTooth brushes or similar design professional detailing brushes are the main tool when it comes to detailing a car, brushes are the only way to get insde those seams and textured materials and really clean them,\r\n \r\n \r\n \r\n \r\nSometimes the change at the first detailing on a car is unimaginable.\r\nThe car and all of it\'s components come alive and are so much more pleasant to the eye.\r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nFor example these leather seats were partly cleaned with the Forberz DetailHD cleaning solution the result is amazing. Look at the difference.\r\nThe original color of the seat is showing from under all the dirt and bad treatments for years.\r\nAfter the cleaning the leather must be sealed and moisturised by a good and high quality product that is intended for leather treatment like the Forberz Ride Effect or the Forberz Leather Treat.\r\n \r\nIn general, car detailing is a car cleaning craze, the results are usualy mind blowing and the hard work pays off.\r\nThe most important part is using good grade materials and not using anything that may damage the surface you are treating.\r\nMost of the times, silicones, alcohol, paint thinner, turpuntine and chemical cleaners and dissolvants are more likely to leave their mark on your car, use them cautiously and well awared of the consequences.\r\nAt Forberz we base all of our products on natural formed and based materials that will not harm or leave any marks on your car.\r\nWith time and experience we found out that most of the time the natural alternatives work much better that most chemical solutions and compounds dur to lack of chemical reactions and better contact with the treated surface.', 'כמו כן יש לשים לב במידה רבה לכמות החומרים הכימיים השונים שהרכב נחשף אליהם במשך הזמן. חומצות שונות עלולות לפגוע קשות בצבע הרכב, נוזל בלמים אגב גם הוא אוכל צבע בנגיעה הראשונה, מומלץ לשמור אותו וכל חומר שהוא במקום קריר ומוצל על מדף מאשר בתא המטען של הרכב, במיוחד באקלים של ישראל.  אגב בדיוק מאותה הסיבה כל חומר שתרצו ליישם על הרכב מומלץ שהדבר יעשה בצל ולאחר שהרכב עמד מספר שעות בצל והתקרר. לשים כל חומר על משטח לוהט, יביא להתאדות של החומר וכך גם במקרה של שטיפת הרכב, המים, הסבון וכל חומר נוסף שתשימו יתפרק ויתאדה במקום לעשות את העבודה שלו. כמובן אחרון חביב ברשימת סעיפי החובה הוא המים או יותר נכון איך הם מגיעים לרכב, אם זה בדליים חייבים להיות שניים, כמו כל דבר אגב בשטיפת רכב, תמיד תהיו מוכנים לכך שמשהו יפול לכם מהיד ויתמלא באבנים קטנות שיהרסו הכל בצורה בלתי הפיכה. דלי אחד משמש לסבון ונשאר תמיד נקי, דלי שני משמש לשטיפת המטלית או הספוג. במידה ושוטפים עם צינור גינה רגיל, ישנם מספר אביזרים שיקלו על העבודה בצורה ממשית כגון אקדח מים, מיכל להתזת סבון וברז ניתוק ליד פתח הצינור שיחסוך ריצות מיותרות בהחלפות אביזרים. במידה ויש ברשותכם מכשיר שטיפה בלחץ זה יתרון אך גם יכול מהר מאוד להפוך לחסרון בשימוש לא נכון, ישנם ראשים שונים וחובה להקפיד על לחץ נכון, כאשר הנכון לרוב הוא הנמוך ביותר. הנזקים שעלולים להגרם משטיפה בלחץ גבוה הם קילוף צבע מהרכב ואף תלישת חלקים שונים כגון פסי קישוט, סמלים ועוד. אגב ברכבים מסויימים שטיפת המנוע בלחץ מים גבוה בחלקו התחתון עלולה לגרום לתקלות במערכות המחשב השונות.<br>\nאז בקיצור:<br>\n1. לשטוף את הרכב מכל כיוון ובמיוחד מלמטה.<br>\n2. לבדוק היטב אילו חומרים שמים על הרכב או האופנוע ולא לשמור חומרים לא הכרחיים ברכב.<br>\n3. לשטוף את הרכב כאשר הצבע קר למגע ובמקום מוצל.<br>\n4. מכל אביזר שטיפה מומלץ שיהיו תמיד שניים ולהזהר במיוחד עם שטיפה בלחץ.<br>\n<br>\n ועכשיו לחלק של הדיטיילינג, מה זה בעצם דיטיילינג? פירוש המושג הוא ירידה לפרטים הקטנים ביותר ואנחנו מאמינים בלב שלם, שדווקא הפרטים הקטנים הם אלו שעושים את ההבדל הגדול במראה הכללי של הרכב או האופנוע או אפילו רכב השטח הרע ביותר. השאיפה הזו לפרפקציוניזם בשטיפת רכב, היא סוג של חלום בלהות שלא נגמר למי שלא באמת עושה את זה מתוך אהבה אמיתית. הרעיון אגב פשוט מאוד, קחו מברשת שיניים, קצת סבון עם מים ותתחילו לנקות כל חלק וחלק ברכב בצורה הכי מדוקדקת שאפשר. זהו דיטיילינג.', 'Итак, Вы приобрели автомобиль... Новый или со вторых рук, того цвета, который Вам нравится, и теперь хотели бы за ним поухаживать. После осмотра и ремонта (в случае необходимости) механических частей. Вы собираетесь довести его внешний вид до совершенства.\r\n\r\nПочистить автомобиль легко и просто - соберите и выбросьте мусор, помойте его моющим средством и Ваша машина блестит и сияет! Но взгляните на нее после того, как она высохла и Вы увидите множество мелких царапин, поврежденные солнечными лучами и химикатами пластиковые детали. Присмотритесь к приборной доске и спросите себя, насколько Вас устраивает ее состояние.\r\nВпрочем, возможно Вас не слишком волнует внешний вид вашей машины. Может это Ваша "рабочая лошадка", или Вы приобрели ее на пару ближайших месяцев. А что, если это восхитительная спортивная модель или мощный хромированный зверь? Машина Вашей детской мечты?\r\n\r\nМы лишь слегка коснемся вопроса дитэйлинга и чем он отличается от простой процедуры выбрасывания мусора и мойки.\r\nДитэйлинг означает идеальная обработка каждой детали вплоть до самых мелких и незаметных. Профессиональный дитэйлинг не упускает из виду даже таких незначительных частей, как зажигалка или буквы на эмблеме.\r\nСуществует много различных средств для облегчения процесса обработки, справляющихся с любым возможным видом загрязнения и для поддержания поверхностей в их первоначальном виде.\r\n\r\nОснова дитэйлинга это конечно же мытье. Сначала моющим средством в затененном месте, после того, как автомобиль охладился. Затем важно протереть насухо качественной тканью, не оставляющей следов и ворсинок. Отлично подходит микрофайбер. И теперь становятся заметны пятна и царапины на краске, и никакое химическое средство не в состоянии справиться с глубокими царапинами и заусенцами. \r\nМаксимальная глубина царапины, с которой можно справиться, не прибегая к помощи профессионалов около 10 микрон, или 0.01 мм. То есть такие царапины Вы вряд ли ощутите кончиками пальцев. Любая царапина глубже красочного слоя потребует обращения в покрасочную, если Вы хотите, чтобы Ваша машина выглядела ухоженной.\r\nЦарапины, возникающие в процессе ежедневного использования (как на фото) легко устранить с помощью средства Форберз Райд Эффект (Forberz Ride Effect).', '/gi/gi11.png', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `title_en` text NOT NULL,
  `title_he` text NOT NULL,
  `title_ru` text NOT NULL,
  `subtitle_en` text NOT NULL,
  `subtitle_he` text NOT NULL,
  `subtitle_ru` text NOT NULL,
  `footer_en` text,
  `footer_he` text,
  `footer_ru` text,
  `icons_en` text NOT NULL,
  `icons_he` text NOT NULL,
  `icons_ru` text NOT NULL,
  `points_en` text NOT NULL,
  `points_he` text NOT NULL,
  `points_ru` text NOT NULL,
  `maintext_en` text NOT NULL,
  `maintext_he` text NOT NULL,
  `maintext_ru` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `img_alt_en` text NOT NULL,
  `img_alt_he` text NOT NULL,
  `img_alt_ru` text NOT NULL,
  `prices_en` varchar(255) NOT NULL,
  `prices_he` text NOT NULL,
  `prices_ru` text NOT NULL,
  `sizes` varchar(255) NOT NULL,
  `howtopoints_en` text NOT NULL,
  `howtopoints_he` text NOT NULL,
  `howtopoints_ru` text NOT NULL,
  `howtotext_en` text NOT NULL,
  `howtotext_he` text NOT NULL,
  `howtotext_ru` text NOT NULL,
  `howtotips_en` text NOT NULL,
  `howtotips_he` text NOT NULL,
  `howtotips_ru` text NOT NULL,
  `faqpoints_en` text NOT NULL,
  `faqpoints_he` text NOT NULL,
  `faqpoints_ru` text NOT NULL,
  `msdspoints_en` text NOT NULL,
  `msdspoints_he` text NOT NULL,
  `msdspoints_ru` text NOT NULL,
  `msdstext_en` text NOT NULL,
  `msdstext_he` text NOT NULL,
  `msdstext_ru` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `priority`, `title_en`, `title_he`, `title_ru`, `subtitle_en`, `subtitle_he`, `subtitle_ru`, `footer_en`, `footer_he`, `footer_ru`, `icons_en`, `icons_he`, `icons_ru`, `points_en`, `points_he`, `points_ru`, `maintext_en`, `maintext_he`, `maintext_ru`, `image`, `img_alt_en`, `img_alt_he`, `img_alt_ru`, `prices_en`, `prices_he`, `prices_ru`, `sizes`, `howtopoints_en`, `howtopoints_he`, `howtopoints_ru`, `howtotext_en`, `howtotext_he`, `howtotext_ru`, `howtotips_en`, `howtotips_he`, `howtotips_ru`, `faqpoints_en`, `faqpoints_he`, `faqpoints_ru`, `msdspoints_en`, `msdspoints_he`, `msdspoints_ru`, `msdstext_en`, `msdstext_he`, `msdstext_ru`) VALUES
(1, 0, 'Forberz™ Ride Effect™', 'פורברז™ רייד אפקט™', 'Форберз™ Райд Эфект™', 'High quality detailing, restore and care compound for motor vehicles.', 'משחת שחזור, חידוש וטיפוח לפלסטיק וגומי לרכב ודו-גלגלי', 'Восстановитель пластика и резины', 'Restore Plastic and Rubber', 'שחזור פלסטיק וגומי', 'Восстановитель пластика и резины', '100% NATURAL ● NO SILICONE ● NO CHEMICALS ● NONTOXIC ● PAINTSHOP SAFE ● RECOMMENDED BY PROFESSIONALS', '100% טבעי ● ידידותי לסביבה ● אינו רעיל ● ללא סיליקון ● בטוח לשימוש בחדרי צבע ומוסכי פחחות', '0', 'Restores original material properties like elasticity and softness. @@ Treats sun damage and chemical stains like polish and silicone. @@ Revives the color and leaves a dry, smooth, liquid repellent surface. @@ No silicone, no animal fat, turpentine or chemicals. Body shop friendly. @@ Easy to apply with a cloth or paint brush, full control of the amount applied.', 'לטיפול בנזקי שמש ונזקי חומרים כימיים כגון כתמים לבנים וסימני ווקס ופוליש.\n @@ מראה אחיד ומקורי לאורך זמן והמשטח נשאר יבש ודוחה אבק, בוץ ונוזלים.\n @@ ללא סיליקונים, ללא שומן מן החי, טרפנטין או כימיקלים. בטוח לשימוש במוסכי פחחות.\n @@ יישום קל בעזרת מטלית או מברשת רכה ושליטה מושלמת בכמות החומר.', '0', 'For treating plastic and rubber. Clear, no-odor, based on honey extracts. Penetrates the surface and restores original material properties like elasticity and softness. Liquid repellent, revives the original color as possible and leaves the treated surface dry to the touch. Great for treating various sun and chemical damage like polish stains and spots on clear plastics. Restore all rubber and plastic trim parts such as bumpers, wheel arches, moldings, rubber seals, door handles, mirror housings, dashboard parts and windshield cowlings. Helps removing sticker glue marks from different surfaces. Removes easily from glass. Helps touching up small scratches and faded spots on clear coat and paint. Bring back that "like new" state, by refreshing both the exterior and interior of your car, suv, truck, bike, quad or any other ride. With Forberz™ Ride Effect™ you can really make your ride stand out and shine. Forberz™ Ride Effect™ - The perfect all-round solution for car and bike care and detailing. For indoor and outdoor use.', 'על בסיס תמציות דבש. ללא צבע, ללא ריח, רכיבים טבעיים בלבד.\nמחזיר את הצבע, הרכות והגמישות, נספג במשטח ואינו משאיר שומניות. \nלטיפול במשטחי פלסטיק וגומי שצבעם דהה, נפגעו מפוליש או ווקס,\nעברו טיפולים שהשאירו סימנים שונים או נפגעו מחומרי "טיפוח" שונים. \nמעולה לשחזור טמבונים, דשבורד, דיפונים פנימיים, פסי קישוט, בתי מראה, גומיות בשמשות, חלקים טכניים כגון צינורות מנוע שונים, פלסטיק שקוף ועוד. מסייע בטשטוש שריטות קלות ושפשופים במשטחים צבועים.\nמתאים לשימור רכב אספנות ולטיפוח רכב חדש, מעולה לקטנועים ואופנועים. מפותח ומיוצר בישראל ומתאים לאקלים החם ותנאי מזג האויר הקשים. מעולה להסרת סימני מדבקות ומשאיר משטח יבש לחלוטין שניתן להדביק עליו. מראה מושלם לחודש ימים בשימוש הראשון ועד 4 חודשים בטיפול קבוע.', '0', '/img/forberz_ride_effect_120_front.jpg', 'Forrberz Ride Effect - 120 gr - Restore plastic & Rubber trim on Cars&Bikes', '', '', '39,120', '150,380', '39,120', '120gr,500gr', 'Thoroughly clean and degrease the treated surface. We recommend using Forberz DetaiHD for a perfect clean. @@ Spread a small amount of the compound on the surface using a soft cloth. It is recommended to use a microfiber towel or an old 100% cotton shirt. @@ Allow absorbtion for about 30 minutes. @@ Wipe and dry the surface throughly using a clean soft cloth such as a microfiber towel or an old 100% cotton shirt.', 'נקו היטב את המשטח המטופל, הסירו שאריות לכלוך ושומנים שונים. מומלץ להשתמש בForberz DetailHD.\n @@ יישמו את המשחה בעזרת מטלית רכה, מומלץ להשתמש במטליות מיקרופייבר או חולצה ישנה מ100% כותנה.\n @@ תנו לחומר להספג במשטח המטופל במשך כחצי שעה.\n @@ ייבשו היטב את המשטח במטלית רכה ונקייה כגון מיקרופייבר או חולצה ישנה מ100% כותנה.', '0', 'Keep in cool area.', '0', '0', ' Use two rags, one for application and one for wiping down the leftovers. It is recommended to use a microfiber towel or an old 100% cotton shirt. @@ On uneven and hard to reach surfaces use a soft paint brush to spread the compound and wipe with a soft cloth like a microfiber towel or an old 100% cotton shirt. @@ Always clean the treated surface as thoroughly as possible before application to get the best results. Use Forberz DetailHD on most surfaces to eliminate any silica.', '0', '0', 'How long does the Forberz Ride Effect stay on the treated surface?\n\nAt first use - One treatment using Forberz Ride Effect will give you a visual appeal for about a month at the first use on regular conditions, on thicker plastics like mopeds, bumpers, commercial vehicle and suv trim the results usualy last for up to three months, depending on the treated material and the conditions and materials the surface is exposed to. On older surfaces like dashboards and trim of classic and antique cars and bikes, gently apply a generous ammount of compound and allow longer absorbtion times.\n<br>On repeated use - Longer visual appeal will be achieved on repeated use and after partial restoring of the treated surface as well as original material qualities like elasticity and softness.\n--\nDoes the Forberz Ride Effect spoils or expires?\n\nDue to the use of natural raw ingredients and the honey extracts the product is based on, the Forberz Ride Effect does not have an expiry date and will not evaporate or dry out if left open. With that in mind better keep the product away from direct sunlight, in a dark, dry and cool environment.\n--\nI left the container in the sun and the compound became liquid, is it spoiled?\n\nNo need to worry, if left for long at a hot environment or direct sunlight the compound might melt and become partialy liquid. Just place it in a dark, cool and dry environment and it will return to it\'s original state and may be used again.\n--\nWhat should I use as an applicator?\n\nYou can use a soft rag, sponge or a soft paint brush to apply Forberz Ride Effect on plastic and rubber. We recommend using a microfiber towel or an old 100% cotton shirt.\n--\nI applied Forberz Ride Effect on plastic/rubber and nothing happened!\n\nA few things to consider when the treatment does not go as planned:\nIs the plastic painted or covered by some material? You can know that easily by trying to scratch a small bit with your nail. Silicones mostly leave a silica shell on the plastic when exposed to direct sunlight, which results in a white-grey surface, clean the surface thoroughly before treatment.\nIf the surface isn\'t painted or covered by any materials The treated surface may have suffered extensive damage and became unrestorable, the use of Forberz Ride Effect may preserve the surface\'s elasticity and softness if possible.\nIf you are trying to restore chemical damage like white spots or polish traces Most times light pressures while rubbing in Forberz Ride Effect will do the trick if that won\'t do the trick try consulting a professional in your area about which materials can be used to clean the specific surface before the treatment without harming or damaging it. ', 'כמה זמן הפורברז רייד אפקט פועל ונראה על המשטח המטופל?\n\nבשימוש הראשון - מריחה אחת של פורברז רייד אפקט ביישום נכון על פי הוראות השימוש נשארת על המשטח המטופל כחודש ימים, בהתאם לסוג החומר המטופל. בעת שחזור פלסטיקה עבה יותר כדוגמת פלסטיקה של קטנועים, פסי קישוט וטמבון פלסטיק של רכב מסחרי וג\'יפים התוצאה בדרך כלל נשארת עד לכשלושה חודשים. במשטחים יבשים ובני עשרות שנים כגון דשבורד ודיפון של רכב אספנות, רצוי ליישם בעדינות כמות נדיבה של החומר ולאפשר זמן ספיגה של כמה שעות לפחות.\nבשימושים חוזרים - ניתן לראות תוצאות לאורך טווחים ארוכים יותר כתוצאה משחזור חלק מהתכונות המקוריות של המשטח המטופל כגון רכות וגמישות ו"רוויית" המשטח המטופל.\n​--\nהאם הפורברז רייד אפקט מתייבש/מתקלקל עם הזמן?\n\nעקב השימוש בחומרים טבעיים המתאימים ומיועדים לשימוש לאורך זמן, לפורברז רייד אפקט אין תאריך תפוגה ואין בעיה להשאיר את החומר פתוח, הוא איננו מתנדף ואיננו מתייבש, עם זאת מומלץ לאחסן את הפורברז רייד אפקט בקופסא סגורה במקום קריר, מוצל ויבש.\n--\nשכחתי את הפורברז רייד אפקט בשמש והמשחה נהייתה נוזלית, האם החומר מקולקל?\n\nבמידע והחומר נשכח בשמש או במקום חם לאורך זמן הוא יהפוך לנוזלי, אך אל דאגה, הניחו את הקופסא במקום קריר, מוצל ויבש לזמן מה והמשחה תחזור להיות סמיכה ותמשיך לשרת אתכם עד הניגוב האחרון בקופסא.\n--\nעם מה מיישמים/מורחים את הפורברז רייד אפקט?\n\nניתן להשתמש במטלית, ספוג או מברשת על מנת ליישם את הפורברז רייד אפקט, מומלץ להשתמש במטלית רכה כגון מיקרופייבר או חולצה ישנה מ100% כותנה.\n--\nמרחתם את הפורברז רייד אפקט על פלסטיק או גומי ולא קרה כלום?\n\nאם נתקלתם בפלסטיק או גומי שלא חוזר לצבעו המקורי יש לבחון מספר דברים:<br>\nהאם הפלסטיק צבוע או מצופה בחומר כלשהו? ניתן לבדוק זאת על ידי גירוד קל של המשטח אותו מנסים לשחזר בעזרת קצה הציפורן, אם תראו פס בצבע כהה יותר, ישנה שכבה כלשהי המפריעה לחומר לחדור לתוך הפלסטיק, יש לנקות את המשטח בהתאם לפני יישום פורברז רייד אפקט.\nאם המשטח אינו צבוע ואינו מצופה בחומר כלשהו ייתכן והמשטח ספג נזק קשה מדי שפגע באפשרות לשחזר את צבעו המקורי, השימוש בפורברז רייד אפקט ימשיך לשמור על הגמישות והרכות של החומר במידת האפשר ויעכב נזקים נוספים.\nאם הנכם מנסים לשחזר כתמים של חומרים כימיים שונים לרוב עם הזמן נוצרת תערובת של חומרים שונים על משטחי הפלסטיק השונים ברכב והאופנוע וישנו צורך בנקיון יסודי של המשטח או אף טיפול יסודי יותר על ידי אנשי מקצוע מיומנים שידעו איך לטפל בבעיה המסויימת מתוך נסיון.', '0', '', '0', '0', '0', '0', '0'),
(2, 2, 'Forberz™ DetailHD™', 'פורברז דיטייל אייצ\'. די.', '', 'Deep cleaning solution for various surfaces', 'נוזל לניקוי בד, עור ופלסטיק. ללא אלכוהול וללא אמוניה.', '', 'Deep Clean Leather, Fabric and Plastic', 'ניקוי עור, בד ופלססטיק', NULL, '100% NATURAL ● NO SILICONE ● NO CHEMICALS ● NONTOXIC ● PAINTSHOP SAFE ● RECOMMENDED BY PROFESSIONALS', '100% טבעי ● ידידותי לסביבה ● אינו רעיל ● ללא סיליקון ● בטוח לשימוש בחדרי צבע ומוסכי פחחות', '0', 'Clean stains, dirt, grease and more quickly and easily. @@ Will not harm the treated surface or surrounding areas. @@ Desinfects and aids removing mould and unpleasant odors. @@ Does not contain alcohol or strong acids.', 'מנקה ביעילות ובמהירות כתמים שונים, לכלוך, שומנים ועוד.\n @@ אינו פוגע במשטח המטופל או במשטחים הסובבים.\n @@ מחטא את המשטח המטופל ומסייע בהסרת עובש וריחות שונים.\n @@ אינו מכיל אלכוהול או חומצות חזקות.', '0', 'For leather, fabric, plastic and rubber. No alcohol, no amonia.\nA natural solution for easy thorough cleaning using a rag or brush. No need to spray on the treated surface. Great for cleaning leather and fabric seats in your car and your home and as well for other types of upholstry like car cealing and interior inserts. Recomended as a first step cleaning and degreasing before applying any restoration compounds and sealants. \nClean even the toughest spots and dirt gently and without any harm to the treated surface.\nHeavy duty detailing spray for deep cleaning without surface damage.\nGreat for fabric, leather, plastic and more.\nWill preserve leather and fabric and will remove heavy stains.\nCan be sprayed on a cloth for small touch-ups or used with a sponge or delicate brush for whole surface cleaningfor cleaning uneven surfaces and \nlike grained leather and stitches.\nSafe to use on all paint finishes.', 'לנקיון חסר פשרות והכנת משטחים לטיפול בחומרי שחזור. נוזל נקיון כללי מהיר ודיטיילינג (הכנה לתצוגה) לרכב ודו-גלגלי. על בסיס חומצת לימון. מחטא ומסיר שומנים ללא שימוש בחומצות מסוכנות. מעולה לנקיון חלקי רכב פנימיים כגון דיפוני הדלתות, דשבורד, שטיחים ועוד. מעולה לטיפול בכתמים של רטבים, קפה ודומיו. בריפוד עור יש ליישם פורברז רייד אפקט לאחר הנקיון לאיטום העור ושחזורו. פתרון מושלם וכולל לנקיון הרכב והכנת הרכב לתצוגה.', '0', '/img/Forberz_Detail_HD_Front.jpg', 'Forberz Detail HD - High quality detailing solution for fabric, leather & plastic.', 'פורברז דיטייל אייצ\'. די. - נקיון עמוק לבד, עור ופלסטיק.', '0', '27', '100', '27', '500ml', '<b>CLEANING FABRIC:</b> Spray some Forberz DetailHD on a white clean rug and rub the stained area gently. On hard stains and big areas use a soft brush, spray the solution on the brush and brush the treated surface gently. @@ <b>CLEANING LEATHER:</b> Spray some Forberz DetailHD on a soft brush and clean the leather while adding solution to the brush as needed. DO NOT scrub dry areas with a dry brush. Clean the area with a clean wet cloth while the surface is still wet. DO NOT let the solution dry with the dirt. After cleaning the leather you must moisturize and seal the leather from liquids and contaminations with a suitable compound like the Forberz Leather Treat to preserve the leather and it\'s original qualities like color, elasticity and softness. @@ <b>CLEANING PLASTIC:</b> Spray some Forberz DetailHD on a brush and clean the surface thoroughly, get inside all the lines and ridges and wipe with a wet cloth afterwards.', '<b>לנקיון בד:</b> התיזו מעט פורברז דיטייל אייצ\'. די. על מטלית לבנה נקייה ושפשפו בעדינות את הכתם עד לנקיון.<br> ניתן להעזר במברשת בכתמים קשים במיוחד ובשטחים גדולים, יש להתיז את חומר הנקיון על המברשת ולהבריש בעדינות את המשטח.  @@ <b>לנקיון עור:</b> התיזו מעט פורברז דיטייל אייצ\'. די. על מברשת רכה ונקו את העור בעזרת המברשת ונגבו במטלית נקייה לחה.<br> לאחר נקיון עור יש ליישם חומר איטום ושימור לעור כדוגמת פורברז רייד אפקט או פורברז לדר טריט,<br> על מנת לשמור על הגמישות והרכות של העור ולאטום את העור מפני לכלוך ונוזלים.  @@ <b>לנקיון פלסטיק:</b> התיזו מעט פורברז דיטייל אייצ\'. די. על מברשת רכה ונקו את הפלסטיק בעזרת המברשת ונגבו במטלית נקייה לחה.', '0', 'Shake well before use. Try on small hidden area first. Do not attempt to clean damaged and/or cracked surfaces.  Keep in a cool dark place.', '0', '0', '0', '0', '0', 'Does the Forberz DetailHD spoils or expires?\r\n\r\nDue to the use of natural raw ingredients and natural desinfectants the product is based on, the Forberz DetailHD does not have an expiry date. With that in mind better keep the product away from direct sunlight, in a dark, dry and cool environment and shake the bottle well before use.\r\n--\r\nWhat should I use as an applicator?\r\n\r\nYou can use a soft rag or a soft brush to apply Forberz DetailHD on leather, fabric, plastic and rubber.', 'עם מה מיישמים את הפורברז דיטייל אייצ\' די?\r\n\r\nלנקיון בד בעזרת פורברז דיטייל אייצ\' די יש להשתמש במטלית לבנה ונקייה על מנת לא להעביר צבע למשטח אותו מנסים לנקות, לדוגמא לנקות בד בהיר עם מטלית בצבע כהה יביא לדהיית הצבע הכהה לבד הבהיר.\r\nבמשטחים אטומים כגון עור ופלסטיק יש להשתמש במברשת רכה על מנת לנקות את כל החריצים והקמטים הקטנים ובלי לשחוק את המשטח אותו מנסים לנקות.\r\n-- \r\nהאם ניתן לקבל טיפול מקצועי ב"פורברז דיטייל אייצ\' די"?\r\n\r\nתוכלו לראות את רשימת המומחים שלנו ולתאם טיפול עם המקום הקרוב לביתכם. המומחים ברשימה שלנו נבחרו בקפידה והינם מהמובילים בתחומם.\r\nלצפייה ברשימת המומחים שלנו\r\n--\r\nהאם הפורברז דיטייל אייצ\' די מתקלקל עם הזמן?\r\n\r\nעקב השימוש בחומרים טבעיים המתאימים ומיועדים לשימוש לאורך זמן, לפורברז דיטייל אייצ\' די אין תאריך תפוגה עם זאת מומלץ לנער היטב את החומר לפני השימוש ואין להשאיר את החומר פתוח. יש לאחסן את החומר במקום קריר, מוצל ויבש.', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `protreat`
--

CREATE TABLE `protreat` (
  `id` int(11) NOT NULL,
  `priority` int(5) NOT NULL,
  `area_en` varchar(255) DEFAULT NULL,
  `area_he` varchar(255) DEFAULT NULL,
  `area_ru` varchar(255) DEFAULT NULL,
  `city_en` varchar(255) DEFAULT NULL,
  `city_he` varchar(255) DEFAULT NULL,
  `city_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_he` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `adress_en` varchar(255) DEFAULT NULL,
  `adress_he` varchar(255) DEFAULT NULL,
  `adress_ru` varchar(255) DEFAULT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `protreat`
--

INSERT INTO `protreat` (`id`, `priority`, `area_en`, `area_he`, `area_ru`, `city_en`, `city_he`, `city_ru`, `name_en`, `name_he`, `name_ru`, `adress_en`, `adress_he`, `adress_ru`, `phone`) VALUES
(1, 35, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv', 'תל אביב', 'Тель Авив', 'Bike Spa', 'בייק ספא', 'Bike Spa', 'Herzl 93', 'הרצל 93', 'Герцель 93', '03-5101443');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `priority` int(5) NOT NULL,
  `area_en` varchar(255) DEFAULT NULL,
  `area_he` varchar(255) DEFAULT NULL,
  `area_ru` varchar(255) DEFAULT NULL,
  `city_en` varchar(255) DEFAULT NULL,
  `city_he` varchar(255) DEFAULT NULL,
  `city_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_he` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `adress_en` varchar(255) DEFAULT NULL,
  `adress_he` varchar(255) DEFAULT NULL,
  `adress_ru` varchar(255) DEFAULT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `priority`, `area_en`, `area_he`, `area_ru`, `city_en`, `city_he`, `city_ru`, `name_en`, `name_he`, `name_ru`, `adress_en`, `adress_he`, `adress_ru`, `phone`) VALUES
(1, 51, 'Israel', 'חיפה והקריות', 'Израиль', 'Yoqneam', 'יקנעם', 'Йокнеам', 'Roni Gavriel Parts', 'רוני גבריאל חלפים', 'Roni Gavriel Parts', 'HaTaasiya7', 'התעשייה 7', 'ХаТаасия 7', '04-6588000'),
(2, 22, 'Israel', 'ירושלים', 'Израиль', 'Gush Azion', 'גוש עציון', 'Гуш Ацион', 'Yosef Yovel', 'יוסף יובל שיווק', 'Yossef Yovel', 'Kfar Azion', 'כפר עציון', 'Кфар Ацион', '054-6472044'),
(3, 23, 'Israel', 'ירושלים', 'Израиль', 'Jerusalem', 'ירושלים', 'Иерусалим', 'Honda', 'Honda', 'Honda', 'HaOman 10', 'האמן 10', 'ХаОман 10', '02-6789422'),
(4, 61, 'Israel', 'גליל תחתון', 'Израиль', 'Afula', 'עפולה', 'Афула', 'Motor Sport', 'מוטור ספורט', 'Motor Sport', 'Kehilat Zion 35', 'קהילת ציון 35', 'Кехилат Цион 35', '054-5760887'),
(5, 62, 'Israel', 'גליל תחתון', 'Израиль', 'Afula', 'עפולה', 'Афула', 'Maor Parts', 'מאור פרטס', 'Maor Parts', 'HaMelacha 8', 'המלאכה 8', 'ХаМелаха 8', '04-6403571'),
(6, 63, 'Israel', 'גליל תחתון', 'Израиль', 'Yafia', 'יפיע', 'Яфия', 'F.B. Automotive', 'F.B. Automotive', 'F.B. Automotive', 'Main Rd.', 'כביש ראשי', 'Главная дорога', '04-6308524'),
(7, 64, 'Israel', 'גליל תחתון', 'Израиль', 'Nazareth', 'נצרת', 'Назарет', 'Pimp My Car', 'Pimp My Car', 'Pimp My Car', 'HaMusachim Jn.', 'צומת המוסכים', 'Перекрёсток ХаМусахим', '050-5823137'),
(8, 65, 'Israel', 'גליל תחתון', 'Израиль', 'Nazareth Ilit', 'נצרת עילית', 'Назарет Эйлит', 'Melech HaRipudim', 'מלך הריפודים', 'Melech HaRipudim', 'Rosenfeld Center', 'מתחם רוזנפלד', 'Центр Розенфельд', '054-4206015'),
(9, 11, 'Israel', 'דרום', 'Израиль', 'Eilat', 'אילת', 'Эйлат', 'Auto Sound', 'אוטו סאונד', 'Auto Sound', 'HaMasger 11', 'המסגר 11', 'ХаМасгер 11', '08-6378142'),
(10, 12, 'Israel', 'דרום', 'Израиль', 'Be\'er Sheva', 'באר שבע', 'Бе\'ер Шева', 'Igal Car Accessories', 'יגאל אביזרי רכב', 'Igal Car Accessories', 'HaManof 21', 'המנוף 21', 'ХаМаноф 21', '054-2001554'),
(11, 15, 'Israel', 'דרום', 'Израиль', 'Be\'er Sheva', 'באר שבע', 'Бе\'ер Шева', 'Dodge-Chrysler', 'Dodge-Chrysler', 'Dodge-Chrysler', 'HaAmal 3', 'העמל 3', 'ХаАмаль 3', '08-6900950'),
(12, 14, 'Israel', 'דרום', 'Израиль', 'Be\'er Sheva', 'באר שבע', 'Бе\'ер Шева', 'HaMinhara', 'שטיפת המנהרה', 'HaMinhara', 'HaNegev Mall', 'קניון הנגב', 'Тц "ХаНегев"', '053-2800019'),
(13, 13, 'Israel', 'דרום', 'Израиль', 'Be\'er Sheva', 'באר שבע', 'Бе\'ер Шева', 'Dor Tikshoret', 'דור תקשורת', 'Dor Tikshoret', 'Pinhas HaHozev 25', 'פנחס החוצב 25', 'Пинхас ХаХоцев 25', '08-6284441'),
(14, 16, 'Israel', 'דרום', 'Израиль', 'Be\'er Sheva', 'באר שבע', 'Бе\'ер Шева', 'Car Wash', 'Car Wash', 'Car Wash', 'HaPlada 18', 'הפלדה 18', 'ХаПлада 18', '052-8208143'),
(15, 17, 'Israel', 'דרום', 'Израиль', 'Kiryat Gat', 'קרית גת', 'Кирят Гат', 'Ran-Ly', 'רן לי שיווק חלפים', 'Ran-Ly', 'Kislev 5', 'כסלו 5', 'Кислев 5', '08-6767330'),
(16, 53, 'Israel', 'חיפה והקריות', 'Израиль', 'Daliyat el Carmel', 'דאלית אל כרמל', 'Далият ЭльКармель', 'Yossef Car Accessories', 'יוסף אבזרי רכב', 'Yossef Car Accessories', 'Okef Rd.', 'עוקף דליה', 'Объездная Дорога', '04-8396485'),
(17, 55, 'Israel', 'חיפה והקריות', 'Израиль', 'Haifa', 'חיפה', 'Хайфа', 'HaKol La Katnoa ve la Ofnoa', 'הכל לקטנוע ולאופנוע', 'HaKol La Katnoa ve la Ofnoa', 'HaHistadrut 8', 'ההסתדרות 8', 'ХаХистадрут 8', '053-7217231'),
(18, 54, 'Israel', 'חיפה והקריות', 'Израиль', 'Haifa', 'חיפה', 'Хайфа', 'Suzuka', 'סוזוקה', 'Suzuka', 'Bar Yehuda Rd. 5', 'דרך בר יהודה 5', 'Бар Йехуда 5', '04-8724501'),
(19, 56, 'Israel', 'חיפה והקריות', 'Израиль', 'Kiryat Bialik', 'קריית ביאליק', 'Кирят Бялик', 'Apex', 'אפקס', 'Apex', 'Yosef Levy 12', 'יוסף לוי 12', 'Йосеф Леви 12', '04-8742722'),
(20, 52, 'Israel', 'חיפה והקריות', 'Израиль', 'Isfiya', 'עספיא', 'Усфия', 'Perfect Car', 'פרפקט קאר', 'Perfect Car', 'Main Rd.', 'כביש ראשי', 'Главная дорога', '052-5495726'),
(21, 21, 'Israel', 'ירושלים', 'Израиль', 'Beit Shemsh', 'בית שמש', 'Бейт Шемеш', 'Talia System', 'טליה סיסטמס', 'Talia System', 'HaHarash 9', 'החרש 9', 'ХаХараш 9', '054-5595932'),
(22, 0, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'תל אביב', NULL, NULL, 'הונדה', NULL, NULL, 'שבח 5', NULL, '03-6966991'),
(23, 0, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'תל אביב', NULL, NULL, 'אבנוע', NULL, NULL, 'שוקן 12', NULL, '03- 6822950'),
(24, 32, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv\n', 'תל אביב', 'Тель Авив', 'Fiat - Alfa Romeo', 'Fiat - Alfa Romeo', 'Fiat - Alfa Romeo', 'Shlomo Rd. 38', 'דרך שלמה 38', 'Шломо 38', '03-6814720'),
(25, 31, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv\n', 'תל אביב', 'Тель Авив', 'Daytona', 'דייטונה', 'Daytona', 'HaSadna 18', 'הסדנה 18', 'ХаСадна 18', '03-6816186'),
(26, 35, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv', 'תל אביב', 'Тель Авив', 'Bike Spa', 'בייק ספא', 'Bike Spa', 'Herzl 93', 'הרצל 93', 'Герцель 93', '03-5101443'),
(27, 36, 'Israel', 'מרכז', 'Израиль', 'Ramat Gan', 'רמת גן', 'Рамат Ган', 'Daytona', 'דייטונה', 'Daytona', 'Jabotinsky 95', 'ז\'בוטינסקי 95', 'Жаботински 95', '077-4373008'),
(28, 33, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv', 'תל אביב', 'Тель Авив', 'Ducati', 'Ducati', 'Ducati', 'HaMasger 58', 'המסגר 58', 'ХаМасгер 58', '03-5189991'),
(29, 34, 'Israel', 'מרכז', 'Израиль', 'Tel Aviv', 'תל אביב', 'Тель Авив', 'Mercedes', 'Mercedes', 'Mercedes', 'Azion Gever 5', 'עציון גבר 5', 'Ацион Гевер 5', '03-5183999'),
(30, 71, 'Israel', 'צפון', 'Израиль', 'Akko', 'עכו', 'Akko', 'Kia', 'Kia', 'Kia', 'HaAmal 4', 'העמל 4', 'ХаАмаль 4', '04-9916571'),
(31, 72, 'Israel', 'צפון', 'Израиль', 'Yarka', 'ירכא', 'Ярка', 'German Yarka', 'German Yarka', 'German Yarka', 'Main Rd.', 'כביש ראשי', 'Главная дорога', '04-8215758'),
(32, 73, 'Israel', 'צפון', 'Израиль', 'Yarka', 'ירכא', 'Ярка', 'Kastro Motors', 'קסטרו מוטורס', 'Kastro Motors', 'Main Rd.', 'כביש ראשי', 'Главная дорога', '04-6083733'),
(33, 74, 'Israel', 'צפון', 'Израиль', 'Nahaf', 'נחף', 'Нахаф', 'Ofnotrade', 'אופנוטרייד', 'Ofnotrade', '"Ofnotrade" on Waze', 'ליד מגרש הכדורגל', '"Ofnotrade" on Waze', '04-6585185'),
(34, 75, 'Israel', 'צפון', 'Израиль', 'Karmiel', 'כרמיאל', 'Кармиель', 'Noa Tanua', 'נוע תנוע', 'Noa Tanua', 'HaHaroshet 18', 'החרושת 18', 'ХаХарошет 18', '04-9586993'),
(35, 76, 'Israel', 'צפון', 'Израиль', 'Karmiel', 'כרמיאל', 'Кармиель', 'Sun Defender', 'סאנדיפנדר', 'Sun Defender', 'HaOreg 3', 'האורג 3', 'ХаОрег 3', '052-8078889'),
(36, 42, 'Israel', 'שרון', 'Израиль', 'Netanya', 'נתניה', 'Натанья', 'Shimi Bikes', 'שימי אופנועים', 'Shimi Bikes', 'Ort 9', 'אורט 9', 'Орт 9', '09-8848042'),
(37, 41, 'Israel', 'שרון', 'Израиль', 'Netanya', 'נתניה', 'Натанья', 'Hanizoz', 'הניצוץ אביזרי רכב', 'Hanizoz', 'HaMasger 5', 'המסגר 5', 'ХаМасгер 5', '09-8625827'),
(38, 45, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'חדרה', NULL, NULL, 'שטוף אותי', NULL, 'David Shimoni 34', 'דוד שמעוני 34', NULL, '04-6313323'),
(39, 78, 'Israel', 'צפון', 'Израиль', 'Nahariya', 'נהריה', 'Нахария', 'Hezi Or Kol', 'חזי אור קול', 'Hezi Or Kol', 'Lohmey HaGetaot 24', 'לוחמי הגטאות 24', 'Лохмей ХаГетаот 24', '04-9001237'),
(40, 79, 'Israel', 'צפון', 'Израиль', 'Shlomi', 'שלומי', 'Шломи', 'Kickstart', 'קיק סטארט', 'Kickstart', 'Old Industrial  Area, Line 3', 'אזה"ת הישן, שורה 3', 'Старая Пром. Зона, 3-й Ряд', '04-9514545'),
(41, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'אשדוד', NULL, NULL, 'אוטו הייטק סרביס', NULL, NULL, 'העבודה 9/1', NULL, '08-6528787'),
(42, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'ירושלים', NULL, NULL, 'סופר ווש', NULL, NULL, 'דרך בית לחם 140', NULL, '02-9972825'),
(43, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'חולון', NULL, NULL, 'הפודיום', NULL, NULL, 'הבנאי 19', NULL, '03-6483836'),
(44, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'חדרה', NULL, NULL, 'טיאנו מוטורס', NULL, NULL, 'יוסף מייזר 8', NULL, '052-6885886'),
(45, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'ראשון לציון', NULL, NULL, 'פרפקט אופנועים', NULL, NULL, 'שמוטקין11', NULL, '03-9589898'),
(46, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'ראשון לציון', NULL, NULL, 'שטיפת הפרסי', NULL, NULL, 'רוז\'נקי 7', NULL, '054-3375159'),
(47, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'טבריה', NULL, NULL, 'על גלגלים', NULL, NULL, 'רחוב העמקים', NULL, '04-6721036'),
(48, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'הוד השרון', NULL, NULL, 'אופנועי השרון', NULL, NULL, 'הרקון 10', NULL, '09-7402420'),
(49, 77, 'Israel', 'צפון', 'Израиль', 'Kfar Yassif', 'כפר יאסיף', 'Кфар Ясиф', 'Issa Bikes', 'עיסא אופנועים', 'Issa Bikes', 'Main Rd.', 'כביש ראשי', 'Главная дорога', '054-6625318'),
(50, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'תל אביב', NULL, NULL, 'שחר אופנועים', NULL, NULL, 'שוקן 15', NULL, '03-6827755'),
(51, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'תל אביב', NULL, NULL, 'ט.ד דכה (ב.מ.וו)', NULL, NULL, 'קיבוץ גלויות 4', NULL, '03-5181396'),
(52, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'נתניה', NULL, NULL, 'אודיבה ארט', NULL, NULL, 'שכטרמן 26', NULL, '050-6324547'),
(53, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'חיפה', 'Хайфа', NULL, 'מ.ס מרכז מצברים', NULL, NULL, 'יד לבנים 23', NULL, '054-9247071'),
(54, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'חיפה', NULL, NULL, 'אדרנלין אופנועים', NULL, NULL, 'חלוצי התעשייה 10', NULL, '04-8738815'),
(55, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'חיפה', NULL, NULL, 'ד"ר סייקל', NULL, NULL, 'ההסתדרות 206', NULL, '04-8401402'),
(56, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'נשר', NULL, NULL, 'מצברי בר יהודה', NULL, NULL, 'התעשייה 44', NULL, '04-6337799'),
(57, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'עספיע', NULL, NULL, 'מוסך מומחה ב.מ.וו', NULL, NULL, 'כביש ראשי', NULL, '04-8391541'),
(58, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'קריית אתא', NULL, NULL, 'מוסך ראשה', NULL, NULL, 'יוסף בצרי 2', NULL, '04-8455502'),
(59, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'קריית חיים', NULL, NULL, 'הכל-בו לצבעי ולפחח', NULL, NULL, 'השיש 49', NULL, '04-8403244'),
(60, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'עפולה', NULL, NULL, 'נאיל זועבי', NULL, NULL, 'צבי פנקס 37', NULL, '054-4223567'),
(61, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'שפרעם', NULL, NULL, 'Tuning car', NULL, NULL, 'אזור תעשייה', NULL, '052-6157675'),
(62, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'טבריה', NULL, NULL, 'מוטו פאן', NULL, NULL, 'המלאכה, מרכז הדר', NULL, '04-6723005'),
(63, 0, 'Israel', 'תת_לא פעיל', 'Израиль', NULL, 'רחובות', NULL, NULL, 'ג\'קיו תקשורת', NULL, NULL, 'גלגל 23', NULL, '08-9363775'),
(64, 0, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'נס ציונה', NULL, NULL, 'Back On Two', NULL, NULL, 'החרש 10', NULL, '08-9256256'),
(65, 0, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'פתח תקווה', NULL, NULL, 'הרחיצה שלי', NULL, NULL, 'הירקונים 27', NULL, '052-2540400'),
(66, 0, 'Israel', 'תת_לא_פעיל', 'Израиль', NULL, 'חיפה', NULL, NULL, 'Auto Car Wash', NULL, NULL, 'דרך בר יהודה 131', NULL, '04-6054894');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dict`
--
ALTER TABLE `dict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protreat`
--
ALTER TABLE `protreat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dict`
--
ALTER TABLE `dict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `protreat`
--
ALTER TABLE `protreat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
