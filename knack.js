$(document).on('knack-scene-render.any', function(event, page) {

	if (typeof Knack.getUserToken() !== 'undefined' ) {
		$('#launch-test-button').prop('disabled',false);
	}

	$('#launch-test-button').on( 'click', function(ev) {
		ev.stopPropagation();
		ev.preventDefault();
		fetchNextTest();
	});

	function fetchNextTest() {
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
			method: "GET",
			beforeSend: function(xhr){
				xhr.setRequestHeader('Authorization', Knack.getUserToken() );
				xhr.setRequestHeader('X-Knack-Application-Id', Knack.application_id );
				xhr.setRequestHeader('content-type', 'application/json');
			},
		})
		.done(function(result) {
			Knack.hideSpinner();
			var pluginID   = result.records[0].id;
			var pluginSlug = result.records[0].field_1;
			var sandbox_base_link = 'http://wpsandbox.pro/create?src=spotless-dove&key=jkiaIH00a5zATo0m&url=wp-admin/plugins.php&plugins=';
			window.open( sandbox_base_link + pluginSlug );
			setTestingState(pluginID, pluginSlug);
		});
	}

	function setTestingState(pluginID, slug) {
		var baseURL = 'https://api.knack.com/v1/pages/scene_1/views/view_1/records/';
		var requestURL = baseURL + pluginID;
		var requestData = {
			'field_2':'testing',
			'field_2_raw':'testing',
		};
		Knack.showSpinner();
		$.ajax({
			url: requestURL,
			method: "PUT",
			data: JSON.stringify(requestData),
			beforeSend: function(xhr){
				xhr.setRequestHeader('Authorization', Knack.getUserToken() );
				xhr.setRequestHeader('X-Knack-Application-Id', Knack.application_id );
				xhr.setRequestHeader('content-type', 'application/json');
			},
		})
		.done(function(result) {
			Knack.hideSpinner();
		});
	}

});
