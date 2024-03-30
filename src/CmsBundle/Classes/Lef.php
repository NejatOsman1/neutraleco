<?php
namespace App\CmsBundle\Classes;

class Lef
{
	//define needed variables
	protected $id,$initType,$type,$kindOf,$description,$origin,$salutation,$firstName,$middleName,$lastName,$preLetters,$dateOfBirth,$phoneNumber,$emailaddress,
		$addresses = array(),$street,$streetNumber,$streetNumberAddition,$zipcode,$location,$country,$companyName,$gender,$userName,$password,$settings,$live = false,
		$testUrl,$liveUrl,$groups = array(),$pars = array(),$accountNumber,$brand;
	protected $genders = [
		1 => "Obekend",
		2 => "Man",
		3 => "Vrouw" 
	];
	protected $fuelTypes = [
		1 => "Benzine",
		2 => "Diesel",
		3 => "LPG",
		4 => "CNG",
		5 => "Hybride",
		6 => "HybrideDiesel",
		7 => "HybrideLPG",
		8 => "Elektrisch",
		9 => "Waterstof",
		10 => "Overige"
	];
	protected $vehicleTypes = [
		1 => "Nieuw",
		2 => "Occasion"
	];
	protected $addressTypes = [
		1 => "Huisadres", 
		2 => "Bezoekadres", 
		3 => "Postadres",
		4 => "Vestigingsadres", 
		5 => "Factuuradres", 
		6 => "Afleveradres"
	];
	protected $initTypes = [
		1 => "Klant", 
		2 => "Autobedrijf", 
		3 => "Importeur"
	];
	protected $types = [
        1 => 'Sales',
        2 => 'Aftersales',
        3 => 'Fleetsales',
    ];
	protected $kindsOf = [
		1 => "Terugbelverzoek",
		2 => "Contactverzoek",
		3 => "HoudMijOpDeHoogte", 
		4 => "Klanttevredenheid", 
		5 => "Taxatie",
		6 => "Proefrit", 
		7 => "Offerte", 
		8 => "Showroombezoek", 
		9 => "Brochure",
		10 => "Verzekering", 
		11 => "Financiering", 
		12 => "PrivateLease",
		13 => "ZakelijkLeasen", 
		14 => "Bieding", 
		15 => "Mailing", 
		16 => "Werkplaatsofferte",
		17 => "Banden", 
		18 => "Werkplaatsafspraak", 
		19 => "APK", 
		20 => "Reparatie",
		21 => "Onderhoud", 
		22 => "Garantie", 
		23 => "Loyalty", 
		24 => "ShortLease", 
		25 => "Verhuur",
		26 => "Schade", 
		27 => "CarConfigurator", 
		28 => "Accessoires", 
		29 => "Klacht", 
		30 => "Event",
		31 => "TelefonischeLead", 
		32 => "Webshop", 
		33 => "Zoekopdracht", 
		34 => "Bellijst",
		35 => "Terugroepactie", 
		36 => "Overig"
	];
	
	
	//getters
	
	public function getId(): string{
		return $this->leadId;
	}
	
	
	//setters
	
	public function setType(int $type = 1): self{
		$this->type = $this->types[$type];
		return $this;
	}
	
	public function setAccountNumber(string $accountNumber): self{
		$this->accountNumber = $accountNumber;
		return $this;
	}
	
	public function setKindOf(int $kindOf = 2): self{
		$this->kindOf = $this->kindsOf[$kindOf];
		return $this;
	}
	
	public function setInitType(int $initType = 1): self{
		$this->initType = $this->initTypes[$initType];
		return $this;
	}
	
	public function setDescription(string $description): self{
		$this->description = $description;
		return $this;
	}
	
	public function setOrigin(string $origin): self{
		$this->origin = $origin;
		return $this;
	}
	
	public function setId(string $id = ""): self{
		if(empty($id)){
			$date = date_create();
			$this->id = date_timestamp_get($date);
		}else{
			$this->id = $id;
		}
		return $this;
	}
	
