<? include  'functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phone Book</title>
</head>
<body>
<h1>Phone Book</h1>
    <table border="1">
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Adress</th>
                <th>PhoneNumbers</th>
            </tr>

     <? foreach (getRecords() as $record):
           if ($record['Id'] % 2 != 0): ?>
            <tr bgcolor="#D3EDF6";>
        <? else: ?>
            <tr>
        <? endif; ?>

                <td><?= $record['FirstName'] ?></td>
                <td><?= $record['LastName'] ?></td>
                <td><?= $record['Adress'] ?></td>
                <td><?= $record['PhoneNumbers'] ?></td>
            </tr>

     <? endforeach; ?>

    </table>
</body>
</html>
