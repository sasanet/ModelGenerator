<?php

/**
 * Created by Cristian.
 * Date: 11/09/16 09:26 PM.
 */

namespace Reliese\Coders\Model\Relations;

use Illuminate\Support\Str;

class HasOne extends HasOneOrMany
{
    /**
     * @return string
     */
    public function hint()
    {
        return $this->related->getQualifiedUserClassName();
    }

    /**
     * @return string
     */
    public function name()
    {

        switch($this->parent->usesWordStrategyAttributes()){
            case "snake":{
                return Str::snake($this->related->getClassName());
            }
            case "camel":{
                return Str::camel($this->related->getClassName());
            }
            default:
            {
                return $this->related->getClassName();
            }
        }

    }

    /**
     * @return string
     */
    public function method()
    {
        return 'hasOne';
    }
}
