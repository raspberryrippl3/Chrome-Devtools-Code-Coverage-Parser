# Chrome Devtools Code Coverage Parser

Simple PHP script to extract used CSS from a Google Chrome Devtools coverage JSON export. The export feature was added in Chrome 73

Update the following variables:

**$target_css** = relative URL of the specific stylesheet you want to parse from the coverage export

**$json_string** = path to your Google Chrome coverage JSON export file

**$output_filename** = the name of the resultant CSS file you want
