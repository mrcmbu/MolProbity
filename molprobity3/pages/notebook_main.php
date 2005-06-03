<?php # (jEdit options) :folding=explicit:collapseFolds=1:
/*****************************************************************************
    This page allows users view and edit their lab notebooks.
*****************************************************************************/
require_once(MP_BASE_DIR.'/lib/labbook.php');

// This variable must be defined for index.php to work! Must match class below.
$delegate = new NotebookMainDelegate();
// We use a uniquely named wrapper class to avoid re-defining display(), etc.
class NotebookMainDelegate extends BasicDelegate {
    
#{{{ display - creates the UI for this page
############################################################################
/**
* Context is not used.
*/
function display($context)
{
    mpLog("notebook-view:User visited Lab Notebook page");
    
    $labbook = openLabbook();
    echo mpPageHeader("Lab notebook", "notebook");
    
    // Set time zone form
    echo makeEventForm("onSetTimezone");
    echo "Now: " . formatTime(time());
    echo "\n";
    echo timeZonePicker('timezone', $_SESSION['timeZone']);
    echo "<input type='submit' name='cmd' value='Set time zone'>\n";
    echo "</form>\n";
    echo "<hr />\n";
    
    // Notebook table of contents
    echo "<a name='top'>\n";
    $this->printTOC($labbook);
    echo makeEventForm("onNotebookEdit");
    echo "<input type='submit' name='cmd' value='Create new entry'>\n</form>\n</a>\n<br clear='all' />\n";
    
    // Actual notebook entries
    foreach($labbook as $num => $entry)
    {
        $this->printEntry($num, $entry);
    }

    echo mpPageFooter();
}// end of display
#}}}########################################################################

#{{{ printEntry - prints an entry along with controls
############################################################################
function printEntry($num, $entry)
{
    echo "<hr>\n";
    echo "<a name='entry$num'>\n";
    echo formatLabbookEntry($entry);
    echo "</a>\n";
    echo "<p><a href='#top'>Top</a> | <a href='".makeEventURL("onNotebookEdit", $num)."'>Edit</a>\n";
}
#}}}########################################################################

#{{{ printTOC - prints a HTML table-of-contents for the lab notebook
############################################################################
function printTOC($book)
{
    if(count($book) == 0)
    {
        echo "<center><p><i>No entries have been made in the lab notebook.</i></p></center>\n";
    }
    else
    {
        echo "<ul>\n";
        foreach($book as $num => $entry)
        {
            $title = $entry['title'];
            if($title == "") $title = "(no title)";
            echo "<li><a href='#entry$num'>$title</a> [".formatDayTime($entry['modtime'])."]</li>\n";
        }
        echo "</ul>\n";
    }
}
#}}}########################################################################

#{{{ onSetTimezone - sets the users preferred time zone for time display
############################################################################
/**
* Documentation for this function.
*/
function onSetTimezone($arg, $req)
{
    if(isset($req['timezone']))
    {
        $_SESSION['timeZone'] = $req['timezone'];
        mpLog("timezone:User specified timezone as ".$req['timezone']);
    }
}
#}}}########################################################################

#{{{ onNotebookEdit
############################################################################
/**
* $arg is the entry number to be edited
*/
function onNotebookEdit($arg, $req)
{
    pageCall("notebook_edit.php", array('entryNumber' => $arg));
}
#}}}########################################################################

#{{{ a_function_definition - sumary_statement_goes_here
############################################################################
/**
* Documentation for this function.
*/
//function someFunctionName() {}
#}}}########################################################################

}//end of class definition
?>