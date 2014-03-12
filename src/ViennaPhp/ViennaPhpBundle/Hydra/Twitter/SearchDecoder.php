<?php

namespace ViennaPhp\ViennaPhpBundle\Hydra\Twitter;

use Hydra\Decoder\JsonDecoder;

class SearchDecoder extends JsonDecoder
{
    public function decode($data)
    {
        $return = parent::decode($data);

        return $return['statuses'];
    }
}
