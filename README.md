# Chrome Devtools Code Coverage Parser

Simple PHP script to extract used CSS from a Google Chrome Devtools coverage JSON export. The export feature was added in Chrome 73

**Note**: This script was created to work when you 'record' in DevTools coverage across pages. Behaviour of the coverage tool seems to change over time (see: https://bugs.chromium.org/p/chromium/issues/detail?id=811983) and no longer records coverage across pages and has been deemed a feature request. You can still use it on one page but there's no real point in that.

It appears the last version to support coverage across pages was 60.0.3091.0. For Ubuntu you can get a version (59) from https://www.slimjet.com/chrome/google-chrome-old-version.php 

Update the following variables:

**$target_css** = relative URL of the specific stylesheet you want to parse from the coverage export

**$json_string** = path to your Google Chrome coverage JSON export file

**$output_filename** = the name of the resultant CSS file you want

# Example on a test site 

Purging a CSS file of unused styles, saving approx 300 KB

**Before:**

![before](https://user-images.githubusercontent.com/46265707/55680704-fb30ad00-5914-11e9-8bf5-ece7fcaea7c3.png)

**After:**

![after](https://user-images.githubusercontent.com/46265707/55680703-fb30ad00-5914-11e9-8dbe-24f963e48e6e.png)

The process isn't perfect, especially on styles that are changed dynamically (like nav menus for example) by scripts. But it's a lot better than trying to use post-css or similar.

Best advice is to run it through the parser and see where the obvious problems are with removed styles, extract those specific CSS rules into their own stylesheet (e.g. remove it from being picked up by the Chrome coverage report), then run through the process again on the stylesheet.
