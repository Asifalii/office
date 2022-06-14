if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
+function (a) {
    "use strict";
    var b = a.fn.jquery.split(" ")[0].split(".");
    if (b[0] < 2 && b[1] < 9 || 1 == b[0] && 9 == b[1] && b[2] < 1 || b[0] > 2) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3")
}(jQuery), +function (a) {
    "use strict";

    function b() {
        var a = document.createElement("bootstrap"), b = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd otransitionend",
            transition: "transitionend"
        };
        for (var c in b)
            if (void 0 !== a.style[c]) return {end: b[c]};
        return !1
    }

    a.fn.emulateTransitionEnd = function (b) {
        var c = !1, d = this;
        a(this).one("bsTransitionEnd", function () {
            c = !0
        });
        var e = function () {
            c || a(d).trigger(a.support.transition.end)
        };
        return setTimeout(e, b), this
    }, a(function () {
        a.support.transition = b(), a.support.transition && (a.event.special.bsTransitionEnd = {
            bindType: a.support.transition.end,
            delegateType: a.support.transition.end,
            handle: function (b) {
                return a(b.target).is(this) ? b.handleObj.handler.apply(this, arguments) : void 0
            }
        })
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var c = a(this), e = c.data("bs.alert");
            e || c.data("bs.alert", e = new d(this)), "string" == typeof b && e[b].call(c)
        })
    }

    var c = '[data-dismiss="alert"]', d = function (b) {
        a(b).on("click", c, this.close)
    };
    d.VERSION = "3.3.6", d.TRANSITION_DURATION = 150, d.prototype.close = function (b) {
        function c() {
            g.detach().trigger("closed.bs.alert").remove()
        }

        var e = a(this), f = e.attr("data-target");
        f || (f = e.attr("href"), f = f && f.replace(/.*(?=#[^\s]*$)/, ""));
        var g = a(f);
        b && b.preventDefault(), g.length || (g = e.closest(".alert")), g.trigger(b = a.Event("close.bs.alert")), b.isDefaultPrevented() || (g.removeClass("in"), a.support.transition && g.hasClass("fade") ? g.one("bsTransitionEnd", c).emulateTransitionEnd(d.TRANSITION_DURATION) : c())
    };
    var e = a.fn.alert;
    a.fn.alert = b, a.fn.alert.Constructor = d, a.fn.alert.noConflict = function () {
        return a.fn.alert = e, this
    }, a(document).on("click.bs.alert.data-api", c, d.prototype.close)
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.button"), f = "object" == typeof b && b;
            e || d.data("bs.button", e = new c(this, f)), "toggle" == b ? e.toggle() : b && e.setState(b)
        })
    }

    var c = function (b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.isLoading = !1
    };
    c.VERSION = "3.3.6", c.DEFAULTS = {loadingText: "loading..."}, c.prototype.setState = function (b) {
        var c = "disabled", d = this.$element, e = d.is("input") ? "val" : "html", f = d.data();
        b += "Text", null == f.resetText && d.data("resetText", d[e]()), setTimeout(a.proxy(function () {
            d[e](null == f[b] ? this.options[b] : f[b]), "loadingText" == b ? (this.isLoading = !0, d.addClass(c).attr(c, c)) : this.isLoading && (this.isLoading = !1, d.removeClass(c).removeAttr(c))
        }, this), 0)
    }, c.prototype.toggle = function () {
        var a = !0, b = this.$element.closest('[data-toggle="buttons"]');
        if (b.length) {
            var c = this.$element.find("input");
            "radio" == c.prop("type") ? (c.prop("checked") && (a = !1), b.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == c.prop("type") && (c.prop("checked") !== this.$element.hasClass("active") && (a = !1), this.$element.toggleClass("active")), c.prop("checked", this.$element.hasClass("active")), a && c.trigger("change")
        } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
    };
    var d = a.fn.button;
    a.fn.button = b, a.fn.button.Constructor = c, a.fn.button.noConflict = function () {
        return a.fn.button = d, this
    }, a(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (c) {
        var d = a(c.target);
        d.hasClass("btn") || (d = d.closest(".btn")), b.call(d, "toggle"), a(c.target).is('input[type="radio"]') || a(c.target).is('input[type="checkbox"]') || c.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (b) {
        a(b.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(b.type))
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.carousel"),
                f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b),
                g = "string" == typeof b ? b : f.slide;
            e || d.data("bs.carousel", e = new c(this, f)), "number" == typeof b ? e.to(b) : g ? e[g]() : f.interval && e.pause().cycle()
        })
    }

    var c = function (b, c) {
        this.$element = a(b), this.$indicators = this.$element.find(".carousel-indicators"), this.options = c, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", a.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", a.proxy(this.pause, this)).on("mouseleave.bs.carousel", a.proxy(this.cycle, this))
    };
    c.VERSION = "3.3.6", c.TRANSITION_DURATION = 600, c.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    }, c.prototype.keydown = function (a) {
        if (!/input|textarea/i.test(a.target.tagName)) {
            switch (a.which) {
                case 37:
                    this.prev();
                    break;
                case 39:
                    this.next();
                    break;
                default:
                    return
            }
            a.preventDefault()
        }
    }, c.prototype.cycle = function (b) {
        return b || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(a.proxy(this.next, this), this.options.interval)), this
    }, c.prototype.getItemIndex = function (a) {
        return this.$items = a.parent().children(".item"), this.$items.index(a || this.$active)
    }, c.prototype.getItemForDirection = function (a, b) {
        var c = this.getItemIndex(b), d = "prev" == a && 0 === c || "next" == a && c == this.$items.length - 1;
        if (d && !this.options.wrap) return b;
        var e = "prev" == a ? -1 : 1, f = (c + e) % this.$items.length;
        return this.$items.eq(f)
    }, c.prototype.to = function (a) {
        var b = this, c = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        return a > this.$items.length - 1 || 0 > a ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel", function () {
            b.to(a)
        }) : c == a ? this.pause().cycle() : this.slide(a > c ? "next" : "prev", this.$items.eq(a))
    }, c.prototype.pause = function (b) {
        return b || (this.paused = !0), this.$element.find(".next, .prev").length && a.support.transition && (this.$element.trigger(a.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    }, c.prototype.next = function () {
        return this.sliding ? void 0 : this.slide("next")
    }, c.prototype.prev = function () {
        return this.sliding ? void 0 : this.slide("prev")
    }, c.prototype.slide = function (b, d) {
        var e = this.$element.find(".item.active"), f = d || this.getItemForDirection(b, e), g = this.interval,
            h = "next" == b ? "left" : "right", i = this;
        if (f.hasClass("active")) return this.sliding = !1;
        var j = f[0], k = a.Event("slide.bs.carousel", {relatedTarget: j, direction: h});
        if (this.$element.trigger(k), !k.isDefaultPrevented()) {
            if (this.sliding = !0, g && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var l = a(this.$indicators.children()[this.getItemIndex(f)]);
                l && l.addClass("active")
            }
            var m = a.Event("slid.bs.carousel", {relatedTarget: j, direction: h});
            return a.support.transition && this.$element.hasClass("slide") ? (f.addClass(b), f[0].offsetWidth, e.addClass(h), f.addClass(h), e.one("bsTransitionEnd", function () {
                f.removeClass([b, h].join(" ")).addClass("active"), e.removeClass(["active", h].join(" ")), i.sliding = !1, setTimeout(function () {
                    i.$element.trigger(m)
                }, 0)
            }).emulateTransitionEnd(c.TRANSITION_DURATION)) : (e.removeClass("active"), f.addClass("active"), this.sliding = !1, this.$element.trigger(m)), g && this.cycle(), this
        }
    };
    var d = a.fn.carousel;
    a.fn.carousel = b, a.fn.carousel.Constructor = c, a.fn.carousel.noConflict = function () {
        return a.fn.carousel = d, this
    };
    var e = function (c) {
        var d, e = a(this), f = a(e.attr("data-target") || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""));
        if (f.hasClass("carousel")) {
            var g = a.extend({}, f.data(), e.data()), h = e.attr("data-slide-to");
            h && (g.interval = !1), b.call(f, g), h && f.data("bs.carousel").to(h), c.preventDefault()
        }
    };
    a(document).on("click.bs.carousel.data-api", "[data-slide]", e).on("click.bs.carousel.data-api", "[data-slide-to]", e), a(window).on("load", function () {
        a('[data-ride="carousel"]').each(function () {
            var c = a(this);
            b.call(c, c.data())
        })
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        var c, d = b.attr("data-target") || (c = b.attr("href")) && c.replace(/.*(?=#[^\s]+$)/, "");
        return a(d)
    }

    function c(b) {
        return this.each(function () {
            var c = a(this), e = c.data("bs.collapse"),
                f = a.extend({}, d.DEFAULTS, c.data(), "object" == typeof b && b);
            !e && f.toggle && /show|hide/.test(b) && (f.toggle = !1), e || c.data("bs.collapse", e = new d(this, f)), "string" == typeof b && e[b]()
        })
    }

    var d = function (b, c) {
        this.$element = a(b), this.options = a.extend({}, d.DEFAULTS, c), this.$trigger = a('[data-toggle="collapse"][href="#' + b.id + '"],[data-toggle="collapse"][data-target="#' + b.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
    };
    d.VERSION = "3.3.6", d.TRANSITION_DURATION = 350, d.DEFAULTS = {toggle: !0}, d.prototype.dimension = function () {
        var a = this.$element.hasClass("width");
        return a ? "width" : "height"
    }, d.prototype.show = function () {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var b, e = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
            if (!(e && e.length && (b = e.data("bs.collapse"), b && b.transitioning))) {
                var f = a.Event("show.bs.collapse");
                if (this.$element.trigger(f), !f.isDefaultPrevented()) {
                    e && e.length && (c.call(e, "hide"), b || e.data("bs.collapse", null));
                    var g = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                    var h = function () {
                        this.$element.removeClass("collapsing").addClass("collapse in")[g](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                    };
                    if (!a.support.transition) return h.call(this);
                    var i = a.camelCase(["scroll", g].join("-"));
                    this.$element.one("bsTransitionEnd", a.proxy(h, this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])
                }
            }
        }
    }, d.prototype.hide = function () {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var b = a.Event("hide.bs.collapse");
            if (this.$element.trigger(b), !b.isDefaultPrevented()) {
                var c = this.dimension();
                this.$element[c](this.$element[c]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                var e = function () {
                    this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                return a.support.transition ? void this.$element[c](0).one("bsTransitionEnd", a.proxy(e, this)).emulateTransitionEnd(d.TRANSITION_DURATION) : e.call(this)
            }
        }
    }, d.prototype.toggle = function () {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    }, d.prototype.getParent = function () {
        return a(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(a.proxy(function (c, d) {
            var e = a(d);
            this.addAriaAndCollapsedClass(b(e), e)
        }, this)).end()
    }, d.prototype.addAriaAndCollapsedClass = function (a, b) {
        var c = a.hasClass("in");
        a.attr("aria-expanded", c), b.toggleClass("collapsed", !c).attr("aria-expanded", c)
    };
    var e = a.fn.collapse;
    a.fn.collapse = c, a.fn.collapse.Constructor = d, a.fn.collapse.noConflict = function () {
        return a.fn.collapse = e, this
    }, a(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (d) {
        var e = a(this);
        e.attr("data-target") || d.preventDefault();
        var f = b(e), g = f.data("bs.collapse"), h = g ? "toggle" : e.data();
        c.call(f, h)
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        var c = b.attr("data-target");
        c || (c = b.attr("href"), c = c && /#[A-Za-z]/.test(c) && c.replace(/.*(?=#[^\s]*$)/, ""));
        var d = c && a(c);
        return d && d.length ? d : b.parent()
    }

    function c(c) {
        c && 3 === c.which || (a(e).remove(), a(f).each(function () {
            var d = a(this), e = b(d), f = {relatedTarget: this};
            e.hasClass("open") && (c && "click" == c.type && /input|textarea/i.test(c.target.tagName) && a.contains(e[0], c.target) || (e.trigger(c = a.Event("hide.bs.dropdown", f)), c.isDefaultPrevented() || (d.attr("aria-expanded", "false"), e.removeClass("open").trigger(a.Event("hidden.bs.dropdown", f)))))
        }))
    }

    function d(b) {
        return this.each(function () {
            var c = a(this), d = c.data("bs.dropdown");
            d || c.data("bs.dropdown", d = new g(this)), "string" == typeof b && d[b].call(c)
        })
    }

    var e = ".dropdown-backdrop", f = '[data-toggle="dropdown"]', g = function (b) {
        a(b).on("click.bs.dropdown", this.toggle)
    };
    g.VERSION = "3.3.6", g.prototype.toggle = function (d) {
        var e = a(this);
        if (!e.is(".disabled, :disabled")) {
            var f = b(e), g = f.hasClass("open");
            if (c(), !g) {
                "ontouchstart" in document.documentElement && !f.closest(".navbar-nav").length && a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click", c);
                var h = {relatedTarget: this};
                if (f.trigger(d = a.Event("show.bs.dropdown", h)), d.isDefaultPrevented()) return;
                e.trigger("focus").attr("aria-expanded", "true"), f.toggleClass("open").trigger(a.Event("shown.bs.dropdown", h))
            }
            return !1
        }
    }, g.prototype.keydown = function (c) {
        if (/(38|40|27|32)/.test(c.which) && !/input|textarea/i.test(c.target.tagName)) {
            var d = a(this);
            if (c.preventDefault(), c.stopPropagation(), !d.is(".disabled, :disabled")) {
                var e = b(d), g = e.hasClass("open");
                if (!g && 27 != c.which || g && 27 == c.which) return 27 == c.which && e.find(f).trigger("focus"), d.trigger("click");
                var h = " li:not(.disabled):visible a", i = e.find(".dropdown-menu" + h);
                if (i.length) {
                    var j = i.index(c.target);
                    38 == c.which && j > 0 && j--, 40 == c.which && j < i.length - 1 && j++, ~j || (j = 0), i.eq(j).trigger("focus")
                }
            }
        }
    };
    var h = a.fn.dropdown;
    a.fn.dropdown = d, a.fn.dropdown.Constructor = g, a.fn.dropdown.noConflict = function () {
        return a.fn.dropdown = h, this
    }, a(document).on("click.bs.dropdown.data-api", c).on("click.bs.dropdown.data-api", ".dropdown form", function (a) {
        a.stopPropagation()
    }).on("click.bs.dropdown.data-api", f, g.prototype.toggle).on("keydown.bs.dropdown.data-api", f, g.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", g.prototype.keydown)
}(jQuery), +function (a) {
    "use strict";

    function b(b, d) {
        return this.each(function () {
            var e = a(this), f = e.data("bs.modal"), g = a.extend({}, c.DEFAULTS, e.data(), "object" == typeof b && b);
            f || e.data("bs.modal", f = new c(this, g)), "string" == typeof b ? f[b](d) : g.show && f.show(d)
        })
    }

    var c = function (b, c) {
        this.options = c, this.$body = a(document.body), this.$element = a(b), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, a.proxy(function () {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };
    c.VERSION = "3.3.6", c.TRANSITION_DURATION = 300, c.BACKDROP_TRANSITION_DURATION = 150, c.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, c.prototype.toggle = function (a) {
        return this.isShown ? this.hide() : this.show(a)
    }, c.prototype.show = function (b) {
        var d = this, e = a.Event("show.bs.modal", {relatedTarget: b});
        this.$element.trigger(e), this.isShown || e.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', a.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
            d.$element.one("mouseup.dismiss.bs.modal", function (b) {
                a(b.target).is(d.$element) && (d.ignoreBackdropClick = !0)
            })
        }), this.backdrop(function () {
            var e = a.support.transition && d.$element.hasClass("fade");
            d.$element.parent().length || d.$element.appendTo(d.$body), d.$element.show().scrollTop(0), d.adjustDialog(), e && d.$element[0].offsetWidth, d.$element.addClass("in"), d.enforceFocus();
            var f = a.Event("shown.bs.modal", {relatedTarget: b});
            e ? d.$dialog.one("bsTransitionEnd", function () {
                d.$element.trigger("focus").trigger(f)
            }).emulateTransitionEnd(c.TRANSITION_DURATION) : d.$element.trigger("focus").trigger(f)
        }))
    }, c.prototype.hide = function (b) {
        b && b.preventDefault(), b = a.Event("hide.bs.modal"), this.$element.trigger(b), this.isShown && !b.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), a(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), a.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", a.proxy(this.hideModal, this)).emulateTransitionEnd(c.TRANSITION_DURATION) : this.hideModal())
    }, c.prototype.enforceFocus = function () {
        a(document).off("focusin.bs.modal").on("focusin.bs.modal", a.proxy(function (a) {
            this.$element[0] === a.target || this.$element.has(a.target).length || this.$element.trigger("focus")
        }, this))
    }, c.prototype.escape = function () {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", a.proxy(function (a) {
            27 == a.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }, c.prototype.resize = function () {
        this.isShown ? a(window).on("resize.bs.modal", a.proxy(this.handleUpdate, this)) : a(window).off("resize.bs.modal")
    }, c.prototype.hideModal = function () {
        var a = this;
        this.$element.hide(), this.backdrop(function () {
            a.$body.removeClass("modal-open"), a.resetAdjustments(), a.resetScrollbar(), a.$element.trigger("hidden.bs.modal")
        })
    }, c.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, c.prototype.backdrop = function (b) {
        var d = this, e = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var f = a.support.transition && e;
            if (this.$backdrop = a(document.createElement("div")).addClass("modal-backdrop " + e).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", a.proxy(function (a) {
                return this.ignoreBackdropClick ? void (this.ignoreBackdropClick = !1) : void (a.target === a.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
            }, this)), f && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !b) return;
            f ? this.$backdrop.one("bsTransitionEnd", b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION) : b()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var g = function () {
                d.removeBackdrop(), b && b()
            };
            a.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION) : g()
        } else b && b()
    }, c.prototype.handleUpdate = function () {
        this.adjustDialog()
    }, c.prototype.adjustDialog = function () {
        var a = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && a ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !a ? this.scrollbarWidth : ""
        })
    }, c.prototype.resetAdjustments = function () {
        this.$element.css({paddingLeft: "", paddingRight: ""})
    }, c.prototype.checkScrollbar = function () {
        var a = window.innerWidth;
        if (!a) {
            var b = document.documentElement.getBoundingClientRect();
            a = b.right - Math.abs(b.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < a, this.scrollbarWidth = this.measureScrollbar()
    }, c.prototype.setScrollbar = function () {
        var a = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", a + this.scrollbarWidth)
    }, c.prototype.resetScrollbar = function () {
        this.$body.css("padding-right", this.originalBodyPad)
    }, c.prototype.measureScrollbar = function () {
        var a = document.createElement("div");
        a.className = "modal-scrollbar-measure", this.$body.append(a);
        var b = a.offsetWidth - a.clientWidth;
        return this.$body[0].removeChild(a), b
    };
    var d = a.fn.modal;
    a.fn.modal = b, a.fn.modal.Constructor = c, a.fn.modal.noConflict = function () {
        return a.fn.modal = d, this
    }, a(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (c) {
        var d = a(this), e = d.attr("href"), f = a(d.attr("data-target") || e && e.replace(/.*(?=#[^\s]+$)/, "")),
            g = f.data("bs.modal") ? "toggle" : a.extend({remote: !/#/.test(e) && e}, f.data(), d.data());
        d.is("a") && c.preventDefault(), f.one("show.bs.modal", function (a) {
            a.isDefaultPrevented() || f.one("hidden.bs.modal", function () {
                d.is(":visible") && d.trigger("focus")
            })
        }), b.call(f, g, this)
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.tooltip"), f = "object" == typeof b && b;
            (e || !/destroy|hide/.test(b)) && (e || d.data("bs.tooltip", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }

    var c = function (a, b) {
        this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", a, b)
    };
    c.VERSION = "3.3.6", c.TRANSITION_DURATION = 150, c.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {selector: "body", padding: 0}
    }, c.prototype.init = function (b, c, d) {
        if (this.enabled = !0, this.type = b, this.$element = a(c), this.options = this.getOptions(d), this.$viewport = this.options.viewport && a(a.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
            click: !1,
            hover: !1,
            focus: !1
        }, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (var e = this.options.trigger.split(" "), f = e.length; f--;) {
            var g = e[f];
            if ("click" == g) this.$element.on("click." + this.type, this.options.selector, a.proxy(this.toggle, this)); else if ("manual" != g) {
                var h = "hover" == g ? "mouseenter" : "focusin", i = "hover" == g ? "mouseleave" : "focusout";
                this.$element.on(h + "." + this.type, this.options.selector, a.proxy(this.enter, this)), this.$element.on(i + "." + this.type, this.options.selector, a.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = a.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, c.prototype.getDefaults = function () {
        return c.DEFAULTS
    }, c.prototype.getOptions = function (b) {
        return b = a.extend({}, this.getDefaults(), this.$element.data(), b), b.delay && "number" == typeof b.delay && (b.delay = {
            show: b.delay,
            hide: b.delay
        }), b
    }, c.prototype.getDelegateOptions = function () {
        var b = {}, c = this.getDefaults();
        return this._options && a.each(this._options, function (a, d) {
            c[a] != d && (b[a] = d)
        }), b
    }, c.prototype.enter = function (b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), b instanceof a.Event && (c.inState["focusin" == b.type ? "focus" : "hover"] = !0), c.tip().hasClass("in") || "in" == c.hoverState ? void (c.hoverState = "in") : (clearTimeout(c.timeout), c.hoverState = "in", c.options.delay && c.options.delay.show ? void (c.timeout = setTimeout(function () {
            "in" == c.hoverState && c.show()
        }, c.options.delay.show)) : c.show())
    }, c.prototype.isInStateTrue = function () {
        for (var a in this.inState)
            if (this.inState[a]) return !0;
        return !1
    }, c.prototype.leave = function (b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), b instanceof a.Event && (c.inState["focusout" == b.type ? "focus" : "hover"] = !1), c.isInStateTrue() ? void 0 : (clearTimeout(c.timeout), c.hoverState = "out", c.options.delay && c.options.delay.hide ? void (c.timeout = setTimeout(function () {
            "out" == c.hoverState && c.hide()
        }, c.options.delay.hide)) : c.hide())
    }, c.prototype.show = function () {
        var b = a.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(b);
            var d = a.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (b.isDefaultPrevented() || !d) return;
            var e = this, f = this.tip(), g = this.getUID(this.type);
            this.setContent(), f.attr("id", g), this.$element.attr("aria-describedby", g), this.options.animation && f.addClass("fade");
            var h = "function" == typeof this.options.placement ? this.options.placement.call(this, f[0], this.$element[0]) : this.options.placement,
                i = /\s?auto?\s?/i, j = i.test(h);
            j && (h = h.replace(i, "") || "top"), f.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(h).data("bs." + this.type, this), this.options.container ? f.appendTo(this.options.container) : f.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
            var k = this.getPosition(), l = f[0].offsetWidth, m = f[0].offsetHeight;
            if (j) {
                var n = h, o = this.getPosition(this.$viewport);
                h = "bottom" == h && k.bottom + m > o.bottom ? "top" : "top" == h && k.top - m < o.top ? "bottom" : "right" == h && k.right + l > o.width ? "left" : "left" == h && k.left - l < o.left ? "right" : h, f.removeClass(n).addClass(h)
            }
            var p = this.getCalculatedOffset(h, k, l, m);
            this.applyPlacement(p, h);
            var q = function () {
                var a = e.hoverState;
                e.$element.trigger("shown.bs." + e.type), e.hoverState = null, "out" == a && e.leave(e)
            };
            a.support.transition && this.$tip.hasClass("fade") ? f.one("bsTransitionEnd", q).emulateTransitionEnd(c.TRANSITION_DURATION) : q()
        }
    }, c.prototype.applyPlacement = function (b, c) {
        var d = this.tip(), e = d[0].offsetWidth, f = d[0].offsetHeight, g = parseInt(d.css("margin-top"), 10),
            h = parseInt(d.css("margin-left"), 10);
        isNaN(g) && (g = 0), isNaN(h) && (h = 0), b.top += g, b.left += h, a.offset.setOffset(d[0], a.extend({
            using: function (a) {
                d.css({top: Math.round(a.top), left: Math.round(a.left)})
            }
        }, b), 0), d.addClass("in");
        var i = d[0].offsetWidth, j = d[0].offsetHeight;
        "top" == c && j != f && (b.top = b.top + f - j);
        var k = this.getViewportAdjustedDelta(c, b, i, j);
        k.left ? b.left += k.left : b.top += k.top;
        var l = /top|bottom/.test(c), m = l ? 2 * k.left - e + i : 2 * k.top - f + j,
            n = l ? "offsetWidth" : "offsetHeight";
        d.offset(b), this.replaceArrow(m, d[0][n], l)
    }, c.prototype.replaceArrow = function (a, b, c) {
        this.arrow().css(c ? "left" : "top", 50 * (1 - a / b) + "%").css(c ? "top" : "left", "")
    }, c.prototype.setContent = function () {
        var a = this.tip(), b = this.getTitle();
        a.find(".tooltip-inner")[this.options.html ? "html" : "text"](b), a.removeClass("fade in top bottom left right")
    }, c.prototype.hide = function (b) {
        function d() {
            "in" != e.hoverState && f.detach(), e.$element.removeAttr("aria-describedby").trigger("hidden.bs." + e.type), b && b()
        }

        var e = this, f = a(this.$tip), g = a.Event("hide.bs." + this.type);
        return this.$element.trigger(g), g.isDefaultPrevented() ? void 0 : (f.removeClass("in"), a.support.transition && f.hasClass("fade") ? f.one("bsTransitionEnd", d).emulateTransitionEnd(c.TRANSITION_DURATION) : d(), this.hoverState = null, this)
    }, c.prototype.fixTitle = function () {
        var a = this.$element;
        (a.attr("title") || "string" != typeof a.attr("data-original-title")) && a.attr("data-original-title", a.attr("title") || "").attr("title", "")
    }, c.prototype.hasContent = function () {
        return this.getTitle()
    }, c.prototype.getPosition = function (b) {
        b = b || this.$element;
        var c = b[0], d = "BODY" == c.tagName, e = c.getBoundingClientRect();
        null == e.width && (e = a.extend({}, e, {width: e.right - e.left, height: e.bottom - e.top}));
        var f = d ? {top: 0, left: 0} : b.offset(),
            g = {scroll: d ? document.documentElement.scrollTop || document.body.scrollTop : b.scrollTop()},
            h = d ? {width: a(window).width(), height: a(window).height()} : null;
        return a.extend({}, e, g, h, f)
    }, c.prototype.getCalculatedOffset = function (a, b, c, d) {
        return "bottom" == a ? {
            top: b.top + b.height,
            left: b.left + b.width / 2 - c / 2
        } : "top" == a ? {
            top: b.top - d,
            left: b.left + b.width / 2 - c / 2
        } : "left" == a ? {top: b.top + b.height / 2 - d / 2, left: b.left - c} : {
            top: b.top + b.height / 2 - d / 2,
            left: b.left + b.width
        }
    }, c.prototype.getViewportAdjustedDelta = function (a, b, c, d) {
        var e = {top: 0, left: 0};
        if (!this.$viewport) return e;
        var f = this.options.viewport && this.options.viewport.padding || 0, g = this.getPosition(this.$viewport);
        if (/right|left/.test(a)) {
            var h = b.top - f - g.scroll, i = b.top + f - g.scroll + d;
            h < g.top ? e.top = g.top - h : i > g.top + g.height && (e.top = g.top + g.height - i)
        } else {
            var j = b.left - f, k = b.left + f + c;
            j < g.left ? e.left = g.left - j : k > g.right && (e.left = g.left + g.width - k)
        }
        return e
    }, c.prototype.getTitle = function () {
        var a, b = this.$element, c = this.options;
        return a = b.attr("data-original-title") || ("function" == typeof c.title ? c.title.call(b[0]) : c.title)
    }, c.prototype.getUID = function (a) {
        do a += ~~(1e6 * Math.random()); while (document.getElementById(a));
        return a
    }, c.prototype.tip = function () {
        if (!this.$tip && (this.$tip = a(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
        return this.$tip
    }, c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, c.prototype.enable = function () {
        this.enabled = !0
    }, c.prototype.disable = function () {
        this.enabled = !1
    }, c.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled
    }, c.prototype.toggle = function (b) {
        var c = this;
        b && (c = a(b.currentTarget).data("bs." + this.type), c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c))), b ? (c.inState.click = !c.inState.click, c.isInStateTrue() ? c.enter(c) : c.leave(c)) : c.tip().hasClass("in") ? c.leave(c) : c.enter(c)
    }, c.prototype.destroy = function () {
        var a = this;
        clearTimeout(this.timeout), this.hide(function () {
            a.$element.off("." + a.type).removeData("bs." + a.type), a.$tip && a.$tip.detach(), a.$tip = null, a.$arrow = null, a.$viewport = null
        })
    };
    var d = a.fn.tooltip;
    a.fn.tooltip = b, a.fn.tooltip.Constructor = c, a.fn.tooltip.noConflict = function () {
        return a.fn.tooltip = d, this
    }
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.popover"), f = "object" == typeof b && b;
            (e || !/destroy|hide/.test(b)) && (e || d.data("bs.popover", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }

    var c = function (a, b) {
        this.init("popover", a, b)
    };
    if (!a.fn.tooltip) throw new Error("Popover requires tooltip.js");
    c.VERSION = "3.3.6", c.DEFAULTS = a.extend({}, a.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }), c.prototype = a.extend({}, a.fn.tooltip.Constructor.prototype), c.prototype.constructor = c, c.prototype.getDefaults = function () {
        return c.DEFAULTS
    }, c.prototype.setContent = function () {
        var a = this.tip(), b = this.getTitle(), c = this.getContent();
        a.find(".popover-title")[this.options.html ? "html" : "text"](b), a.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof c ? "html" : "append" : "text"](c), a.removeClass("fade top bottom left right in"), a.find(".popover-title").html() || a.find(".popover-title").hide()
    }, c.prototype.hasContent = function () {
        return this.getTitle() || this.getContent()
    }, c.prototype.getContent = function () {
        var a = this.$element, b = this.options;
        return a.attr("data-content") || ("function" == typeof b.content ? b.content.call(a[0]) : b.content)
    }, c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    };
    var d = a.fn.popover;
    a.fn.popover = b, a.fn.popover.Constructor = c, a.fn.popover.noConflict = function () {
        return a.fn.popover = d, this
    }
}(jQuery), +function (a) {
    "use strict";

    function b(c, d) {
        this.$body = a(document.body), this.$scrollElement = a(a(c).is(document.body) ? window : c), this.options = a.extend({}, b.DEFAULTS, d), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", a.proxy(this.process, this)), this.refresh(), this.process()
    }

    function c(c) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.scrollspy"), f = "object" == typeof c && c;
            e || d.data("bs.scrollspy", e = new b(this, f)), "string" == typeof c && e[c]()
        })
    }

    b.VERSION = "3.3.6", b.DEFAULTS = {offset: 10}, b.prototype.getScrollHeight = function () {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }, b.prototype.refresh = function () {
        var b = this, c = "offset", d = 0;
        this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), a.isWindow(this.$scrollElement[0]) || (c = "position", d = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function () {
            var b = a(this), e = b.data("target") || b.attr("href"), f = /^#./.test(e) && a(e);
            return f && f.length && f.is(":visible") && [[f[c]().top + d, e]] || null
        }).sort(function (a, b) {
            return a[0] - b[0]
        }).each(function () {
            b.offsets.push(this[0]), b.targets.push(this[1])
        })
    }, b.prototype.process = function () {
        var a, b = this.$scrollElement.scrollTop() + this.options.offset, c = this.getScrollHeight(),
            d = this.options.offset + c - this.$scrollElement.height(), e = this.offsets, f = this.targets,
            g = this.activeTarget;
        if (this.scrollHeight != c && this.refresh(), b >= d) return g != (a = f[f.length - 1]) && this.activate(a);
        if (g && b < e[0]) return this.activeTarget = null, this.clear();
        for (a = e.length; a--;) g != f[a] && b >= e[a] && (void 0 === e[a + 1] || b < e[a + 1]) && this.activate(f[a])
    }, b.prototype.activate = function (b) {
        this.activeTarget = b, this.clear();
        var c = this.selector + '[data-target="' + b + '"],' + this.selector + '[href="' + b + '"]',
            d = a(c).parents("li").addClass("active");
        d.parent(".dropdown-menu").length && (d = d.closest("li.dropdown").addClass("active")), d.trigger("activate.bs.scrollspy")
    }, b.prototype.clear = function () {
        a(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
    };
    var d = a.fn.scrollspy;
    a.fn.scrollspy = c, a.fn.scrollspy.Constructor = b, a.fn.scrollspy.noConflict = function () {
        return a.fn.scrollspy = d, this
    }, a(window).on("load.bs.scrollspy.data-api", function () {
        a('[data-spy="scroll"]').each(function () {
            var b = a(this);
            c.call(b, b.data())
        })
    })
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.tab");
            e || d.data("bs.tab", e = new c(this)), "string" == typeof b && e[b]()
        })
    }

    var c = function (b) {
        this.element = a(b)
    };
    c.VERSION = "3.3.6", c.TRANSITION_DURATION = 150, c.prototype.show = function () {
        var b = this.element, c = b.closest("ul:not(.dropdown-menu)"), d = b.data("target");
        if (d || (d = b.attr("href"), d = d && d.replace(/.*(?=#[^\s]*$)/, "")), !b.parent("li").hasClass("active")) {
            var e = c.find(".active:last a"), f = a.Event("hide.bs.tab", {relatedTarget: b[0]}),
                g = a.Event("show.bs.tab", {relatedTarget: e[0]});
            if (e.trigger(f), b.trigger(g), !g.isDefaultPrevented() && !f.isDefaultPrevented()) {
                var h = a(d);
                this.activate(b.closest("li"), c), this.activate(h, h.parent(), function () {
                    e.trigger({type: "hidden.bs.tab", relatedTarget: b[0]}), b.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: e[0]
                    })
                })
            }
        }
    }, c.prototype.activate = function (b, d, e) {
        function f() {
            g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), h ? (b[0].offsetWidth, b.addClass("in")) : b.removeClass("fade"), b.parent(".dropdown-menu").length && b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), e && e()
        }

        var g = d.find("> .active"),
            h = e && a.support.transition && (g.length && g.hasClass("fade") || !!d.find("> .fade").length);
        g.length && h ? g.one("bsTransitionEnd", f).emulateTransitionEnd(c.TRANSITION_DURATION) : f(), g.removeClass("in")
    };
    var d = a.fn.tab;
    a.fn.tab = b, a.fn.tab.Constructor = c, a.fn.tab.noConflict = function () {
        return a.fn.tab = d, this
    };
    var e = function (c) {
        c.preventDefault(), b.call(a(this), "show")
    };
    a(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', e).on("click.bs.tab.data-api", '[data-toggle="pill"]', e)
}(jQuery), +function (a) {
    "use strict";

    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.affix"), f = "object" == typeof b && b;
            e || d.data("bs.affix", e = new c(this, f)), "string" == typeof b && e[b]()
        })
    }

    var c = function (b, d) {
        this.options = a.extend({}, c.DEFAULTS, d), this.$target = a(this.options.target).on("scroll.bs.affix.data-api", a.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", a.proxy(this.checkPositionWithEventLoop, this)), this.$element = a(b), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
    };
    c.VERSION = "3.3.6", c.RESET = "affix affix-top affix-bottom", c.DEFAULTS = {
        offset: 0,
        target: window
    }, c.prototype.getState = function (a, b, c, d) {
        var e = this.$target.scrollTop(), f = this.$element.offset(), g = this.$target.height();
        if (null != c && "top" == this.affixed) return c > e ? "top" : !1;
        if ("bottom" == this.affixed) return null != c ? e + this.unpin <= f.top ? !1 : "bottom" : a - d >= e + g ? !1 : "bottom";
        var h = null == this.affixed, i = h ? e : f.top, j = h ? g : b;
        return null != c && c >= e ? "top" : null != d && i + j >= a - d ? "bottom" : !1
    }, c.prototype.getPinnedOffset = function () {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(c.RESET).addClass("affix");
        var a = this.$target.scrollTop(), b = this.$element.offset();
        return this.pinnedOffset = b.top - a
    }, c.prototype.checkPositionWithEventLoop = function () {
        setTimeout(a.proxy(this.checkPosition, this), 1)
    }, c.prototype.checkPosition = function () {
        if (this.$element.is(":visible")) {
            var b = this.$element.height(), d = this.options.offset, e = d.top, f = d.bottom,
                g = Math.max(a(document).height(), a(document.body).height());
            "object" != typeof d && (f = e = d), "function" == typeof e && (e = d.top(this.$element)), "function" == typeof f && (f = d.bottom(this.$element));
            var h = this.getState(g, b, e, f);
            if (this.affixed != h) {
                null != this.unpin && this.$element.css("top", "");
                var i = "affix" + (h ? "-" + h : ""), j = a.Event(i + ".bs.affix");
                if (this.$element.trigger(j), j.isDefaultPrevented()) return;
                this.affixed = h, this.unpin = "bottom" == h ? this.getPinnedOffset() : null, this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix", "affixed") + ".bs.affix")
            }
            "bottom" == h && this.$element.offset({top: g - b - f})
        }
    };
    var d = a.fn.affix;
    a.fn.affix = b, a.fn.affix.Constructor = c, a.fn.affix.noConflict = function () {
        return a.fn.affix = d, this
    }, a(window).on("load", function () {
        a('[data-spy="affix"]').each(function () {
            var c = a(this), d = c.data();
            d.offset = d.offset || {}, null != d.offsetBottom && (d.offset.bottom = d.offsetBottom), null != d.offsetTop && (d.offset.top = d.offsetTop), b.call(c, d)
        })
    })
}(jQuery);
!function (a) {
    function b(a) {
        return "undefined" == typeof a.which || "number" == typeof a.which && a.which > 0 && (!a.ctrlKey && !a.metaKey && !a.altKey && 8 != a.which && 9 != a.which && 13 != a.which && 16 != a.which && 17 != a.which && 20 != a.which && 27 != a.which)
    }

    function c(b) {
        var c = a(b);
        c.prop("disabled") || c.closest(".form-group").addClass("is-focused")
    }

    function d(a, b) {
        var c;
        return c = a.hasClass("checkbox-inline") || a.hasClass("radio-inline") ? a : a.closest(".checkbox").length ? a.closest(".checkbox") : a.closest(".radio"), c.toggleClass("disabled", b)
    }

    function e(b) {
        var e = !1;
        (b.is(a.material.options.checkboxElements) || b.is(a.material.options.radioElements)) && (e = !0), b.closest("label").hover(function () {
            var b = a(this).find("input"), f = b.prop("disabled");
            e && d(a(this), f), f || c(b)
        }, function () {
            f(a(this).find("input"))
        })
    }

    function f(b) {
        a(b).closest(".form-group").removeClass("is-focused")
    }

    a.expr[":"].notmdproc = function (b) {
        return !a(b).data("mdproc")
    }, a.material = {
        options: {
            validate: !0,
            input: !0,
            ripples: !0,
            checkbox: !0,
            togglebutton: !0,
            radio: !0,
            arrive: !0,
            autofill: !1,
            withRipples: [".btn:not(.btn-link)", ".card-image", ".navbar a:not(.withoutripple)", ".dropdown-menu a", ".nav-tabs a:not(.withoutripple)", ".withripple", ".pagination li:not(.active):not(.disabled) a:not(.withoutripple)"].join(","),
            inputElements: "input.form-control, textarea.form-control, select.form-control",
            checkboxElements: ".checkbox > label > input[type=checkbox], label.checkbox-inline > input[type=checkbox]",
            togglebuttonElements: ".togglebutton > label > input[type=checkbox]",
            radioElements: ".radio > label > input[type=radio], label.radio-inline > input[type=radio]"
        }, checkbox: function (b) {
            var c = a(b ? b : this.options.checkboxElements).filter(":notmdproc").data("mdproc", !0).after("<span class='checkbox-material'><span class='check'></span></span>");
            e(c)
        }, togglebutton: function (b) {
            var c = a(b ? b : this.options.togglebuttonElements).filter(":notmdproc").data("mdproc", !0).after("<span class='toggle'></span>");
            e(c)
        }, radio: function (b) {
            var c = a(b ? b : this.options.radioElements).filter(":notmdproc").data("mdproc", !0).after("<span class='circle'></span><span class='check'></span>");
            e(c)
        }, input: function (b) {
            a(b ? b : this.options.inputElements).filter(":notmdproc").data("mdproc", !0).each(function () {
                var b = a(this), c = b.closest(".form-group");
                0 !== c.length || "hidden" === b.attr("type") || b.attr("hidden") || (b.wrap("<div class='form-group'></div>"), c = b.closest(".form-group")), b.attr("data-hint") && (b.after("<p class='help-block'>" + b.attr("data-hint") + "</p>"), b.removeAttr("data-hint"));
                var d = {"input-lg": "form-group-lg", "input-sm": "form-group-sm"};
                if (a.each(d, function (a, d) {
                    b.hasClass(a) && (b.removeClass(a), c.addClass(d))
                }), b.hasClass("floating-label")) {
                    var e = b.attr("placeholder");
                    b.attr("placeholder", null).removeClass("floating-label");
                    var f = b.attr("id"), g = "";
                    f && (g = "for='" + f + "'"), c.addClass("label-floating"), b.after("<label " + g + "class='control-label'>" + e + "</label>")
                }
                null !== b.val() && "undefined" != b.val() && "" !== b.val() || c.addClass("is-empty"), c.find("input[type=file]").length > 0 && c.addClass("is-fileinput")
            })
        }, attachInputEventHandlers: function () {
            var d = this.options.validate;
            a(document).on("keydown paste", ".form-control", function (c) {
                b(c) && a(this).closest(".form-group").removeClass("is-empty")
            }).on("keyup change", ".form-control", function () {
                var b = a(this), c = b.closest(".form-group"),
                    e = "undefined" == typeof b[0].checkValidity || b[0].checkValidity();
                "" === b.val() ? c.addClass("is-empty") : c.removeClass("is-empty"), d && (e ? c.removeClass("has-error") : c.addClass("has-error"))
            }).on("focus", ".form-control, .form-group.is-fileinput", function () {
                c(this)
            }).on("blur", ".form-control, .form-group.is-fileinput", function () {
                f(this)
            }).on("change", ".form-group input", function () {
                var b = a(this);
                if ("file" != b.attr("type")) {
                    var c = b.closest(".form-group"), d = b.val();
                    d ? c.removeClass("is-empty") : c.addClass("is-empty")
                }
            }).on("change", ".form-group.is-fileinput input[type='file']", function () {
                var b = a(this), c = b.closest(".form-group"), d = "";
                a.each(this.files, function (a, b) {
                    d += b.name + ", "
                }), d = d.substring(0, d.length - 2), d ? c.removeClass("is-empty") : c.addClass("is-empty"), c.find("input.form-control[readonly]").val(d)
            })
        }, ripples: function (b) {
            a(b ? b : this.options.withRipples).ripples()
        }, autofill: function () {
            var b = setInterval(function () {
                a("input[type!=checkbox]").each(function () {
                    var b = a(this);
                    b.val() && b.val() !== b.attr("value") && b.trigger("change")
                })
            }, 100);
            setTimeout(function () {
                clearInterval(b)
            }, 1e4)
        }, attachAutofillEventHandlers: function () {
            var b;
            a(document).on("focus", "input", function () {
                var c = a(this).parents("form").find("input").not("[type=file]");
                b = setInterval(function () {
                    c.each(function () {
                        var b = a(this);
                        b.val() !== b.attr("value") && b.trigger("change")
                    })
                }, 100)
            }).on("blur", ".form-group input", function () {
                clearInterval(b)
            })
        }, init: function (b) {
            this.options = a.extend({}, this.options, b);
            var c = a(document);
            a.fn.ripples && this.options.ripples && this.ripples(), this.options.input && (this.input(), this.attachInputEventHandlers()), this.options.checkbox && this.checkbox(), this.options.togglebutton && this.togglebutton(), this.options.radio && this.radio(), this.options.autofill && (this.autofill(), this.attachAutofillEventHandlers()), document.arrive && this.options.arrive && (a.fn.ripples && this.options.ripples && c.arrive(this.options.withRipples, function () {
                a.material.ripples(a(this))
            }), this.options.input && c.arrive(this.options.inputElements, function () {
                a.material.input(a(this))
            }), this.options.checkbox && c.arrive(this.options.checkboxElements, function () {
                a.material.checkbox(a(this))
            }), this.options.radio && c.arrive(this.options.radioElements, function () {
                a.material.radio(a(this))
            }), this.options.togglebutton && c.arrive(this.options.togglebuttonElements, function () {
                a.material.togglebutton(a(this))
            }))
        }
    }
}(jQuery);

function limit() {
    return 10
}

function main_domain() {
    return '<?= $base_url; ?>';
}

function get_local_alphabets() {
    return $("#local_alphabets").val()
}

function lang() {
    return '<?= $lang ?>'
}

function lang_uc() {
    return lang().charAt(0).toUpperCase() + lang().slice(1)
}

function token() {
    return "123456"
}

function showSth(a) {
    $("." + a + "_btn").remove(), $("." + a + "_details").show()
}

function submit_search(a) {
    $("#q").val(a), $(".suggested_list li").removeClass("selected"), $("#q_form").submit()
}

function show_meaning(a) {
    var e = a, t = 1;
    e.charAt(0).match(/[a-z]/i) ? (t = 0, e = a.replace(/\W/g, "").replace("_", "").replace(" ", "").toLowerCase(), $(".page-title").text("Read Text :: English to " + lang_uc())) : (e = a.replace("_", "").replace(",", "").replace(" ", "").replace("?", "").replace("???", "").replace("!", "").replace("'", "").replace('"', ""), $(".page-title").text("Read Text :: " + lang_uc + " to English")), $("#complete-dialog").modal("show"), 0 == t ? $(".modal-title").html('&#9679; ' + e.charAt(0).toUpperCase() + e.slice(1)) : $(".modal-title").html('&#9679; ' + e), $(".modal-body").html('<div class="loader"><img style="width:50px;" src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'), run_ajax(e, t, ".modal-body")
}

function show_suggestion(a, e) {
    if ($(".suggested_list").html(""), "" != a && null != a)
        for (var t = a.split(","), i = 0, l = 0; l < t.length && !(0 == t[l].indexOf(e) && (i++, $(".suggested_list").append("<li onclick=\"submit_search('" + t[l] + "')\">" + t[l] + "</li>"), i > 20)); l++) ;
}

function calHistory(a, e) {
    var t = [];
    if (null != localStorage.getItem("word_history") && (t = $.parseJSON(localStorage.getItem("word_history"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), localStorage.setItem("word_history", JSON.stringify(t.getUnique())), $(".load_search_history").html(showHistory()), 0 == e) {
        var i = 1 == e ? "added to" : "removed from";
        $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> your favorite word list.")
    }
}

function calFavs(a, e) {
    var t = [];
    null != localStorage.getItem("favs") && (t = $.parseJSON(localStorage.getItem("favs"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), console.log(t.getUnique()), localStorage.setItem("favs", JSON.stringify(t.getUnique())), $(".load_favs").html(showFavs());
    var i = 1 == e ? "added to" : "removed from";
    $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> your favorite word list.")
}

function showFavs() {
    var a = "", e = $.parseJSON(localStorage.getItem("favs"));
    return a = '<div class="list-group">', null != localStorage.getItem("favs") && $.each(e.reverse(), function (e, t) {
        return a += '<div class="list-group-item"><div class="history-row">', a += '<h4 class="list-group-item-heading pull-left"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></h4>", a += '<div class="list-group-item-text pull-right history-remove-btn" onclick="calFavs(\'' + t + '\', 0)"><img src="' + main_domain() + '/imgs/clear.png"/></div>', a += '<div class="clear">&nbsp;</div>', a += "</div></div>", e < limit()
    }), null != localStorage.getItem("favs") && e.length > limit() && (a += '<a href="' + main_domain() + '/favorite-words" class="btn btn-primary btn-raised">See More</a>'), a += "</div>", null == localStorage.getItem("favs") ? "<p>Currently you do not have any favorite word. To make a word favorite you have to click on the heart button.</p>" : a
}

function showHistory() {
    var a = "";
    a = '<div class="list-group">';
    var e = $.parseJSON(localStorage.getItem("word_history"));
    return null != localStorage.getItem("word_history") && $.each(e.reverse(), function (e, t) {
        return a += '<div class="list-group-item"><div class="history-row">', a += '<h4 class="list-group-item-heading pull-left"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></h4>", a += '<div class="list-group-item-text pull-right history-remove-btn" onclick="calHistory(\'' + t + '\', 0)"><img src="' + main_domain() + '/imgs/clear.png"/></div>', a += '<div class="clear">&nbsp;</div>', a += "</div></div>", e < limit()
    }), null != localStorage.getItem("word_history") && e.length > limit() && (a += '<a href="' + main_domain() + '/word-history" class="btn btn-primary btn-raised">See More</a>'), a += "</div>", null == localStorage.getItem("word_history") ? "<p>Any word you search will appear here.</p>" : a
}

function showAllStorageData(a) {
    var e = "";
    e = '';
    var t = $.parseJSON(localStorage.getItem(a));
    if (a == 'word_history') {
        return $.each(t.sort(), function (a, t) {
            e += '<span style="padding:10px 0px">', e += '<div style="float:left" class="label_font"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></div>", e += '<div style="float:right" class="history-remove-btn" onclick="calHistory(\'' + t + '\', 0)"><img src="' + main_domain() + '/imgs/clear.png"/></div></span>', e += ""
        }), e += "", null != t && 0 == t.length ? "<div class='custom_margin3 alert_text>You do not have any word in this list!</div>" : e
    }
    if (a == 'favs') {
        return $.each(t.sort(), function (a, t) {
            e += '<span style="padding:10px 0px">', e += '<div style="float:left" class="label_font"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></div>", e += '<div style="float:right" class="history-remove-btn" onclick="calFavs(\'' + t + '\', 0)"><img src="' + main_domain() + '/imgs/clear.png"/></div></span>', e += ""
        }), e += "", null != t && 0 == t.length ? "<div class='custom_margin3 alert_text>You do not have any word in this list!</div>" : e
    }
}

function run_ajax(a, e, t) {
    $.ajax({
        type: "get",
        url: "https://server2.mcqstudy.com/get2.php",
        data: {token: token(), q: a, lang: lang(), type: e},
        success: function (e) {
            var i = "<div class='box_wrapper' style='-webkit-box-shadow: none;-mozbox-shadow: none; box-shadow: none;width: 100%;'><fieldset style='margin:0px;'><div class='fieldset_body inner_details'>",
                l = jQuery.parseJSON(e);
            if (2 == l.error) return void (window.location.href = "https://server2.mcqstudy.com/captcha.php?q=" + a);
            if (l.main && (calHistory(a, 1), document.title = "English to " + lang_uc() + " meaning: " + a + " - " + l.main, i += '<span><div class="align_text  custom_font2">' + a + ' : </div><div class="align_text2">' + l.main + '</div><label class="img_align"> Word Pronounce:<button class="icon_button" onclick="responsiveVoice.speak(\'' + a + '\')"><img src="' + main_domain() + '/stage/img/play-icon.png"/></button></label><label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' + a + '\', 1)"><img src="' + main_domain() + '/stage/img/favourite-icon.png"/></button></label></span>', l.related && (i += "", $.each(l.related, function (a, e) {
                s++, i += "<span><div class='label_font'>" + a + " :: </div>" + e + '</span>'
            }))), 1 == l.error) {
                if (null != l.sug && "[]" != l.sug) {
                    i += "<span><div class='alert_text'>" + l.msg + "</div><div class='custom_margin3'></div><div class='h_line'></div><div class='custom_font3'>Did you mean?</div></span>";
                    var n = jQuery.parseJSON(l.sug);
                    $.each(n, function (a, e) {
                        i += '<span><a style="display:block;" href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + e + '">' + e + "</a></span>"
                    })
                } else {
                    i += "<span><div class='alert_text'>" + l.msg + "</div></span>";
                }
                return void $(t).html(i)
            }
            if (1 == l.type && null != l.data && null != l.data[0]) {
                document.title = lang_uc() + " to English meaning: " + a, i += '<br><div class="jumbo_title">' + lang_uc() + " to English Menaing: " + a + "</div>", i += '<div class="jumbo_details bn_meaning">';
                var s = 0;
                $.each(l.data, function (a, e) {
                    s++, i += "<p>" + s + ". " + e.mean + " = " + e.word + "</p>"
                }), i += "</div>"
            }
            if (null != l.mean && null != l.data.img && "bengali" == lang()) {
                i += '<span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label>';
                var o = l.data.img;
                "into" == a && (o = "into"), i += '<div class="h_line2"></div><div class="dic_img">', i += '<img src="https://movdict.sgp1.digitaloceanspaces.com/ba2/' + l.data.img.toUpperCase() + '.JPG" title="' + o + '" alt="' + o + '" />', i += "</div></span>"
            }
            if (null != l.mean && Object.size(l.data.mean) > 0) {
                i += '<span><label>English to ' + lang_uc() + " Meaning</label></span>";
                var r = 0;
                $.each(l.data.mean, function (a, e) {
                    r++, r > 1 && (i += "");
                    var t = [];
                    $.each(e, function (a, e) {
                        void 0 != l.mean[e] && t.push(l.mean[e])
                    }), i += ("main" != a ? "<span><label>" + a + ":</label> " : "") + t.getUnique().join(", ") + '</span>'
                })
            }
            if (null != l.mean && Object.size(l.data.eng) > 0) {
                i += '<span><div class="accordion_collapse"><h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion" class="custom-accordion-content">';
                var r = 0;
                $.each(l.data.eng, function (e, t) {
                    r++, r > 1 && (i += ""), i += "<strong class='custom_font2'>" + a + " [" + e + "]</strong>", i += "<p>", s = 0, $.each(t, function (a, e) {
                        s++, i += "<span>(" + s + ") " + e + "</span>"
                    }), i += "</p>", i += "</p>"
                }), i += "</div>", i += "</div></span>"
            }
            null != l.mean && Object.size(l.data.phrase) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion2()" class="custom-accordion-header">Related Phrases<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion2" class="custom-accordion-content">', $.each(l.data.phrase, function (a, e) {
                void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + "). " + e + " = " + l.mean[e] + "</span>")
            }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.examples) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="examples_details" onclick="showHideAccordion3()" class="custom-accordion-header">Examples<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion3" class="custom-accordion-content">', $.each(l.data.examples, function (a, e) {
                s++, s > 1 && (i += ""), i += "<span>" + s + ". " + e + "</span>"
            }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.syn) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion4()" class="custom-accordion-header">Synonyms<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion4" class="custom-accordion-content">', $.each(l.data.syn, function (a, e) {
                void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + ") " + e + " = " + l.mean[e] + "</span>")
            }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.anto) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion5()" class="custom-accordion-header">Antonyms<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion5" class="custom-accordion-content">', $.each(l.data.anto, function (a, e) {
                void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + ") " + e + " = " + l.mean[e] + "</span>")
            }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.variants) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion6()" class="custom-accordion-header">Different forms<div class="icon_right">(+)</div></h4>', i += '<div id="accordion6" class="custom-accordion-content">', i += "<span>" + l.data.variants.join(", ") + "</span>", i += "</div></div></span>"), null != l.mean && Object.size(l.data.similar) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion7()">Similar Words<div class="icon_right">(+)</div></h4>', i += '<div id="accordion7" class="custom-accordion-content">', i += "<span>" + l.data.similar.join(", ") + "</span>", i += "</div></div></span>"), i += '</div></fieldset></div>', $(t).html(i)
        },
        error: function () {
            console.log("error")
        }
    })
}

