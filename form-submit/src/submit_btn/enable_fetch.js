
function _initFetch()
{
    document.body.querySelectorAll('form').forEach((form) => {
        // console.log('_form', form);

        // https://developer.mozilla.org/en-US/docs/Web/API/HTMLFormElement/formdata_event
        // https://hidde.blog/form-events-when-submitting-with-keyboard/
        // https://html.spec.whatwg.org/#default-button
        // https://html.spec.whatwg.org/#implicit-submission
        // https://html.spec.whatwg.org/#selector-default 
        // form.addEventListener('formdata', (event) => {
        //     console.log('formdata event fired', form);
        //     console.log('event.submitter', event.submitter);
        //     console.dir(event)

        //     formdata = event.formData;

        //     formdata.set('_fetch_formdata_event', 'set_by_formdata_event');
        // });
        form.submit = () => {
            console.log('submit() called');
            fetchFormSubmit(form, {});
        }

        form.addEventListener('submit', (event) => {
            console.log('event.submitter', event.submitter);
            console.log('form._submitter', form._submitter);
            const submitter = event.submitter || form._submitter || null;

            event.preventDefault();
            fetchFormSubmit(form, {}, submitter);
        });
    });
}


function fetchFormSubmit(form, options, submitter) {
    console.log('fetchFormSubmit', form);
    // return;
    var url = form.getAttribute('action');
    var formData = new FormData(form, submitter);

    formData.set('__fetch', true);

    return fetchPromise = fetch(url, {
        method: "post",
        body: formData
    })
    .then((response) => response.text())
    .then((responseText) => {
        const iframe = document.getElementById('form_response_container');
        iframe.contentWindow.document.body.innerHTML = responseText;
        // alert(responseText)
    })
};

document.addEventListener('DOMContentLoaded', _initFetch);
