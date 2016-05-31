# logger-reader

### Install
```
composer -vvv require runner/monolog-reader
```

### Basic Usage
```
use Runner\MonologReader\Reader;

$reader = new Reader();

foreach($reader->load($filePath) as $log) {
    print_r($log);
}

```

### License
MIT