function SingleWords() {
    var a = "";
    a += "<legend><span class='custom_font2'><h1>Browse Words Alphabetically</h1></span></legend><div class='fieldset_body'>";
    var e = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "x", "y", "z"],
        t = "<span>";
    $.each(e, function (a, e) {
        t += '<button class="btn_default4 bdr_radius2"><a onclick="DoubleWords(\'' + e + "')\">" + e + "</a></button>"
    }), a += t + "</span><div class='custom_margin2'></div><div class='h_line2'></div><span>";
    var i = get_local_alphabets(), l = i.split(","), n = "";
    $.each(l, function (a, e) {
        n += '<button class="btn_default4 bdr_radius2"><a onclick="DoubleWords(\'' + e + "')\">" + e + '</a></button>'
    }), a += n + '</span>', $(".main-area").html(a)
}

function DoubleWords(a) {
    var e = a.charAt(0), t = localStorage.getItem(e);
    if (null === t) {
        var i = "words/local/" + lang();
        e.match(/[a-z]/i) && (i = "ta-word-list"), $.ajax({
            type: "get",
            url: main_domain() + "/" + i + "/" + e + ".txt",
            success: function (a) {
                localStorage.setItem(e, a), a = localStorage.getItem(e)
            },
            error: function () {
                console.log("error")
            }
        })
    }
    var l = [];
    if ("" != t)
        for (var n = t.split(","), s = 0; s < n.length; s++) l.push(n[s].charAt(0) + n[s].charAt(1));
    var o = l.getUnique(), r = "";
    r += "", r += '<legend><span class="custom_font2">Filter Words :: ' + a + "</span></legend>", r += '', r += "<div class='fieldset_body'><span>", $.each(o, function (a, e) {
        r += '<button class="btn_default4 bdr_radius2" onclick="WordListByDouble(\'' + e + "')\">" + e + "</button>"
    }), r += "</span><div class='custom_margin2'></div><button class='btn_pre bdr_radius2 cursor_link' onclick='SingleWords()'><a>← Back</a></button></div>", $(".main-area").html(r)
}

