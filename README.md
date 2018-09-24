# Micro Client Bundle

## Config

```yaml
micro_service:
  connections:
    passport:
      ip: 127.0.0.1
      port: 9002
      route:  passport
      wait: 0.25
```

## Register
```php
return [
        \Micseres\MicroClientBundle\MicroClientBundle::class => ['all' => true],
];
```

## License

The Soft Deletable Bundle is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
