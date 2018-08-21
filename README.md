# Load SVG icons

Easy to load the SVG icons in the specific folder with only one command

## Getting Started

### Installing

Clone the source into the project

```
git clone https://locddspkt@bitbucket.org/locddspkt/font-awesome-pro-loader.git
```

Include the class

```
include_once '/path/to/the/file/FaLoader.php';
```

Set the folder (if do not use the default folder)

```
FaLoader\Icons::init('path/to/the/icon/folder/');
```

Load the icon with this command

```
FaLoader\Icons::load('icon-name');
```

## Running the tests

The test file is test/test.php

## License

This project is licensed under the MIT License