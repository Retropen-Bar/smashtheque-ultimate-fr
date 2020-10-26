#!/usr/bin/env bash

set -e
set -x

# make sure the .htaccess exists (if not, Docker will create a folder instead)
mkdir -p ./data/wordpress
touch ./data/wordpress/.htaccess

# start Docker
docker-compose up