function WordListByDouble(a) {
    var e = localStorage.getItem(a.charAt(0)), t = [];
    if ("" != e)
        for (var i = e.split(","), l = 0; l < i.length; l++) i[l].charAt(0) == a.charAt(0) && i[l].charAt(1) == a.charAt(1) && t.push(i[l]);
    var n = t.getUnique(), s = "";
    s += "", s += '<legend>Words starting with :: ' + a + "</legend>", s += '<div class="fieldset_body inner_details">';
    var o = 0;
    $.each(n, function (a, e) {
        o++, s += '<span><a href="javascript:void(0)" onclick="show_meaning(\'' + e + "')\"><label class='cursor_link'>" + o + ". " + e + "</label></a></span>"
    }), s += '<div class="custom_margin2"></div><button class="btn_pre bdr_radius2 cursor_link" onclick="DoubleWords(\'' + a.charAt(0) + "')\"><a>← Back</a></button>", s += "</div>", $(".main-area").html(s)
}

function learn_show_seasions() {
    var a = "";
    a += "<h2>Learn Ten Words Everyday :: Seasions</h2>";
    for (var e = 1; 33 > e; e++) a += '<hr><a href="' + main_domain() + "/learn-ten-words-everyday/" + e + '">Session #' + e + "</a>";
    $("#load_seassions").html(a)
}

