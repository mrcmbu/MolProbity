<?php # (jEdit options) :folding=explicit:collapseFolds=1:
/*****************************************************************************
    Allows user to make some choices about how to run the analysis.
    
INPUTS (via Get or Post):
    model           ID code for model to process

OUTPUTS (via Post):
    model           ID code for model to process
    makeFlipkin     true if the user wants a Flipkin made

*****************************************************************************/
// EVERY *top-level* page must start this way:
// 1. Define it's relationship to the root of the MolProbity installation.
// Pages in subdirectories of lib/ or public_html/ will need more "/.." 's.
    if(!defined('MP_BASE_DIR')) define('MP_BASE_DIR', realpath(dirname(__FILE__).'/..'));
// 2. Include core functionality - defines constants, etc.
    require_once(MP_BASE_DIR.'/lib/core.php');
// 3. Restore session data. If you don't want to access the session
// data for some reason, you must call mpInitEnvirons() instead.
    mpStartSession();
// 4. For pages that want to see the session but not change it, such as
// pages that are refreshing periodically to monitor a background job.
    #mpSessReadOnly();

#{{{ a_function_definition - sumary_statement_goes_here
############################################################################
/**
* Documentation for this function.
*/
//function someFunctionName() {}
#}}}########################################################################

#{{{ a_function_definition - sumary_statement_goes_here
############################################################################
/**
* Documentation for this function.
*/
//function someFunctionName() {}
#}}}########################################################################

#{{{ a_function_definition - sumary_statement_goes_here
############################################################################
/**
* Documentation for this function.
*/
//function someFunctionName() {}
#}}}########################################################################

#{{{ a_function_definition - sumary_statement_goes_here
############################################################################
/**
* Documentation for this function.
*/
//function someFunctionName() {}
#}}}########################################################################

# MAIN - the beginning of execution for this page
############################################################################
// Start the page: produces <HTML>, <HEAD>, <BODY> tags
echo mpPageHeader("Add H with Reduce -build", "improve");


$model = $_REQUEST['model'];
############################################################################
?>

<form method='post' action='improve_reduce_launch.php'>
<?php
    echo postSessionID();
    echo "<input type='hidden' name='model' value='$model'>\n";
?>
<p><input type='checkbox' name='makeFlipkin' value='1' checked>
    Produce Flipkin kinemage showing what changes were made
<p><input type='submit' name='cmd' value='Start adding H'>
</form>

<?php echo mpPageFooter(); ?>
