<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../../../public/css/styles.css">
    <link rel="stylesheet" href="../../../public/css/user/index.css">
</head>
<body>
<div id="wrapper">
    <header>
        <div class="links">
            <span>
                <?php if (!$data || !$data['is_logged']): ?>
                    <a href="/login">Login</a>
                |
                    <a href="/register">Register</a>
                <?php endif; ?>
            </span>
        </div>
        <div>
            <h1>Home</h1>
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
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../../../public/js/user/index.js"></script>
</body>
</html>
