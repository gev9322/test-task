<?php

use XmlElements\Cars\CarsModificationSimpleXmlElement;

class UniqueModificationCount {
    const XML_FILES_DIR = 'xmls';

    public function run($filePath)
    {
        if(!file_exists($filePath)){
            $filePath = ROOT_DIR . '/' . self::XML_FILES_DIR . '/' .$filePath;
        }
        $xmlFile = @simplexml_load_file($filePath, CarsModificationSimpleXmlElement::class);
        if(!$xmlFile){
            echo "File not found (" . $filePath . ')';
            die;
        }
        $names = [];
        foreach ($xmlFile->getModifications() as $modification) {
            $names[] = (string) $modification->attributes()['name'];
        }

        echo count(array_unique($names));

        var_dump(microtime(true) - COMMAND_START);
    }
}