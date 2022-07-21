<?php

namespace BotMan\Drivers\Whatsapp\Extensions;

class ElementButton
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $id;

    /** @var string */
    protected $type = self::TYPE_REPLY;

    /** @var string */
    protected $url;

    /** @var string */
    protected $fallback_url;

    /** @var string */
    protected $payload;

    /** @var string */
    protected $webview_share_button;

    /** @var bool */
    protected $messenger_extensions = false;

    /** @var GenericTemplate */
    protected $shareContents;

    const TYPE_REPLY = 'reply';

    /**
     * @param  string  $title
     * @return static
     */
    public static function create($id, $title)
    {
        return new static($id, $title);
    }

    /**
     * @param  string  $title
     */
    public function __construct($id, $title)
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * Set the button URL.
     *
     * @param  string  $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the button type.
     *
     * @param  string  $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param $payload
     * @return $this
     */
    public function payload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @param  string  $fallback_url
     * @return $this
     */
    public function fallbackUrl($fallback_url)
    {
        $this->fallback_url = $fallback_url;

        return $this;
    }

    /**
     * enable messenger extensions.
     *
     * @return $this
     */
    public function enableExtensions()
    {
        $this->messenger_extensions = true;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $buttonArray = [
            'type' => $this->type,
            'reply' => [
                'id' => $this->id,
                'title' => $this->title,
            ],
        ];

        return $buttonArray;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
