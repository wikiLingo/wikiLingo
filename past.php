<?php
require_once "../autoload.php";
require_once "rb.php";
require_once "pairAssembler.php";

$metadata = new FLP\Metadata();

$metadata->author = "Don Jewett";
$metadata->authorInstitution = "";
$metadata->authorProfession = "Brain Scientist";

$metadata->moderator = "Robert Plummer";
$metadata->moderatorInstitution = "Visual Interop Development llc";
$metadata->moderatorProfession = "Software Engineer";

$metadata->answers = array();
$metadata->categories = array();
$metadata->count = 0;
$metadata->dateLastUpdated = time();
$metadata->dateOriginated = time();
$metadata->href = "http://localhost/p/flp-php/default-ui/index.php";
$metadata->keywords = array();
$metadata->language = "English";
$metadata->minimumMathNeeded = "";
$metadata->minimumStatisticsNeeded = "";
$metadata->scientificField = "";
$metadata->websiteTitle = "FutureLink-Protocol Demo";
$metadata->websiteSubtitle = "In php";


$clipboarddata = json_encode($metadata);
$title = 'The FutureLink-Protocol';
$body = <<<Body
<p>We want to take the present-day web-functionality of "link" and "backlink" and enhance it for use by scholars. So when we talk of an "enhanced Link" we'll call it a "PastLink", and an "enhanced Backlink" will be called a "FutureLink".</p>

<p>The term Backlink is very confusing because a Backlink points forwards in time (see Fig. below in Section 2.3).</p>

<p>The difference in terminology between a FutureLink and a Backlink is the difference in viewpoint between an Author and a Reader:</p>

<p>An Author creates a Link from a newer article to an older one, and thus can imagine a Backlink from the older article pointing "back" to the Author's newer article. NB: "Back" here does not mean "backwards in time", it means "back to an origin".</p>

<p>A Reader of the older article sees the link to a newer article as a "FutureLink" (Forwards-in-time), and is confused if it is called a "Backlink". NB: "Forward" here means "Forward-in-time".</p>
Body;
$msg = '';

R::setup();

$foundArticle = R::find('article',' title = ? ', array($title));

if (!$foundArticle) {
    $article = R::dispense('article');
    $article->title = $title;
    $article->body = $body;
    $article->sanitized = Phraser\Parser::superSanitize($body);
    $article->metadata = $clipboarddata;
    R::store($article);
    $msg = 'Article Created';
}

$ui = new FLP\UI($body);
$pairs = R::find('pair', ' title = ? ', array($title));
$json = array();

foreach($pairs as $pair) {
    $existingPair = new pairAssembler($pair->pair);
    $ui->addPhrase($existingPair->pastText);
    $json[] = $existingPair;
}

?><!DOCTYPE html><html>
<head>
    <title>The FutureLink-Protocol <?php echo (empty($msg) ? '' : '(' . $msg . ')')?></title>
    <script src="../jquery-1.10.2.min.js"></script>
    <script src="../md5.min.js"></script>
    <script src="../Phraser/rangy/rangy-core.js"></script>
    <script src="../Phraser/rangy/rangy-textrange.js"></script>
    <script src="../Phraser/rangy-phraser.js"></script>
    <script src="FutureLink.js"></script>
    <script>
        var flpData = <?php echo json_encode($json);?>;
        console.log(flpData);
        $(function() {
            $('#button').click(function() {
                var text = rangy.getSelection().text(),
                    clipboarddata = JSON.parse('<?php echo $clipboarddata ?>');

                clipboarddata.href = document.location;
                clipboarddata.text = text;
                clipboarddata.hash = md5(
                    rangy.superSanitize(
                        clipboarddata.author +
                            clipboarddata.authorInstitution +
                            clipboarddata.authorProfession
                    )
                    ,
                    rangy.superSanitize(clipboarddata.text)
                );

                clipboarddata.href = clipboarddata.href.toString();

                console.log(clipboarddata);
                console.log(JSON.stringify(clipboarddata));

                prompt('Here is your clipboard data', encodeURIComponent(JSON.stringify(clipboarddata)));
                return false;
            });

            var phrases = $('span.phrases');

            for(var i = 0; i <= <?php echo $ui->phraseIndex;?>; i++) {
                new FutureLink(
                    phrases.filter('span.phraseBeginning' + i),
                    phrases.filter('span.phrase' + i),
                    phrases.filter('span.phraseEnd' + i)
                );
            }
        });

    </script>
</head>
<body>
<?php echo $ui->render();?>
<input type="button" id="button" value="Create PastLink"/>
</body>
</html>

