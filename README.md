Croogo-Citates
==============

The project provides collection of quotations (citates) displayable by element on address:

Primary use is as topline under site name, can be seen here: http://www.sedmihorky.com

[element:header plugin="Citates"]

=============

Note: If you need to adjust menu position in administration, edit file Config/bootstrap.php

line 3 : CroogoNav::add('citates', array(
    new: CroogoNav::add('extensions.children.citates', array(

