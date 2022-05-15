<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="http://localhost/InstaWeb/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="public/css/normalize.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
  </head>
  <body>
      <main>
        <?php require_once "./mvc/views/block/menu.php"; ?>
        <?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>
      </main>
  <?php require_once "./mvc/views/block/footer.php"; ?>
  <!-- <script src="public/js/sidebar.js"></script> -->
  <script>
      function ViewInfor(idacc) {
        window.location = "./Admin/ShowInfo/" + idacc;
      }
      
  </script>
  <script>
    // Get the modal
    var modal = document.getElementById("id01");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>
  </body>
</html>