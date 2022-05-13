<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/InstaWeb/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/normalize.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
    <title>Document</title>
  </head>
  <body>


    <?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>
    

    <?php require_once "./mvc/views/block/footer.php"; ?>
    
     <script src="public/js/formcontrol.js"></script>
    <script src="public/js/cookies.js"></script>
    <script src="public/js/dragdrop.js"></script>
  </body>
</html>