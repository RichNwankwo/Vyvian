<?php

namespace App\Utilities\API\Transformers;
class PhaseTransformer extends Transformer{

    public $format = ['id', 'phase'];
    public function transform($phase)
    {
        return [
            'phase_id' => $phase['id'],
            'phase' => $phase['phase'],
        ];
    }
}