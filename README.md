AvsAn Symfony Bundle
====================

PHP port of http://home.nerbonne.org/A-vs-An/

## Installation
With [composer](http://getcomposer.org), add this repository to the repositories array:
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/UseAllFive/a-vs-an.git"
        }
    ]
}
```
Add it to the require hash of your composer.json
```json
{
    "require": {
        "useallfive/a-vs-an": "dev-master"
    }
}
```

### Symfony 2
Add the bundle to your `AppKernel#registerBundles()` method.
```php
$bundles = array(
    // ...
    new UseAllFive\AvsAnBundle\UseAllFiveAvsAnBundle(),
);
```

## Sample usage
### Symfony 2
```php
class DefaultController extends Controller
{
    public function defaultAction()
    {
        $aVsAn = $this->get('a_vs_an');
        $result = $aVsAn->query('0800 number');
    }
}
```
```php
print_r($result);
```

```php
Array
(
    [aCount] => 8
    [anCount] => 25
    [prefix] => 08
    [article] => an
)
```