function learn_show_episodes(a) {
    var e = "";
    e += "<h2>Episodes in Seasion #" + a + "</h2>";
    for (var t = 1; 51 > t; t++) e += '<hr><a href="' + main_domain() + "/learn-ten-words-everyday/" + a + "/" + t + '">Episode @' + t + "</a>";
    $("#load_episodes").html(e)
}

function learn_show_data(a, e, lang, main_url) {
    $("#load_data").html('<div class="loader"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'), $i = 0, $.ajax({
        type: "get",
        url: "https://server2.mcqstudy.com/getQuiz2.php",
        data: {token: token(), lang: lang, sid: a, id: e},
        success: function (t) {
            var i = "", l = jQuery.parseJSON(t);
            i += "<div class='fieldset_body inner_details'>", $.each(l, function (a, e) {
                $i++, i += "<span><div class='label_font'>(" + $i + ") <a href=" + main_url + "english-to-" + lang + "-meaning-" + e.main + ">" + e.main + "</a>: " + e.ans + "</div></span>"
            }), i += "</div>", $("#load_data").html(i)
        },
        error: function () {
            console.log("error")
        }
    })
}

function voc_show_seasions() {
    var a = "";
    a += "<legend>Vocabulary Game Seasons</legend><div class=\"fieldset_body inner_details\">";
    for (var e = 1; 33 > e; e++) a += '<span><a href="' + main_domain() + "/stage/vocabulary-game.php/" + e + '"><label class="cursor_link">Session #</label>' + e + "</a></span>";
    a += '</div>';
    $("#load_seassions").html(a)
}

