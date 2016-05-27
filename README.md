# logger-reader

### Basic Usage
```
use MMC\LoggerReader\Reader;

$reader = new Reader();

foreach($reader->load($filePath) as $log) {
    print_r($log);
}

```

### License
MIT