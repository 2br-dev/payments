<?php

declare(strict_types=1);

namespace Fastest\Core\Modules;

final class oplatyModule extends \Fastest\Core\Modules\Module
{
    public function router()
    {        
        return $this->blockMethod();
    }

    
    public function blockMethod()
    {
         $payments = Q("SELECT full_name FROM `#_mdd_renters` WHERE `visible` = ?i", array(1))->all();
                           
        // exit(__($payments));

        return [
            'template' => 'block',
            'payments' => $payments
        ];
    }
}