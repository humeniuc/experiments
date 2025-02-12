
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

USER1_DIR="${ROOT_DIR}/user1"
USER2_DIR="${ROOT_DIR}/user2"
USER3_DIR="${ROOT_DIR}/user3"

USER1_SESS="gpg_sess_1"
USER2_SESS="gpg_sess_2"
USER3_SESS="gpg_sess_3"

[ -d "${USER1_DIR}" ] || mkdir -p "${USER1_DIR}" 
[ -d "${USER2_DIR}" ] || mkdir -p "${USER2_DIR}" 
[ -d "${USER3_DIR}" ] || mkdir -p "${USER3_DIR}" 

ensure_tmux_sessions() {
    tmux has-session -t "${USER1_SESS}" 2>/dev/null || tmux new-session -s "${USER1_SESS}" -d -c "${USER1_DIR}" -e "GNUPGHOME=${USER1_DIR}/.gnupg"
    tmux has-session -t "${USER2_SESS}" 2>/dev/null || tmux new-session -s "${USER2_SESS}" -d -c "${USER2_DIR}" -e "GNUPGHOME=${USER2_DIR}/.gnupg"
    tmux has-session -t "${USER3_SESS}" 2>/dev/null || tmux new-session -s "${USER3_SESS}" -d -c "${USER3_DIR}" -e "GNUPGHOME=${USER3_DIR}/.gnupg"
}

kill_tmux_sessions() {
    tmux has-session -t "${USER1_SESS}" 2>/dev/null && tmux kill-session -t "${USER1_SESS}"
    tmux has-session -t "${USER2_SESS}" 2>/dev/null && tmux kill-session -t "${USER2_SESS}"
    tmux has-session -t "${USER3_SESS}" 2>/dev/null && tmux kill-session -t "${USER3_SESS}"
}
