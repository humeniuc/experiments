#!/bin/bash
SCRIPT_DIR="$(dirname "$( readlink -f "${BASH_SOURCE[0]}" )")"
source "${SCRIPT_DIR}/common.sh"

ensure_tmux_sessions
