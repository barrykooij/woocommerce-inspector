/* jshint node:true */
module.exports = function ( grunt ) {
    'use strict';

    grunt.initConfig( {
        // setting folder templates
        dirs: {
            css: 'assets/css',
            images: 'assets/images',
            js: 'assets/js'
        },

        // Compile all .less files.
        less: {
            compile: {
                options: {
                    // These paths are searched for @imports
                    paths: [ '<%= dirs.css %>/' ]
                },
                files: [ {
                    expand: true,
                    cwd: '<%= dirs.css %>/less/',
                    src: [
                        '*.less',
                        '!mixins.less'
                    ],
                    dest: '<%= dirs.css %>/',
                    ext: '.css'
                } ]
            }
        },

        // Minify all .css files.
        cssmin: {
            minify: {
                src: '<%= dirs.css %>/woocommerce-inspector.css',
                dest: '<%= dirs.css %>/woocommerce-inspector.min.css'
            }
        },

        // Minify .js files.
        uglify: {
            options: {
                preserveComments: 'some'
            },
            jsfiles: {
                files: [ {
                    src: '<%= dirs.js %>/woocommerce-inspector.js',
                    dest: '<%= dirs.js %>/woocommerce-inspector.js'
                } ]
            }
        },

        clean: {
            clean: [ "<%= dirs.js %>/woocommerce-inspector.js" ]
        },

        // Concat .js files.
        concat: {
            concat: {
                src: [ '<%= dirs.js %>/*.js' ],
                dest: '<%= dirs.js %>/woocommerce-inspector.js'
            }
        },

        // Watch changes for assets
        watch: {
            less: {
                files: [ '<%= dirs.css %>/*.less' ],
                tasks: [ 'less', 'cssmin' ]
            },
            js: {
                files: [
                    '<%= dirs.js %>/*js',
                    '!<%= dirs.js %>/*.min.js'
                ],
                tasks: [ 'clean', 'concat', 'uglify' ]
            }
        },

        // Generate POT files.
        makepot: {
            options: {
                type: 'wp-plugin',
                domainPath: 'languages',
                potHeaders: {
                    'report-msgid-bugs-to': 'https://github.com/barrykooij/woocommerce-inspector/issues',
                    'language-team': 'LANGUAGE <git@barrykooij.nl>'
                }
            },
            frontend: {
                options: {
                    potFilename: 'woocommerce-inspector.pot',
                    exclude: [
                        'node_modules/.*'
                    ],
                    processPot: function ( pot ) {
                        return pot;
                    }
                }
            }
        }

    } );

    // Load NPM tasks to be used here
    grunt.loadNpmTasks( 'grunt-shell' );
    grunt.loadNpmTasks( 'grunt-contrib-less' );
    grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks( 'grunt-contrib-watch' );
    grunt.loadNpmTasks( 'grunt-wp-i18n' );
    grunt.loadNpmTasks( 'grunt-checktextdomain' );
    grunt.loadNpmTasks( 'grunt-contrib-concat' );
    grunt.loadNpmTasks( 'grunt-contrib-clean' );

    // Register tasks
    grunt.registerTask( 'default', [
        'less',
        'cssmin',
        'clean',
        'concat',
        'uglify'
    ] );

    // Just an alias for pot file generation
    grunt.registerTask( 'pot', [
        'makepot'
    ] );

};