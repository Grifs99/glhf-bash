<?php
    include("src/Bash.php");
    $bash = new Bash("https://raw.githubusercontent.com/Cpt-ManlyPink/glhf-bash/master/bash");
?>
<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>GLHF.lv Teamspeak Bash</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<?php foreach ($bash->split() as $row): ?>
            <div class="row">
            <?php if($row === ""): ?>
                <div class="col-sm-12 space"></div>
            <?php else: ?>
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><?php echo $row ?></div>
                <div class="col-sm-2"></div>
            <?php endif ?>
            </div>
        <?php endforeach ?>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>

