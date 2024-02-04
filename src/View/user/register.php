<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../../../public/css/styles.css">
    <link rel="stylesheet" href="../../../public/css/user/register.css">
</head>
<body>
<div id="wrapper">
    <header>
        <div class="links">
            <span>
                <?php if (!$data || !$data['is_logged']): ?>
                    <a href="/">Home</a>
                |
                    <a href="/login">Login</a>
                <?php endif; ?>
            </span>
        </div>
        <div>
            <h1>Registration</h1>
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

    <form id="register-form">
        <div class="title">Registration</div>
        <hr/>
        <div id="errors"></div>
        <div id="message"></div>
        <table>
            <tr>
                <td>
                    <label for="first-name">First name</label>
                </td>
                <td>
                    <input name="first_name" id="first-name" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="last-name">Last name</label>
                </td>
                <td>
                    <input name="last_name" id="last-name" type="text">
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
                <td>
                    <label for="repeat-password">Repeat password</label>
                </td>
                <td>
                    <input name="repeat_password" id="repeat-password" type="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">E-mail</label>
                </td>
                <td>
                    <input name="email" id="email" type="text">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Register</button>
                </td>
            </tr>
        </table>

<!--        <div class="row">-->
<!--            <div class="column">-->
<!--                <label for="first-name">First name:</label>-->
<!--            </div>-->
<!--            <div class="column">-->
<!--                <input name="first_name" id="first-name" type="text">-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->
<!--            <div class="column">-->
<!--                <label for="last-name">Last name:</label>-->
<!--            </div>-->
<!--            <div class="column">-->
<!--                <input name="last_name" id="last-name" type="text">-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->
<!--            <div class="column">-->
<!--                <label for="email">Email:</label>-->
<!--            </div>-->
<!--            <div class="column">-->
<!--                <input name="email" id="email" type="text">-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->
<!--            <div class="column">-->
<!--                <label for="password">Password:</label>-->
<!--            </div>-->
<!--            <div class="column">-->
<!--                <input name="password" id="password" type="text">-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row">-->
<!--            <div class="column">-->
<!--                <label for="repeat-password">Repeat password:</label>-->
<!--            </div>-->
<!--            <div class="column">-->
<!--                <input name="repeat_password" id="repeat-password" type="text">-->
<!--            </div>-->
<!--        </div>-->

<!--        <button type="submit">Register</button>-->
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../../../public/js/user/register.js"></script>
</body>
</html>