	public function setSalutation(string $salutation): self{
		$this->salutation = $salutation;
		return $this;
	}
	
	public function setGender(int $gender = 1): self{
		$this->gender = $this->genders[$gender];
		return $this;
	}
	
	public function setFirstName(string $firstName): self{
		$this->firstName = $firstName;
		return $this;
	}
	
	public function setMiddleName(string $middleName): self{
		$this->middleName = $middleName;
		return $this;
	}
	
	public function setLastName(string $lastName): self{
		$this->lastName = $lastName;
		return $this;
	}
	
	public function setCompanyName(string $companyName): self{
		$this->companyName = $companyName;
		return $this;
	}
	
	public function setPreLetters(string $preLetters): self{
		$this->preLetters = $preLetters;
		return $this;
	}
	
	public function setDateOfBirth(string $dateOfBirth): self{
		$this->dateOfBirth = $dateOfBirth;
		return $this;
	}
	
	public function setPhoneNumber(string $phoneNumber): self{
		$this->phoneNumber = $phoneNumber;
		return $this;
	}
	
	public function setEmailaddress(string $emailaddress): self{
		$this->emailaddress = $emailaddress;
		return $this;
	}
	
	public function addAddress(int $addressType = 1): self{
		$this->addresses[] = 
			array(
				'type' => $this->addressTypes[$addressType],
				'street' => (!empty($this->street) ? $this->street : ""),
				'street_number' => (!empty($this->streetNumber) ? $this->streetNumber : ""),
				'street_number_addition' => (!empty($this->streetNumberAddition) ? $this->streetNumberAddition : ""),
				'zipcode' => (!empty($this->zipcode) ? $this->zipcode : ""),
				'location' => (!empty($this->location) ? $this->location : ""),
				'country' => (!empty($this->country) ? $this->country : "")
			);
		return $this;
	}
	
	public function setStreet(string $street): self{
		$this->street = $street;
		return $this;
	}
	
	public function setStreetNumber(string $streetNumber): self{
		$this->streetNumber = $streetNumber;
		return $this;
	}
	
	public function setStreetNumberAddition(string $streetNumberAddition): self{
		$this->streetNumberAddition = $streetNumberAddition;
		return $this;
	}
	
	public function setZipcode(string $zipcode): self{
		$this->zipcode = $zipcode;
		return $this;
	}
	
	public function setLocation(string $location): self{
		$this->location = $location;
		return $this;
	}
	
	public function setCountry(string $country): self{
		$this->country = $country;
		return $this;
	}
	
	public function setEntityManager($em){
		$this->em = $em;
		return $this;
	}
	
	public function setTestUrl(string $testUrl): self{
		$this->testUrl = $testUrl;
		return $this;
	}
	
	public function setLiveUrl(string $liveUrl): self{
		$this->liveUrl = $liveUrl;
		return $this;
	}
	
	public function setLive(bool $live = false): self{
		$this->live = $live;
		return $this;
	}
	
	public function setSettings($settings = null): self{
		$this->settings = $settings;
		$this->setUserName($this->settings->getLefUserName());
		$this->setPassword($this->settings->getLefPassword());
		$this->setTestUrl($this->settings->getLefApiTestUrl());
		$this->setLiveUrl($this->settings->getLefApiLiveUrl());
		$this->setLive($this->settings->getLefApiLive());
		return $this;
	}
	
