<!DOCTYPE html>
<html>
<head>
    <title>Rental Confirmation</title>
</head>
<body>
<h1>Rental Confirmation</h1>
<p>Dear {{ $rental->user->name }},</p>
<p>Thank you for renting a car with us. Here are your rental details:</p>
<ul>
    <li><strong>Car:</strong> {{ $rental->car->name }}</li>
    <li><strong>Start Date:</strong> {{ $rental->start_date }}</li>
    <li><strong>End Date:</strong> {{ $rental->end_date }}</li>
    <li><strong>Total Cost:</strong> {{ $rental->total_cost }}</li>
</ul>
<p>We hope you enjoy your rental experience!</p>
</body>
</html>
