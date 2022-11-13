<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Client</title>
    <link rel="stylesheet" href="..\css\style.css">
    <style>
        input {
            display: block;
            margin: 5px;
        }
    </style>
</head>

<body>
    <main>
        <h2>Saisir</h2>
        <form action="../client/store" method="post">
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Adresse
                <input type="text" name="adresse">
            </label>
            <label>Postal Code
                <input type="text" name="postal_code">
            </label>
            <label>Courriel
                <input type="email" name="courriel">
            </label>
            <label>Phone
                <input type="text" name="phone">
            </label>
            <input type="submit" value="Save">
        </form>
    </main>
</body>

</html>