# README

El microservicio gustos_ms hace parte de la aplicación dop-app la cual se desrraollo en:

* Ruby version  2.3
* Rails version 5.1.6
* Postgresql 9.5.12

Para su despliegue es necesario instalar:

* Docker
* Docker-compose

Para su despliegue use los siguientes comandos:

``` bash
gustos_ms$ docker-compose build
gustos_ms$ docker-compose run --rm gustos_ms rails db:create
gustos_ms$ docker-compose run --rm gustos_ms rails db:migrate
gustos_ms$ docker-compose up
```

El funcionamiento se puede encontar en el archivo descriptor (api.yaml)
