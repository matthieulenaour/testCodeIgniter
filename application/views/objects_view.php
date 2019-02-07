<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List of objects</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            padding-top:50px;
        }

        h1 {
            text-align: center;
            padding-bottom: 50px;
        }

        #nbResults {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>

    <div id="objects" class="container">
        <h1>Liste des Objects</h1>
        <form class="form-inline" action="<?php echo '/index.php/objects/index'; ?>" method="post" class="row">
            <p class="col">Objet: <input type="text" id="object_name" name="object_name"></p>
            <p class="col">Catégorie: <input type="text" id="object_category" name="object_category"></p>
            <p class="col">Date: <input type="text" id="object_date" name="object_date"></p>
            <input class="btn btn-default col" type="submit" value="Go">
        </form>

        <div id="nbResults">Nombre de Résultats: <?php echo $total_nb_objects; ?></div>
        <?php if (!empty($pagination)):?>
            <div class="pagination"><?php echo $pagination; ?></div>
        <?php endif; ?>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Date de création</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($objects)):?>
                <?php foreach($objects as $object): ?>
                    <tr>
                        <th scope="row"><?php echo $object->object_id; ?></th>
                        <td><?php echo $object->name; ?></td>
                        <td><?php echo $object->name_category; ?></td>
                        <td><?php echo $object->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else:?>
                Aucun Résultats
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<script>
    $( function() {
        $( "#object_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    } );
</script>