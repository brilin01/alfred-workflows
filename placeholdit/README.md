Image Placeholder Alfred workflow ([Download v1.0.0](https://raw.githubusercontent.com/brilin01/alfred-workflows/master/placeholdit/image-placeholder.alfredworkflow))
=====================

## Requirements
1. [Alfred App v2](http://www.alfredapp.com/#download)
2. [Alfred Powerpack](https://buy.alfredapp.com/)

## Installing
1. Click the download button above to download the Alfred workflow file
2. Double-click the file to import into Alfred 2

## About
Generates an image placeholder via [placeholder.it](http://placeholder.it).

![alt text][workflow]

## Commands & Parameters
- `pi { [resolution] }`
  1. resolution - The width and height of your placeholder image (ex. `pi 200x200` or just `pi 200` if width and height are both the same)

## Options
- Pressing Enter will copy the HTML img tag code to the clipboard and open the image placeholder url to the browser
- Pressing CMD+Enter will copy the HTML img tag code to the clipboard
- Pressing ALT+Enter will copy the url to the clipboard

## Examples
![alt text][resolution]
![alt text][resolution-shortcut]


[workflow]: ./screenshots/alfred_image-placeholder_1.png "Alfred workflow for generating image placeholders"
[resolution]: ./screenshots/alfred_image-placeholder_2.png "Specifying width and height for Image Placeholder"
[resolution-shortcut]: ./screenshots/alfred_image-placeholder_3.png "Specifying width and height in simplified format for Image Placeholder"
