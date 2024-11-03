
<?php
// إعداد البيانات المطلوبة
$environment = 2; // 1 لـ Live، 2 لـ Test
$username = 'user_name'; // الحصول على الاسم من الإعدادات
$password = 'pass'; // الحصول على كلمة المرور من الإعدادات
$sender = "sender"; // Sender ID للتجربة
$mobile = "xx"; // الرقم المراد إرسال OTP له
$template = 'template'; // معرف التيمبلت المخصص الجديد
$otp = rand(100000, 999999); // إنشاء OTP عشوائي مكون من 6 أرقام

// إعداد الـ URL وبيانات POST
$url = "https://smsmisr.com/api/OTP/";
$data = [
    'environment' => $environment,
    'username' => $username,
    'password' => $password,
    'sender' => $sender,
    'mobile' => $mobile,
    'template' => $template,
    'otp' => $otp
];
$fullUrl = $url . '?' . http_build_query($data);
echo "Full URL: " . $fullUrl . "\n";
// إرسال الطلب باستخدام cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// طباعة الاستجابة
echo $response;
?>
