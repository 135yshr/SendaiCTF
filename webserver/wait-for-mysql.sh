#!/bin/bash
# wait-for-mysql.sh

set -e

host="$1"
shift
cmd="$@"

until mysqladmin ping -h "$host"; do
  >&2 echo "mysql is unavailable - sleeping"
  sleep 3
done

exec $cmd
