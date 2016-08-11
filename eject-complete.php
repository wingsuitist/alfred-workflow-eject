<?php

/*
 * this is only the source for easier editing - the executed source is in the workflow config
 */
 require_once('workflows.php');
 $wf = new Workflows();

 $orig = "{query}";

 //exec("diskutil list|sed -e 's/^\([^ ]*\) .*$/\\1/g'|grep /", &$disks);
 $disks = array('test', 'test2');

 foreach($disks as $key => $disk) {
     $wf->result( $key++, $disk, "$disk", 'disk', 'icon.png');
 }
 $results = $wf->results();
 if ( count( $results ) == 0 ):
 	$wf->result( 'eject', $orig, 'No disks found', 'No disks found', 'icon.png');
 endif;

 echo json_encode($wf->results());
