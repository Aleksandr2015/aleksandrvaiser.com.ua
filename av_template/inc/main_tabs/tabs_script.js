$(document).ready(function() {

    //When page loads...
    $(".tab_content").hide();
    $("ul.tabs li:nth-child(2)").addClass("active").show();
    $(".tab_content:first").show();

    //On Click Event
    $("ul.tabs li.request_tabs").click(function() {

        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab_content").hide();

        var activeTab = $(this).find("a").attr("href");
        $(activeTab).fadeIn();
        return false;
    });

});