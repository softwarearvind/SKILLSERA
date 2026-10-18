
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Career Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">

    <div style="max-width: 650px; margin: auto; border: 1px solid #ddd;">

        <div style="background: #172554; color: white; padding: 22px;">
            <h2 style="margin: 0;">SKILLS ERA</h2>
            <p style="margin-bottom: 0;">New Career Enquiry Received</p>
        </div>

        <div style="padding: 25px;">
            <p>A new enquiry has been submitted through your website.</p>

            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Full Name</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['name'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Mobile Number</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['phone'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Email Address</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['email'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Qualification</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['qualification'] ?: 'Not provided' }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Support Required</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['support_type'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;"><strong>Requirement Details</strong></td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $enquiry['message'] ?: 'No message provided' }}</td>
                </tr>
            </table>

            <p style="margin-top: 25px;">Please contact the applicant regarding their enquiry.</p>
        </div>

    </div>

</body>
</html>
