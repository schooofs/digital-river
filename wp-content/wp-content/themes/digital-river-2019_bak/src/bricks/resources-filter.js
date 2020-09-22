import * as drSelect from '../components/dr-select';
import * as ResourcesResults from './resources-results';

const filters = {
	topic: '',
	type: ''
};

let brickFilters;
let resourceTopicSelect;
let resourceTypeSelect;
let filterActionUrl;
let countActionUrl;
let initialised = false;

let _$;

export function init($) {
	_$ = $;

	brickFilters = document.querySelector('.brick-resources-filter');

	if (!brickFilters) {
		return;
	}

	filterActionUrl = brickFilters.dataset.filterAction;
	countActionUrl = brickFilters.dataset.countAction;

	resourceTopicSelect = document.getElementById('resource-topic');
	resourceTypeSelect = document.getElementById('resource-type');

	if (!initialised) {

		// Force counts and reload
		onFilterChange('', 'topic');

		initialised = true;
	}

	events();
}

function countResources() {
	_$.post({
		url: countActionUrl,
		dataType: 'json',
		data: filters,
		complete: res => {
			_$('.brick-resources-filter').replaceWith(res.responseText);

			// Reinitialise the filter brick
			init(_$);

			// Reset the value of the filter select
			resourceTopicSelect.value = filters.topic;
			resourceTypeSelect.value = filters.type;

			// Reinitialise the select elements
			drSelect.init(_$);
		}
	});
}

function events() {
	_$(resourceTopicSelect).on('change', e => onFilterChange(e.target.value, 'topic'));
	_$(resourceTypeSelect).on('change', e => onFilterChange(e.target.value, 'type'));
}

function onFilterChange(val, term) {
	brickFilters.classList.add('loading');
	filters[term] = val;
	dispatchFilters();
}

function dispatchFilters() {
	_$.post({
		url: filterActionUrl,
		dataType: 'json',
		data: filters,
		complete: res => {
			_$('.brick-resources-results').replaceWith(res.responseText);

			// Reinitialise the results brick
			ResourcesResults.init(_$);

			countResources();
		}
	});
}