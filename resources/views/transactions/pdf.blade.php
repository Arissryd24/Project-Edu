<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Transactions Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->user->name ?? '—' }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->amount }}</td>
                <td>{{ $t->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>