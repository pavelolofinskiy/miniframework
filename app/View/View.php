<?php

namespace App\View;

class View
{

    public function render($TemplatePath, $data) {
        $file = file_get_contents('app/View/' . $TemplatePath . '.php');

        $output = $file;

        foreach ($data as $key => $value) {
                $output = str_replace('{{ ' . $key . ' }}', $value, $output);
        }

        echo $output;
    }
}