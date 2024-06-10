<!DOCTYPE html>
<html>
<head>
    <title>Weekly Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .container {
            width: 100%;
            padding: 20px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details, .details td {
            font-size: 20px;
            width: 100%;
            margin-bottom: 20px;
        }
        .report, .report td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        .report .date {
            width: 200px;
        }
        .report .description {
            width: 500px;
        }
        .signature {
            display: flex;
            justify-content: end;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h3>{{ $universityName }}</h3>
        <p>{{ $internReport->internship->description ?? '--' }}</p>
        <h4>Daily/Weekly Log Book</h4>
    </div>
    <table class="details">
        <tr>
            <td>Student Name: {{ $internName }}</td>
            <td>Week No.: {{ $internReport->week_no }}</td>
        </tr>
        <tr>
            <td>Roll No: {{ $internReport->internship->intern->roll_no }}</td>
            <td>Supervisor: {{ $supervisor }}</td>
        </tr>
    </table>
    <table class="report">
        <thead>
        <tr>
            <th class="date">Date</th>
            <th class="description">Description about Task assigned</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Monday</td>
                <td>{{ $internReport->monday_report ?? '--' }}</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>{{ $internReport->tuesday_report ?? '--' }}</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>{{ $internReport->wednesday_report ?? '--' }}</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>{{ $internReport->thursday_report ?? '--' }}</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>{{ $internReport->friday_report ?? '--' }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <strong>Reflection:</strong> <br>
        {{ $internReport->reflection }}
    </div>
    <div>
        <strong>Supervisor Comment/ Advice for improvement:</strong> <br>
        {{ $internReport->supervisor_comment }}
    </div>
    <div class="signature">
       <div>
           <strong>Signature:</strong> ........................................................
       </div>
    </div>
</div>
</body>
</html>
