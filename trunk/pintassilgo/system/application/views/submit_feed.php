<hml>
    <head></head>
    <body>
        <?php
        echo validation_errors();

        if($success == TRUE) {
            echo 'FEED submetida.';
        }
        echo form_open('feeds/submit');
        echo form_label('Título', 'source_name'),form_input('source_name');//, set_value('source_name','')

        echo '<br />';

        echo form_label('URL:', 'url'), form_input('url');//, set_value('url','')

        echo '<br />';

        echo form_label('Descrição da FEED:', 'description');
        echo '<br />';

        echo form_textarea('description');

        echo '<br />';
        echo form_hidden('user');

        echo form_reset('clear', 'Limpar'), form_submit('submit', 'Submeter');
        echo form_close();
        ?>
    </body>
</hml>
