
SCRIPT_DIR="$(dirname "$( readlink -f "${BASH_SOURCE[0]}" )")"

_error_message() {
    [ -n "$1" ] && {
        echo "$1" >&2
        command -v /bin/notify-send >/dev/null && notify-send -- "$1"
    }
}

_exit() {
    [ -n "$1" ] && _error_message "$1"
    exit 1
}

ROOT_DIR="${SCRIPT_DIR}"

WINDOW_NAME="users"

USER1_DIR="${ROOT_DIR}/user1"
USER2_DIR="${ROOT_DIR}/user2"
USER3_DIR="${ROOT_DIR}/user3"

[ -d "${USER1_DIR}" ] || mkdir -p "${USER1_DIR}" 
[ -d "${USER2_DIR}" ] || mkdir -p "${USER2_DIR}" 
[ -d "${USER3_DIR}" ] || mkdir -p "${USER3_DIR}" 

ensure_window()
{
    tmux has-session -t ":${WINDOW_NAME}.1" 2>/dev/null || create_window
}

create_window()
{
    tmux new-window -n "${WINDOW_NAME}" -d -c "${USER1_DIR}" -e "GNUPGHOME=${USER1_DIR}/.gnupg"
    tmux split-window -t "${WINDOW_NAME}.1" -c "${USER2_DIR}" -e "GNUPGHOME=${USER2_DIR}/.gnupg"
    tmux split-window -t "${WINDOW_NAME}.2" -c "${USER3_DIR}" -e "GNUPGHOME=${USER3_DIR}/.gnupg"
    tmux select-layout -t ":${WINDOW_NAME}" "even-vertical"
}

kill_window()
{
    tmux has-session -t ":${WINDOW_NAME}.1" 2>/dev/null && tmux kill-window -t ":${WINDOW_NAME}"
}

remove_dirs() {
    rm -rf "${USER1_DIR}"
    rm -rf "${USER2_DIR}"
    rm -rf "${USER3_DIR}"
}
