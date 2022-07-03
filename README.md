Solr API
--------
This project is a simple PHP API which requests data from a Solr instance.
The setup is all via Docker, to require minimal local dependencies and to be easily reproducable.


Solr setup
-----

The solr setup is in docker, with the data and configsets all stored as a docker volume in the `solr` directory.
This will be started with the data stored in the repo for this demo purpose, although that obviously isn't how things should work for a production setup

In terms of the docker container, it sets up a `films` collection on startup of the container. 
As the config and the data is stored in the `solr` directory, this will work out of the box with no additional configuration.
The data should be returned by sending a query in the Solr admin UI which can be found here `http://localhost:8983/solr/#/films/query`


PHP Setup
------

The PHP setup uses composer via docker to avoid needing to install PHP or composer locally.
The composer commands are akk run via `docker-compose-composer.yml`, which can be run with this command `docker-compose -f docker-compose-composer.yml run compose`


Running the Project
-------

To run the project, simply run `docker-compose up` in the root of the project.
This will then create a container for nginx, php-fpm and Solr.
The nginx server will then be available here `http://localhost:8080`

TODO
- PHP XDebug
- PHP Solarium client usage
- Nginx config fiddle