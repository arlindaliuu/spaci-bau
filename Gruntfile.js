module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        autoprefixer: {
            options: {
                browsers: ["last 2 versions", "ie 8", "ie 9"],
                map: true
            },
            single_file: {
                src: "dist/style.css",
                dest: "dist/style.css"
            }
        },
        connect: {
            server: {
                options: {
                    port: 1989,
                    protocol: "http",
                    open: true,
                    livereload: true,
                    base: ""
                }
            }
        },
        watch: {
            options: {
                spawn: false,
                livereload: true
            },
            stylesheets: {
                files: ["assets/sass/**/*.scss"],
                tasks: ["sass"]
            },
            scripts: {
                files: "src/**/*.js",
                tasks: ["jshint"]
            }
        },
        jshint: {
            options: {
                esversion: 6,
                reporter: require('jshint-stylish')
            },
            build: ['Gruntfile.js', 'src/js/main.js']
        },
        sass: {
            options: {
                style: "expanded"
            },
            dev: {
                files: {
                    "assets/dist/style.css": "assets/sass/index.scss"
                }
            }
        },
    });

    grunt.loadNpmTasks("grunt-autoprefixer");
    grunt.loadNpmTasks("grunt-contrib-sass");
    grunt.loadNpmTasks("grunt-contrib-jshint");
    grunt.loadNpmTasks("grunt-contrib-connect");
    grunt.loadNpmTasks("grunt-contrib-watch");
    
    grunt.registerTask("default", ["sass", "jshint", "connect", "watch"]);
};