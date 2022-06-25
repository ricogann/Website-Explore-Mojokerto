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
                <h2 class="heading-login">Login</h2>
                <form action="../em_frontend/loginProses.php" method="POST">
                <div class="container-input-login">
                    <label for="email" class="label-input-login">Masukan Email</label> <br>
                    <input type="text" name="email" id="email" class="input-login">
                </div>
                <div class="container-input-login">
                    <label for="password" class="label-input-login">Masukan Password</label> <br>
                    <div class="container-password">
                        <input type="password" name="password" id="password" class="input-login input-password">
                        <button class="eye-icon"><img src="./assets/eye-icon.png" alt="show password"></button>
                    </div>
                </div>
                <a href="./lupapass.php" class="link-login">Lupa Password?</a> <br>
                <button href="#" class="btn-login">Login</button>
                </form>
                <img src="./assets/bo-login.png" alt="bangondeicon" class="icon-bo">
            </div>
        </div>
    </div>
</body>

<script>
    var i = 0
    document.querySelector(".eye-icon").addEventListener("click",(e) => {
        if (i % 2 != 0) {
            
            document.querySelector(".input-password").setAttribute("type","text")
            i++
        } else {
            document.querySelector(".input-password").setAttribute("type","password")
            i++
        }
        console.log(i);

    })
</script>
</html>