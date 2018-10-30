<?php
if(@$_POST["hidden"])
{
	$dt=date("d F Y, H:i:s"); // дата и время
	$mail="tomskzaim@gmail.com"; // e-mail куда уйдет письмо
	$title="Заявка с сайта " .$dt. " (МСК)"; // заголовок(тема) письма
	$fnm=$_POST["name"];
	$fnm=htmlspecialchars($fnm); // обрабатываем

	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$number=$_POST["number"];

	$mess="<b>Имя:</b> " .$fnm. "<br>";
	$mess.="<b>Телефон:</b> " .$phone. "<br>";
	$mess.="<b>Дата и Время:</b> " .$dt. " (МСК)<br>";
	$mess.="<b>Сумма займа:</b> " .$number. "<br>";
	if(@$_POST["select"] == 1) { $mess.="<b>Займ под залог</b> автомобиля";}
	if(@$_POST["select"] == 2) { $mess.="<b>Займ под залог</b> ПТС";}
	if(@$_POST["select"] == 3) { $mess.="<b>Займ под залог</b> недвижимости";}

	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=utf-8\r\n"; //кодировка
	$headers.="From: info@vashinvestor.rf\r\n"; // откуда письмо (необязательнакя строка)
	mail($mail, $title, $mess, $headers); // отправляем

	// выводим уведомление и перезагружаем страничку
	print"
	<!DOCTYPE html>
		<html lang=\"ru\">
			<head>
				<meta charset=\"UTF-8\">
				<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
				<title>Ваш инвестор</title>
				<link rel=\"shortcut icon\" href=\"img/logo.png\" type=\"image/x-icon\">
			</head>
			<body>
				<script language=\"Javascript\" type=\"text/javascript\">
				alert (\"Ваше сообщение отправлено! Наш менеджер свяжется с Вами в ближайшее время!\");
				function reload(){
					location = \"./index.html\"
				};
				setTimeout(\"reload()\", 0);
				</script>
			</body>
		</html>
	";
}
?>