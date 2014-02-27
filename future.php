<!DOCTYPE html>
<html>
<head>
    <title>FutureLink-Protocol, Demo of Future Article linking to a PastLink</title>
</head>
<body><?php
require_once "vendor/autoload.php";

$title = 'The FutureLink-Protocol, An explanation';
$source = <<<Source
<p>One of my neatest projects is working with Abratech, creating the FutureLink-Protocol.
@FLP(%7B%22websiteTitle%22%3A%22FutureLink-Protocol%20Demo%22%2C%22websiteSubtitle%22%3A%22In%20php%22%2C%22moderator%22%3A%22Robert%20Plummer%22%2C%22moderatorInstitution%22%3A%22Visual%20Interop%20Development%20llc%22%2C%22moderatorProfession%22%3A%22Software%20Engineer%22%2C%22hash%22%3A%22cf6beb29b1735773528298c4a24f5244%22%2C%22author%22%3A%22Don%20Jewett%22%2C%22authorInstitution%22%3A%22%22%2C%22authorProfession%22%3A%22Brain%20Scientist%22%2C%22href%22%3A%22http%3A%2F%2Flocalhost%2Fp%2Fflp-php%2Fdefault-ui%2F%22%2C%22answers%22%3A%5B%5D%2C%22dateLastUpdated%22%3A1384892798%2C%22dateOriginated%22%3A1384892798%2C%22language%22%3A%22English%22%2C%22count%22%3A0%2C%22keywords%22%3A%5B%5D%2C%22categories%22%3A%5B%5D%2C%22scientificField%22%3A%22%22%2C%22minimumMathNeeded%22%3A%22%22%2C%22minimumStatisticsNeeded%22%3A%22%22%2C%22text%22%3A%22an%20%5C%22enhanced%20Link%5C%22%20we'll%20call%20it%20a%20%5C%22PastLink%5C%22%2C%20and%20an%20%5C%22enhanced%20Backlink%5C%22%20will%20be%20called%20a%20%5C%22FutureLink%5C%22%22%7D)The FutureLink-Protocol is interesting as it creates a dynamic link, one that updates through time!@)
But there are many other projects that I enjoy as well.
</p>
Source
;

$scripts = (new WikiLingo\Utilities\Scripts())
    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js");

$parser = new WikiLingo\Parser($scripts);




$msg = '';

FLP\Events::bind(new FLP\Event\MetadataLookup(function($linkType, &$value) {
    $value = new FLP\Metadata();
    $value->author = "Robert Plummer";
    $value->authorInstitution = "Visual Interop Development llc";
    $value->authorProfession = "Software Engineer";

    $value->moderator = "Robert Plummer";
    $value->moderatorInstitution = "Visual Interop Development llc";
    $value->moderatorProfession = "Software Engineer";

    $value->answers = array();
    $value->categories = array();
    $value->count = 0;
    $value->dateLastUpdated = time();
    $value->dateOriginated = time();
    $value->href = "http://www.github.com/FutureLink-Protocol/php";
    $value->keywords = array();
    $value->language = "English";
    $value->minimumMathNeeded = "";
    $value->minimumStatisticsNeeded = "";
    $value->scientificField = "";
    $value->websiteTitle = "FutureLink-Protocol Demo";
    $value->websiteSubtitle = "In php";
}));

$page = $parser->parse($source);

echo $page . $scripts->renderScript();?>
</body>
</html>