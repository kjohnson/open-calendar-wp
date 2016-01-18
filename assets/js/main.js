var OpenCalendar = Marionette.Application.extend({
    mainLayout: '',

    initialize: function() {
        this.calendarLayout = new CalendarLayout();
    },

    onStart: function() {
        jQuery( '#open-calendar' ).append( this.calendarLayout.render().el );
    }
});

var CalendarLayout = Marionette.LayoutView.extend({
    template: "#ocwp-tmpl-layout",

    regions: {
        before: '.open-calendar-before',
        header: '.open-calendar-header',
        main:   '.open-calendar-main',
        after:  '.open-calendar-after',
    },

    initialize: function() {
    },

    onRender: function() {
        this.before.show( new HTMLView({ html: 'BEFORE CALENDAR' }) );
        this.header.show( new HeaderView() );
        this.main.show(   new MainView() );
        this.after.show(  new HTMLView({ html: 'AFTER CALENDAR' }) );
    }

});

var HTMLView = Marionette.ItemView.extend({
    tag: 'ocwp-html',
    template: "#ocwp-tmpl-html",

    initialize: function( data ) {
        this.html = data.html;
    },

    templateHelpers:function(){

        return {
            html: this.html,
        }
    }
});

var HeaderView = Marionette.ItemView.extend({
    tag: 'ocwp-header',
    template: "#ocwp-tmpl-header",
});

var MainView = Marionette.ItemView.extend({
    tag: 'ocwp-main',
    template: "#ocwp-tmpl-main",
});

var openCalendar = new OpenCalendar();
openCalendar.start();