	public function setByForm(array $form): self{		
		foreach($form as $questionid => $answer){
			$Question = $this->em->getRepository('TrinityFormsBundle:Question')->findOneById($questionid);
			switch(strtolower($Question->getTitle())){
				case "vestiging":
					if(!empty($answer)){
						if(strtolower($answer) == "vestiging heerhugowaard"){
							$this->setAccountNumber("001");
						}
						if(strtolower($answer) == "vestiging zwaag"){
							$this->setAccountNumber("002");
						}
						
						$this->addPair("Vestiging",$answer)
							->addGroup("Vestiging");
					}
					break;
				case "aanhef":
					$this->setSalutation($answer);
					break;
				case "voornaam":
					$this->setFirstName($answer);
					break;
				case "voorletters":
					$this->setPreLetters($answer);
					break;
				case "tussenvoegsel":
					$this->setMiddleName($answer);
					break;
				case "naam":
					$this->setFirstName($answer);
					break;
				case "uw naam":
					$this->setFirstName($answer);
					break;
				case "achternaam":
					$this->setLastName($answer);
					break;
				case "voornaam + achternaam":
					$this->setFirstName($answer);
					break;
				case "straat":
					$this->setStreet($answer);
					break;
				case "straatnaam + huisnummer":
					$this->setStreet($answer);
					break;
				case "straat + huisnummer":
					$this->setStreet($answer);
					break;
				case "huisnummer":
					$this->setHouseNumber($answer);
					break;
				case "huisnummer":
					$this->setHouseNumber($answer);
					break;
				case "huisnummertoevoeging":
					$this->setStreetNumberAddition($answer);
					break;
				case "postcode":
					$this->setZipcode($answer);
					break;
				case "plaats":
					$this->setLocation($answer);
					break;
				case "stad":
					$this->setLocation($answer);
					break;
				case "land":
					$this->setCountry($answer);
					break;
				case "geboortedatum":
					$this->setDateOfBirth($answer);
					break;
				case "gender":
					break;
				case "sex":
					break;
				case "telefoonnummer":
					$this->setPhoneNumber($answer);
					break;
				case "bedrijfsnaam":
					$this->setCompanyName($answer);
					break;
				case "bedrijfsnummer":
					break;
				case "companyNumber":
					break;
				case "kvknummer":					
					break;
				case "e-mailadres":
					$this->setEmailaddress($answer);
					break;
				case "uw e-mailadres":
					$this->setEmailaddress($answer);
					break;
				case "afdeling":
					if($answer == "Werkplaats"){
						$this->setKindOf(18);
						$this->setType(2);
					}					
					break;
				case "e-mail":
					$this->setEmailaddress($answer);
					break;
				case "opmerkingen":
					//$this->setDescription($answer);
					if(!empty($answer)){
						$this->addPair("Opmerking",$answer)
							->addGroup("Opmerking");
					}
					break;
			}
		}
		return $this;
	}
	
	public function setUserName(string $username): self{
		$this->userName = $username;
		return $this;
	}
	
	public function setPassword(string $password): self{
		$this->password = $password;
		return $this;
	}
	
	public function addPair($key,$value): self{
		if(!empty($value))$this->pairs[$key] = $value;
		return $this;
	}
	
	public function addGroup(string $name): self{
		$this->groups[$name] = $this->pairs;
		$this->pairs = array();
		return $this;
	}
	
	private function sanitize(string $value): string{
		$value = trim($value);
		$value = str_replace("<","&lt;",$value);
		$value = str_replace(">","&gt;",$value);
		$value = str_replace("&","&amp;",$value);
		$value = str_replace("“","&quot;",$value);
		$value = str_replace("'","&apos;",$value);
		return $value;
	}
	
	public function setCarBrand(string $brand): self{
		$this->car_brand = $brand;
		return $this;
	}
	
	public function setCarModel(string $model): self{
		$this->car_model = $model;
		return $this;
	}
	
	public function setCarVersion(string $version): self{
		$this->car_version = $version;
		return $this;
	}
	
	public function setCarLicencePlate(string $licencePlate): self{
		$this->car_licence_plate = $licencePlate;
		return $this;
	}
	
	public function setCarBuildYear(string $buildYear): self{
		$this->car_build_year = $buildYear;
		return $this;
	}
	
