<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Batch Assignment</title>
</head>

<body style="margin:0;padding:0;background:#f5f6fa;font-family:Arial,sans-serif;">

<div style="max-width:650px;margin:30px auto;background:#ffffff;border-radius:10px;overflow:hidden;">
<div style="background:#0d6efd;color:#ffffff;padding:25px;text-align:center;">

    <h2 style="margin:0;">
        Batch Assignment Confirmation
    </h2>

</div>


<div style="padding:30px;">

    <h3>
        Hello {{ $student->name }},
    </h3>

    <p>
        You have been successfully assigned to the following training batch.
    </p>


    <table width="100%" cellpadding="10" cellspacing="0"
           style="border-collapse:collapse;margin-top:20px;">

        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Course
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->course->name ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Course Code
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->course->code ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Batch
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->name }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Batch Code
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->code }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Start Date
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->start_date?->format('d M Y') ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                End Date
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->end_date?->format('d M Y') ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Class Days
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->days ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Timing
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->start_time ?? '-' }}
                -
                {{ $batch->end_time ?? '-' }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Mode
            </td>

            <td style="border:1px solid #ddd;">
                {{ ucfirst($batch->mode) }}
            </td>
        </tr>


        <tr>
            <td style="border:1px solid #ddd;font-weight:bold;">
                Classroom
            </td>

            <td style="border:1px solid #ddd;">
                {{ $batch->room ?? 'N/A' }}
            </td>
        </tr>

    </table>


    @if($batch->meeting_link)

        <div style="margin-top:25px;text-align:center;">

            <a href="{{ $batch->meeting_link }}"
               style="display:inline-block;background:#0d6efd;color:#ffffff;
                      padding:12px 20px;text-decoration:none;border-radius:6px;">

                Join Online Class

            </a>

        </div>

    @endif


    <p style="margin-top:30px;">

        Please keep these details for your training schedule.

    </p>


    <p>

        Regards,<br>
        <strong>Institute Training Team</strong>

    </p>

</div>


</div>

</body>
</html>