function voc_show_episodes(a) {
    var e = "";
    e += "<h2>Vocabulary Games in Seasion #" + a + "</h2>";
    for (var t = 1; 51 > t; t++) e += '<hr><a href="' + main_domain() + "/vocabulary-game/" + a + "/" + t + '">Episode @' + t + "</a>";
    $("#load_episodes").html(e)
}

function voc_show_data(a, e,lang,baseurl) {
    $("#load_data").html('<div class="loader"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'), $i = 0, $.ajax({
        type: "get",
        url: "https://server2.mcqstudy.com/getQuiz2.php",
        data: {token: token(), lang: lang, sid: a, id: e},
        success: function (t) {
            var i = "", l = jQuery.parseJSON(t);
            i += "<div class='fieldset_body inner_details'>";
            $.each(l, function (a, e) {
                $i++, i += '<span><div class="label_font qtitle' + $i + '">(' + $i + ") What is the meaning of '" + e.main + "'?</div>", i += '<div class="custom_margin3"><div class="form-group">';
                var t = 0;
                $.each(e.quiz, function (a, l) {
                    t++, i += '<input type="radio" name="ans" id="ans' + $i + "-" + t + '" value="option' + $i + '" onchange="checkQuiz(' + $i + ",'" + e.ans + "', '" + l + '\')"> <label for="ans' + $i + "-" + t + '" style="color:#000;">' + l + "</label><br>"
                }), i += "</div></div>", i += '<div class="custom_margin3 alert_text qans' + $i + '"></div></span>'
            }), i += '</div>', $("#load_data").html(i)
        },
        error: function () {
            console.log("error")
        }
    })
}

