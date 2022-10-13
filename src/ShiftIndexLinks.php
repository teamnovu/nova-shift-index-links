<?php

namespace Pavloniym\ShiftIndexLinks;

use Laravel\Nova\Fields\Field;

/**
 * @method static static make()
 */
class ShiftIndexLinks extends Field
{

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'shift-index-links';


    /**
     * Indicates if the element should be shown on the detail view.
     *
     * @var (callable():bool)|bool
     */
    public $showOnDetail = false;


    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest):bool)|bool
     */
    public $showOnCreation = false;


    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool
     */
    public $showOnUpdate = false;


    /**
     * Create a new field.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('ShiftIndexLinks');
    }


    /**
     * Set position
     *
     * @param int $position
     * @return $this
     */
    public function setPosition(int $position): self
    {
        return $this->withMeta(['position' => $position]);
    }
}
