$('.summernote_pt').summernote({
    lang: 'pt-BR',
    height: 400,
    cleaner:{
        action: 'both', 
        newline: '<br>',
        keepHtml: false,
        keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'],
        keepClasses: true,
        badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],
        badAttributes: ['style', 'start'],
        limitChars: false, 
        limitDisplay: 'both',
        limitStop: false
    }
});
$('.summernote_es').summernote({
    lang: 'es-ES',
    height: 400,
    cleaner:{
        action: 'both', 
        newline: '<br>',
        keepHtml: false,
        keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'],
        keepClasses: true,
        badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],
        badAttributes: ['style', 'start'],
        limitChars: false, 
        limitDisplay: 'both',
        limitStop: false
    }
});