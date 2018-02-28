$(document).on('knack-scene-render.any', function(event, page) {
	var launchTestButton = $('#launch-test-button'),
		editorButton = $('#editor-button'),
		errorMessage = $('#error-message');

	launchTestButton.off( 'click.launch-test' );
	errorMessage.hide();

	if (typeof Knack.getUserToken() !== 'undefined' ) {
		launchTestButton.removeAttr('disabled').show();
		$('#requires-login').hide();
		$('#register-login').hide();
		// Force logged-in user back to compatibility results
		if ( 0 === window.location.hash.indexOf('#account-details' ) ) {
			window.location.hash = '#compatibility-results';
		}
	} else {
		launchTestButton.hide();
		$('#requires-login').show();
		$('#register-login').removeAttr('disabled').show();
	}

	launchTestButton.on( 'click.launch-test', function(ev) {
		ev.stopPropagation();
		ev.preventDefault();
		editorButton.attr('disabled','disabled' ).hide();
		fetchNextTest();
	});

	function handleError(xhr) {
		Knack.hideSpinner();
		errorMessage.find('p').text(xhr.responseText);
		errorMessage.show();
	}

	function fetchNextTest() {
		launchTestButton.attr('disabled', 'disabled');
		launchTestButton.text('Creating (takes 5-10 seconds)...');
		var baseURL = 'https://api.knack.com/v1/pages/scene_1/views/view_1/records';
		var requestFilters = [
			{
			'field':'field_2',
			'operator':'is',
			'value':'unknown'
			}
		];
		var requestURL = baseURL + '?filters=' + encodeURIComponent(JSON.stringify(requestFilters));
		Knack.showSpinner();
		$.ajax({
			url: requestURL,
			type: "GET",
			beforeSend: function(xhr){
				xhr.setRequestHeader('Authorization', Knack.getUserToken() );
				xhr.setRequestHeader('X-Knack-Application-Id', Knack.application_id );
				xhr.setRequestHeader('content-type', 'application/json');
			},
		}).success(function(result) {
			var plugin     = result.records[Math.floor(Math.random() * result.records.length)];
			var pluginID   = plugin.id;
			var pluginSlug = plugin.field_1;
			$.ajax({
				url: '/launch-environment.php?plugins=' + pluginSlug,
				type: 'GET',
				cache: false
			}).success(function( sandboxUrl ){
				setTestingState(pluginID, pluginSlug, sandboxUrl);
			}).error(handleError);
		}).error(handleError);
	}

	function setTestingState(pluginID, slug, sandboxUrl) {
		var baseURL = 'https://api.knack.com/v1/pages/scene_1/views/view_1/records/';
		var requestURL = baseURL + pluginID;
		var requestData = {
			'field_2':'testing',
			'field_2_raw':'testing',
		};
		Knack.showSpinner();
		$.ajax({
			url: 'https://api.wordpress.org/plugins/info/1.0/' + slug + '.json',
			type: 'GET',
		}).success(function( plugin ){
			requestData['field_4'] = plugin['version'];
			$.ajax({
				url: requestURL,
				type: 'PUT',
				data: JSON.stringify(requestData),
				beforeSend: function(xhr){
					xhr.setRequestHeader('Authorization', Knack.getUserToken() );
					xhr.setRequestHeader('X-Knack-Application-Id', Knack.application_id );
					xhr.setRequestHeader('content-type', 'application/json');
				},
			}).success(function(result) {
				Knack.hideSpinner();
				launchTestButton.removeAttr('disabled');
				launchTestButton.text('Create New Test Environment');
				editorButton.removeAttr('disabled');
				editorButton.attr( 'href', sandboxUrl );
				editorButton.show();
				// Load the correct view
				window.location.hash = '#compatibility-results/edit-plugin/' + pluginID + '/';
			}).error(handleError);
		}).error(handleError);
	}

});
