<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	use Sk\SmartId\Client;
	use Sk\SmartId\Api\Data\NationalIdentity;
	use Sk\SmartId\Api\Data\AuthenticationHash;
	use Sk\SmartId\Api\Data\CertificateLevelCode;
	use Sk\SmartId\Api\AuthenticationResponseValidator;

	// Client setup. Note that these values are demo environment specific.
	$client = new Client();
	$client
	  ->setRelyingPartyUUID( '00000000-0000-0000-0000-000000000000' )
	  ->setRelyingPartyName( 'DEMO' )
	  ->setHostUrl( 'https://sid.demo.sk.ee/smart-id-rp/v1/' );
	  
	// Consists of country and personal identity code
	$identity = new NationalIdentity( 'EE', '31111111111' );

	// For security reasons a new hash value must be created for each new authentication request
	$authenticationHash = AuthenticationHash::generate();

	$verificationCode = $authenticationHash->calculateVerificationCode();

	try
	{
	  $authenticationResponse = $client->authentication()
		->createAuthentication()
		->withNationalIdentity( $identity ) // or with document number: ->withDocumentNumber( 'PNOEE-1111111111-XXXX-XX' )
		->withAuthenticationHash( $authenticationHash )
		->withCertificateLevel( CertificateLevelCode::QUALIFIED ) // Certificate level can either be "QUALIFIED" or "ADVANCED"
		->authenticate();
	}
	catch (SmartIdException $e) {
	  // Handle exception (more on exceptions in "Handling intentional exceptions")
	}
	
	$documentNumber = 'PNOEE-1111111111-XXXX-XX';

	$authenticationHash = AuthenticationHash::generate();

	$verificationCode = $authenticationHash->calculateVerificationCode();

	try
	{
	  $authenticationResponse = $client->authentication()
		->createAuthentication()
		->withDocumentNumber( $documentNumber )
		->withAuthenticationHash( $authenticationHash )
		->withCertificateLevel( CertificateLevelCode::QUALIFIED )
		->authenticate();
	}
	catch (SmartIdException $e) {
	  // Handle exception (more on exceptions in "Handling intentional exceptions")
	}
	

	$authenticationResponseValidator = new AuthenticationResponseValidator();
	$authenticationResult = $authenticationResponseValidator->validate( $authenticationResponse );
	// authentication validity result
	$isValid = $authenticationResult->isValid();

	// When the result is not valid then the reason(s) for invalidity are obtainable like this:
	$errors = $authenticationResult->getErrors();
?>