	public function setCarFuelType(string $fuelType): self{
		switch(strtolower($fuelType)){
			case "benzine":
				$this->car_fuel_type = $this->fuelTypes[1];
				break;
			case "diesel":
				$this->car_fuel_type = $this->fuelTypes[2];
				break;
			case "lpg":
				$this->car_fuel_type = $this->fuelTypes[3];
				break;
			case "cng":
				$this->car_fuel_type = $this->fuelTypes[4];
				break;
			case "hybride":
				$this->car_fuel_type = $this->fuelTypes[5];
				break;
			case "hybridediesel":
				$this->car_fuel_type = $this->fuelTypes[6];
				break;
			case "hybridelpg":
				$this->car_fuel_type = $this->fuelTypes[7];
				break;
			case "elektrisch":
				$this->car_fuel_type = $this->fuelTypes[8];
				break;
			case "waterstof":
				$this->car_fuel_type = $this->fuelTypes[9];
				break;
			case "Overige":
				$this->car_fuel_type = $this->fuelTypes[10];
				break;
		}
		return $this;
	}
	
	public function setCarVehicleType(string $vehicleType): self{
		switch(strtolower($vehicleType)){
			case "nieuw":
				$this->car_vehicle_type = $this->vehicleTypes[1];
				break;
			case "occasion":
				$this->car_vehicle_type = $this->vehicleTypes[2];
				break;
		}
		return $this;
	}
	
	public function setDesiredCar(): self{
		$this->desired_car = 
				'<GewenstVoertuig>
					'.(!empty($this->car_brand) ? '<Merk>'.$this->car_brand.'</Merk>' : '').'
					'.(!empty($this->car_model) ? '<Model>'.$this->car_model.'</Model>' : '').'
					'.(!empty($this->car_version) ? '<Uitvoering>'.$this->car_version.'</Uitvoering>' : '').'
					'.(!empty($this->car_licence_plate) ? '<Kenteken>'.$this->car_licence_plate.'</Kenteken>' : '').'
					'.(!empty($this->car_build_year) ? '<Bouwjaar>'.$this->car_build_year.'</Bouwjaar>' : '').'
					'.(!empty($this->car_fuel_type) ? '<SoortBrandstof>'.$this->car_fuel_type.'</SoortBrandstof>' : '').'
					'.(!empty($this->car_vehicle_type) ? '<SoortVoertuig>'.$this->car_vehicle_type.'</SoortVoertuig>' : '').'
				</GewenstVoertuig>';
		return $this;
	}
	
