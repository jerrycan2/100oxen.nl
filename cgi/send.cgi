#!/Strawberry/perl/bin/perl -w
# #!/usr/bin/perl -w
# use cPanelUserConfig;
# test
use strict;
use warnings FATAL => 'all';
use CGI;
   my $q = CGI->new();
   print $q->header;
   print $q->start_html('answer');
   print 'ok ';
   print 'hallo ', $q->param('name'), "<br>";
   print 'adres: ', $q->param('mail'), "<br>";
   print "<p>", $q->param('text'), "</p>";
   print $q->end_html;
