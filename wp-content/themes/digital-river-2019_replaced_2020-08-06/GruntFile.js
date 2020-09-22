module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Sass
        less: {
            production: {
                options: {
                    paths: ["css"]
                },
                files: {
                    "css/global.css": "css/less/global.less"
                }
            }
        },

        // Config for grunt-sass
        // Gets files from src/styles/build.scss and builds them to build/styles/build.css
        // **********************************************************************************************************
        sass: {
            options: {
                sourceMap: true,
                outputStyle: 'compressed'
            },
            main: {
                files: {
                    'assets/stylesheets/main.css': 'assets/stylesheets/main.scss'
                }
            }
        },

        // Autocompiles and adds LiveReload Support
        watch: {
            options: {
                livereload: true
            },
            sass: {
                options: { livereload: false, spawn: false },
                files: ['assets/stylesheets/**/*.{scss,sass}'],
                tasks: ['sass'/*, 'postcss'*/]
            },
            css: {
                files: '**/*.less',
                tasks: ['less']
            }
        }
    });

	// Grunt Tasks
	grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['watch']);
}