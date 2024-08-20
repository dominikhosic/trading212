# Trading212 API client library for PHP

Unofficial PHP API client library for the [Trading212](https://www.trading212.com) API service. 


## Install

```sh
composer require marekskopal/trading212
```

## Usage

```php
use MarekSkopal\Trading212\Trading212;

// Create Trading212 instance
$trading212 = new Trading212('<yourApiKey>');

// Get exchange list
$response = $trading212->getInstrumentsMetadata()->exchangeList();
```

## Covered endpoints
More endpoints will be covered in future versions.

### Instruments Metadata

* Exchange List        ✅
* Instrument List      ✅


## Notice
This is NOT an official Trading212 library, and the authors of this library are not affiliated with Trading212 in any way, shape or form.

## Contributing
If you want to contribute, feel free to submit a pull request.
