<?php

namespace BotMan\Drivers\Whatsapp\Extensions;

use BotMan\BotMan\Interfaces\WebAccess;
use JsonSerializable;

class ButtonTemplate implements JsonSerializable, WebAccess
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $text;

    /** @var array */
    protected $buttons = [];

    /**
     * @param $text
     * @return static
     */
    public static function create($id, $text)
    {
        return new static($id, $text);
    }

    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @param  ElementButton  $button
     * @return $this
     */
    public function addButton(ElementButton $button)
    {
        $this->buttons[] = $button->toArray();

        return $this;
    }

    /**
     * @param  array  $buttons
     * @return $this
     */
    public function addButtons(array $buttons)
    {
        foreach ($buttons as $button) {
            if ($button instanceof ElementButton) {
                $this->buttons[] = $button->toArray();
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => 'interactive',
            'reply' => [
                'id' => $this->id,
                'title' => $this->text,
            ],
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return [
            'type' => 'buttons',
            'text' => $this->text,
            'buttons' => $this->buttons,
        ];
    }
}
