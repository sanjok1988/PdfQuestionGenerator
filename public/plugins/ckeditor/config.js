/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	// config.language = 'fr';
// 	// config.uiColor = '#AADC6E';
// };
CKEDITOR.editorConfig = function(config) {

    config.filebrowserBrowseUrl = '../plugins/kcfinder/browse.php?opener=ckeditor&type=files';

    config.filebrowserImageBrowseUrl = '../plugins/kcfinder/browse.php?opener=ckeditor&type=images';

    config.filebrowserFlashBrowseUrl = '../plugins/kcfinder/browse.php?opener=ckeditor&type=flash';

    config.filebrowserUploadUrl = '../plugins/kcfinder/upload.php?opener=ckeditor&type=files';

    config.filebrowserImageUploadUrl = '../plugins/kcfinder/upload.php?opener=ckeditor&type=images';

    config.filebrowserFlashUploadUrl = '../plugins/kcfinder/upload.php?opener=ckeditor&type=flash';


};
// CKEDITOR.replace( 'editor1', {
//     filebrowserBrowseUrl : "{{ asset('/plugins/kcfinder/browse.php?opener=ckeditor&type=files')}}",
//     filebrowserImageBrowseUrl : "{{ asset('/plugins/kcfinder/browse.php?opener=ckeditor&type=images')}}",
//     filebrowserFlashBrowseUrl :"{{ asset('/plugins/kcfinder/browse.php?opener=ckeditor&type=flash')}}",
//     filebrowserUploadUrl : "{{ asset('/plugins/kcfinder/upload.php?opener=ckeditor&type=files')}}",
//     filebrowserImageUploadUrl : "{{ asset('/plugins/kcfinder/upload.php?opener=ckeditor&type=images')}}",
//     filebrowserFlashUploadUrl :"{{ asset('/plugins/kcfinder/upload.php?opener=ckeditor&type=flash')}}"
// });