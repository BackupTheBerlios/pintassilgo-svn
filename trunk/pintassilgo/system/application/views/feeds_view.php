<html>
    <head></head>
    <body>
        <?php
        //id
        //feed_id
        //guid
        //title
        //summary
        //body
        //content_date
        //url

        foreach($data as $row) {
            echo '<h1>'. $row->title . '</h1>';
            echo '<p>'. $row->summary . '</p>';
            echo '<a href="feeds/more/'. $row->id .'">mais</a> ' .
            'Escrito por <a href="#">autor</a> em <a href="' . $row->url . '">' . $row->content_date . '</a>';
        }?>
    </body>
</html>
