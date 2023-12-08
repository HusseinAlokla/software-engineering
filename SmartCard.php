<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pay with Smart Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Pay with Smart Card</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form id="paymentForm" method="POST">
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="Enter your card number">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expiryDate">Expiry Date</label>
                                        <input type="text" class="form-control" id="expiryDate" name="expiryDate"
                                            placeholder="MM/YY">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cvv">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nameOnCard">Name on Card</label>
                                <input type="text" class="form-control" id="nameOnCard" name="nameOnCard"
                                    placeholder="Enter the name on your card">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('paymentForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('submit-payment.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error processing request');
                    });
            });
        });
    </script>

</body>

</html>