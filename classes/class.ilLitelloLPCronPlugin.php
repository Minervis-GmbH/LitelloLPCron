<?php

require_once "Customizing/global/plugins/Services/Repository/RepositoryObject/Litello/classes/class.ilLitelloLPCron.php";
/**
 * Class ilLitelloLPCronPlugin
 *
 * @author Jephte Abijuru <jephte.abijuru@minervis.com>
 */
class ilLitelloLPCronPlugin extends ilCronHookPlugin
{


    const PLUGIN_CLASS_NAME = ilLitelloLPCronPlugin::class;
    const PLUGIN_ID = "ltolpcron";
    const PLUGIN_NAME = "LitelloLPCron";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilViMPCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        switch ($a_job_id) {
            case ilLitelloLPCron::CRON_JOB_ID:
                return new ilLitelloLPCron();

            default:
                return null;
        }
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return [
            new ilLitelloLPCron()
        ];
    }
}
