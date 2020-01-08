function concatValues(e) {
    var t = "";
    for (var s in e) t += e[s];
    return t
}
jQuery(document).ready(function(e) {
    e(".grid figure").css("margin", "0px")
}), jQuery(document).ready(function(e) {
    var t = e(".content-wrap").css("marginLeft");
    e(".innerPageTitles h1").css("marginLeft", t), e(".innerPageTitles2 h1").css("marginLeft", t);
    var s = e(".innerPageTitles").css("height");
    e(".innerPageTitlesContainerNoBanner").css("height", s), e(window).on("resize", function() {
        var t = e(".content-wrap").css("marginLeft");
        e(".innerPageTitles h1").css("marginLeft", t), e(".innerPageTitles2 h1").css("marginLeft", t);
        var s = e(".innerPageTitles").css("height");
        e(".innerPageTitlesContainerNoBanner").css("height", s)
    })
}), jQuery(document).ready(function(e) {
    e(".ts-hover-effects-container.ts-image-effects-frame.ts-image-hover-frame").hover(function() {
        e(this, ".grid").css("background-color", "rgba(21,109,179,0.9)"), e(this).css("text-align", "center"), e("img", this).css({
            transform: "scale(1.3)",
            opacity: "0.1"
        }), e(".ts-hover-effects-figcaption h2", this).css("visibility", "hidden"), e(".ts-hover-effects-figcaption", this).css({
            "background-color": "rgba(21,109,179,0.9)",
            "z-index": "20"
        }), e(".ts-hover-effect-content", this).css({
            visibility: "visible",
            "text-align": "center"
        }), e(".ts-hover-image-link.ts-hover-image-link-permanent", this).css({
            "font-size": "16px",
            "white-space": "normal"
        })
    }, function() {
        e(this, ".grid").css("background-color", "transparent"), e(this).css("text-align", "left"), e("img", this).css({
            transform: "scale(1)",
            opacity: "1"
        }), e(".ts-hover-effects-figcaption h2", this).css("visibility", "visible"), e(".ts-hover-effects-figcaption", this).css({
            "background-color": "transparent",
            "z-index": "0"
        }), e(".ts-hover-effect-content", this).css({
            visibility: "hidden",
            "text-align": "left"
        }), e(".ts-hover-image-link.ts-hover-image-link-permanent", this).css({
            "font-size": "0px",
            "white-space": "no-wrap"
        })
    })
}), jQuery(document).ready(function(e) {
    e(".fa.icon-magnifier").click(function() {
        e(".toggleSearch").toggle("slide")
    })
}), jQuery(document).ready(function(e) {
    e(".ufb-relative br").remove()
}), jQuery(document).ready(function(e) {
    var t = e(".grid").isotope({
            itemSelector: ".sortColumn",
            filter: ".all-solutions"
        }),
        s = {};
    e(".filters").on("click", ".sortButton", function() {
        var i = e(this),
            n = i.parents(".button-group").attr("data-filter-group");
        s[n] = i.attr("data-filter");
        var o = concatValues(s);
        t.isotope({
            filter: o
        })
    });
    var i = e(".filters").find('button[data-filter=""]'),
        n = e(".filters button");
    e(".button--reset").on("click", function() {
        s = {}, e(".grid").isotope({
            filter: ".all-solutions"
        }), n.removeClass("is-checked"), i.addClass("is-checked"), e(".allSolutionsButton .button--reset").addClass("is-checked"), e("#row1 .dropdownHeadings").html("Category").removeClass("is-checked"), e("#row2 .dropdownHeadings").html("Industry").removeClass("is-checked"), e("#row1 .dropdownHeadings.caseStudiesDropdownHeadings").html("Solution"), e("#row2 .dropdownHeadings.caseStudiesDropdownHeadings").html("Industry")
    }), e(".ui-group").each(function(t, s) {
        (s = e(s)).on("click", "button", function() {
            s.find(".is-checked").removeClass("is-checked"), e(this).addClass("is-checked");
            var t = e(this, ".is-checked").text();
            e(this, ".is-checked").closest("#row1").length && (e("#row1 .dropdownHeadings").html(t).addClass("is-checked"), e(".allSolutionsButton .sortButton").hasClass("is-checked") && e(".allSolutionsButton .sortButton").removeClass("is-checked")), e(this, ".is-checked").closest("#row2").length && (e("#row2 .dropdownHeadings").html(t).addClass("is-checked"), e(".allSolutionsButton .sortButton").hasClass("is-checked") && e(".allSolutionsButton .sortButton").removeClass("is-checked"))
        })
    })
});
