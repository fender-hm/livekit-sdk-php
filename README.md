# LiveKit Server SDK for PHP

PHP SDK to manage rooms, egress and to create access tokens. This package is designed to work with [livekit-server](https://github.com/livekit/livekit-server). Use it with a PHP backend to manage access to LiveKit. Data exchange is based on JSON 

## Installation

### Requirements
- php: >= 7.2


### Composer

```
composer require t3mnikov/livekit-sdk-php
```

### Creating Access Tokens

Creating a token for participant to join a room.

```php

use T3mnikov\AccessToken;
use T3mnikov\AccessTokenOptions;

$tokenOptions = new AccessTokenOptions();
$tokenOptions->setName('My Name');
$tokenOptions->setIdentity('Anybody');

$accessToken = new AccessToken($apiKey, $secret, $tokenOptions);

$grants = new VideoGrant();
$grants->setRoomName($testRoom);
$grants->setRoomJoin();

$accessToken->addGrant($grants);
echo $token = $accessToken->getToken();

```

### Managing Rooms

Receive list rooms.

```php
use T3mnikov\RoomServiceClient;

$host = 'https://my.livekit.host';
$service = new RoomServiceClient($host, 'api-key', 'secret-key');

// List rooms.
$rooms = $service->listRooms();

```