<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Import | Land Registry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<form action="index.php?import" method="post">

<div class="container">

<br>

<h1>Import CSV file from Land Registry</h1>

<br>

<input type="text" class="form-control" name="csv_file" placeholder="...csv file name" required>

<br><br>

Is this a <label>UK <input type="radio" name="list_type" value="uk" checked></label> or <label>offshore <input type="radio" name="list_type" value="offshore"></label> ?

<br><br>

<label>Empty the database (and recreate the table) first? <input type="checkbox" name="delete"></label>

<br><br><br>

<button type="submit" class="form-control btn btn-primary">import CSV</button>



</div>
</form>
</body>
</html>
