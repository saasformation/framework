#!/usr/bin/env bash

# Fail on error, undeclared variable substitution, pipe error
set -Eeuo pipefail

method="$1"
shift

SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )
export DOCKER_COMPOSE="docker compose -f $SCRIPT_DIR/../docker-compose.yml"

composer() {
  ${DOCKER_COMPOSE} run --remove-orphans --rm composer composer "$@"
}

test() {
  ${DOCKER_COMPOSE} run --remove-orphans --rm php-cli vendor/bin/phpstan
  ${DOCKER_COMPOSE} run --remove-orphans --rm php-cli vendor/bin/phpunit
}

case "$method" in
  composer)
    composer "$@"
    ;;
  test)
    test "$@"
    ;;
  *)
    echo "You must provide a method to execute [composer, test]"
esac