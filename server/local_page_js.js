var $apiurl = 'https://server2.mcqstudy.com/';
var $hostname = window.location.hostname;
var $domainurl = 'https://'+$hostname+'/'

var lang_domain_main_array = [];
lang_domain_main_array["174.138.22.171"] = "bengali", lang_domain_main_array["www.bdword.com"] = "bengali", lang_domain_main_array["www.english-gujarati.com"] = "gujarati", lang_domain_main_array["www.english-hindi.net"] = "hindi", lang_domain_main_array["www.english-kannada.com"] = "kannada", lang_domain_main_array["www.english-marathi.net"] = "marathi", lang_domain_main_array["www.english-nepali.com"] = "nepali", lang_domain_main_array["www.english-punjabi.net"] = "punjabi", lang_domain_main_array["www.english-tamil.net"] = "tamil", lang_domain_main_array["www.english-telugu.net"] = "telugu", lang_domain_main_array["www.english-arabic.org"] = "arabic", lang_domain_main_array["www.english-malay.net"] = "malay", lang_domain_main_array["www.english-thai.net"] = "thai", lang_domain_main_array["www.english-welsh.net"] = "welsh";


var $langname  = 'bengali';

if(lang_domain_main_array[$hostname]){
    $langname = lang_domain_main_array[$hostname];
}else{
    $langname = $hostname.replace('.english-dictionary.help','');
}

$langname = $langname.toLowerCase();

window.main_lang = $langname;


