module.exports = function ( grunt ) {

	'use strict';

/**
 * Tasks and configuration
 *
 * @link https://github.com/firstandthird/load-grunt-config
 */

	require('load-grunt-config')(grunt, {

		configPath: require('path').join( process.cwd(), 'grunt-tasks' ),

		init: true,

		data: {

			// Load themes
			config: grunt.file.readJSON('grunt-config.json'),

		},

		// Can optionally pass options to load-grunt-tasks.
		// If you set to false, it will disable auto loading tasks.
		loadGruntTasks: {
			pattern: 'grunt-*',
			config: require('./package.json'),
			scope: 'devDependencies'
		},

		// Can post process config object before it gets passed to grunt
		postProcess: function( config ) {},

		// Allows to manipulate the config object before it gets merged with the data object
		preMerge: function( config, data ) {}
	});

	require('time-grunt')( grunt );

};