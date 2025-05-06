<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['theme'])) {$theme = $_POST['theme'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}

/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Eror: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

header ("Location: ./thanks.html");

/*собираем сообщение*/
$message .= "<b>Ім'я:</b> ".$name."%0A";
$message .= "<b>Телефон:</b>".$phone."%0A";
$message .= "<b>Тема:</b>".$theme."%0A";

/*токен который выдаётся при регистрации бота */
$to = ""; 
/*делаем запрос и отправляем сообщение*/
parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");
  }
?>