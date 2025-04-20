<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            z-index: 1000;
        }

        main {
            flex-grow: 1;
            padding: 20px;
            background-color: #f4f4f4;
            margin-top: 80px;
        }


        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <?php include('header.php'); ?>
        </header>

        <main>
        <?php include('main.php'); ?>
        </main>

        <footer>
            <?php include('footer.php'); ?> 
        </footer>
    </div>
</body>
</html>