if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
+function (t) {
    "use strict";
    var e = t.fn.jquery.split(" ")[0].split(".");
    if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
}(jQuery), +function (t) {
    "use strict";

    function e(e, i) {
        return this.each(function () {
            var s = t(this), n = s.data("bs.modal"),
                r = t.extend({}, o.DEFAULTS, s.data(), "object" == typeof e && e);
            n || s.data("bs.modal", n = new o(this, r)), "string" == typeof e ? n[e](i) : r.show && n.show(i)
        })
    }

    var o = function (e, o) {
        this.options = o, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };
    o.VERSION = "3.3.7", o.TRANSITION_DURATION = 300, o.BACKDROP_TRANSITION_DURATION = 150, o.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, o.prototype.toggle = function (t) {
        return this.isShown ? this.hide() : this.show(t)
    }, o.prototype.show = function (e) {
        var i = this, s = t.Event("show.bs.modal", {relatedTarget: e});
        this.$element.trigger(s), this.isShown || s.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
            i.$element.one("mouseup.dismiss.bs.modal", function (e) {
                t(e.target).is(i.$element) && (i.ignoreBackdropClick = !0)
            })
        }), this.backdrop(function () {
            var s = t.support.transition && i.$element.hasClass("fade");
            i.$element.parent().length || i.$element.appendTo(i.$body), i.$element.show().scrollTop(0), i.adjustDialog(), s && i.$element[0].offsetWidth, i.$element.addClass("in"), i.enforceFocus();
            var n = t.Event("shown.bs.modal", {relatedTarget: e});
            s ? i.$dialog.one("bsTransitionEnd", function () {
                i.$element.trigger("focus").trigger(n)
            }).emulateTransitionEnd(o.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(n)
        }))
    }, o.prototype.hide = function (e) {
        e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(o.TRANSITION_DURATION) : this.hideModal())
    }, o.prototype.enforceFocus = function () {
        t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
            document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
        }, this))
    }, o.prototype.escape = function () {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function (t) {
            27 == t.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }, o.prototype.resize = function () {
        this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
    }, o.prototype.hideModal = function () {
        var t = this;
        this.$element.hide(), this.backdrop(function () {
            t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
        })
    }, o.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, o.prototype.backdrop = function (e) {
        var i = this, s = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var n = t.support.transition && s;
            if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + s).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                return this.ignoreBackdropClick ? void (this.ignoreBackdropClick = !1) : void (t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
            }, this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
            n ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION) : e()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var r = function () {
                i.removeBackdrop(), e && e()
            };
            t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION) : r()
        } else e && e()
    }, o.prototype.handleUpdate = function () {
        this.adjustDialog()
    }, o.prototype.adjustDialog = function () {
        var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
        })
    }, o.prototype.resetAdjustments = function () {
        this.$element.css({paddingLeft: "", paddingRight: ""})
    }, o.prototype.checkScrollbar = function () {
        var t = window.innerWidth;
        if (!t) {
            var e = document.documentElement.getBoundingClientRect();
            t = e.right - Math.abs(e.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
    }, o.prototype.setScrollbar = function () {
        var t = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
    }, o.prototype.resetScrollbar = function () {
        this.$body.css("padding-right", this.originalBodyPad)
    }, o.prototype.measureScrollbar = function () {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure", this.$body.append(t);
        var e = t.offsetWidth - t.clientWidth;
        return this.$body[0].removeChild(t), e
    };
    var i = t.fn.modal;
    t.fn.modal = e, t.fn.modal.Constructor = o, t.fn.modal.noConflict = function () {
        return t.fn.modal = i, this
    }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (o) {
        var i = t(this), s = i.attr("href"),
            n = t(i.attr("data-target") || s && s.replace(/.*(?=#[^\s]+$)/, "")),
            r = n.data("bs.modal") ? "toggle" : t.extend({remote: !/#/.test(s) && s}, n.data(), i.data());
        i.is("a") && o.preventDefault(), n.one("show.bs.modal", function (t) {
            t.isDefaultPrevented() || n.one("hidden.bs.modal", function () {
                i.is(":visible") && i.trigger("focus")
            })
        }), e.call(n, r, this)
    })
}(jQuery);

function lang_uc() {
    return lang().charAt(0).toUpperCase() + lang().slice(1);
}

function token() {
    return '123456';
}

Object.size = function (obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}

function lang() {

    return window.main_lang;
}


function limit() {
    return 10
}

function showHistory() {
    var a = "";
    a = '<div class="list-group">';
    var e = $.parseJSON(localStorage.getItem("word_history"));
    return null != localStorage.getItem("word_history") && $.each(e.reverse(), function (e, t) {
        return a += '<div class="list-group-item"><div class="history-row">', a += '<h4 class="list-group-item-heading pull-left"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></h4>", a += '<div class="list-group-item-text pull-right history-remove-btn" onclick="calHistory(\'' + t + '\', 0)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/clear.png"/></div>', a += '<div class="clear">&nbsp;</div>', a += "</div></div>", e < limit()
    }), null != localStorage.getItem("word_history") && e.length > limit() && (a += '<a href="' + main_domain() + '/word-history" style="display: block" class="btn btn-primary btn-raised">See More</a>'), a += "</div>", null == localStorage.getItem("word_history") ? "<p>Any word you search will appear here.</p>" : a
}

function calHistory(a, e) {
    var t = [];
    if (null != localStorage.getItem("word_history") && (t = $.parseJSON(localStorage.getItem("word_history"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), localStorage.setItem("word_history", JSON.stringify(t.filter(onlyUnique))), $(".load_search_history").html(showHistory()), 0 == e) {
        var i = 1 == e ? "added" : "removed";
        $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> to your favorite word list.")
    }
}


function run_ajax($q, type, content_area) {

    console.log('q-->' + $q);

    $.ajax({
        type: 'get',
        url: $apiurl+'get2.php',
        data: {token: token(), q: $q, lang: lang(), type: type},
        success: function (data) {
            var $mean = "<div class='box_wrapper' style='-webkit-box-shadow: none;-mozbox-shadow: none; box-shadow: none;width: 100%;'><fieldset style='margin:0px;'><div class='fieldset_body inner_details'>";
            var obj = jQuery.parseJSON(data);

            if (obj['error'] == 2) {
                window.location.href = $apiurl+'captcha.php?q=' + $q;
                return;
            }

            if (obj['main']) {
                calHistory($q, 1);
                document.title = 'English to ' + lang_uc() + ' meaning: ' + $q + ' - ' + obj['main'];
                //$mean += '<h2 class="pull-left">'+$q+' <button class="btn btn-raised sound-button" onclick="responsiveVoice.speak(\''+$q+'\')"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/play.png" loading="lazy"/></button>&nbsp;&nbsp;<button class="btn btn-raised sound-button fav-button" onclick="calFavs(\''+$q+'\', 1)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/favorite.png" loading="lazy"/></button> : '+obj['main']+'</h2><div class="clear">&nbsp;</div>';


                $mean += '<span><div class="align_text  custom_font2">' + $q + ' : </div><div class="align_text2">' + obj['main'] + '</div><label class="img_align"> Pronunciation:<button class="icon_button" onclick="textToSpeech(\'' + $q + '\')"><img src="https://content2.mcqstudy.com/bw-static-files/img/microphone1.png" width="35px" height="35px" loading="lazy"/></button></label><label class="img_align">Add to Favorite: <button class="icon_button" onclick="calFavs(\'' + $q + '\', 1)"><img src="https://content2.mcqstudy.com/bw-static-files/img/heart-add.png" width="35px" height="35px" loading="lazy"/></button></label></span>'

                $mean += '<span><div>';
                if (obj['related']) {
                    $.each(obj['related'], function (key2, val2) {
                        $i++;
                        $mean += '<div class="label_font line_height">' + key2 + ' :: </div><div class="line_height">' + val2 + '</div>';
                    });
                }

                $mean += '</div></span>';

            }


            $mean += '<div class="custom_margin2"></div>';

            if (obj['prev']) {
                $mean += '<button class="btn_pre bdr_radius2"><a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + obj['prev'] + '">← Previous</a></button>';
                /*if(obj['nex']==null){
                    $mean += '<div style="clear:both;"></div><hr>';
                }*/
            }


            if (obj['nex']) {
                $mean += '<button class="btn_next bdr_radius2"><a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + obj['nex'] + '">Next →</a></button>';
                //$mean += '<div style="clear:both;"></div><hr>';
            }

            if (obj['error'] == 1) {

                if (obj['sug'] != null && obj['sug'] != '[]') {
                    $mean += '<h2>Did you mean?</h2><hr>';
                    var sug = jQuery.parseJSON(obj['sug']);
                    $.each(sug, function (key, val) {
                        $mean += '<a style="display:block;" href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a><hr>';
                    });
                }

                $(content_area).html('<h3>' + obj['msg'] + '</h3><hr>' + $mean);


                return;
            }


            if (obj['type'] == 1 && obj['data'] != null && obj['data'][0] != null) {
                document.title = lang_uc() + ' to English meaning: ' + $q;
                $mean += '<div>' + lang_uc() + ' to English Menaing: ' + $q + '</div>';

                $mean += '<div>';
                var $i = 0;
                $.each(obj['data'], function (key, val) {
                    $i++;
                    $mean += '<p>' + $i + '. ' + val['mean'] + ' = ' + val['word'] + '</p>';
                });


                $mean += '</div>';


            }

            if (obj['main']) {
                $mean += '<span>';
                $mean += '<label>Other Refferences :</label>';
                $mean += '<button class="btn_default4 bdr_radius2"><a href="http://translate.google.com/#en/bn/' + $q + '" target="_blank">Google Translator</a></button><button class="btn_default4 bdr_radius2"><a class="btn btn-primary" href="http://the-definition.com/dictionary/' + $q + '" target="_blank">The Definition</a></button><button class="btn_default4 bdr_radius2"><a href="http://dictionary.reference.com/browse/' + $q + '?s=t" target="_blank">Dictionary.com</a></button><button class="btn_default4 bdr_radius2"><a href="http://www.merriam-webster.com/dictionary/' + $q + '" target="_blank">Merriam Webster</a></button><button class="btn_default4 bdr_radius2"><a href="http://en.wikipedia.org/wiki/' + $q + '" target="_blank">Wikipedia</a></button>';
                $mean += '</div>';
            }


            if (obj['mean'] != null && obj['data']['img'] != null && lang() == 'bengali') {
                $mean += '<div>Bangla Academy Ovidhan</div>';
                var img_mean = obj['data']['img'];
                if ($q == 'into') {
                    img_mean = 'into';
                }
                $mean += '<div>';
                $mean += '<img src="//www.bdword.com/word/' + obj['data']['img'].toUpperCase() + '.JPG" title="' + img_mean + '" alt="' + img_mean + '" loading="lazy" />';
                $mean += '</div>';


            }

            if (obj['mean'] != null && Object.size(obj['data']['mean']) > 0) {
                $mean += '<span><label>English to ' + lang_uc() + ' Meaning</label></span><div class="custom_margin2"></div>';

                //$mean += '<div class="jumbo_details bn_meaning">';
                var i = 0;
                $.each(obj['data']['mean'], function (key, val) {
                    i++;
                    if (i > 1) {
                        //$mean += '<hr>';
                    }
                    var $mean_array = [];

                    $.each(val, function (key, val) {
                        if (obj['mean'][val] != undefined) {
                            $mean_array.push(obj['mean'][val]);
                        }
                    });

                    $mean += ((key != 'main') ? '<span><label><b>' + key + ':</b></label> ' : '') + $mean_array.filter(onlyUnique).join(', ') + '</span>';


                });

                //$mean += '</span>';
            }


            // eng meaning
            if (obj['mean'] != null && Object.size(obj['data']['eng']) > 0) {

                var $pop_eng_mean = '';
                var i = 0;

                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion" class="custom-accordion-content">';

                $.each(obj['data']['eng'], function (key, val) {

                    i++;
                    if (i > 1) {
                        $pop_eng_mean += '<hr>';
                    }

                    $pop_eng_mean += '<b>' + $q + ' [' + key + ']</b>';
                    $pop_eng_mean += '<p>';

                    $i = 0;
                    $.each(val, function (key, val) {
                        $i++;

                        $pop_eng_mean += '<p>' + $i + '. ' + val + '</p>';
                    });


                    $pop_eng_mean += '</p>';

                });

                $pop_eng_mean = $pop_eng_mean.replace(/'/g, "&quot");

                console.log($pop_eng_mean);

                $mean += $pop_eng_mean;

                //$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'English Meaning :: '+$q+'\',\''+$pop_eng_mean+'\')">Show English Meaning</button>&nbsp;&nbsp;';

                $mean += '</div></div></span>';


            }

            // examples
            if (obj['mean'] != null && Object.size(obj['data']['examples']) > 0) {

                $i = 0;


                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion2" class="custom-accordion-content">';

                var $pop_examples = '';
                $.each(obj['data']['examples'], function (key, val) {
                    $i++;
                    if ($i > 1) {
                        //$pop_examples += '<hr>';
                    }

                    $pop_examples += '<p>' + $i + '. ' + val + '</p>';

                });

                $pop_examples = $pop_examples.replace(/'/g, "&quot");

                $mean += $pop_examples;

                //$mean += '<button class="btn btn-raised" onclick="showEngMeanPop(\'Examples :: '+$q+'\',\''+$pop_examples+'\')">Show Examples</button>';

                $mean += '</div></div></span>';
            }


            // phrases
            if (obj['mean'] != null && Object.size(obj['data']['phrase']) > 0) {
                //$mean += '<br><div class="jumbo_title" data-target="phrases">Related Phrases</div>';
                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion3()" class="custom-accordion-header" data-target="phrases">Related Phrases<div class="icon_right">(+)</div></h4><div id="accordion3" class="custom-accordion-content">';
                $i = 0;
                //$mean += '<div class="jumbo_details phrases">';

                $.each(obj['data']['phrase'], function (key, val) {

                    if (obj['mean'][val] != undefined) {
                        $i++;
                        if ($i > 1) {
                            //$mean += '<hr>';
                        }
                        $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                    }

                });
                $mean += '</div></div></span>';
            }


            // synonyms
            if (obj['mean'] != null && Object.size(obj['data']['syn']) > 0) {
                //$mean += '<br><div class="jumbo_title" data-target="phrases">Synonyms</div>';
                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion4()" class="custom-accordion-header" data-target="phrases">Synonyms<div class="icon_right">(+)</div></h4><div id="accordion4" class="custom-accordion-content">';
                $i = 0;

                //$mean += '<div class="jumbo_details synonyms">';
                $.each(obj['data']['syn'], function (key, val) {

                    if (obj['mean'][val] != undefined) {
                        $i++;
                        if ($i > 1) {
                            //$mean += '<hr>';
                        }

                        $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                    }

                });
                $mean += '</div></div></span>';
            }

            // antonyms
            if (obj['mean'] != null && Object.size(obj['data']['anto']) > 0) {
                //$mean += '<br><div class="jumbo_title" data-target="phrases">Antonyms</div>';
                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion5()" class="custom-accordion-header" data-target="phrases">Antonyms<div class="icon_right">(+)</div></h4><div id="accordion5" class="custom-accordion-content">';
                $i = 0;

                $mean += '<div class="jumbo_details antonyms">';
                $.each(obj['data']['anto'], function (key, val) {

                    if (obj['mean'][val] != undefined) {
                        $i++;
                        if ($i > 1) {
                            //$mean += '<hr>';
                        }
                        $mean += '<p>' + $i + '. <a href="' + main_domain() + '/english-to-' + lang() + '-meaning-' + val + '">' + val + '</a> = ' + obj['mean'][val] + '</p>';
                    }

                });
                $mean += '</div></div></span>';
            }

            // variants
            if (obj['mean'] != null && Object.size(obj['data']['variants']) > 0) {
                //$mean += '<br><div class="jumbo_title" data-target="phrases">Different forms</div>';
                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion6()" class="custom-accordion-header" data-target="phrases">Different forms<div class="icon_right">(+)</div></h4><div id="accordion6" class="custom-accordion-content">';

                //$mean += '<div class="jumbo_details variants">';
                $mean += '<p>' + obj['data']['variants'].join(', ') + '</p>';
                $mean += '</div></div></span>';
            }

            // similar
            if (obj['mean'] != null && Object.size(obj['data']['similar']) > 0) {
                //$mean += '<br><div class="jumbo_title" data-target="phrases">Similar Words</div>';
                $mean += '<div class="custom_margin2"></div><span><div class="accordion_collapse"><h4 onclick="showHideAccordion7()" class="custom-accordion-header" data-target="phrases">Similar Words<div class="icon_right">(+)</div></h4><div id="accordion7" class="custom-accordion-content">';

                //$mean += '<div class="jumbo_details similar">';
                $mean += '<p>' + obj['data']['similar'].join(', ') + '</p>';
                $mean += '</div></div></span>';
            }


            $mean += '</div></fieldset></div>';

            // Show everything
            $(content_area).html($mean);

        },
        error: function () {
            console.log('error');
        }
    });

}

function show_meaning(v) {
    //  var url1 = 'english-to-' + lang() + '-meaning-' + v;
    //  var new_url = '/' + url1;
    //  window.history.pushState('data', 'Title', new_url);

    var $q = v;
    var type = 1;

    if ($q.charAt(0).match(/[a-z]/i)) {
        type = 0;
        $q = v.replace(/\W/g, '').replace('_', '').replace(' ', '').toLowerCase();
        $('.page-title').text('Read Text :: English to ' + lang_uc());
    } else {
        $q = v.replace('_', '').replace(',', '').replace('?', '').replace('???', '').replace('!', '').replace('\'', '').replace('"', '');
        $('.page-title').text('Read Text :: ' + lang_uc + ' to English');
    }

    $('#complete-dialog').modal('show');
    if (type == 0) {
        $('.modal-title').text($q.charAt(0).toUpperCase() + $q.slice(1));
    } else {
        $('.modal-title').text($q);
    }

    $('.modal-body').html('<div class="loader"><img style="width:50px;" src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif" loading="lazy"/></div>');

    run_ajax($q, type, '.modal-body');
}

function main_domain() {
    return $domainurl;
}


$('#qb').on('keyup', function () {

            var search_term = $('#qb').val();
            var localLang = $('#localLang').val();
			var searchWord = search_term.slice(0, 2);
			var searchLength = search_term.length;
            var firstChar = search_term.charAt(0).toLowerCase();
           
            if (searchLength > 2) {
                $.ajax({
                    type: 'post',
                    data: {q: searchWord, lang: localLang},
                    url: 'https://server2.mcqstudy.com/searchLangApi.php',
                    success: function (data) {
					
						console.log(data);
                        $('.suggested_list').html('');
                        if (data != '' && data != null) {
							var array = data.filter(onlyUnique);
							var step = 0;
							$.each(array, function (i, val) {
								if (val.slice(0, searchLength) == search_term && step < 16) {
									$('.suggested_list').append('<div onclick="submit_search_local(\'' + val + '\')">' + val + '</div>');
									step++;
								}
							 
                            });
                        }

                    }
                });
            } else {
                $('.suggested_list').html('');
            }

        });

WebFontConfig = {
    google: {families: ['Roboto:300,400,500,700']}
};
(function () {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})(); 