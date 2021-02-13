<?php

class ms2ColorsEventOnLoadWebDocument extends abstractModuleEvent
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
        if ($this->resource->get('class_key') != 'msProduct') {
            return false;
        }
        return parent::checkPermissions();
    }

    protected function handleEvent()
    {
        $this->modx->lexicon->load('ms2colors:color');
        $colorCommon = $this->resource->getOne('ms2colorCommon');
        if ($colorCommon) {
            $this->modx->setPlaceholders($colorCommon->toArray(), 'ms2colors_common.');
        }

        $colorCollection = $this->resource->getOne('ms2colorCollection');
        if ($colorCollection) {
            $this->modx->setPlaceholders($colorCollection->toArray(), 'ms2colors_collection.');
        }
    }
}
