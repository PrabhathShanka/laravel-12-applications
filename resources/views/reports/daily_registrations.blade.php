<!DOCTYPE html>
<html>
<head>
    <title>Daily Registrations Report - {{ $date }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="title">
        <h1>Daily Registrations Report</h1>
        <h3>Date: {{ $date }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations as $registration)
            <tr>
                <td>{{ $registration->id }}</td>
                <td>{{ $registration->event->name }}</td>
                <td>{{ $registration->name }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->phone }}</td>
                <td>{{ $registration->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No registrations for this day</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
