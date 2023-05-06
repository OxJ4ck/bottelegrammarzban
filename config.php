<?php
/*
pv  => @gholipour3
channel => @mirzapanel
*/
//-----------------------------database-------------------------------
$dbname = "databasename"; //  نام دیتابیس
$username = "username"; // نام کاربری دیتابیس
$password = 'password'; // رمز عبور دیتابیس
$connect = mysqli_connect("localhost", $username, $password, $dbname);
//-----------------------------info-------------------------------

defined('API_KEY') or define('API_KEY', 'توکن ربات');// توکن ربات خود را وارد کنید
defined('val') or define('val', 100);// حجم اکانت تست واحد مگابایت
defined('time') or define('time', 1); // زمان اکانت تست  واحد ساعت
$adminnumber =5522424631;// آیدی عددی ادمین
//-----------------------------text panel-------------------------------
$result = $connect->query("SHOW TABLES LIKE 'textbot'");
$table_exists = ($result->num_rows > 0);
$textdatabot = ($table_exists) ? mysqli_query($connect, "SELECT * FROM textbot") : ' ';
$data_text_bot = array();
foreach ($textdatabot as $row) {
    $data_text_bot[] = array(
        'id_text' => $row['id_text'],
        'text' => $row['text']
    );
}
$datatextbot = array(
    'text_usertest' => '',
    'text_info' => '',
    'text_support' => '',
    'text_help' => '',
    'text_start' => '',
    'text_bot_off' => '',
    'text_dec_info' => '',
    'text_dec_usertest' => '',
    'text_fq' => '',
    'text_account' => '',
    'text_sell' => '',
    'text_Add_Balance' => '',

);
foreach ($data_text_bot as $item) {
    if (isset($datatextbot[$item['id_text']])) {
        $datatextbot[$item['id_text']] = $item['text'];
    }
}
$keyboard = json_encode([
    'keyboard' => [
        [['text' => $datatextbot['text_sell']]],
        [['text' => $datatextbot['text_info']],['text' => $datatextbot['text_usertest']]],
        [['text' => $datatextbot['text_Add_Balance']],['text' => $datatextbot['text_account']]],
        [['text' => $datatextbot['text_support']],['text' => $datatextbot['text_help']]],
        [['text' => $datatextbot['text_fq']]],
    ],
    'resize_keyboard' => true
]);
$keyboardadmin = json_encode([
    'keyboard' => [
        [['text' => "📯 تنظیمات کانال"],['text' => "📊 بخش گزارشات"]],
        [['text' => "🏬  بخش فروشگاه "]],
        [['text' => "👨‍🔧 بخش ادمین"],['text' => "📝 تنظیم متن ربات"]],
        [['text' => "👤 خدمات کاربر"]],
        [['text' => "📚 بخش آموزش "],['text' => "🖥 پنل مرزبان"]],
        [['text' => "⚙️ تنظیمات"]],
        [['text' => "🏠 بازگشت به منوی اصلی"]]
    ],
    'resize_keyboard' => true
]);
$admin_section_panel =  json_encode([
    'keyboard' => [
        [['text' => "👨‍💻 اضافه کردن ادمین"],['text' => "❌ حذف ادمین"]],
        [['text' => "📜 مشاهده لیست  ادمین ها"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$reports =  json_encode([
    'keyboard' => [
        [['text' => "📊 آمار ربات"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$setting_panel =  json_encode([
    'keyboard' => [
        [['text' => "📡 وضعیت  ربات"],['text' => "♨️بخش قوانین"]],
        [['text' =>"📣 تنظیم کانال گزارش"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$valid_Number =  json_encode([
    'keyboard' => [
        [['text' => "📊 وضعیت تایید شماره کاربر"],['text' => "👈 تایید دستی شماره"]],
        [['text' => "☎️ وضعیت احراز هویت شماره تماس"]],
        [['text' => "👀 مشاهده شماره تلفن کاربر"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$step_payment = json_encode([
    'keyboard' => [
        [['text' => "💳 کارت به کارت"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$User_Services = json_encode([
    'keyboard' => [
        [['text' => "📱 احراز هویت شماره "],['text' => "📨 ارسال پیام به کاربر"]],
        [['text' => "🔒 مسدود کردن کاربر"],['text' => "🔓 رفع  مسدودی کاربر"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$keyboardhelpadmin = json_encode([
    'keyboard' => [
        [['text' => "📚 اضافه کردن آموزش"],['text' => "❌ حذف آموزش "]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$shopkeyboard = json_encode([
    'keyboard' => [
        [['text' => "🛍 اضافه کردن محصول "]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$confrimrolls = json_encode([
    'keyboard' => [
        [['text' => "✅ قوانین را می پذیرم"]],
    ],
    'resize_keyboard' => true
]);
$request_contact = json_encode([
    'keyboard' => [
        [['text' => "☎️ ارسال شماره تلفن",'request_contact' => true]]
    ],
    'resize_keyboard' => true
]);
$rollkey = json_encode([
    'keyboard' => [
        [['text' => "💡 روشن / خاموش کردن تایید قوانین"],['text' => "⚖️ متن قانون"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$sendmessageuser = json_encode([
    'keyboard' => [
        [['text' => "✉️ ارسال همگانی"],['text' => "📤 فوروارد همگانی"]],
        [['text' => "✍️ ارسال پیام برای یک کاربر"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$Feature_status = json_encode([
    'keyboard' => [
        [['text' => "قابلیت مشاهده اطلاعات اکانت"]],
        [['text' => "قابلیت اکانت تست"],['text' => "قابلیت آموزش"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$keyboardmarzban =  json_encode([
    'keyboard' => [
        [['text' => "➕ محدودیت ساخت اکانت تست برای کاربر"]],
        [['text' => "➕ محدودیت ساخت اکانت تست برای همه"]],
        [['text' => '🔌 وضعیت پنل '],['text' => "🖥 اضافه کردن پنل  مرزبان "]],
        [['text' => "❌ حذف پنل"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$channelkeyboard = json_encode([
    'keyboard' => [
        [['text' => "📣 تنظیم کانال جوین اجباری"]],
        [['text' => "🔑 روشن / خاموش کردن قفل کانال"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$backuser = json_encode([
    'keyboard' => [
        [['text' => "🏠 بازگشت به منوی اصلی"]]
    ],
    'resize_keyboard' => true
]);
$backadmin = json_encode([
    'keyboard' => [
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
$result = $connect->query("SHOW TABLES LIKE 'marzban_panel'");
$table_exists = ($result->num_rows > 0);
$namepanel = [];
if ($table_exists) {
    $marzbnget = mysqli_query($connect, "SELECT * FROM marzban_panel");
    while ($row = mysqli_fetch_assoc($marzbnget)) {
        $namepanel[] = [$row['name_panel']];
    }
    $list_marzban_panel = [
        'keyboard' => [],
        'resize_keyboard' => true,
    ];
    $list_marzban_panel['keyboard'][] = [
        ['text' => "🏠 بازگشت به منوی مدیریت"],
    ];
    foreach ($namepanel as $button) {
        $list_marzban_panel['keyboard'][] = [
            ['text' => $button[0]]
        ];
    }
    $json_list_marzban_panel = json_encode($list_marzban_panel);
    $result = $connect->query("SHOW TABLES LIKE 'help'");
    $table_exists = ($result->num_rows > 0);

    if ($table_exists) {
        $help = [];
        $helpname = mysqli_query($connect, "SELECT * FROM help");
        while ($row = mysqli_fetch_assoc($helpname)) {
            $help[] = [$row['name_os']];
        }
        $help_arr = [
            'keyboard' => [],
            'resize_keyboard' => true,
        ];
        $help_arr['keyboard'][] = [
            ['text' => "🏠 بازگشت به منوی اصلی"],
        ];
        foreach ($help as $button) {
            $help_arr['keyboard'][] = [
                ['text' => $button[0]]
            ];
        }
        $json_list_help = json_encode($help_arr);
    }
}
$list_marzban_panel_users = [
    'keyboard' => [],
    'resize_keyboard' => true,
];
$list_marzban_panel_users['keyboard'][] = [
    ['text' => "🏠 بازگشت به منوی اصلی"],
];
foreach($namepanel as $button) {
    $list_marzban_panel_users['keyboard'][] = [
        ['text' => $button[0]]
    ];
}
$list_marzban_panel_user = json_encode($list_marzban_panel_users);
$textbot = json_encode([
    'keyboard' => [
        [['text' => "تنظیم متن شروع"],['text' => "دکمه اطلاعات سرویس"]],
        [['text' => "دکمه اکانت تست"],['text' => "دکمه سوالات متداول"]],
        [['text' => "متن دکمه 📚  آموزش"],['text' => "متن دکمه ☎️ پشتیبانی "]],
        [['text' => "متن دکمه حساب کاربری"],['text' => "دکمه افزایش موجودی"]],
        [['text' => "📝 تنظیم متن توضیحات اطلاعات سرویس "]],
        [['text' => "📝 تنظیم متن توضیحات  سوالات متداول"]],
        [['text' => "📝 تنظیم متن توضیحات پشتیبانی"]],
        [['text' => "🏠 بازگشت به منوی مدیریت"]]
    ],
    'resize_keyboard' => true
]);
//--------------------------------------------------
$result = $connect->query("SHOW TABLES LIKE 'product'");
$table_exists = ($result->num_rows > 0);
if ($table_exists) {
    $product = [];
    $getdataproduct = mysqli_query($connect, "SELECT * FROM product");
    while ($row = mysqli_fetch_assoc($getdataproduct)) {
        $product[] = [$row['name_product']];
    }
    $list_product = [
        'keyboard' => [],
        'resize_keyboard' => true,
    ];
    $list_product['keyboard'][] = [
        ['text' => "🏠 بازگشت به منوی اصلی"],
    ];
    foreach ($product as $button) {
        $list_product['keyboard'][] = [
            ['text' => $button[0]]
        ];
    }
    $json_list_product_list= json_encode($list_product);
}
$payment = json_encode([
    'keyboard' => [
        [['text' => "💰 پرداخت و دریافت سرویس"]],
        [['text' => "🏠 بازگشت به منوی اصلی"]]
    ],
    'resize_keyboard' => true
]);
$Confirm_pay = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "✅ تایید پرداخت", 'callback_data' => 'Confirm_pay'],
            ['text' => '❌ رد پرداخت', 'callback_data' => 'reject_pay'],
        ]
    ]
]);
