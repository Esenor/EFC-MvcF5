<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <title><?php echo $this->user->login; ?></title>
</head>
<body>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th colspan="2">Utilisateur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>ID</th>
            <td><?php echo $this->user->id; ?></td>
        </tr>
        <tr>
            <th>Login</th>
            <td><?php echo $this->user->login; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $this->user->password; ?></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>