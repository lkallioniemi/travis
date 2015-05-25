module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        copy: {
            dist: {
                files: [{
                    src: ['js/vendor/**'],
                    dest: '../'
                }]
            }
        },

        sass: {
            dist: {
                options: {
                    //style: 'compressed',
                    precision: 10
                },
                files: {
                    '../css/main.css': 'scss/style.scss',
                    '../css/ie.css': 'scss/ie.scss'
                }
            },
            /*dev: {
                options: {
                    precision: 10
                },
                files: {
                    '../css/main.css': 'scss/style.scss',
                    '../css/ie.css': 'scss/ie.scss'
                }
            }*/
        },

        autoprefixer: {
            options: {
                browsers: ['last 2 version', 'ie 8', 'ie 9']
            },
            multiple_files: {
                expand: true,
                flatten: true,
                src: '../css/*.css',
                dest: '../css/'
            },
        },

        cssmin: {
            files: {
                '../css/min/main.min.css': ['../css/main.css'],
                '../css/min/ie.min.css': ['../css/ie.css']
            }
        },

        uglify: {
            dist: {
                options: {
                    compress: true
                },
                files: {
                    '../js/main.min.js': 'js/*.js'
                }
            },
            dev: {
                options: {
                    mangle: false,
                    compress: false,
                    beautify: true
                },
                files: {
                    '../js/main.min.js': 'js/*.js'
                }
            }
        },

        watch: {
            files: ['scss/**/*', 'js/*.js'],
            tasks: 'default'
        }
    });

    // Load plugin(s) needed for task(s)
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-autoprefixer');

    // Register task(s)
    grunt.registerTask('default', ['copy:dist', 'sass:dist', 'autoprefixer', 'cssmin', 'uglify:dist']);
    grunt.registerTask('dev', ['sass:dev', 'uglify:dev']);

};
