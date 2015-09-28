(function () {

  window.app = {
    Views: {},
    Extensions: {},
    Router: null,

    init: function () {

      this.instance = new app.Views.App();
      Backbone.history.start();

    }
  };

  $(function() {
    window.app.init();
  });

  app.Router = Backbone.Router.extend({

    routes: {
      'about':'about',
      'assignments': 'assignments',
      '':'about'
    },

    about: function () {
      var view = new app.Views.About();
      app.instance.goto(view);
    },

    assignments: function () {
      var view = new app.Views.Assignments();
      app.instance.goto(view);
    }

  });

  app.Extensions.View = Backbone.View.extend({

    initialize: function () {
      this.router = new app.Router();
    },

    render: function(options) {

      options = options || {};

      if (options.page === true) {
        this.$el.addClass('page');
      }

      return this;

    },

    transitionIn: function (callback) {

      var view = this,
          delay

      var transitionIn = function () {
        view.$el.addClass('is-visible');
        view.$el.one('transitionend', function () {
          if (_.isFunction(callback)) {
            callback();
          }
        })
      };

      _.delay(transitionIn, 20);

    },

    transitionOut: function (callback) {

      var view = this;

      view.$el.removeClass('is-visible');
      view.$el.one('transitionend', function () {
        if (_.isFunction(callback)) {
          callback();
        };
      });

    }

  });

  app.Views.App = app.Extensions.View.extend({

    el: 'body',

    goto: function (view) {

      var previous = this.currentPage || null;
      var next = view;

      if (previous) {
        previous.transitionOut(function () {
          previous.remove();
        });
      }

      next.render({ page: true });
      this.$el.append( next.$el );
      next.transitionIn();
      this.currentPage = next;

    }

  });

  app.Views.About = app.Extensions.View.extend({
    className: 'about',
    render: function () {
      var template = _.template($('#aboutTemp').html());
      this.$el.html(template());
      return app.Extensions.View.prototype.render.apply(this, arguments);
    }

  });

  app.Views.Assignments = app.Extensions.View.extend({
    className: 'assignments',
    render: function () {
      var template = _.template($('#assignmentsTemp').html());
      this.$el.html(template());
      return app.Extensions.View.prototype.render.apply(this, arguments);
    }

  });

}());