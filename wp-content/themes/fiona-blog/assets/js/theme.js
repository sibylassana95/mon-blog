var FionaThemeJs;
! function(e, t) {
    "use strict";
    (FionaThemeJs = {
        eventID: "FionaThemeJs",
        $document: e(document),
        $window: e(window),
        $body: e("body"),
        classes: {
            toggled: "toggled",
            isOverlay: "overlay-enabled",
            headerMenuActive: "header-menu-active",
            authorPopUpActive: "author-popup-active",
            headerSearchActive: "header-search-active"
        },
        init: function() {
            this.$document.on("ready", this.documentReadyRender.bind(this)), this.$document.on("ready", this.mobileMenuClone.bind(this)), this.$document.on("ready", this.processAutoheight.bind(this)), this.$window.on("ready", this.documentReadyRender.bind(this))
        },
        documentReadyRender: function() {
            this.$document.on("click." + this.eventID, ".menu-toggle", this.menuToggleHandler.bind(this)).on("click." + this.eventID, ".header-close-menu", this.menuToggleHandler.bind(this)).on("click." + this.eventID, this.hideHeaderMobilePopup.bind(this)).on("click." + this.eventID, ".mobile-toggler", this.verticalMobileSubMenuLinkHandle.bind(this)).on("click." + this.eventID, ".header-close-menu", this.resetVerticalMobileMenu.bind(this)).on("hideHeaderMobilePopup." + this.eventID, this.resetVerticalMobileMenu.bind(this)).on("resize." + this.eventID, this.processAutoheight.bind(this)).on("click." + this.eventID, ".header-search-toggle", this.searchToggleHandler.bind(this)).on("click." + this.eventID, ".header-search-close", this.searchToggleHandler.bind(this)).on("click." + this.eventID, this.hideSearchHeader.bind(this)).on("click." + this.eventID, ".about-toggle", this.authorToggleHandler.bind(this)).on("click." + this.eventID, ".author-close", this.authorToggleHandler.bind(this)).on("click." + this.eventID, this.hideAuthorPopup.bind(this)), this.$window.on("load." + this.eventID, this.menuFocusAccessibility.bind(this)).on("resize." + this.eventID, this.processAutoheight.bind(this))
        },
        processAutoheight: function(t) {
            var s = e(".navigator-wrapper"),
                i = e(".navigator-wrapper > .theme-mobile-nav"),
                o = e(".navigator-wrapper > .nav-area *:not(.logo):not(.search-button *):not(.cart-wrapper *):not(.dropdown-menu)"),
                n = 0;
            e("body").find("div").hasClass("sticky-nav") && ("block" == e("div.theme-mobile-nav").css("display") ? (i.each(function() {
                var t = e(this).outerHeight(!0);
                t > n && (n = t)
            }), s.css("min-height", n)) : (o.each(function() {
                var t = e(this).outerHeight(!0);
                t > n && (n = t)
            }), s.css("min-height", n)))
        },
        menuFocusAccessibility: function(t) {
            e(".theme-menu, .widget_nav_menu").find("a").on("focus blur", function() {
                e(this).parents("ul, li").toggleClass("focus")
            })
        },
        mobileMenuClone: function(t) {
            e(".menubar .menu-wrap").clone().appendTo(".mobile-menu")
        },
        menuToggleHandler: function(t) {
            var s = e(".menu-toggle");
            this.$body.toggleClass(this.classes.headerMenuActive), this.$body.toggleClass(this.classes.isOverlay), s.toggleClass(this.classes.toggled), this.$body.hasClass(this.classes.headerMenuActive) ? e(".header-close-menu").focus() : s.focus(), this.menuAccessibility()
        },
        hideHeaderMobilePopup: function(t) {
            var s = e(".menu-toggle"),
                i = e(".mobile-menu");
            e(t.target).closest(s).length || e(t.target).closest(i).length || this.$body.hasClass(this.classes.headerMenuActive) && (this.$body.removeClass(this.classes.headerMenuActive), this.$body.removeClass(this.classes.isOverlay), s.removeClass(this.classes.toggled), this.$document.trigger("hideHeaderMobilePopup." + this.eventID), t.stopPropagation())
        },
        verticalMobileSubMenuLinkHandle: function(t) {
            t.preventDefault();
            var s = e(t.currentTarget),
                i = (s.closest(".mobile-menu .menu-wrap"), s.parents(".dropdown-menu").length);
            this.isRTL;
            setTimeout(function() {
                s.parent().toggleClass("current"), s.next().slideToggle()
            }, 250)
        },
        resetVerticalMobileMenu: function(t) {
            e(".mobile-menu .menu-wrap");
            var s = e(".mobile-menu  .menu-item"),
                i = e(".mobile-menu .dropdown-menu");
            setTimeout(function() {
                s.removeClass("current"), i.hide()
            }, 250)
        },
        menuAccessibility: function() {
            var e, t, s, i = document.querySelector(".mobile-menu");
            let o = document.querySelector(".header-close-menu"),
                n = i.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
                a = n[n.length - 1];
            if (!i) return !1;
            for (t = 0, s = (e = i.getElementsByTagName("a")).length; t < s; t++) e[t].addEventListener("focus", h, !0), e[t].addEventListener("blur", h, !0);

            function h() {
                for (var e = this; - 1 === e.className.indexOf("mobile-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace(" focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === o && (a.focus(), e.preventDefault()) : document.activeElement === a && (o.focus(), e.preventDefault()))
            })
        },
        authorToggleHandler: function(t) {
            var s = e(".about-toggle"),
                i = e(".author-close");
            this.$body.toggleClass(this.classes.authorPopUpActive), this.$body.toggleClass(this.classes.isOverlay), this.$body.hasClass(this.classes.authorPopUpActive) ? i.focus() : s.focus(), this.authorPopupAccessibility()
        },
        hideAuthorPopup: function(t) {
            var s = e(".about-toggle"),
                i = e(".author-popup");
            e(t.target).closest(s).length || e(t.target).closest(i).length || this.$body.hasClass(this.classes.authorPopUpActive) && (this.$body.removeClass(this.classes.authorPopUpActive), this.$body.removeClass(this.classes.isOverlay), s.focus(), t.stopPropagation())
        },
        authorPopupAccessibility: function() {
            var e, t, i, s = document.querySelector(".author-popup");
            let n = document.querySelector(".author-close"),
                a = s.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
                o = a[a.length - 1];
            if (!s) return !1;
            for (t = 0, i = (e = s.getElementsByTagName("a")).length; t < i; t++) e[t].addEventListener("focus", c, !0), e[t].addEventListener("blur", c, !0);

            function c() {
                for (var e = this; - 1 === e.className.indexOf("author-anim");) "*" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === n && (o.focus(), e.preventDefault()) : document.activeElement === o && (n.focus(), e.preventDefault()))
            })
        },
        searchToggleHandler: function(t) {
            var s = e(".header-search-toggle"),
                i = e(".header-search-field");
            this.$body.toggleClass(this.classes.headerSearchActive), this.$body.toggleClass(this.classes.isOverlay), this.$body.hasClass(this.classes.headerSearchActive) ? i.focus() : s.focus(), this.searchPopupAccessibility()
        },
        hideSearchHeader: function(t) {
            var s = e(".header-search-toggle"),
                i = e(".header-search-popup");
            e(t.target).closest(s).length || e(t.target).closest(i).length || this.$body.hasClass(this.classes.headerSearchActive) && (this.$body.removeClass(this.classes.headerSearchActive), this.$body.removeClass(this.classes.isOverlay), s.focus(), t.stopPropagation())
        },
        searchPopupAccessibility: function() {
            var e, t, i, s = document.querySelector(".header-search-popup");
            let n = document.querySelector(".header-search-field"),
                a = s.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
                o = a[a.length - 1];
            if (!s) return !1;
            for (t = 0, i = (e = s.getElementsByTagName("button")).length; t < i; t++) e[t].addEventListener("focus", c, !0), e[t].addEventListener("blur", c, !0);

            function c() {
                for (var e = this; - 1 === e.className.indexOf("header-search-popup");) "input" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === n && (o.focus(), e.preventDefault()) : document.activeElement === o && (n.focus(), e.preventDefault()))
            })
        }
    }).init()
}(jQuery, window.fionaConfig);