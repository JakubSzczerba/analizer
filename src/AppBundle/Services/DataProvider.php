<?php

namespace AppBundle\Services;

class DataProvider
{
    public function serializeData($file): array
    {
        $open = fopen($file->getPathname(), "r");
        $data = fgetcsv($open);
        $rows = [];
        $header = [];
        $index = 0;
        while (($line = fgetcsv($open)) !== FALSE) {
            if ($index == 0) {
                $header = $line;
                $index = 1;
            } else {
                $row = [];
                for ($i = 0; $i < count($header); $i++) {
                    $row[$data[$i]] = $line[$i];
                }
                array_push($rows, $row);
            }
        }

        return $rows;
        //return array_slice($price, 0, 10);
    }

}