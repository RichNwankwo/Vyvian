<?php

namespace App\Utilities\API\Transformers;
class InterventionTransformer extends Transformer{

    public $format = ['user_id', 'phase_id'];
    public function transform($intervention)
    {
        return [
            'user_id' => $intervention['id'],
            'phase' => $intervention['phase_id'],
        ];
    }
}
 