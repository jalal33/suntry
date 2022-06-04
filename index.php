<?php

ob_start();

$API_KEY = '5433671717:AAH5hgLEaWLS44uiDZKb7e9oR8j4BNzBeQM';
##------------------------------## 
define('TOKEN', $API_KEY);
function dosomething($method, $datas = [])
{
    if (function_exists('curl_init')) {
        $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            var_dump(curl_error($ch));
        } else {
            return json_decode($res);
        } # END OF ISSET CURL 
    } else {
        $iBadlz = http_build_query($datas);
        $url    = "https://api.telegram.org/bot" . TOKEN . "/" . $method . "?$iBadlz";
        $iBadlz = file_get_contents($url);
        return json_decode($iBadlz);
    } # END OF !CURL EXISTS 
}


$output = json_decode(file_get_contents('php://input'), TRUE);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$textmsg = $message->text;
$data = $update->callback_query->data;
$first_name = $message->from->first_name;
$username = $message->from->username;
$from_id = $message->from->id;
$docu = $message->document;
$docuname = $docu->file_name;
$admin="412056113";
$idbot = substr($API_KEY, 0, strpos($API_KEY, ':'));

if ($textmsg == '/start') {
    dosomething('sendMessage', [
        'chat_id' => $chat_id,
        'parse_mode' => "MarkDown",
        'disable_web_page_preview'=>'true',
        'text' => "أهلاً بكم في بوت  الاستفسار والدعم الخاص بمنصة [SunMedia](https://www.sunvideomediavip.com/welcome?s=Jte0Vg&lang=ar) 
            sunMedia هو موقع خاص بالربح من الانترنت عن طريق اكمال مهام بسيطة بوقت قصير 
            -
            -
        -للاستفسار تواصلو معي  : [من هنا](https://t.me/jalall_kh)
        -للتسجيل في الموقع : [انقر هنا](https://www.sunvideomediavip.com/welcome?s=Jte0Vg&lang=ar)
        ",
    ]);
dosomething('sendMessage', [
        'chat_id' => $admin,
        'parse_mode' => "MarkDown",
        'disable_web_page_preview'=>'true',
        'text' => "$username : $first_name : $last_name : $chat_id  ",
    ]);


    
}


    if ($textmsg == '/join') {
        $url = "https://sunmediavip.000webhostapp.com/1.jpg";

        dosomething('sendPhoto', [
            'chat_id' => $chat_id,
            'parse_mode' => "MarkDown",
            'disable_web_page_preview'=>'true',
            'photo' => $url,
            'caption' => " كـيـفـيـة الانضمام : 
            تسجيل اشتراك في المنصة يتطلب منك وجود ايميل جيمل او هوتميل او ياهو 
            -الدخول الى الموقع بواسطة الزر الذي في الاسفل
            -ادخال المعلومات المطلوبة وإبقاء رمز الدعوة الموجود وإلا لن يتم قبول البيانات
            -اضغط على تسجيل
            -أدخل رمز التحقق ثم موافق
            
            -
            -
         -في حال وجود أي مشكلة تواصلو معي : [من هنا](https://t.me/jalall_kh)
         -للتسجيل في الموقع : [انقر هنا](https://www.sunvideomediavip.com/welcome?s=Jte0Vg&lang=ar)
         -للانضمام إلى غروب الدعم الخاصة بالفريق : [انقر هنا](https://t.me/+iMgI6bKC4_EyZDBk)
            ",
        ]);
    }
    if ($textmsg == '/how_use') {
        dosomething('sendMessage', [
            'chat_id' => $chat_id,
            'parse_mode' => "MarkDown",
            'disable_web_page_preview'=>'true',
            'text' => "كـيـفـيـة الاسـتخدام : 
        -بعد تسجيل الدخول إلى الموقع اضغط على جملة :
           Receive with one click
          أو   بنقرة واحدة الاستلام
        -ثم اتبع الخطوات التالية:
         * انقر على زر 'ينهي' أو 'finish'
         *قم بالضغط على زر الرجوع للخروج من التطبيق الذي تم فتحه  
         * انقر ثانية على ذات الزر 
         * تفتح نافذة صغيرة تسألك إذا أتمممت المهمة انقرعلى زر 'مكتمل' أو 'completed'
         -
        -
         -في حال وجود أي مشكلة تواصلو معي : [من هنا](https://t.me/jalall_kh)
         -للتسجيل في الموقع : [انقر هنا](https://www.sunvideomediavip.com/welcome?s=Jte0Vg&lang=ar)
         -للانضمام إلى غروب الدعم الخاصة بالفريق : [انقر هنا](https://t.me/+iMgI6bKC4_EyZDBk)
        ",
        ]);


          }


    if ($textmsg == '/how_earn') {
        dosomething('sendMessage', [
            'chat_id' => $chat_id,
            'parse_mode' => "MarkDown",
            'disable_web_page_preview'=>'true',
            'text' => "كـيـفـيـة الحصول على الربح :
        -عليك إنشاء محفظة الكترونية عللى أٍي منصة ولتكن trust wallet وإضافة عملة  {USDT} عليها
        - كلفة سحب الرصيد هي 2$ لذلك من الأفضل التأكد أن المبلغ مناسب قبل تأكيد التحويل
        -يتم تحويل الرصيد إلى محفظتك الالكترونية ثم يمكنك سحبه منها وتصريفه عند أي طرف
        -إذا لم تجد شخص يستطيع تحويل هذه العملة لأجلك تواصل معنا 
        -
        -
        في حال وجود أي مشكلة تواصلو معي : [من هنا](https://t.me/jalall_kh)
        للتسجيل في الموقع : [انقر هنا](https://www.sunvideomediavip.com/welcome?s=Jte0Vg&lang=ar)
        للانضمام إلى غروب الدعم الخاصة بالفريق : [انقر هنا](https://t.me/+iMgI6bKC4_EyZDBk)
        ",
        ]);



          }
    if ($textmsg == '/how_get') {
        dosomething('sendMessage', [
            'chat_id' => $chat_id,
            'parse_mode' => "MarkDown",
            'disable_web_page_preview'=>'true',
            'text' => "كـيـفـيـة الحصول على هدية التسجيل  :
              *بعد إتمام التسجيل وإتمام أول أربع مهام قم بالانضمام الى المجموعة الرسمية 
                ثم أرسل اسم المستخدم+3
                على سبيل المثال اذا كان اسم المستخدم usern 
                عندها نكتب usern+3
                ثم نرسلها 
              *ستحصل على الرصيد الإضافي عندما يرى الأدمن رسالتك
              -
              -
              العودة للبداية : /start
             للانضمام إلى المجموعة الرسمية : [انقر هنا](https://t.me/SUNAMY888)
             للانضمام إلى غروب الدعم الخاصة بالفريق : [انقر هنا](https://t.me/+iMgI6bKC4_EyZDBk)

        ", ]);

          }
  ECHO "GO PLAY AWAY ";
