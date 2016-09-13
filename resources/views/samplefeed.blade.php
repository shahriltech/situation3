<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jFeed - jQuery feed parser plugin - example</title>
<style type="text/css">
    h3 { margin-bottom: 5px; }
    div.updated { color: #999; margin-bottom: 5px; font-size: 0.8em; }
</style>
<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>
{{ HTML::script('js/jquery.jfeed.pack.js')}}


<script type="text/javascript">

jQuery(function() {

    jQuery.getFeed({
        url: "{{URL::route('testfeed')}}",
        success: function(feed) {            
            jQuery('#result').append('<h2>'
            + '<a href="'
            + feed.link
            + '">'
            + feed.title
            + '</a>'
            + '</h2>');
            
            var html = '';
            
            for(var i = 0; i < feed.items.length && i < 5; i++) {
            
                var item = feed.items[i];
                
                html += '<h3>'
                + '<a href="'
                + item.link
                + '">'
                + item.title
                + '</a>'
                + '</h3>';
                
                html += '<div class="updated">'
                + item.updated
                + '</div>';
                
                html += '<div>'
                + item.description
                + '</div>';
            }
            
            jQuery('#result').append(html);
        }    
    });
});

</script>

</head>
<body>
<h1>jFeed - jQuery feed parser plugin - example</h1>
<div id="result" />
</body>
</html>
