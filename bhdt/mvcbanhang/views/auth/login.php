<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <style>
        :root {
            --primary-color: #1e88e5;
            --hover-color: #1565c0;
            --text-color: #333;
            --border-color: #ccc;
            --bg-color: #f5f5f5;
            --input-bg: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: url('./images/login.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            width: 400px;
            background: var(--input-bg);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 25px;
        }

        form .field {
            position: relative;
            margin-bottom: 25px;
        }

        .field input {
            width: 100%;
            padding: 12px 10px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            background: var(--input-bg);
            font-size: 15px;
            color: var(--text-color);
            transition: border-color 0.3s ease;
        }

        .field input:focus {
            border-color: var(--primary-color);
        }

        .field label {
            position: absolute;
            top: -18px;
            left: 10px;
            font-size: 14px;
            color: var(--text-color);
            background: var(--input-bg);
            padding: 0 5px;
        }

        .field input[type="submit"] {
            background: var(--primary-color);
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .field input[type="submit"]:hover {
            background: var(--hover-color);
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        p a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="title">Đăng nhập tài khoản</div>
        <form action="./auth.php?controller=auth&action=login" method="POST">
            <div class="field">
                <input type="text" name="username" required>
                <label>Tài khoản</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Mật khẩu</label>
            </div>
            <div class="field">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
        <p>Chưa có tài khoản? <a href="./auth.php?controller=auth&action=registerForm">Đăng ký</a></p>
    </div>
</body>
</html>
