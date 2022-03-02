<?php

namespace XmlElements\Cars;

class CarsModificationSimpleXmlElement extends \SimpleXMLElement
{
    public function getFolders(): array
    {
        $folders = [];
        foreach($this->children() as $child){
            array_push($folders, ...$child->xpath('folder'));
        }

        return $folders;
    }

    public function getModifications(): array
    {
        $modifications = [];
        foreach($this->getFolders() as $child){
            array_push($modifications, ...$child->xpath('modification'));
        }

        return $modifications;
    }
}