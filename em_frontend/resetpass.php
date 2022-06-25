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
            <h2 class="heading-login">Reset Password</h2>
            <form action="./resetpassProses.php" method="POST">
            <div class="container-input-login">
                <label for="pass1" class="label-input-login">Password Baru</label> <br>
                <input type="text" name="pass1" id="pass1" class="input-login">
            </div>
            <div class="container-input-login">
                <label for="pass2" class="label-input-login">Konfirmasi Password</label> <br>
                <div class="container-password">
                    <input type="password" name="pass2" id="pass2" class="input-login input-password">
                    <button class="eye-icon"><img src="./assets/eye-icon.png" alt="show password"></button>
                </div>
            </div>
            <button href="#" class="btn-login">Konfirmasi</button>
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