<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>
<body >

	<form enctype="multipart/form-data" action="upload.php" method="POST">
    <div class="form-group">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    <input name="subir_archivo" type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/jpeg,application/pdf"><input type="submit" value="Enviar Archivo" />
  </div>



</form>

</form>

</body>
</html>