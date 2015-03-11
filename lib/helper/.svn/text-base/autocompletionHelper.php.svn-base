<?php

/**
 * Create and display a text input with autocompletion and possible update of a combo list when choosing a value from the autocompleter
 *
 * @param form form The current form object
 * @param string name The name of the generated input field
 * @param string value Default value for input field
 * @param string url The action to call for autocompletion
 * @param array input tag options. (size, autocomplete, etc...)
 * @param array completion options. (use_style, etc...)
 * @param string div_to_update (optional) The div where the combo list will be regenerated
 * @param string form_field_name (optional) The name of the combo list
 * @param string action_to_call (optional) The action to call for regenerating the combo list
 *
 * Example:
 * <?php echo rm_input_autocomplete($form, 'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), 
 *                                  array('autocomplete' => 'on'), array('use_style' => true), 
 *                                  'div_depart_lieu', 'depart_autre_lieu', url_for('outils/listLocationsFromCityName')); ?>
 *
 * @return string input field tag, div for completion results, and
 *                 auto complete javascript tags
 * 
 * @author Kevin Meresse
 */
function rm_input_autocomplete($form, $name, $value, $url, $tag_options = array(), $completion_options = array(), $div_to_update = '', $form_field_name = '', $action_to_call = '', $template = '') {
	// We need ui.autocomplete for this trick
        jq_add_plugins_by_name(array("autocomplete"));

	$tag_options = _convert_options($tag_options);
	$comp_options = _convert_options($completion_options);

	// Convert to JSON parameters
	$jsonOptions = '';
	foreach ($comp_options as $key => $val)
	{
		if ($jsonOptions!='')
		{
			$jsonOptions .= ', ';
		}
		switch($key) {
			case 'formatItem':
			case 'formatResult':
				$jsonOptions .= "$key: " . $val;
				break;
			default:
				$jsonOptions .= "$key: " . json_encode($val);
				break;
		}
	}

	// Get Stylesheet
	$context = sfContext::getInstance();
	$response = $context->getResponse();
	$comp_options = _convert_options($completion_options);
	if (isset($comp_options['use_style']) && $comp_options['use_style'] == true)
	{
		$response->addStylesheet(sfConfig::get('sf_jquery_web_dir').'/css/JqueryAutocomplete');
	}

	// Get Id from name attribute
	$tag_options['id'] = get_id_from_name(isset($tag_options['id']) ? $tag_options['id'] : $name);

	// Add input form
	$javascript  = tag('input', array_merge(array('type' => 'text', 'name' => $name, 'value' => $value), _convert_options($tag_options)));
        
        // Javascript to update a dropdown list from the city selected
        $update_javascript = '';
        if ($div_to_update != null && $div_to_update != '') {
            $update_javascript .= '.result(
                function(event, data, formatted){
                    '.jq_remote_function(array(
                            'update' => $div_to_update,
                            'url' => $action_to_call,
                            'with' => "'value=' + formatted + '&listToUpdateName=".$form[$form_field_name]->renderName()."&listToUpdateId=".$form[$form_field_name]->renderId()."&template=".$template."'")).'
                })';
        }
        
	// Calc JQuery Javascript code
	//$autocomplete_script = sprintf('$("#%s").autocomplete("%s",{ %s	});',$name,$url,$jsonOptions);
        $autocomplete_script = sprintf('$("#%s").autocomplete("%s",{ %s	})%s;', $tag_options['id'], $url, $jsonOptions, $update_javascript);
	$javascript .=	javascript_tag($autocomplete_script);

	return $javascript;
}

?>
