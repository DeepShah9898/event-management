<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Thank you for registering for our event!</p>
    <p>Click the link below to verify your email address:</p>
    <a href="{{ url('/verify-email/' . $user->id) }}">Verify Email</a>
</body>
</html>
