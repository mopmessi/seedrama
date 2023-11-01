<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // تمكين متابعة التوجيهات
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // تمكين استرجاع محتوى الصفحة

    $output = curl_exec($ch);

    if ($output !== false) {
        $finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        echo "الصفحة تم توجيهها إلى: $finalUrl<br>";

        // عرض محتوى الصفحة
        echo "محتوى الصفحة:<br>";
        echo $output;
    } else {
        echo "فشل في الوصول إلى الصفحة.";
    }

    curl_close($ch);
} else {
    echo "يرجى توفير عنوان URL.";
}
?>
