<?php

/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 6-10-2017
 * Time: 11:20
 */
class text
{
    private $text_start;
    private $file;
    private $content;
    private $read;
    private $read_size;

    function __construct(){
        $this->text_start = "This file was created on " . date("j:m:Y")."\r\n";
    }

    public function open_file($file, $extension){
        if(file_exists("files/".$file.".".$extension)) {
            $this->file = fopen("files/" . $file . "." . $extension, "a");
            $this->text_start = "\r\n-------------------------------------\r\n|This file was updated on " . date("j:m:Y")."|\r\n-------------------------------------\r\n";
        }else{
            $this->file = fopen("files/" . $file . "." . $extension, "w");
            $this->text_start = "-------------------------------------\r\n|This file was created on " . date("j:m:Y")."|\r\n-------------------------------------\r\n";
        }
        $this->read = fopen("files/" . $file . "." . $extension, "r");
        $this->read_size = "files/" . $file . "." . $extension;
    }

    public function write_file($content){
        $this->content = $content;
        fwrite($this->file, $this->text_start.$content);
        $this->show_content();
    }

    private function show_content(){
        echo "<pre>".fread($this->read,filesize($this->read_size))."</pre>";
    }

    public function close_file(){
        fclose($this->file);
    }
}

$file = new text();
$file->open_file($_POST["file_name"], $_POST["extension"]);
$file->write_file($_POST["content"]);
$file->close_file();