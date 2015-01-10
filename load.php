<?
Header('Content-Type: text/html; charset=utf-8');
# путь куда сохранять файл
$path = __DIR__ . "/upload/" . time() . $_FILES['upload_file']['name'];
# echo $path . "<br>";
	if (isset($_POST['upload'])) {
		# print_r($_FILES['upload_file']);
		# проверка на ошибки
		if ($_FILES['upload_file']['error'] == 0) {
			# проверка на формат файла
			if ($_FILES['upload_file']['type'] == "image/jpeg" || $_FILES['upload_file']['type'] == "image/png") {
				# добавление файла
				if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $path))
     				echo "Изображение было довавленно в " . $path;
     			else echo "Ошибка";
			} else {
				echo "Файл должен иметь расширение jpeg";
			}
		} else {
			echo "Файл не удолось загрузить";
		}
	}
?>

<form method="post" enctype="multipart/form-data">
	<input type="file" name="upload_file">
	<input type="submit" name="upload" value="Upload">
</form>