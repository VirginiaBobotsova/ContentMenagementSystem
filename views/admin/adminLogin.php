<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../content/styles/adminStyle.css">
    <link rel="stylesheet" href="../content/styles/formStyle.css">
    <title>Вход за администраторски панел</title>
</head>
<body>
    <div class="container">
        <div class="login-form-admin">
            <h4>Вход</h4>
            <div class="login-form-body">
                <form role="form" method="post" action="/account/login">
                    <div class="form-group">
                        <label for="username" class="label">Име</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="label">Парола</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="form-submit">Вход</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>