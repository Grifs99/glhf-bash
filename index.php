<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>GLHF.lv Teamspeak Bash</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php
        $filestring = file_get_contents("https://raw.githubusercontent.com/Cpt-ManlyPink/glhf-bash/master/bash");
	echo str_replace("\n", "<br>", $filestring);
        ?>

    </body>
</html>