function checkQuiz(a, e, t) {
    e != t ? ($(".qtitle" + a).addClass("alert alert-danger"), $(".qans" + a).html("Your answer is incorrect!"), $(".qans" + a).html('<div style="color:#f44336;">Your answer is incorrect!</div>')) : ($(".qtitle" + a).removeClass("alert alert-danger").addClass("alert alert-success"), $(".qans" + a).html('<div style="color:green;">Your answer is correct!</div>'))
}

function playSound(a) {
    var e = new SpeechSynthesisUtterance(a);
    window.speechSynthesis.speak(e)
}

$.material.init();
var chosen = "";
$(document).ready(function () {
    $(".navbar-toggle").on("click", function () {
        $(".navbar-collapse").hasClass("collapse") ? $(".navbar-collapse").removeClass("collapse") : $(".navbar-collapse").addClass("collapse")
    }), $(".load_search_history").html(showHistory()), $(".load_favs").html(showFavs()), $("#read_text_input").on("keyup", function () {
        var a = $(this).val(), e = a.replace("-", " ").replace("-", " ").split(" "), t = "";
        t += "", $.each(e, function (a, e) {
            t += "<div class=\"cursor_link\" onclick=\"show_meaning('" + e + "')\">" + e + " </div>"
        }), t += "", $("#load_data").html(t.replace(/\r?\n/g, "<br />"))
    }), $("#q").length && $("#q").val().trim().length > 2 && $("#q_form").submit(), $("#q").on("keyup", function () {
        var a = $(this).val().trim().toLowerCase(), e = a.charAt(0).toLowerCase();
        if (a.length > 2) {
            if (null === localStorage.getItem(e)) {
                var t = "words/local/" + lang();
                e.match(/[a-z]/i) && (t = "ta-word-list"), $.ajax({
                    type: "get",
                    url: main_domain() + "/" + t + "/" + e + ".txt",
                    success: function (a) {
                        localStorage.setItem(e, a)
                    },
                    error: function () {
                        console.log("error")
                    }
                })
            }
            show_suggestion(localStorage.getItem(e), a)
        } else $(".suggested_list").html("")
    }), $(document).keydown(function (a) {
        if (13 == a.keyCode && $("#q").val().trim().length > 0 && $("#q_form").submit(), 40 == a.keyCode) {
            if ("" == $(".suggested_list").text()) return !1;
            "" === chosen ? chosen = 0 : chosen + 1 < $(".suggested_list li").length && chosen++, $(".suggested_list li").removeClass("selected"), $(".suggested_list li:eq(" + chosen + ")").addClass("selected");
            var e = $(".suggested_list li:eq(" + chosen + ")").text();
            return $("#q").val(e), $("#q").blur(), !1
        }
        if (38 == a.keyCode) {
            if ("" == $(".suggested_list").text()) return !1;
            "" === chosen ? chosen = 0 : chosen > 0 && chosen--, $(".suggested_list li").removeClass("selected"), $(".suggested_list li:eq(" + chosen + ")").addClass("selected");
            var e = $(".suggested_list li:eq(" + chosen + ")").text();
            return $("#q").val(e), $("#q").blur(), !1
        }
    })
}), Object.size = function (a) {
    var e, t = 0;
    for (e in a) a.hasOwnProperty(e) && t++;
    return t
}, Array.prototype.getUnique = function () {
    for (var a = {}, e = [], t = 0, i = this.length; i > t; ++t) a.hasOwnProperty(this[t]) || (e.push(this[t]), a[this[t]] = 1);
    return e
}, $("#q_form").submit(function (a) {
    chosen = "";
    var e = $("#q").val().trim().toLowerCase();
    if ($(".suggested_list").html(""), $("#q").blur(), 0 == e.length || "" == e) return void $("#load_data").html("<h3>Please type your word first.</h3>");
    $("#load_data").html('<div class="loader"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'), $(".suggested_list").html("");
    if (e.length > 2) {
        var t = "/" + lang() + "-to-english-meaning-", i = 1;
        e.charAt(0).match(/[a-z]/i) && (i = 0, t = "/english-to-" + lang() + "-meaning-"), window.history.pushState(null, e, main_domain() + t + e), $(".the_word").text(e), run_ajax(e, i, "#load_data")
    }
    return a.preventDefault(), !1
});