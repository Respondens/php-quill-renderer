# Transpilation from PHP7 code to PHP5.6

To allow this library to run on PHP5.6 the following process was used:

## 1. Install transpilation library and run transpilation
The library used is: https://packagist.org/packages/janpiet/php-version-transpiler
Note that it requires PHP7 to run.
- `composer global require janpiet/php-version-transpiler:dev-master`
- `php-version-transpiler src src`

## 2. Additional replaces
The following seems to have been skipped by the transpiler library
`find ./src/ -type f -print0 | xargs -0 sed -i -r 's/public const/const/g'`

## 3. Code reformatting
The PHP transpiler uses the Nikic PHP parser and thus does not retain the original formatting of the file. 
To reduce unnecessary diffs, we run the code through PHP-CS-Fixer. 
Be aware that this is not perfect and will still result in whitespace changes.
- `composer global require friendsofphp/php-cs-fixer`
- `php-cs-fixer fix`