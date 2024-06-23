#!/bin/bash

set -x

SCRIPT_DIR="$(dirname "$( readlink -f "${BASH_SOURCE[0]}" )")"
CMD=("bash" "${SCRIPT_DIR}/start_server.sh")

if [ "${TMUX}" ];
then
    KEYS=$( printf "%s " "${CMD[@]}")

    tmux split-window -l 10 -c "${SCRIPT_DIR}"
    tmux send-keys "${KEYS}" C-m
    tmux select-pane -t "${TMUX_PANE}"
else 
    set -x
    "${CMD[@]}"
fi