	public function setCurrentCar(): self{
		$this->current_car = 
				'<HuidigVoertuig>
					'.(!empty($this->car_brand) ? '<Merk>'.$this->car_brand.'</Merk>' : '').'
					'.(!empty($this->car_model) ? '<Model>'.$this->car_model.'</Model>' : '').'
					'.(!empty($this->car_version) ? '<Uitvoering>'.$this->car_version.'</Uitvoering>' : '').'
					'.(!empty($this->car_licence_plate) ? '<Kenteken>'.$this->car_licence_plate.'</Kenteken>' : '').'
					'.(!empty($this->car_build_year) ? '<Bouwjaar>'.$this->car_build_year.'</Bouwjaar>' : '').'
					'.(!empty($this->car_fuel_type) ? '<SoortBrandstof>'.$this->car_fuel_type.'</SoortBrandstof>' : '').'
				</HuidigVoertuig>';
		return $this;
	}
	
	
	public function send(){
		$curl = curl_init();		
		$addressXml = "";
		$extraInfo = "";
		
		foreach($this->addresses as $address){
			if(empty($address["street"]) && empty($address["zipcode"])){
				if(!empty($address["location"])){
					$this->addPair("location",$address["location"]);
					$this->addGroup("Woonplaats");
				}
				continue;
			}
			$addressXml .= 
				'<Adres SoortAdres="'.$address["type"].'">
					'.(!empty($address["street"]) ? '<Straat>'.$address["street"].'</Straat>' : '').'
					'.(!empty($address["street_number"]) ? '<Huisnummer>'.$address["street_number"].'</Huisnummer>' : '').'
					'.(!empty($address["street_number_addition"]) ? '<HuisnummerToevoeging>'.$address["street_number_addition"].'</HuisnummerToevoeging>' : '').'
					'.(!empty($address["zipcode"]) ? '<Postcode>'.$address["zipcode"].'</Postcode>' : '').'
					'.(!empty($address["location"]) ? '<Plaats>'.$address["location"].'</Plaats>' : '').'
					'.(!empty($address["country"]) ? '<Land>'.$address["country"].'</Land>' : '').'
				</Adres>';
		}
		if(count($this->groups) > 0){
			$extraInfo = "<ExtraInfo>";
			foreach($this->groups as $groupName => $pairs){
				$extraInfo .= '<Groep>';
				$extraInfo .= '<Naam>'.$groupName.'</Naam>';				
				foreach($pairs as $key => $value){
					$extraInfo .= '<Pair>';
						$extraInfo .= '<Key>'.$this->sanitize($key).'</Key>';
						$extraInfo .= '<Value>'.$this->sanitize($value).'</Value>';
					$extraInfo .= '</Pair>';
				}
				$extraInfo .= '</Groep>';
			}
			$extraInfo .= "</ExtraInfo>";
		}
		
		$data = '<?xml version="1.0" encoding="UTF-8"?>
			<Leads xmlns="http://www.uname-it.nl/unameit/xsd/LEF/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.uname-it.nl/unameit/xsd/LEF/ Leads.xsd">
				<Lead>
					<LeadID>'.$this->id.'</LeadID>
					<LeadType>'.$this->type.'</LeadType>
					<SoortLead>'.$this->kindOf.'</SoortLead>
					<LeadInitiatiefType>'.$this->initType.'</LeadInitiatiefType>
					'.(!empty($this->accountNumber) ? '<AccountNummer>'.$this->accountNumber.'</AccountNummer>' : '').'
					<Omschrijving>'.$this->description.'</Omschrijving>
					<LeadBron>'.$this->origin.'</LeadBron>
					<Relatie>
						<Particulier>
							'.(!empty($this->salutation) ? '<Aanhef>'.$this->salutation.'</Aanhef>' : '').'
							<Voornaam>'.(!empty($this->firstName) ? $this->firstName : '').'</Voornaam>
							'.(!empty($this->preLetters) ? '<Voorletters>'.$this->preLetters.'</Voorletters>' : '<Voorletters/>').'
							'.(!empty($this->middleName) ? '<Tussenvoegsel>'.$this->middleName.'</Tussenvoegsel>' : '<Tussenvoegsel/>').'
							'.(!empty($this->lastName) ? '<Achternaam>'.$this->lastName.'</Achternaam>' : '<Achternaam/>').'
							'.(!empty($this->dateOfBirth) ? '<GeboorteDatum>'.$this->dateOfBirth.'</GeboorteDatum>' : '').'
							'.(!empty($this->gender) ? '<Geslacht>'.$this->gender.'</Geslacht>' : '').'
						</Particulier>
						<TelefoonNummers>
							<TelefoonNummer OptIn="false" TelefoonSoort="Prive">'.(!empty($this->phoneNumber) ? $this->phoneNumber : '').'</TelefoonNummer>
						</TelefoonNummers>
						<EmailAdres OptIn="false">'.(!empty($this->emailaddress) ? $this->emailaddress : '').'</EmailAdres>
						'.(!empty($addressXml) ? '<Adressen>'.$addressXml.'</Adressen>' : '').'
					</Relatie>
					'.(!empty($this->current_car) ? $this->current_car : '').'
					'.(!empty($this->desired_car) ? $this->desired_car : '').'
					'.$extraInfo.'
				</Lead>
			</Leads>';
		//dump($data);
		//exit;
		$url = $this->settings->getLefApiTestUrl();
		if($this->live){
			$url = $this->settings->getLefApiLiveUrl();
		}
			
		//set CURL options
		$defaults = array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data,
		);
		
		
		//CURL initialise
		$curl = curl_init();
		//set CURL option return transfer on true
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//set CURL username and password
		curl_setopt($curl, CURLOPT_USERPWD, $this->userName.':'.$this->password);
		//set CURL array data with $curl initialise and $curl options
		curl_setopt_array($curl, $defaults);
		//execute CURL and return results
		$result = curl_exec($curl);
		
		// Getting information about HTTP Code
		$retcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		//close CURL
		curl_close($curl);
		
		return $result;
	}
}