# BotMan WhatsApp Business On-Premise API Driver

BotMan driver to connect WhatsApp Business On-Premise with [BotMan](https://github.com/botman/botman)

## WhatsApp Business On-Premise API

Please read the official documentation at [Meta for Developer](https://developers.facebook.com/docs/whatsapp/on-premises)

## Installation & Setup

To install you need to run:

`composer require irwan-runtuwene/driver-whatsapp`

### Setup

#### To use the driver, you will need to set the following:

If you are using BotMan Studio, add the following entries to your .env file:

`WHATSAPP_PARTNER="https://YOUR-WABA-HOST"`

If you don't use BotMan Studio, add these lines to the $config array that you pass when you create the object from BotManFactory.

```
'whatsapp' => [
    'url' => 'https://YOUR-WABA-HOST',
    'token' => 'YOUR-WABA-AUTH-TOKEN',
]
```

## Feature List

- [x] Text Message

### TODO:
- [ ] Template Message
- [ ] Interactive Message
    - [ ] List
    - [ ] Button
    - [ ] Product
    - [ ] Product List
- [ ] Image Attachment
- [ ] Document Attachment
- [ ] Location Attachment
- [ ] Video Attachment

## Security Vulnerabilities

If you discover a security vulnerability within BotMan, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.

## License

BotMan is free software distributed under the terms of the MIT license.
 