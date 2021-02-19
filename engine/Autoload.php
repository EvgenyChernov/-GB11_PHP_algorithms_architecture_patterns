<?php

namespace app\engine;
class Autoload
{
    public function loadClass($className): void
    {
        $fileName = str_replace(["\\", "app"], [DS, ROOT_DIR], $className) . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
