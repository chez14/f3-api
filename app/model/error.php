<?php

namespace Model;

use Base;

class Error extends \Exception
{
    private $reason;
    private $errorCode;
    private $title;
    private $description;
    private $exception;
    private $prevErrorModel;
    private $httpCode;
    private $trace;

    /**
     * Create the Model Error by filling in the things
     *
     * @param string $title Error title
     * @param string|null $description Descriptive info of the error, if any.
     * @param string|null $errorCode Specific error code for this error
     * @param string|null $reason Reasons for showin this error, alongside the
     *                            reccomendations to overcome the error
     * @param integer $httpCode HTTP status code that represents this eror, by
     *                          default it's 400, meaning it's user's fault for sending in bad request.
     * @param Error|null $prevErrorModel Previous error model if there's any
     *                                   stacks
     * @param \Throwable|null $exception Caught exceptions for debugging details
     * @param string|null $trace Fatfree trace string.
     */
    public function __construct(
        string $title,
        ?string $description = null,
        ?string $errorCode = null,
        ?string $reason = null,
        int $httpCode = 400,
        Error $prevErrorModel = null,
        \Throwable $exception = null,
        ?string $trace = null
    ) {
        parent::__construct($title, $httpCode, $exception);

        $this->title = $title;
        $this->description = $description;
        $this->reason = $reason;
        $this->errorCode = $errorCode;
        $this->prevErrorModel = $prevErrorModel;
        $this->exception = $exception;
        $this->httpCode = $httpCode;
        $this->trace = $trace;
    }

    /**
     * Outputs the appropriate HTTP code that this error model represents
     *
     * @return int
     */
    public function getHTTPStatus()
    {
        return $this->httpCode;
    }

    /**
     * Serve current error as exception. This will print traced error.
     *
     * @return array
     */
    public function serveException()
    {
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "reason" => $this->reason,
            "errorCode" => $this->errorCode
        ];

        if ($this->prevErrorModel) {
            $data['error_stack'] =  $this->prevErrorModel->serveException();
        }

        if ($this->exception) {
            $data['exception'] = $this->exception->getTraceAsString();
        }

        if ($this->trace && Base::instance()->get('DEBUG') > 0) {
            $data['trace'] = $this->trace;
        }

        return $data;
    }
}
