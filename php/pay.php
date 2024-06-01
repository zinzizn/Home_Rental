<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visa Card Payment Form</title>
</head>
<body>

<form action="process_payment.php" method="post">
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" maxlength="16" required>
    <br>

    <label for="expiry_date">Expiry Date (MM/YY):</label>
    <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" maxlength="5" required>
    <br>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" maxlength="3" required>
    <br>

    <input type="submit" value="Submit Payment">
  </form>

</body>
</html>
