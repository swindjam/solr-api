##Solr API
--------

Solr setup
-----

The solr setup is in docker, with the data and configsets all stored as a docker volume in the `solr` directory.
This will be started with the data stored in the repo for this demo purpose, although that obviously isn't how things should work for a production setup

In terms of the docker container, it sets up a `films` collection on startup of the container. 
As the config and the data is stored in the `solr` directory, this will work out of the box with no additional configuration.
The data should be returned by sending a query in the Solr admin UI which can be found here `http://localhost:8983/solr/#/films/query`