<html>
<head></head>

<body>

<h2>Kalkulator kredytu</h2>

<form action="calc.php" method="GET">

    Pożyczka:
    <input type="text" name="loan" value="<?php echo $loan ?? '' ?>"> <br>

    Odsetek:
    <input type="text" name="interest" value="<?php echo $interest ?? '' ?>"> <br>

    Lata:
    <input type="text" name="years" value="<?php echo $years ?? '' ?>"> <br>

    <input type="submit">

</form>

<h1>
    <?php
    if (isset($payment)){
        echo "Payment: $payment";
    }
    ?>
</h1>

</body>
</html>