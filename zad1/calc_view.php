<html>
<head></head>

<body>

<h2>Kalkulator kredytu</h2>

<form action="calc.php" method="GET">

    Loan:
    <input type="text" name="loan" value="<?php echo $loan ?? '' ?>">
    <span style="color:red"><?php echo $errorLoan ?? '' ?></span>
    <br><br>

    Interest:
    <input type="text" name="interest" value="<?php echo $interest ?? '' ?>">
    <span style="color:red"><?php echo $errorInterest ?? '' ?></span>
    <br><br>

    Years:
    <input type="text" name="years" value="<?php echo $years ?? '' ?>">
    <span style="color:red"><?php echo $errorYears ?? '' ?></span>
    <br><br>

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