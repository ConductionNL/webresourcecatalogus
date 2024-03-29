# Web Resource Catalogus
[![StyleCI](https://github.styleci.io/repos/206145646/shield?branch=master)](https://github.styleci.io/repos/206145646?branch=master)
[![Docker Image CI](https://github.com/ConductionNL/webresourcecatalogus/workflows/Docker%20Image%20CI/badge.svg?branch=master)](https://github.com/ConductionNL/webresourcecatalogus/actions?query=workflow%3A"Docker+Image+CI")
[![Artifacthub](https://img.shields.io/endpoint?url=https://artifacthub.io/badge/repository/webresourcecatalogus)](https://artifacthub.io/packages/helm/webresourcecatalogus/webresourcecatalogus)
[![BCH compliance](https://bettercodehub.com/edge/badge/ConductionNL/webresourcecatalogus?branch=master)](https://bettercodehub.com/)
[![Componenten Catalogus](https://img.shields.io/badge/vng--componentencatalogus-posted-green)](https://componentencatalogus.commonground.nl/componenten/12?)
[![Status badge](https://shields.api-test.nl/endpoint.svg?style=for-the-badge&url=https%3A//api-test.nl/api/v1/provider-latest-badge/7eddc6ff-646a-4c1a-8c76-4fd926bbd25e/)](https://api-test.nl/server/4/3c7a9096-6a1d-43cd-89fc-e850296d4f9c/7eddc6ff-646a-4c1a-8c76-4fd926bbd25e/latest/)

Description
----
De Web Resource Catalogus (WRC) bevat de resources die nodig zijn voor het draaien van een applicatie zoals sjablonen, routing, menu’s en afbeeldingen. Het heeft hierbij de doelstelling om te fungeren als een “headless CMS” ofwel een CMS als API, die losstaat van enige vorm van weergave. Voor het bewerken van de CMS content leunt het WRC dan ook op het Dashboard (een implementatie van de Proto Applicatie), en het fungeert zelf als een bron voor een applicatie.

Door het gescheiden houden van opslag en bewerking, is het mogelijk om vanuit één dashboard de inhoud van meerdere applicaties te beheren. Heel praktisch en levert ook meer overzicht op, zo zou een sjabloon kunnen worden gebruikt in verschillende applicaties en websites. Dit is bijvoorbeeld handig bij algemene informatie of FAQ’s.

Een extra handigheid van het WRC is dat het meertaligheid op resources ondersteunt en dat maakt het mogelijk om content in meerdere talen aan te maken en te beheren. Het maakt tevens inzichtelijk welke content al wel en welke content nog niet vertaald is. Waarmee compliancy aan de WCAG norm voor tweetaligheid kan worden opgevolgd.

Met betrekking tot vormgeving biedt het WRC twee belangrijke functionaliteiten aan applicaties. Om te beginnen kunnen templates worden “verlengd en uitgebreid”. Dat betekent bijvoorbeeld dat een applicatie gebruik zou kunnen maken van NL Design, maar hier via het WRC een eigen smaak aan toe kan voegen. Doordat het WRC kan delen tussen applicaties, is het hiermee voor een organisatie tevens mogelijk om één consistente huisstijl te voeren voor meerdere applicaties. Daarnaast biedt het WRC een mogelijkheid tot CDN, ofwel het verplaatsen van statische content van een applicatie naar een externe bron. Hiermee wordt het dataverkeer op een applicatie zelf lager en daarmee sneller. Het betekent ook dat op applicatie niveau, logica en statische content uit elkaar kunnen worden getrokken en fysiek op andere (gespecialiseerde) machines kunnen worden geplaatst.

Additional Information
----

- [Contributing](CONTRIBUTING.md)
- [ChangeLogs](CHANGELOG.md)
- [RoadMap](ROADMAP.md)
- [Security](SECURITY.md)
- [Licence](LICENSE.md)


Installation
----
We differentiate between two way's of installing this component, a local installation as part of the provided developers toolkit or an [helm](https://helm.sh/) installation on an development or production environment.

#### Local installation
First make sure you have [docker desktop](https://www.docker.com/products/docker-desktop) running on your computer. Then clone the repository to a directory on your local machine through a [git command](https://github.com/git-guides/git-clone) or [git kraken](https://www.gitkraken.com) (ui for git). If successful you can now navigate to the directory of your cloned repository in a command prompt and execute docker-compose up.
```CLI
$ docker-compose up
```
This will build the docker image and run the used containers and when seeing the log from the php container: "NOTICE: ready to handle connections", u are ready to view the documentation at localhost on your preferred browser.

#### Instalation on Kubernetes or Haven
As a haven compliant commonground component this component is installable on kubernetes trough helm. The helm files can be found in the api/helm folder. For installing this component trough helm simply open your (still) favorite command line interface and run
```CLI
$ helm install [name] ./api/helm --kubeconfig kubeconfig.yaml --namespace [name] --set settings.env=prod,settings.debug=0,settings.cache=1
```
For an in depth installation guide you can refer to the [installation guide](/api/helm) contained with the helm files, it also contains a short tutorial on getting your cluster ready to expose your installation to the world

Standards
----

This component adheres to international, national and local standards (in that order), notable standards are:

- Any applicable [W3C](https://www.w3.org) standard, including but not limited to [rest](https://www.w3.org/2001/sw/wiki/REST), [JSON-LD](https://www.w3.org/TR/json-ld11/) and [WEBSUB](https://www.w3.org/TR/websub/)
- Any applicable [schema](https://schema.org/) standard
- [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.0.md)
- [GAIA-X](https://www.data-infrastructure.eu/GAIAX/Navigation/EN/Home/home.html)
- [Publiccode](https://docs.italia.it/italia/developers-italia/publiccodeyml-en/en/master/index.html), see the [publiccode](api/public/schema/publiccode.yaml) for further information
- [Forum Stanaardisatie](https://www.forumstandaardisatie.nl/open-standaarden)
- [NL API Strategie](https://docs.geostandaarden.nl/api/API-Strategie/)
- [Common Ground Realisatieprincipes](https://componentencatalogus.commonground.nl/20190130_-_Common_Ground_-_Realisatieprincipes.pdf)
- [Haven](https://haven.commonground.nl/docs/de-standaard)
- [NLX](https://docs.nlx.io/understanding-the-basics/introduction)
- [Standard for Public Code](https://standard.publiccode.net/), see the [compliancy scan](publiccode.md) for further information.

This component is based on the following [schema.org](https://schema.org) sources:
- [Address](https://schema.org/PostalAddress)
- [Person](https://schema.org/Person)

Developers toolkit and technical information
----
You can find the data model, OAS documentation and other helpfull developers material like a  postman collection under api/public/schema, development support is provided trough the [samenorganiseren slack channel](https://join.slack.com/t/samenorganiseren/shared_invite/zt-dex1d7sk-wy11sKYWCF0qQYjJHSMW5Q).

Couple of quick tips when you start developing
- If you not yet have setup the component locally read the Tutorial for setting up your local environment.
- You can find the other components on [Github](https://github.com/ConductionNL).
- Take a look at the [commonground componenten catalogus](https://componentencatalogus.commonground.nl/componenten?) to prevent development collitions.
- Use [Commongroun.conduction.nl](https://commonground.conduction.nl/) for easy deployment of test environments to deploy your development to.
- For information on how to work with the component you can refer to the tutorial [here](TUTORIAL.md).


Contributing
----
First of al please read the [Contributing](CONTRIBUTING.md) guideline's ;)

But most imporantly, welcome! We strife to keep an active community at [commonground.nl](https://commonground.nl/), please drop by and tell is what you are thinking about so that we can help you along.


Credits
----
Information about the authors of this component can be found [here](AUTHORS.md)

Copyright © [Utrecht](https://www.utrecht.nl/) 2019
