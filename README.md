# Api.ai Symfony Bundle

This is an unoficial Symfony bundle for Api.ai based on iboldurev/api-ai-php
Api.ai PHP SDK.

## Install

Install this bundle using composer:
```console
$ composer require lpstudio/apiaibundle
```

Then register your bundle in the AppKernel.php:
```php
new LPStudio/ApiAIBundle/ApiAIBundle()
```

## Configuration

Add these line to your app/config.yml:
```yml
api.ai:
    access_token: 'YOUR_ACCESS_TOKEN'
```
And replace YOUR_ACCESS_TOKEN with your Api.ai agent access token (use the dev
access token in dev environment).