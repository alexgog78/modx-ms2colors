<?php

class ms2ColorsEventOnLoadWebDocument extends abstractModuleWebEvent
{
    /** @var modResource */
    private $resource;

    /**
     * ms2ColorsEventOnLoadWebDocument constructor.
     *
     * @param abstractModule $service
     * @param string $eventName
     * @param array $scriptProperties
     */
    public function __construct(abstractModule $service, string $eventName, $scriptProperties = [])
    {
        parent::__construct($service, $eventName, $scriptProperties);
        $this->resource = $this->modx->resource;
    }

    /**
     * @return bool
     */
    protected function checkPermissions()
    {
        if (!$this->resource instanceof msProduct) {
            return false;
        }
        return parent::checkPermissions();
    }

    protected function run()
    {
        $this->modx->lexicon->load('ms2colors:color');

        $colorCommon = $this->resource->getOne('ms2colorCommon');
        if ($colorCommon) {
            $colorCommonData = $colorCommon->toArray('ms2colors_common_');
            $this->resource->fromArray($colorCommonData);
            $this->modx->setPlaceholders($colorCommonData);
        }

        $colorCollection = $this->resource->getOne('ms2colorCollection');
        if ($colorCollection) {
            $colorCollectionData = $colorCommon->toArray('ms2colors_collection_');
            $this->resource->fromArray($colorCollectionData);
            $this->modx->setPlaceholders($colorCollectionData);
        }
    }
}
