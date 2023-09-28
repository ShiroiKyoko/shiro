<!DOCTYPE html>
<html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>XSS Test</title>
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .content {
            text-align: center;
        }

        h1 {
            color: #ffffffff; /* Neon hijau */
        }

        input[type="text"] {
            background-color: #222;
            color: #fff;
            border: 1px solid #ffffffff; /* Neon hijau */
            padding: 5px;
            margin: 5px;
        }

        input[type="submit"] {
            background-color: #ffffffff; /* Neon hijau */
            color: #111;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #fff;
            color: #9D9D9D; /* Neon hijau */
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>XSS Test</h1>
        <h3>no need to breach anything here, nothing important. Nyeh...</h3>
        <form action="">
            <input type="text" name="payload" value="<?php echo $_GET['payload']; ?>">
            <input type="submit" value="Submit">
        </form>

        <?php
        if (isset($_GET['payload'])) {
            echo $_GET['payload'];
        }
        ?>
    </div>
</body>

</html>
