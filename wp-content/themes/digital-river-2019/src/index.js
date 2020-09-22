/**
 * This file is the main entry point for project styles
 * and scripts. This is now included in the DOM head.
 * We should aim to reroute existing scripts and styles
 * through this entry point for a better modular approach.
 */

/**
 * Styles.
 */

// Main style output.
import '../assets/stylesheets/main.scss';


/**
 * Scripts.
 */

// Vendor
import $ from 'jquery';
import 'select2';

// Components
import * as glider from './components/glider';
import * as wow from './components/wow';
import * as teamExpand from './components/team-expand';
import * as badger from './components/badger';
import * as drSlider from './components/dr-slider';
import * as progressNavigation from './components/progress-navigation';
import * as scrollToEl from './components/scroll-to-el';
import * as mainNavigation from './components/main-navigation';
import * as search from './components/search';
import * as mast from './components/mast';
import * as demoValidation from './components/demo-form-validation';
import * as drSelect from './components/dr-select';
import * as contactForm from './components/contact-form';
import * as infographic from './components/infographic';
import * as marketoForms from './components/marketo-forms';

// Bricks
import * as resourcesFilter from './bricks/resources-filter';
import * as resourcesResults from './bricks/resources-results';
import * as inTheNewsFilter from './bricks/in-the-news-filter';
import * as inTheNewsResults from './bricks/in-the-news-results';
import * as aboutUsVideo from './bricks/about-us-video';
import * as aboutUsWorld from './bricks/about-us-world';
import * as speakers from './bricks/speakers';
import * as homeHero from './bricks/home-hero';
import * as homeWidget from './bricks/home-widget';
import * as demoForm from './bricks/demo-form';

const scripts = {

	// Components
	glider,
	wow,
	teamExpand,
	badger,
	drSlider,
	scrollToEl,
	mainNavigation,
	search,
	mast,
	demoValidation,
	drSelect,
	contactForm,
	infographic,
	marketoForms,

	// Bricks
	resourcesFilter,
	resourcesResults,
	inTheNewsFilter,
	inTheNewsResults,
	aboutUsVideo,
	aboutUsWorld,
	speakers,
	homeWidget,
	homeHero
};

const postLoadScripts = {
	progressNavigation,
	demoForm
};

// Events
import * as events from './events';


/**
 * Entry point.
 * Calls the init function on each component in the components object,
 * but only once DOMContentLoaded is fired. Semi-modular as each
 * init function should return early if no relevant components
 * are found in the DOM.
 */
(_$ => _$(document).ready(() => {

	// Init components
	Object.keys(scripts).map(c => scripts[c].init(_$));

	// Init events
	events.init();

}))($);

/**
 * For scripts that require the window.load function to complete.
 */
(_$ => _$(window).on('load', () => {

	// Init components
	Object.keys(postLoadScripts).map(c => postLoadScripts[c].init(_$));

}))($);
