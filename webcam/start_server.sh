#!/bin/bash
command -v docker >/dev/null 2>&1 || { echo >&2 "Docker not installed"; exit 1; }

SCRIPT_DIR="$( dirname "$( readlink -f "${BASH_SOURCE[0]}" )")";

echo $SCRIPT_DIR

LOCAL_PORT="${1:-8080}"

exec docker container run \
    --rm \
    -v "${SCRIPT_DIR}/src":/app \
    -p "${LOCAL_PORT}":8000 \
    php:8.1 \
    php -S 0.0.0.0:8000 -t /app
