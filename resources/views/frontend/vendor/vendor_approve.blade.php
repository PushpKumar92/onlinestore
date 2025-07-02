<!DOCTYPE html>
<html>

<head>
    <title>Vendor Approval Notification</title>
</head>

<body>
    <h2>Hello{{ $vendor['name'] ?? 'N/A' }},</h2>
    <p>Congratulations! Your vendor account has been approved by the admin.</p>
    <p>You can now log in and start managing your shop.</p>
    <p><a href="{{ route('vendor.login') }}">Click here to login</a></p>
    <br>
    <p>Thank you,<br>Your Website Team</p>
</body>

</html>