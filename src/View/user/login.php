<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../../public/css/styles.css">
    <link rel="stylesheet" href="../../../public/css/user/login.css">
</head>
<body>
<div id="wrapper">
    <header>
        <div class="links">
            <span>
                <?php if (!$data || !$data['is_logged']): ?>
                    <a href="/">Home</a>
                |
                    <a href="/register">Register</a>
                <?php endif; ?>
            </span>
        </div>
        <div>
            <h1>Login</h1>
        </div>
        <div class="greetings">
            <span>
                <?php if ($data && $data['user_name']): ?>
                    <?php echo "Hello, ".$data['user_name']; ?>
                <?php elseif (!$data || !$data['user_name']): ?>
                    <?php echo "Hello, Guest"; ?>
                <?php endif; ?>

                <?php if ($data && $data['is_logged']): ?>
                    |
                    <a href="/logout">Logout</a>
                <?php endif; ?>
            </span>
        </div>
    </header>

    <form id="login-form">
        <div class="title">Login</div>
        <hr/>
        <div id="errors"></div>
        <table>
            <tr>
                <td>
                    <label for="email">E-mail</label>
                </td>
                <td>
                    <input name="email" id="email" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input name="password" id="password" type="password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../../../public/js/user/login.js"></script>
</body>
</html>
