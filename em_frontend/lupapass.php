<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore mojokerto | Maari kita eksplor...</title>
    <link rel="stylesheet" href="op.css">
</head>

<body>
    <div class="container">
        <div class="content-login">
            <h2 class="heading-login">Lupa Password</h2>
            <form action="./lupapassProses.php" method="POST">
            <div class="container-input-login">
                <label for="email" class="label-input-login">Masukan Email</label> <br>
                <input type="text" name="email" id="email" class="input-login">
            </div>
            <button href="#" class="btn-login">Kirim Kode</button>
            </form>
            <img src="./assets/bo-lupapass.png" alt="bangondeicon" class="icon-bo">
        </div>
    </div>
    </div>
</body>

<script>
    var i = 0
    document.querySelector(".eye-icon").addEventListener("click", (e) => {
        if (i % 2 != 0) {

            document.querySelector(".input-password").setAttribute("type", "text")
            i++
        } else {
            document.querySelector(".input-password").setAttribute("type", "password")
            i++
        }
        console.log(i);

    })
</script>

</html>