$(document).ready(function(){
    $settings = $(".settings");
    $settings_drop = $(".settings-drop");
    $logout = $(".logout");
    $settings.click(function(){
        $settings_drop.css("display", "block");
        $logout.css("display", "block");
    })
});