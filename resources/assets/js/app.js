import Request from './http';
import Bootloader from './bootloader';
$.ajaxSetup({
  headers: {'X-CSRF-TOKEN': Security.csrfToken},
});

const lang = $('meta[name=AppContentLocale]').attr('content');
