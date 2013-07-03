<?php
class WikiLingo_Plugin_gmaps extends WikiLingo_Plugin_HtmlBase
{
    public $htmlTagType = 'iframe';
    public $htmlAttributes = array(
        'id'=>'',
        'class'=>'',
        'style'=>'',
        'width'=>640,
        'height'=>480,
        'frameborder'=>0,
        'scrolling'=>"no",
        'marginheight'=>0,
        'marginwidth'=>0,
        'src'=>"https://maps.google.com/?ie=UTF8&amp;t=h&amp;ll=39.603969,-86.102428&amp;spn=0.063485,0.109863&amp;z=13&amp;output=embed",
    );

    //<iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;t=h&amp;ll=39.603969,-86.102428&amp;spn=0.063485,0.109863&amp;z=13&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/?ie=UTF8&amp;t=h&amp;ll=39.603969,-86.102428&amp;spn=0.063485,0.109863&amp;z=13&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
}

