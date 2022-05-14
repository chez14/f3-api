<?php
namespace Output;
use Spatie\ArrayToXml\ArrayToXml;

class XML extends \Prefab {

    public $xmlns = "https://schemas.christianto.net/f3-api/generic-response.v1.0.0.schema.xml";
    public $rootElementName = 'Result';

    public function serve($data){
        $f3 = \F3::instance();
        header('Content-type: application/xml');

        $data_filtered = [
            '_attributes' => [
                'api:status' => $data['status']?"true":"false"
            ],
            'api:data'=> $data['data'],
            'api:error' => $data['error']
        ];

        echo ArrayToXml::convert($data_filtered, [
            'rootElementName' => $this->rootElementName,
            '_attributes' => [
                'xmlns:api' => $this->xmlns
            ]
        ]);
    }

    
}