#!/usr/bin/env bash

set -e

composer install --no-dev
curl -L https://raw.githubusercontent.com/fumikito/wp-readme/master/wp-readme.php | php

rm -rf {tests,assets,bin,node_modules,.git,phpunit.xml.dist,.gitignore,.travis.yml,phpunit.xml.dist,README.md,composer.lock,package-lock.json,.phpcs.xml.dist.travis.yml}
sed -i -e "s/nightly/${TRAVIS_TAG}/" readme.txt
sed -i -e "s/nightly/${TRAVIS_TAG}/" $(basename $TRAVIS_REPO_SLUG).php
