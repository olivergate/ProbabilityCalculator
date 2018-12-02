<?php
require_once 'vendor/autoload.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="src/public/css/style.css"/>
    <title>Probability Calculator</title>
</head>
<body>
    <main>
        <div class="left_column">
            <div class="inputs">
                <form action="src/public/crunch.php" method="post">
                    <input type="number" name="input1" step="any" required placeholder="Probability 1"/>
                    <input type="number" name="input2" step="any" required placeholder="Probability 2"/>
                    <input name="Function" title="Combined With" type="radio" value="CombinedWith">
                    <input name="Function" title="Either" type="radio" value="InclusiveEither">
                    <input type="submit" class="button" >
                </form>
            </div>
            <div class="outputs">

            </div>
        </div>
        <div class="right_column">
            <div class="log_book">

            </div>
        </div>
    </main>
</body>
</html>