#OGotcha

An OGame CR converter based on the kokx converter

OGotcha is available at this url: [converter.dijkman-winters.nl][dijk]

## What do you need to know 

When copying the software you should change 2 files before you start testing:
- .htaccess
- const.php

The /git/ogame-converter/ needs to be changed to the path on your testing server.

**.htaccess**
```
  RewriteBase /git/ogame-converter/
```

**const.php**
```
  define( '__BASE', '/git/ogame-converter/'	);
```

## License

Licensed under [GNU GPL v3][gpl]. Have fun.

[gpl]: https://raw.githubusercontent.com/Warsaalk/OGotcha/master/COPYING
[dijk]: http://converter.dijkman-winters.nl/
