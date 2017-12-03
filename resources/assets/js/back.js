
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

require('bootstrap-sass');
require('tinymce');
require('bootstrap-select');

require('ajax-bootstrap-select');

tinymce.init({
    selector:'textarea',
    plugins: "image imagetools",
    height : "560",
    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
    automatic_uploads: true,
    convert_urls : false,
    images_upload_handler: function (blobInfo, success, failure) {
        let formData = new FormData();

        formData.append('file', blobInfo.blob(), 'image');

        axios.post('/admin/tinymce/upload', formData)
            .then(function (response) {
                success(response.data.location);
            })
            .catch(function (error) {
                failure('HTTP Error: ' + error);
            })
    }
});

require('./back/icon');
require('./back/select');