<?php

$config = array(

    array(  'id' => 'title',
            'label' => 'Titulo',
            'many' => false,
            'title' => 'Titulo'),

    array(  'id' => 'musicAuthor',
            'label' => 'Autor',
            'many' => true,
            'title' => 'Autor de la musica'),

    array(   'id' => 'singLanguage',
            'label' => 'Idioma',
            'many' => true,
            'title' => 'Lengua de la musica')
);

?>