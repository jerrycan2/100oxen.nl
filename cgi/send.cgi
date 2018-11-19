#!/Strawberry/perl/bin/perl -w
# test
use strict;
use warnings FATAL => 'all';
use CGI ':standard';
   print header;                    
   print start_html('answer');
   print 'ok ';
   print param('naam'), "<br>", 'bakker';
   print "<p>", param('text'), "</p>";
   print end_html;
