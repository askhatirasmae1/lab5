<?php
namespace App\Log;

class Logger
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;

        if (!file_exists(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }
    }

    public function error($message)
    {
        file_put_contents(
            $this->file,
            date('Y-m-d H:i:s') . " ERROR: " . $message . PHP_EOL,
            FILE_APPEND
        );
    }
}