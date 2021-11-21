<h1 align="center"><a href="https://api-platform.com"><img src="https://api-platform.com/logo-250x250.png" alt="API Platform"></a></h1>

API Platform is a next-generation web framework designed to easily create API-first projects without compromising extensibility
and flexibility:

The official project documentation is available **[on the API Platform website](https://api-platform.com)**.

API Platform embraces open web standards (OpenAPI, RDF/JSON-LD/Hydra, GraphQL, JSON:API, HAL, OAuth...) and the
[Linked Data](https://www.w3.org/standards/semanticweb/data) movement. Your API will automatically expose structured data
in Schema.org / JSON-LD. It means that your API Platform application is usable **out of the box** with technologies of
the semantic web.

It also means that **your SEO will be improved** because **[Google leverages these formats](https://developers.google.com/search/docs/guides/intro-structured-data)**.

Last but not least, the server component of API Platform is built on top of the [Symfony](https://symfony.com) framework,
while client components leverage [React](https://reactjs.org/) (a [Vue.js](https://vuejs.org/) flavor is also available).
It means that you can:

* Use **thousands of Symfony bundles and React components** with API Platform.
* Integrate API Platform in **any existing Symfony or React application**.
* Reuse **all your Symfony and React skills**, benefit of the incredible amount of documentation available.
* Enjoy the popular [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html) (used by default, but fully optional:
  you can use the data provider you want, including but not limited to MongoDB and Elasticsearch)

## Install

### The easy way

```shell
git clone https://github.com/meinder-a/api-platform-discover.git

cd api-platform-discover/api
composer install
cp .env .env.local
vim .env.local
php bin/console doctrine:migrations:migrate
php bin/console hautelook:fixtures:load

cd ../pwa
npm install
vim .env
npm run build
```

Setup a virtual host to `api-platform-discover/api/public` and `api-platform-discover/pwa/build`

You're done! :)

### The default way
[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution).

## Credits

Created by [Kévin Dunglas](https://dunglas.fr). Commercial support available at [Les-Tilleuls.coop](https://les-tilleuls.coop).
