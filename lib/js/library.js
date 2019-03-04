/*
* funcao para ocultar os campos
*/

function initTinymce(){
      tinymce.init({
                  selector: "textarea",
                  height : 300,
                  plugins: [
                             "advlist autolink autosave link image lists charmap hr pagebreak spellchecker",
                             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                             "table contextmenu directionality template textcolor paste textcolor preview colorpicker textpattern"
                  ],
     
                  toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontsizeselect",
                  toolbar2: "cut copy paste | searchreplace | blockquote | undo redo | code | insertdatetime preview | forecolor",
                  toolbar3: "hr removeformat | charmap | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking pagebreak restoredraft",
                 
                  language: "pt_BR",
     
                  menubar: false,
                  toolbar_items_size: 'small'
      });
}

initTinymce();


