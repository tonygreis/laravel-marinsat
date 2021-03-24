require("alpinejs");
var lozad = require("lozad");
var Turbolinks = require("turbolinks");
Turbolinks.start();

lozad(".lozad", {
    load: function(el) {
        el.src = el.dataset.src;
        el.onload = function() {
            el.classList.add("no-blur");
        };
    }
}).observe();

document.addEventListener("turbolinks:load", function(el) {
    lozad(".lozad", {
        load: function(el) {
            el.src = el.dataset.src;
            el.onload = function() {
                el.classList.add("no-blur");
            };
        }
    }).observe();
});
