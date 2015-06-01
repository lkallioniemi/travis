/**
 * Runs tasks whenever watched files change
 * @link https://github.com/gruntjs/grunt-contrib-watch
 */

	module.exports = {

		// Styles
		admin: {
			files: [
				'<%= config.theme.source.sass.location %>/<%= config.theme.source.sass.admin %>',
				'<%= config.theme.source.sass.location %>/<%= config.theme.source.sass.login %>'
			],
			tasks: [
				'scsslint:admin',
				'sass:admin',
				'autoprefixer:admin'
			]
		},

		editor_style: {
			files: [ '<%= config.theme.source.sass.location %>/<%= config.theme.source.sass.editor_style %>' ],
			tasks: [ 'sass:editor', 'autoprefixer:editor' ]
		},

		main_css: {
			files: [
				'<%= config.theme.source.sass.location %>/<%= config.theme.source.sass.main %>',
				'<%= config.theme.source.sass.location %>/**'
			],
			tasks: [
				'scsslint:main',
				'sass:main',
				'autoprefixer:main',
			]
		},

		main_js: {
			files: [
				'<%= config.theme.source.js.location %>/<%= config.theme.source.js.main %>'
			],
			tasks: [
				'jshint',
				'uglify'
			]
		},

		print: {
			files: [ '<%= config.theme.source.sass.location %>/<%= config.theme.source.sass.print %>' ],
			tasks: [
				'scsslint:print',
				'sass:print',
				'autoprefixer:print',
			]
		},

		// WordPress localization
		php_files: {
			files: [
				'<%= config.theme.source.php_files %>/**/*.php',
			],
			tasks: [ 'pot' ]
		},

		pot_files: {
			files: [
				'<%= config.theme.source.lang_files %>/**/*.pot',
				'<%= config.theme.source.lang_files %>/**/*.po'
			],
			tasks: [ 'po2mo' ]
		}

	};
