<?php

namespace Ezequieldhonatan\MicroservicesCommon\Services\Api\V1\Traits\External;

use Illuminate\Support\Facades\Http;

class ConsumerExternalService
{
    public function headers( array $headers = [] )
    {
        array_push( $headers, [
            'Accept'        => 'application/json',
            'Authorization' => $this->token
        ]);

        return Http::withHeaders( $headers );
    }

    public function request(
        string $method,
        string $endpoint,
        array $formParams = [],
        array $headers = []
    )
    {
        return $this->headers( $headers )->$method( $this->url . $endpoint, $formParams );
    }

} // ConsumerExternalService
