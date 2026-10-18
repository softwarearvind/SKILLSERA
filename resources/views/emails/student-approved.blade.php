<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Account Approved</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f6fa; padding:30px;">

    <div style="
        max-width:600px;
        margin:auto;
        background:#ffffff;
        padding:30px;
        border-radius:10px;
    ">

        <h2>Congratulations {{ $student->name }}!</h2>

        <p>
            Your student account has been approved by the institute.
        </p>

        <p>
            You can now login to your student account.
        </p>

        <a href="{{ url('/login') }}"
           style="
           display:inline-block;
           background:#0d6efd;
           color:white;
           padding:12px 20px;
           text-decoration:none;
           border-radius:6px;
           ">
            Login Now
        </a>

        <p style="margin-top:30px;">
            Regards,<br>
            Institute Administration
        </p>

    </div>

</body>
</html>
