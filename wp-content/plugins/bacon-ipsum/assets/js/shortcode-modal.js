
jQuery(function($){
	var selection = false;
	var bacon_ipsumShortcodePanel = $('#bacon-ipsum-shortcode-panel-tmpl').html();

	$('body').append(bacon_ipsumShortcodePanel);
	$('.media-modal-backdrop, .media-modal-close').on('click', function(){
		bacon_ipsum_hideModal();
	})
	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			bacon_ipsum_hideModal();
		}
	});

	// show modal
	$('#bacon-ipsum-shortcodeinsert').click(function(){

		if($(this).data('shortcode')){
			window.send_to_editor('['+$(this).data('shortcode')+']');
			return;
		}
				
		// autoload item
		var autoload = $('.bacon-ipsum-autoload');
		if(autoload.length){
			bacon_ipsum_loadtemplate(autoload.data('shortcode'));
		}
		$('#bacon-ipsum-category-selector').on('change', function(){
			bacon_ipsum_loadtemplate('');
			$('.bacon-ipsum-elements-selector').hide();
			$('#bacon-ipsum-elements-selector-'+this.value).show().val('');
		});

		$('.bacon-ipsum-elements-selector').on('change', function(){
			bacon_ipsum_loadtemplate(this.value);
		});

		if(typeof tinyMCE !== 'undefined'){
			if(tinyMCE.activeEditor !== null){
				selection = tinyMCE.activeEditor.selection.getContent();
			}else{
				selection = false;
			}
		}else{
			selection = false;
		}
		if(selection.length > 0){
			$('#bacon-ipsum-content').html(selection);
		}
		$('#bacon-ipsum-shortcode-panel').show();
	});
	$('#bacon-ipsum-insert-shortcode').on('click', function(){
		bacon_ipsum_sendCode();
	})
	// modal tabs
	$('#bacon-ipsum-shortcode-config').on('click', '.bacon-ipsum-shortcode-config-nav li a', function(){
		$('.bacon-ipsum-shortcode-config-nav li').removeClass('current');
		$('.group').hide();
		$(''+$(this).attr('href')+'').show();
		$(this).parent().addClass('current');
		return false;
	});


});

function bacon_ipsum_loadtemplate(shortcode){
	var target = jQuery('#bacon-ipsum-shortcode-config');
	if(shortcode.length <= 0){
		target.html('');
	}
	target.html(jQuery('#bacon-ipsum-'+shortcode+'-config-tmpl').html());
}

function bacon_ipsum_sendCode(){

	var shortcode = jQuery('#bacon-ipsum-shortcodekey').val(),
		output = '['+shortcode,
		ctype = '',
		fields = {};
	
	if(shortcode.length <= 0){return; }

	if(jQuery('#bacon-ipsum-shortcodetype').val() === '2'){
		ctype = jQuery('#bacon-ipsum-default-content').val()+'[/'+shortcode+']';
	}
	jQuery('#bacon-ipsum-shortcode-config input,#bacon-ipsum-shortcode-config select,#bacon-ipsum-shortcode-config textarea').not('.configexclude').each(function(){
		if(this.value){
			// see if its a checkbox
			var thisinput = jQuery(this),
				attname = this.name;

			if(thisinput.prop('type') == 'checkbox'){
				if(!thisinput.prop('checked')){
					return;
				}
			}
			if(thisinput.prop('type') == 'radio'){
				if(!thisinput.prop('checked')){
					return;
				}
			}

			if(attname.indexOf('[') > -1){
				attname = attname.split('[')[0];
				var newloop = {};
				newloop[attname] = this.value;
				if(!fields[attname]){
					fields[attname] = [];
				}
				fields[attname].push(newloop);
			}else{
				var newfield = {};
				fields[attname] = this.value;
			}
		}
	});
	for( var field in fields){
		if(typeof fields[field] == 'object'){
			for(i=0;i<fields[field].length; i++){
				output += ' '+field+'_'+(i+1)+'="'+fields[field][i][field]+'"';
			}
		}else{
			output += ' '+field+'="'+fields[field]+'"';
		}
	}

	bacon_ipsum_hideModal();

        if(shortcode == "baconipsum") {
       		jQuery.getJSON('https://baconipsum.com/api/?callback=?', {
        		'type': fields['bacon_type'],
            		'start-with-lorem': (fields['start'] == 'yes') ? 1 : 0,
			'sentences' : (fields['format'] == 'sentences') ? fields['amount'] : 0,
			'paras' : (fields['format'] == 'paragraphs') ? fields['amount'] : 0,

		}, function(data) {
               		for (var i = 0; i < data.length; i++)
				window.send_to_editor(data[i] +  "\n\n");
				//window.send_to_editor("<p>"  +data[i]+  "</p>\n\n");
		});
	}

        else {
	  	window.send_to_editor(output+']'+ctype);
	}

}
function bacon_ipsum_hideModal(){
	jQuery('#bacon-ipsum-shortcode-panel').hide();
	bacon_ipsum_loadtemplate('');
	jQuery('#bacon-ipsum-elements-selector').show();
	jQuery('.bacon-ipsum-elements-selector').val('');	
	jQuery('#bacon-ipsum-category-selector').val('');
}

