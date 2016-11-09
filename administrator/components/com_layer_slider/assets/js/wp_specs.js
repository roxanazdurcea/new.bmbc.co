imgpath = "";
_style = null;
_transition = null;

function openModal(a){
  window.imgInput = jQuery(a).parent().prev();
  window.imgNode = jQuery(a).children().children();
  SqueezeBox.open('index.php?option=com_media&view=images&tmpl=component&folder='+imgpath+'&e_name=image',{handler:'iframe',size:{x:800,y:600}});
}

function jInsertEditorText(tag, name) {
  var $tag = jQuery(tag);
  imgpath = $tag.attr('src').match(/images\/?(.*)\//)[1] || "";
  imgInput.val(joomla_base_url+$tag.attr('src'));
  imgNode.attr('src', joomla_base_url+$tag.attr('src'));
  LayerSlider.willGeneratePreview( jQuery('.ls-box.active').index() );
}

ajaxsaveurl = 'index.php?option=com_layer_slider&view=slider&task=save_slider';

(function($, undefined) {

  $.fn.inputsToObj = function() {
    var obj = {};
    this.find(':input').each(function() {
      obj[this.name] = this.type == 'checkbox' ? this.checked : this.value;
    });
    return obj;
  };

  $.fn.objToInputs = function(obj) {
    if (obj == null) return alert("There is nothing to paste!");
    var $input, prop;
    for (prop in obj) {
      $input = this.find('[name="'+prop+'"]');
      if (typeof obj[prop] == 'boolean') {
        if ($input[0].checked != obj[prop]) $input.next().click();
      }
      else $input.val(obj[prop]);
    }
    $input.trigger("keyup");
  };

})(jQuery);
