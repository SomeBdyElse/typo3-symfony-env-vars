# Symfony Environment Variables

This package allows to use the [Symfony environment variable processor](https://symfony.com/doc/current/configuration/env_var_processors.html) in TYPO3 configuration files.

## Sample usage

```yaml
# public/typo3conf/ext/mysite/Configuration/Services.yaml
parameters:
  default_host: www.example.com.test
  env(TYPO3_ENABLE_LANGUAGE_DE): true
  env(TYPO3_ENABLE_LANGUAGE_FR): false
```

```yaml
# config/sites/mysite/config.yaml
base: 'https://%env(default:default_host:TYPO3_HOST)%/'
languages:
  -
    title: 'de'
    languageId: 1
    enabled: '%env(bool:TYPO3_ENABLE_LANGUAGE_DE)%'
    …
  -
    title: 'fr'
    languageId: 2
    enabled: '%env(bool:TYPO3_ENABLE_LANGUAGE_FR)%'
    …
```
