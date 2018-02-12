<?php
namespace Model;

class ErrorModel extends Exception{
    private
        $reason,
        $error_code,
        $title,
        $description,
        $exception,
        $prevErrorModel;
    
    public function __constructor($title, $description, $error_code, $reason = "Unkown error", ErrorModel $prevErrorModel = null, \Exception $exception) {
        $this->title = $title;
        $this->description = $description;
        $this->reason = $reason;
        $this->error_code = $error_code;
        $this->prevErrorModel = $prevErrorModel;
        $this->exception = $exception;
    }

    public function serve_exception(){
        return [
            "title" => $this->title,
            "description" => $this->description,
            "reason" => $this->reason,
            "error_code" => $this->error_code,
            "error_stack" => $this->prevErrorModel->serve_exception,
            "exception" => $this->exception
        ];
    }
}