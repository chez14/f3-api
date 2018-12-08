<?php
namespace Model;

class Error extends \Exception{
    private
        $reason,
        $error_code,
        $title,
        $description,
        $exception,
        $prevErrorModel,
        $http_code;
    
    public function __construct(
        $title, 
        $description, 
        $error_code,
        $reason = "Unkown error", 
        $http_code = 400, 
        ErrorModel $prevErrorModel = null, 
        \Throwable $exception = null) {
        
        parent::__construct($title, $http_code, $exception);
        $this->title = $title;
        $this->description = $description;
        $this->reason = $reason;
        $this->error_code = $error_code;
        $this->prevErrorModel = $prevErrorModel;
        $this->exception = $exception;
        $this->http_code = $http_code;
    }

    public function get_http_status() {
        return $this->http_code;
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