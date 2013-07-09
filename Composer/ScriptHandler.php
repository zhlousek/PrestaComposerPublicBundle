<?php

namespace Presta\AnyPublicBlendBundle\Composer;

use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as BaseScriptHandler;
use Composer\Script\CommandEvent;

/**
 * Description of ScriptHandler
 *
 * @author dey
 */
class ScriptHandler extends BaseScriptHandler
{
    public static function AnyPublicBlend(CommandEvent $event)
    {
        $options = self::getOptions($event);
        $appDir = $options['symfony-app-dir'];

        if (!is_dir($appDir)) {
            echo 'The symfony-app-dir ('.$appDir.') specified in composer.json was not found in '.getcwd().', can not clear the cache.'.PHP_EOL;

            return;
        }

        static::executeCommand($event, $appDir, 'presta:any-public-blend');
    }
}

?>