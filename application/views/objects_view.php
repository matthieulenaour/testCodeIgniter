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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

    <div id="objects">
        <p>Objet: <input type="text" id=""></p>
        <p>catégorie: <input type="text" id=""></p>
        <p>Date: <input type="text" id="datepicker"></p>

        <!--        <div class="pagination">--><?php //echo $pagination; ?><!--</div>-->

        <?php foreach($objects as $object): ?>
            <div id="num_<?php echo $object->object_id; ?>" class="">
                <p>
                    <span class=""><?php echo $object->name; ?></span>
                    <span class=""><?php echo $object->category_id; ?></span>
                    <span class=""><?php echo $object->created_at; ?></span>
                </p>
            </div>
        <?php endforeach; ?>

<!--        <div class="pagination">--><?php //echo $pagination; ?><!--</div>-->

    </div>


</body>
</html>

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>