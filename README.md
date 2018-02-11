# Alba Iulia, Smart City
Website de prezentare soluții Smart City, Alba Iulia

# Local development

## Stack
`roots.io` based stack:
- [Trellis](https://github.com/roots/trellis)
- [Bedrock](https://github.com/roots/bedrock)
- [Sage](https://github.com/roots/sage)

## Setup

```
$> git clone https://github.com/civictechro/website-alba-iulia-smart-city/
$> cd website-alba-iulia-smart-city/trellis/group_vars/development/
$> cp dist.vault.yml vault.yml
```
You can now edit `vault.yml` if you want different credentials, or if you want to use a different URL for dev. Note that if you change the canonical URL in `vault.yml` you also need to change the url in `site/web/app/themes/smart-city/resources/assets/config.json`.

All there's left now is starting vagrant. If it's the first time, trellis will also install all of the dependencies and configure the environment for you. 

```
$> vagrant up
```

## Working on the theme

The `Smart City` theme is a modified version of [Sage](https://github.com/roots/sage). 

Before anything else, you need to make sure vagrant is running:

```
$> cd trellis/
$> vagrant up
```

If you just cloned the repo, you need to make sure you install the dependencies.

```
$> cd site/web/app/themes/smart-city/
$> yarn
```

To build the assets for development and run browsersync so you have live reload for changes during dev:

```
$> yarn start run
```

