require('./adm_main');
require('alpinejs');
require('./perfect-scrollbar/dist/perfect-scrollbar');
require('./waves');
require('./sidebarmenu');
require('./custom')
require('./bs-select/js/bootstrap-select');
require('./bs-select/css/bootstrap-select.css');
require('@yaireo/tagify/dist/tagify.css')

ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            'undo',
            'redo'
        ]
    },
    table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
    },
    language: 'en'
}
