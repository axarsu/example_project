{extends "theme1.tpl"}
{block "content"}
  <div class="contacts-block">
  </div>
    {include "partials/questions.tpl"}
{/block}
{block "scripts" append}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script>
    jQuery(document).ready(function () {
      jQuery('#first_name').focus();

      var form = jQuery('#contacts').validate({
        errorClass: 'invalid-input',
        validClass: 'valid-input',
        errorPlacement: function (error, element) {
          var p = jQuery(element).parent();
          error.appendTo(p);
        },
      });

      jQuery('#submit_button').on('click', function () {
        if (form.form()) {
          jQuery('#loader').show();

          setTimeout(function () {
            jQuery('#contacts').submit();
          }, 500);
        }
      });

      jQuery('#attachment').on('change', function () {
        if (typeof jQuery('#attachment')[0].files[0] !== 'undefined') {
          if (jQuery('#attachment')[0].files[0].size > 10485760) {
            jQuery('.contacts_block__title').html('Maximum total file size: 10MB');
            jQuery('#attachment').val('');
            alert('Selected file size is larger than 10MB. Please try another one!');
          } else {
            jQuery('.contacts_block__title').html(jQuery('#attachment').val());
          }
        }
      });
    });
  </script>
{/block}