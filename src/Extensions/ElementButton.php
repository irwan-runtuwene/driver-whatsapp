<?php

namespace BotMan\Drivers\Whatsapp\Extensions;

class ElementButton
{
    /** @var string */
    protected $title;

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
    public static function create($title)
    {
        return new static($title);
    }

    /**
     * @param  string  $title
     */
    public function __construct($title)
    {
        $this->title = $title;
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
     * @return $this
     */
    public function disableShare()
    {
        $this->webview_share_button = 'HIDE';

        return $this;
    }

    /**
     * @return $this
     */
    public function removeHeightRatio()
    {
        $this->webview_height_ratio = null;

        return $this;
    }


    /**
     * Optional. The message that you wish the recipient of the share to see,
     * if it is different from the one this button is attached to.
     * The format follows that used in Send API, but must be a generic template with up to one URL button.
     *
     * @param  GenericTemplate  $shareContents
     * @return $this
     */
    public function shareContents($shareContents)
    {
        $this->shareContents = $shareContents;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $buttonArray = [
            'type' => $this->type,
            'title' => $this->title
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
