<?php
require_once 'vendor/autoload.php';
require_once 'src/public/crunch.php'
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
                <h2>Inputs Section</h2>
                <p>Please enter the probabilities you would like to calculate and select a method from the drop down menu</p>
                <form action="" method="post">
                    <input type="number" name="input1" step="any" required placeholder="Probability 1"/>
                    <input type="number" name="input2" step="any" required placeholder="Probability 2"/> <br/>
                    <select title="Function definer" name="Function">
                        <option value="CombinedWith">Combined With</option>
                        <option value="InclusiveEither">Either</option>
                    </select>

                    <input type="submit" class="button" >
                    <?php
                    if (isset($_GET['invalid'])) {
                        echo '<p>Please enter valid probabilities between 0 and 1.</p>';
                    }
                    ?>
                </form>
            </div>
            <div class="outputs">
                <h2>Results</h2>
                <?php if (isset($_POST['input1'], $_POST['Function'], $_POST['input2'])){
                echo "<p>Results of the $function function with the inputs " . $_POST['input1'] . ' and ' . $_POST['input2'] . ' is: </p>';
                echo $result;
                }
                ?>


            </div>
        </div>
        <div class="right_column">
            <div class="log_book">

            </div>
        </div>
    </main>
</body>
</html>