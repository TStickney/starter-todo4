#Change Log

Team membership:  
    - Terra Hunter <ms.terra.h@gmail.com>
    - Taryn Stickney

Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) 

Release Date: Oct 12, 2017

## *Version 1.0*
### Description
    - Completed Job 5
### Updated components
    - config/config.php
        - Updated the Help Wanted menu link to display from the Helpme controller.
    - config/autoload.php
        - Added the Parsedown library to the autoload list.
### New Components
    - controllers/Helpme.php
        - Displays a request parsed from markdown.
    - data/jobs.md
        - A markdown file containing a request to be displayed.
    - libraries/Parsedown.php
        - Added a markdown parse library.

## *Version 0.4*
### Description
    - Completed Job 3
### Updated Components
    - controllers/MY_Controller
        - Edited so that the template is displayed properly
    - models/Tasks.php 
        - Added functionality to display a categorized list of tasks.
        - Added a sort function to sort tasks by category.
    -config/config.php
        - Updated the menu link Work to display from the Views controller.
### New Components
    - views/template_secondary.php
        - Created a template that displays the priority and category lists.
    - views/by_category.php
        - The content of the category list.
    - views/by_priority.php 
        - The content of the priority list.
    - controllers/Views.php
        - Displays the priority and category lists. 
        - Contains a function to sort tasks by priority.
        - Contains functionality to display the priority list. 

## *Version 0.3*
### Description
    - Completed Job 2
    - Fixed some issues in Job 1
### Updated Components
    - constants.php (Terra)
        - DATAPATH fixed.
    - public/index.php (Terra)
        - Returned the FCPATH definition because problems.
    - controller/Welcome.php (Terra)
        - Added functionality to display tasks
    - views/homepage.php
        - Added table to the page, that is controlled by the controller

## *Version 0.2*
### Description
    - Completed Job 1
### Updated Components
    - autoload.php (Terra)  
    - constants.php (Terra)
        - Defined the DATAPATH constant.
        - Defined the FCPATH constant.
    - public/index.php (Terra)
        - Removed the FCPATH definition.
### New Components
    -  models/Tasks.php (Terra)
        - basic model construction. 

## *Version 0.1*
### Description
    - Created changelog and formated it, ready for use.
### New Components
    -  changelog.md (Terra)





