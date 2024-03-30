<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan Kartu</title>

    <!-- bawaan koper -->
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- js koper -->
    <!-- membaca kartu RFID -->
    <script text="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekkartu").load('bacakartu.php')
            }, 1000);
        });
    </script>
</head>

<body>
    <?php include "menu.php" ?>

    <!-- isi -->
    <div class="container-fluid" style="padding-top: 3rem;">
        <div id="cekkartu"></div>
    </div>

    <?php include "footer.php" ?>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>