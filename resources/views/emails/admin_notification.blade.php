<!DOCTYPE html>
<html>
<head>
    <title>New Car Rental</title>
</head>
<body>
<h1>New Car Rental</h1>
<p>A new car rental has been made. Here are the details:</p>
<ul>
    <li><strong>Customer:</strong> {{ $rental->user->name }}</li>
    <li><strong>Car:</strong> {{ $rental->car->name }}</li>
    <li><strong>Start Date:</strong> {{ $rental->start_date }}</li>
    <li><strong>End Date:</strong> {{ $rental->end_date }}</li>
    <li><strong>Total Cost:</strong> {{ $rental->total_cost }}</li>
</ul>
</body>
</html>
