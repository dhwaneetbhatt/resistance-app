module.exports = function(grunt) {
    'use strict';
    //All grunt related functions

    grunt.initConfig({
        concat: {
            vendor: {
                src: ['js/lib/jquery-1.10.2.min.js', 'js/lib/bootstrap.js',
                      'js/lib/handlebars-1.1.2.js', 'js/lib/ember-1.2.0.js',
                      'js/lib/ember-data-1.0.0.js', 'js/lib/moment.min.js'],
                dest:'dist/lib.js'
            },
            app: {
                src: ['js/app.js', 'dist/templates.js', 'js/models/*.js',
                      'js/controllers/*.js', 'js/routes/*.js', 'js/views/*.js'],
                dest:'dist/app.js'
            }
        },
        cssmin: {
            dist: {
                files: {
                    'dist/app.css': ['css/app.css', 'css/bootstrap.css']
                }
            }
        },
        ember_handlebars: {
            compile: {
                options: {
                    processName: function(fileName) {
                        var arr = fileName.split("."),
                            path = arr[arr.length - 2].split("/"),
                            name = path[path.length - 1];
                        name = name.replace(/-/g, "/");
                        return name;
                    }
                },
                files: {
                    "dist/templates.js": "js/templates/*.hbs"
                }
            }
        },
        clean: ["dist/images/"],
        copy: {
            main: {
                files: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**'],
                    dest: 'dist/images/'
                }]
            }
        },
        watch: {
            scripts: {
                files: ['js/lib/*.js', 'js/app.js', 'js/**/*.js', 'js/css/*.css',
                        'js/templates/*.hbs'],
                tasks: ['ember_handlebars','concat', 'cssmin'],
                options: {
                    debounceDelay: 100
                }
            },
            images: {
                files: ['images/*'],
                tasks: ['clean', 'copy'],
                options: {
                    debounceDelay: 100
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-ember-handlebars');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', ['ember_handlebars', 'concat', 'cssmin', 'clean', 'copy']);
    grunt.registerTask('watch', ['watch']);
};
