$(document).bind('copy', function(e) { e.preventDefault(); }); $(document).bind('paste', function() { /*alert('Paste is not allowed !!!');*/ e.preventDefault(); }); $(document).bind('cut', function() { /*alert('Cut is not allowed !!!');*/ e.preventDefault(); }); $(document).bind('contextmenu', function(e) { /*alert('Right Click is not allowed !!!');*/ e.preventDefault(); });
 
 
 window.onload = function () {
        document.onkeydown = function (e) {
            return (e.which || e.keyCode) != 116;
        };
    }