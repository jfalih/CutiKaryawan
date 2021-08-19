!(function (g) {
    "use strict";
    function e() {}
    (e.prototype.init = function () {
        var l = g("#event-modal"),
            t = g("#modal-title"),
            a = g("#form-event"),
            i = null,
            r = null,
            s = document.getElementsByClassName("needs-validation"),
            i = null,
            r = null,
            e = new Date(),
            n = e.getDate(),
            d = e.getMonth(),
            o = e.getFullYear();
        var c = [
                { title: "All Day Event", start: new Date(o, d, 1) },
                ],
            v = (document.getElementById("external-events"), document.getElementById("calendar"));
        function u(e) {
            l.modal("show"), a.removeClass("was-validated"), a[0].reset(), g("#event-title").val(), g("#event-category").val(), t.text("Add Event"), (r = e);
        }
        var m = new FullCalendar.Calendar(v, {
            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"],
            editable: !1,
            droppable: !0,
            selectable: !0,
            defaultView: "dayGridMonth",
            themeSystem: "bootstrap",
            header: { left: "prev,next today", center: "title"},
            
            events: c,
        });
        m.render(),
            g(a).on("submit", function (e) {
                e.preventDefault();
                g("#form-event :input");
                var t,
                    a = g("#event-title").val(),
                    n = g("#event-category").val();
                !1 === s[0].checkValidity()
                    ? (event.preventDefault(), event.stopPropagation(), s[0].classList.add("was-validated"))
                    : (i ? (i.setProp("title", a), i.setProp("classNames", [n])) : ((t = { title: a, start: r.date, allDay: r.allDay, className: n }), m.addEvent(t)), l.modal("hide"));
            }),
            g("#btn-delete-event").on("click", function (e) {
                i && (i.remove(), (i = null), l.modal("hide"));
            }),
            g("#btn-new-event").on("click", function (e) {
                u({ date: new Date(), allDay: !0 });
            });
    }),
        (g.CalendarPage = new e()),
        (g.CalendarPage.Constructor = e);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.CalendarPage.init();
    })();
