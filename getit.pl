#!/usr/bin/perl
use strict;
use warnings;

use threads;
use Thread::Queue;

my $today = `date +"%h %d"`;
chomp($today);

my %args;
$args{function}      = $ARGV[0];
$args{search}        = $ARGV[1];
$args{date}          = $ARGV[2];
if((!$args{function}) || (!$args{search}) || (!$args{date})) {
	die "$0 function search date \n";
}

my @array;
$#array = 1000;
my @getit;
$#getit = 1000;

open FILE, "cl-list.txt" or die "ERROR: Investigate cl-list.txt";
@array = <FILE>;
close(FILE);

## Page head
print "Craigslist results for $args{function} search $args{search} on $args{date} <br><br>";
print "<table border=1><tr><th>Listing</th><th>Source</th></tr>";

## THREADS
my $a = 6; # Number of workers
my $b = 10; # How much to collect before ending the round
my $c = @array; # Max number.

my $queue = new Thread::Queue;

## Print based on function
if($args{function} eq "gigs") {
  while($c) {
	while($b && $a) {
	  my $url = $array[$c];
	  chomp($url);
	  my $url2 = "$url/search/cpg?query=$args{search}&catAbbreviation=cpg&addThree=";
	  my $child = threads->create(\&getit2,$url,$url2,$args{date}),
	  $c--;
	  $b--;
	  $a--;
	}
	my $tid = $queue->dequeue();
	my $child = threads->object($tid);
	$b++;
	$a++;
  }
}
elsif($args{function} eq "jobs") {
  while($c) {
	while($b && $a) {
	  my $url = $array[$c];
	  chomp($url);
	  my $url2 = "$url/search/jjj?query=$args{search}&addOne=telecommuting";
	  my $child = threads->create(\&getit2,$url,$url2,$args{date}),
	  $c--;
	  $b--;
	  $a--;
	}
	my $tid = $queue->dequeue();
	my $child = threads->object($tid);
	$b++;
	$a++;
  }
}
print "</table>";
print "--- END RESULTS ---";

## Sub routines here
## v1 = $url, v2, = $url2, v3 = $date
sub getit2($$$) {
	my $tid = threads->tid();
	my %sa;
	($sa{url},$sa{url2},$sa{date}) = @_;
	@getit = qx(links -dump "$sa{url2}");
	for my $results (@getit) {
		if($results =~ m/$sa{date}/) {
			chomp($results);
			print "<tr><td>$results</td>
				<td><a href=$sa{url2}>$sa{url}</a></td></tr>";
		}
	}
	$queue->enqueue($tid);
}
exit();
