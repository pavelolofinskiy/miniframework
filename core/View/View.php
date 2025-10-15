<?php

namespace Core\View;

class View
{

    public function render($TemplatePath, $data = null) {
        $file = file_get_contents('app/View/' . $TemplatePath . '.php');

        $output = $file;
        if($data !== null) {
            foreach ($data as $key => $value) {
                $output = str_replace('{{ ' . $key . ' }}', $value, $output);
            }
        }
        

        echo $output;
    }
}