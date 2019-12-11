<?php

namespace Modules\Platform\Core\Helper\Excel;

class RecordImport implements \Maatwebsite\Excel\Concerns\WithCustomCsvSettings
{

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getCsvSettings(): array
    {
        $result =  [
        ];

        return array_merge($result,$this->config);
    }

}