<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="main.js"></script>
        <?php include_once('D:/wamp64/www\Web2-Tp1/controleurs/controleur_financement.php');?>

    </head>
    <body>
    <table border="1">
            <tr>
                <th>Coûts de la voiture:</th>
            </tr>
            <tr>
                <td>
                    Coût :
                </td>
                <td>
                    <?php echo $price ?>
                </td>
            </tr>
            <tr>
                <td>
                    Acompte : 
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Balance :
                </td>
                <td>
                    <?php calculateBalance($price, $advance)?>
                </td>
            </tr>
            <tr>
                <td>
                    Taxes :
                </td>
                <td>
                    <?php echo calculateTaxes($price)?>
                </td>
            </tr>
            <tr>
                <td>
                    Intérêts : 
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Montant à financer : 
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Paiments mensuels : 
                </td>
                <td>

                </td>
            </tr>
        </table>
        <select>
            <option value="Intérêt1">12 mois - 6.95%</option>
            <option value="Intérêt2">12 mois - 7.25%</option>
            <option value="Intérêt3">24 mois - 6.95%</option>
            <option value="Intérêt4">24 mois - 7.25%</option>
            <option value="Intérêt5">36 mois - 6.25%</option>
            <option value="Intérêt6">36 mois - 6.30%</option>
            <option value="Intérêt7">48 mois - 6.10%</option>
            <option value="Intérêt8">48 mois - 6.30%</option>
            <option value="Intérêt9">60 mois - 6.00%</option>
            <option value="Intérêt10">60 mois - 5.85%</option>
        <input type="text" id="acompte" name="acompte" maxlength="8" size="12">
        <br>
        <button value="Refresh Page" onClick="window.location.reload()">calculer</button>

    </body>
</html>