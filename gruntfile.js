module.exports = function (grunt) {

  // Configurable paths
  var config = {
    srcPath: 'assets',
    buildPath: 'assets/build',
  };

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-cache-bust');
  grunt.loadNpmTasks('grunt-tinyimg');
  grunt.loadNpmTasks('grunt-csscomb');
  grunt.file.defaultEncoding = 'utf8';
  grunt.file.preserveBOM = true;

  // Project configuration.
  grunt.initConfig({

    // Project settings of path
    config: config,

    pkg: grunt.file.readJSON('package.json'),

    //clean
    clean: {
      build: {
        src: ["<%= config.buildPath %>/javascripts/", "<%= config.buildPath %>/css/"]
      }
    },

    // CacheBust
    cacheBust: {
      options: {
        encoding: 'utf8',
        algorithm: 'md5',
        length: 16,
        deleteOriginals: false,
        ignorePatterns: ['svg', 'png', 'jpg'],
        baseDir: './',
        rename: false
      },
      assets: {
        files: [{
          expand: true,
          src: ['*.html']
        }]
      }
    },

    tinyimg: {
      dynamic: {
        files: [{
          expand: true,
          cwd: '<%= config.srcPath %>/images/',
          src: ['*.{png,jpg,svg}'],
          dest: '<%= config.srcPath %>/images/'
        }]
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      site: {
        src: [
          '<%= config.srcPath %>/javascripts/jquery.js',
          '<%= config.srcPath %>/javascripts/bootstrap.js',
          '<%= config.srcPath %>/javascripts/slippy.js',
          '<%= config.srcPath %>/javascripts/jquery.stellar.js',
          '<%= config.srcPath %>/javascripts/main.js',
          '<%= config.srcPath %>/javascripts/maps.js',
        ],
        dest: '<%= config.buildPath %>/javascripts/main.js'
      },
      admin: {
        src: [
          '<%= config.srcPath %>/javascripts/jquery.js',
          '<%= config.srcPath %>/javascripts/bootstrap.js',
          '<%= config.srcPath %>/javascripts/metisMenu.js',
          '<%= config.srcPath %>/javascripts/admin-main.js'
        ],
        dest: '<%= config.buildPath %>/javascripts/admin-main.js'
      }
    },

    // Minify all JS "compress"
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        files: {
          '<%= config.buildPath %>/javascripts/main.js': ['<%= config.buildPath %>/javascripts/main.js'],
          '<%= config.buildPath %>/javascripts/admin-main.js': ['<%= config.buildPath %>/javascripts/admin-main.js']
        }
      }
    },

    compass: {
      build: {
        options: {
          sassDir: '<%= config.srcPath %>/scss',
          cssDir: '<%= config.buildPath %>/css',
          outputStyle: 'compressed',
          sourceMap: false
        }
      }
    },

    //CSSMIN
    cssmin: {
      build: {
        files: {
          '<%= config.buildPath %>/css/styles.css': ['<%= config.buildPath %>/css/styles.css'],
          '<%= config.buildPath %>/css/admin-styles.css': ['<%= config.buildPath %>/css/admin-styles.css']
        }
      }
    },

    //CSSCOMB
    csscomb: {
      build: {
        files: {
          '<%= config.buildPath %>/css/styles.css': ['<%= config.buildPath %>/css/styles.css'],
          '<%= config.buildPath %>/css/admin-styles.css': ['<%= config.buildPath %>/css/admin-styles.css']
        }
      }
    },

    // Preview all the packages modified in project
    watch: {
      css: {
        files: ['<%= config.srcPath %>/scss/**/*.scss'],
        tasks: ['compass']
      },
      scripts: {
        files: ['<%= config.srcPath %>/javascripts/**/*.js'],
        tasks: ['concat']
      }
    }

  });

  // Default Task(s).
  grunt.registerTask('build', ['clean', 'concat', 'uglify', 'compass', 'csscomb', 'cssmin', 'tinyimg', 'cacheBust']);
  // Build Dev Task(s).
  grunt.registerTask('build-dev', ['clean', 'concat', 'uglify', 'compass', 'csscomb', 'cssmin']);
  // Basic Test Task(s).
  grunt.registerTask('basic', ['concat', 'compass']);
  // Only JS Task(s)
  grunt.registerTask('js', ['concat', 'uglify']);
  // Only Css Task(s)
  grunt.registerTask('css', ['compass', 'csscomb', 'cssmin']);
};
