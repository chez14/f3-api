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
        $http_code,
        $trace;
    
    public function __construct(
        $title, 
        $description, 
        $error_code,
        $reason = "Unkown error", 
        $http_code = 400, 
        ErrorModel $prevErrorModel = null, 
        \Throwable $exception = null,
        $trace = null) {
        
        parent::__construct($title, $http_code, $exception);
        $this->title = $title;
        $this->description = $description;
        $this->reason = $reason;
        $this->error_code = $error_code;
        $this->prevErrorModel = $prevErrorModel;
        $this->exception = $exception;
        $this->http_code = $http_code;
        $this->trace = $trace;
    }

    public function get_http_status() {
        return $this->http_code;
    }

    public function serve_exception(){
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "reason" => $this->reason,
            "error_code" => $this->error_code
        ];

        if ($this->prevErrorModel) {
            $data['error_stack'] =  $this->prevErrorModel->serve_exception();
        }

        if ($this->exception) {
            $data['exception'] = $this->exception->getTraceAsString();
        }
        
        if ($this->trace) {
            $data['trace'] = $this->trace;
        }
        
        return $data;
    }
}