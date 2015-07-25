<?php
include("src/Bash.php");
include("src/Database.php");

//I don't know how to make pretty code :(
//Don't worry - me too :P

//$bash = new Bash("https://raw.githubusercontent.com/Cpt-ManlyPink/glhf-bash/master/bash.json");
$bash = new Bash("bash.json");
$db = new Database();
$entries = $bash->process();

//Checks if there have been new entries in JSON file.
$lastModified = $entries['lastModified'];
if ($db->lastSave()!=$lastModified){
    foreach ($entries['entries'] as $entry) {
        $db->saveEntrie($entry);
    }
    $db->updateLastSave($lastModified,$db->lastSave());
}

//Fetches all entries from DB
$content = $db->getEntries();
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
        <div class="container">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <?php foreach ($content as $row): ?>
                <div class="row">
                <div class="col-sm-12 space"></div>
                </div>
                <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><?php echo $row['date']; ?></div>
                <div class="col-sm-2"></div>
                </div>
                <?php $texts = explode('\\n', $row['text']);
                foreach ($texts as $text): ?>
                    <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6"><?php echo $bash->makeLinks($text); ?></div>
                    <div class="col-sm-2"></div>
                    </div>
                <?php endforeach ?>   
        <?php endforeach ?>
        </div>
    </body>
</html>